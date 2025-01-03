<header class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <a class="navbar-brand order-1 py-0" href="{{ url('/') }}">
                <img loading="prelaod" decoding="async" class="img-fluid" src="{{ asset('assets/images/ll.png') }}"
                    alt="AQT Network" width="200px">
            </a>
            <div class="navbar-actions order-3 ml-0 ml-md-4">
                <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button"
                    data-toggle="collapse" data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <form action="#!" class="search order-lg-3 order-md-2 order-3 ml-auto">
                <input id="search-query" name="s" type="search" placeholder="Search..." autocomplete="off">
            </form>
            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($categories as $category)
                                <a class="dropdown-item"
                                    href="{{ route('kategori', $category->tag) }}">{{ $category->tag }}</a>
                            @endforeach
                        </div>
                    </li>
                    @foreach ($menus as $menu)
                        @php
                            // Ambil submenu terkait untuk menu ini
                            $submenus = $submenu[$menu->menu];
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                {{ $menu->menu }} <!-- Menampilkan nama menu -->
                            </a>
                            <div class="dropdown-menu">
                                @foreach ($submenus as $sub)
                                    <a class="dropdown-item" href="{{ url('/'.$sub->menu."/".$sub->submenu) }}">
                                        {{ $sub->judulsub }} <!-- Menampilkan nama submenu -->
                                    </a>
                                @endforeach
                            </div>
                        </li>
                    @endforeach

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
