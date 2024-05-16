@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Fornecedor</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.supliers.new')}}"></a></li>
            <li><a href="{{ route('app.supliers')}}">Consulta</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto;margin-right: auto;">
            {{ $msg ?? '' }}
            <form action="{{ route('app.supliers.new')}}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Nome" value="{{old('name')}}" class="borda-preta">
                {{ $errors->has("name") ? $errors->first('name') : ''}}
                <input type="text" name="site" placeholder="Site" value="{{old('site')}}" class="borda-preta">
                {{ $errors->has("site") ? $errors->first('site') : ''}}
                <input type="text" name="uf" placeholder="UF" value="{{old('uf')}}" class="borda-preta">
                {{ $errors->has("uf") ? $errors->first('uf') : ''}}
                <input type="text" name="email" placeholder="E-mail" value="{{old('email')}}" class="borda-preta">
                {{ $errors->has("email") ? $errors->first('email') : ''}}
                <button type="submit"> salvar </button>
            </form>
        </div>
    </div>
</div>
@endsection