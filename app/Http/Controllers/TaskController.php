<?php

namespace App\Http\Controllers;

use App\Exports\TaskExport;
use App\Models\Task;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $tarefas = Task::where('user_id', $user_id)->paginate(10);
        return view('tarefa.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $dados = $request->all('task', 'deadline');
        $dados['user_id'] = auth()->user()->id;

        $tarefa = Task::create($dados);

        $destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
        // Mail::to($destinario)->send(new NovaTarefaMail($tarefa));

        return redirect()->route('task.show', ['task' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
        return view('tarefa.show', ['tarefa' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Task $task)
    {
        //
        $user_id = auth()->user()->id;

        if ($task->user_id == $user_id) {
            return view('tarefa.edit', ['tarefa' => $task]);
        }

        return view('acesso-negado');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
        if (!$task->user_id == auth()->user()->id) {
            return view('acesso-negado');
        }

        $task->update($request->all());
        return redirect()->route('task.show', ['task' => $task->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        if (!$task->user_id == auth()->user()->id) {
            return view('acesso-negado');
        }
        $task->delete();
        return redirect()->route('task.index');
    }

    public function exportacao($extensao)
    {

        if (in_array($extensao, ['xlsx', 'csv', 'pdf'])) {
            return Excel::download(new TaskExport, 'lista_de_tarefas.' . $extensao);
        }

        return redirect()->route('tarefa.index');
    }

    public function export()
    {
        $tarefas = auth()->user()->tasks()->get();
        $pdf = PDF::loadView('tarefa.pdf', ['tarefas' => $tarefas]);

        $pdf->setPaper('a4', 'portrait');
        //tipo de papel: a4, letter
        //orientação: landscape (paisagem), portrait (retrato)


        //return $pdf->download('lista_de_tarefas.pdf');
        return $pdf->stream('lista_de_tarefas.pdf');
    }
}
