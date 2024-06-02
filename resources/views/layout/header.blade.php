<nav class="navbar navbar-expand-md bg-body py-3">
    <div class="container">
        <div class="collapse navbar-collapse flex-grow-0 order-md-first" id="navcol-4">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link active" href="/"><strong><em>PETOTEL</em></strong></a></li>
                <li class="nav-item"></li>
            </ul>
        </div>
        <button data-bs-target="#navcol-4" data-bs-toggle="collapse" class="navbar-toggler"><span
                class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="d-none d-md-block container" style="text-decoration: none; margin-left: 25px">
            <a href="/"><button class="btn btn-light me-2" type="button">Home</button></a>
            <a href="/services"><button class="btn btn-light me-2" type="button">Services</button></a>
            <a href="/provider"><button class="btn btn-light me-2" type="button">Provider</button></a>
            <a href="/contact"><button class="btn btn-light me-2" type="button">Contact</button></a>
            <a href="/requests"><button class="btn btn-light me-2" type="button">Requests</button></a>
        </div>
        @if(isset($_COOKIE['username']))
            <div class="dropdown">
                <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                        style="color: rgb(11, 11, 11);">{{ $_COOKIE['username'] }}</span><span
                        style="color: rgb(255, 255, 255);"> </span></a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="/requests">My Requests</a>
                    <a class="dropdown-item" href="/logout">Logout</a>
                </div>
            </div>
        @else
            <div class="dropdown">
                <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span
                        style="color: rgb(11, 11, 11);">Not logged in</span><span style="color: rgb(255, 255, 255);"> </span></a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="/login">Login</a>
                    <a class="dropdown-item" href="/signup">Sign up</a>
                </div>
            </div>
        @endif
    </div>
</nav><!-- End: Navbar Centered Brand -->
