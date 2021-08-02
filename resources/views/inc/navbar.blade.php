<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        @if(Auth::check())
        <a class="navbar-brand" href="{{ url('/posts') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        @endif
        @guest
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        @endguest

        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    @guest
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                    @endguest
                    @if(Auth::check())
                    <a class="nav-link" aria-current="page" href="/posts">Home</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role == "admin")
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>
                            <a class="dropdown-item " href="/register">Register</a>
                           @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
