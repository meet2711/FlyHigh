<header id="header">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-family: 'Abril Fatface';color: #1DB4FF;">FlyHigh</a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div style="display: flex;flex-direction: row;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="display: flex;flex-direction: row;">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color:#1DB4FF;">Flights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Packages</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="signup" style="background-color: #1DB4FF; color:white;border-radius: 5px; ">Sign up</a>
                    </li> -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="signup" style="background-color: #1DB4FF; color:white;border-radius: 5px; ">Sign up</a>
                    </li>
                    @if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == 'register')
                    <li class="nav-item">
                        <a class="nav-link" href="signup" style="background-color: #1DB4FF; color:white;border-radius: 5px; ">Sign up</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"><img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" style=" border-radius: 5px; width: 20px; height: auto; margin-right: 7px;"></a>

                        <!-- <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a> -->

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

</header>