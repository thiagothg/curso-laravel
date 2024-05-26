<div class="topo">
    <div class="logo">
        <img src="{{asset('img/logo.png')}}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('site.index') }}">Fornecedor</a></li>
            <li><a href="{{ route('orders.index') }}">Pedido</a></li>

            <li><a href="{{ route('clients.index') }}">Cliente</a></li>
            <li><a href="{{ route('products.index') }}">Produto</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>
</div>