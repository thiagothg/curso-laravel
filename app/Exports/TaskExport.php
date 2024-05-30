<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TaskExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return auth()->user()->tasks()->get();
    }

    public function headings(): array
    { //declarando o tipo de retorno
        return [
            'ID da Tarefa',
            'Tarefa',
            'Data limite conclusão'
        ];
    }

    public function map($linha): array
    {
        return [
            $linha->id,
            $linha->task,
            date('d/m/Y', strtotime($linha->deadline))
        ];
    }
}
