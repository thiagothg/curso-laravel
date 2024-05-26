@extends('app.layouts.basic')

@section('title', 'Clientes')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Clientes</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('clients.create')}}">Novo</a></li>
            <li><a href="{{ route('clients.index')}}">Consulta</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto;margin-right: auto;">
            <form action="{{route('clients.index')}}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Nome" class="borda-preta">
                <!-- <input type="text" name="site" placeholder="Site" class="borda-preta">
                <input type="text" name="uf" placeholder="UF" class="borda-preta">
                <input type="text" name="email" placeholder="E-mail" class="borda-preta"> -->
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
                        <!-- <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th> -->
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>

                        <td><a href="{{ route('clients.show', $client->id) }}">Visualizar</a></td>
                        <td>
                            <form id="form_{{$client->id}}" method="POST" action="{{ route('clients.destroy', $client->id) }}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$client->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{ route('clients.edit', $client->id) }}">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $clients->links() }}
        </div>
    </div>
</div>
@endsection