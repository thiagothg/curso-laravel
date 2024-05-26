<?php

namespace App\Http\Controllers;

use App\Models\App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $suppliers = Supplier::where('name', 'like', '%' . $request->input('name') . '%')
            // ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(2);

        return view('app.suplier.index', compact('suppliers'));
    }


    public function new(Request $request)
    {

        $msg = '';

        //inclusão
        if ($request->input('_token') != '' && $request->input('id') == '') {
            //validacao
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchida',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Supplier();
            $fornecedor->create($request->all());

            //redirect

            //dados view
            $msg = 'Cadastro realizado com sucesso';
        }

        //edição
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Supplier::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Atualização realizado com sucesso';
            } else {
                $msg = 'Erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.suplier.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.suplier.add', compact('msg'));
    }

    public function editar($id, $msg = '')
    {

        $suplier = Supplier::find($id);

        return view('app.suplier.add', ['suplier' => $suplier, 'msg' => $msg]);
    }
}
