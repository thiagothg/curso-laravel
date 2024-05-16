@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Fornecedor</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.supliers.new')}}">Novo</a></li>
            <li><a href="{{ route('app.supliers')}}">Consulta</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto;margin-right: auto;">
            <form action="{{route('app.supliers.search')}}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Nome" class="borda-preta">
                <input type="text" name="site" placeholder="Site" class="borda-preta">
                <input type="text" name="uf" placeholder="UF" class="borda-preta">
                <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                <button type="submit"> pesquisar </button>
            </form>
        </div>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <!-- <th>Site</th> -->
                        <th>UF</th>
                        <th>E-mail</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <!-- <td>{{ $supplier->site }}</td> -->
                        <td>{{ $supplier->uf }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>Excluir</td>
                        <td><a href="{{ route('app.supliers.edit', $supplier->id) }}">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $suppliers->links() }}
        </div>
    </div>
</div>
@endsection