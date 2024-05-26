@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Visualizar Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('products.index')}}">Consulta</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto;margin-right: auto;">
            <table border="1">
                <tr>
                    <td>ID</td>
                    <td>{{ $product->id}}</td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td>{{ $product->name}}</td>
                </tr>
                <tr>
                    <td>Peso</td>
                    <td>{{ $product->weight}}</td>
                </tr>
                <tr>
                    <td>Unidade</td>
                    <td>{{ $product->unit_id}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection