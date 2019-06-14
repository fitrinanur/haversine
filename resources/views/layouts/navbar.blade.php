<nav class="navbar sticky-top navbar-dark navbar-expand-lg bg-dark justify-content-between">
    <a class="navbar-brand" href="{{ route('website.index')}}">Pemetaan Wisata</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('website.gallery')}}">Daftar Wisata <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('website.nearly-page')}}">Wisata Terdekat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('website.direction-page')}}">Rute Wisata</a>
            </li>
            <li class="nav-item">
                {{-- <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> --}}
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
        </ul>
    </div>
</nav>