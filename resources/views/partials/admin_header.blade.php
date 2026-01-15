<header class="header">
    <div class="flex">
        <a href="{{ route('admin.home') }}" class="logo">AdminPanel</a>
        <nav class="navbar">
            <a href="{{ route('admin.home') }}">home</a>
            <a href="{{ route('admin.products') }}">products</a>
            <a href="#">orders</a>
            <a href="#">users</a>
            <a href="#">messages</a>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="account-box">
            <p>username : <span>{{ auth()->user()->name }}</span></p>
            <p>email : <span>{{ auth()->user()->email }}</span></p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="delete-btn">logout</button>
            </form>
        </div>
    </div>
</header>