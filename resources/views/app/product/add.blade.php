@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <p>Produto</p>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('products.index')}}">Consulta</a></li>
            <li><a href=""></a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto;margin-right: auto;">
            {{ $msg ?? '' }}

            <form action="{{ isset($product->id) ? route('products.update', ['product' => $product->id]) : route('products.store')}}" method="POST">
                @if (isset($product->id))
                @method('PUT')
                @endif

                @csrf

                <input type="text" name="name" placeholder="Nome" value="{{$product->name ?? old('name')}}" class="borda-preta">
                {{ $errors->has("name") ? $errors->first('name') : ''}}
                <input type="text" name="description" placeholder="descrição" value="{{ $product->description ?? old('description')}}" class="borda-preta">
                {{ $errors->has("description") ? $errors->first('description') : ''}}
                <input type="text" name="weight" placeholder="Peso" value="{{$product->weight ?? old('weight')}}" class="borda-preta">
                {{ $errors->has("weight") ? $errors->first('weight') : ''}}
                <select name="unit_id">
                    <option>Selecione</option>
                    @foreach($units as $unit)
                    <option value="{{ $unit->id}}" {{ ($product->unit_id ?? old('unit_id')) == $unit->id ? 'selected' : '' }}> {{ $unit->description }}</option>
                    @endforeach
                </select>
                {{ $errors->has("unit_id") ? $errors->first('unit_id') : ''}}
                <button type="submit"> salvar </button>
            </form>
        </div>
    </div>
</div>
@endsection