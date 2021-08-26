<div class="wrapper">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Image Api</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item text-white">
                        <a class="nav-link active text-white" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('image.create') }}">Upload Image</a>
                    </li>
                    @auth
                        <li class="nav-item d-md-none">
                            <a class="nav-link text-white" onclick="document.getElementById('logout').submit()">logout</a>
                        </li>
                        <form action="{{ route('logout') }}" method="post" id="logout">
                            @csrf
                        </form>
                    @endauth
                    @guest
                        <li class="nav-item ">
                            <a class="nav-link text-white" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">login</a>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>
    <!---end nav-->
    <div class="text-center pt-3">
        <h1 class="text-secondary">Image</h1>
        <strong class="text-secondary">Find Your favourite image</strong>
    </div>
</div>
