@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Cliente</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('clients.index')}}">Consulta</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto;margin-right: auto;">
            {{ $msg ?? '' }}

            <form action="{{ isset($client->id) ? route('clients.update', ['client' => $client->id]) : route('clients.store')}}" method="POST">
                @if (isset($client->id))
                @method('PUT')
                @endif

                @csrf

                <input type="text" name="name" placeholder="Nome" value="{{$client->name ?? old('name')}}" class="borda-preta">
                {{ $errors->has("name") ? $errors->first('name') : ''}}


                <button type="submit"> salvar </button>
            </form>
        </div>
    </div>
</div>
@endsection