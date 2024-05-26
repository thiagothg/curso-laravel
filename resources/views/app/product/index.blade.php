@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('products.create')}}">Novo</a></li>
            <li><a href="{{ route('products.index')}}">Consulta</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto;margin-right: auto;">
            <form action="{{route('products.index')}}" method="POST">
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
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade</th>
                        <th>Comprimento</th>
                        <th>Altura</th>
                        <th>Largura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->weight }}</td>
                        <td>{{ $product->unit_id }}</td>
                        <td>{{ $product->productDetail->length ?? ''}}</td>
                        <td>{{ $product->productDetail->height ?? ''}}</td>
                        <td>
                            {{ $product->productDetail->width ?? ''}}
                        </td>
                        <td><a href="{{ route('products.show', $product->id) }}">Visualizar</a></td>
                        <td>
                            <form id="form_{{$product->id}}" method="POST" action="{{ route('products.destroy', $product->id) }}">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="document.getElementById('form_{{$product->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                        <td><a href="{{ route('products.edit', $product->id) }}">Editar</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection