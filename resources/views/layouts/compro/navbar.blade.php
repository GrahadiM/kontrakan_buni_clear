
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="{{ route('index') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                {{-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg> --}}
                <img src="{{ asset('/images/website')."/".\Setting::getSetting()->logo }}" alt="LOGO" class="bi me-2" width="40" height="32" role="img">
                <h4>{{ \Setting::getSetting()->app_name }}</h4>
            </a>
        
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('index') }}" class="nav-link px-2 {{ Request::is('/') ? 'link-secondary' : 'link-dark' }}">Home</a></li>
                <li><a href="{{ route('list') }}" class="nav-link px-2 {{ Request::is('list') ? 'link-secondary' : 'link-dark' }}">List Kamar</a></li>
                <li><a href="{{ route('contact-us') }}" class="nav-link px-2 {{ Request::is('contact-us') ? 'link-secondary' : 'link-dark' }}">Kontak Kami</a></li>
            </ul>
        
            <div class="col-md-3 text-end">
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->role == "admin")
                            <a href="{{ url('/home') }}" class="btn btn-outline-primary">Home</a>
                        @elseif (auth()->user()->role == "penyewa")
                            <a href="{{ url('/home') }}" class="btn btn-outline-primary">Home</a>
                        @else
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-outline-danger">Logout</button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 btn btn-primary">Register</a>
                        @endif
                    @endauth
                @endif
                {{-- <button type="button" class="btn btn-outline-primary me-2">Login</button> --}}
                {{-- <button type="button" class="btn btn-primary">Sign-up</button> --}}
            </div>
        </header>