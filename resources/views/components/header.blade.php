<header class="h-15v bg-header lg:flex flex-wrap items-center justify-around mx-auto p-4">
    <img src="{{asset('images/Laravel.svg')}}" alt="logo_laravel">
    <h1 class="text-white text-5xl">Laravel Website</h1>
    @guest
    <div>
        <a href="login" class="btn btn-info">Login</a>
        <a href="register" class="btn btn-info">Sign In</a>
    </div>
    @endguest
    @auth
        <div>
            <h2 style="display:inline; padding-right: 5px">Hola amigo {{auth()->user()->name}}</h2>
            <form action="logout" method="POST" style="display:inline">
                @csrf
                <button class="btn btn-info">Logout</button>
            </form>
        </div>
    @endauth
</header>
