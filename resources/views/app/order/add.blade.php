@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Pedido</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('orders.index')}}">Consulta</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto;margin-right: auto;">

            <form action="{{ isset($order->id) ? route('orders.update', ['order' => $order->id]) : route('orders.store')}}" method="POST">
                @if (isset($order->id))
                @method('PUT')
                @endif

                @csrf


                <select name="client_id">
                    <option>Selecione</option>
                    @foreach($clients as $client)
                    <option value="{{ $client->id}}" {{ ($client->client_id ?? old('client_id')) == $client->id ? 'selected' : '' }}> {{ $client->name }}</option>
                    @endforeach
                </select>
                {{ $errors->has("client_id") ? $errors->first('client_id') : ''}}
                <button type="submit"> salvar </button>
            </form>
        </div>
    </div>
</div>
@endsection