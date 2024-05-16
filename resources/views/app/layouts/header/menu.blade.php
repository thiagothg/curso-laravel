<div class="topo">
    <div class="logo">
        <img src="{{asset('img/logo.png')}}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('site.index') }}">Fornecedor</a></li>
            <li><a href="{{ route('site.about') }}">Cliente</a></li>
            <li><a href="{{ route('site.contact') }}">Produto</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>
</div>