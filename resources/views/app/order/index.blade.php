@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('orders.create')}}">Novo</a></li>
            <li><a href="{{ route('orders.index')}}">Consulta</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto;margin-right: auto;">
            <form action="{{route('orders.index')}}" method="POST">
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
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <!-- <th>Peso</th> -->

                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->client->name }}</td>
                        <!-- <td></td> -->


                        <td><a href="{{ route('orders.show', $order->id) }}">Visualizar</a></td>
                        <td>
                            <form id="form_{{$order->id}}" method="POST" action="{{ route('orders.destroy', $order->id) }}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$order->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{ route('orders.edit', $order->id) }}">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection