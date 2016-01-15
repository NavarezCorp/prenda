<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <div>
                <a class="navbar-brand brand-image" href="{{ url('/') }}">
                    <span class="brand-name">Prenda.com</span>
                    <img src="/images/ring0.png" class="img-responsive" alt="Responsive image">
                </a>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="spark-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav text-uppercase small">
                @if (Auth::guest())
                    <li><a href="{{ url('/') }}">Home</a></li>
                @else
                    <li><a href="{{ url('/home') }}">Home</a></li>
                @endif
                <li><a href="{{ url('/') }}">Auction Schedule</a></li>
                <li><a href="{{ url('/pricing') }}">Pricing</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right text-uppercase small">
                <li><a href="{{ url('/') }}">About Us</a></li>
                <li><a href="{{ url('/') }}">Contact Us</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Manage <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/item') }}">Item</a></li>
                            <li><a href="{{ url('/city') }}">City</a></li>
                            <li><a href="{{ url('/province') }}">Province</a></li>
                            <li><a href="{{ url('/category') }}">Category</a></li>
                            <li><a href="{{ url('/type') }}">Type</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog"></span
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a>{{ Auth::user()->name }}</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="container prof-pic">
    <img class="img-responsive" src="images/images2.png">
</div>