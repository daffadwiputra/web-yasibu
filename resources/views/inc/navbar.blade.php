<nav class="navbar navbar-expand-md navbar-laravel">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Yasibu</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/products">Produk Kami<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                <form class="form-inline">
                    <a href="/donations/create" class="btn btn-outline-success btn-lg">Donasi Sekarang</a>
                </form>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/products/create">{{ __('Tambah Produk') }}</a>
                    <a class="dropdown-item" href="/donations">{{ __('Lihat Donasi') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
                </li>      
            @endguest
            </ul>
        </div>
    </div>
</nav>