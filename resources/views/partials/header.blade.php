<header>
    
    <div class="icons">
        <a href="{{route('home')}}" class="logo mobile">ZNAMO</a>
        <i class="fa-solid fa-bars" id="menu-open"></i>
    </div>
    <nav class="navbar desktop">
        
        <ul >
            <li><a class='nav-link' href="{{route('home')}}">Početna</a></li>
            <li><a class='nav-link' href="{{route('about')}}">O nama</a></li>
            <li><a class='nav-link' href="{{route('projects')}}">Projekti</a></li>
            @auth
            <li><a class='nav-link' href="{{route('dashboard')}}">Administracija</a></li>
            
            @endauth
            @guest
            <li><a class='nav-link' href="{{route('login')}}">Administracija</a></li>
            @endguest
            <li><a class='nav-link' href="{{route ('contact')}}">Kontakt</a></li>
        </ul>
        
    </nav>
    @auth
    <div class="auth-links">
        <a class="logout" href="{{route('logout')}}">Odjavi se</a>    
    </div>
    @endauth
    
    <nav class="navbar mobile">
        
        <ul >
            
            <li><a class='nav-link' href="{{ route('home')}}">Početna</a></li>
            <li><a class='nav-link' href="{{route('about')}}">O nama</a></li>
            <li><a class='nav-link' href="{{route('projects')}}">Projekti</a></li>
            @auth
            <li><a class='nav-link' href="{{route('dashboard')}}">Administracija</a></li>
            
            @endauth
            @guest
            <li><a class='nav-link' href="{{route('login')}}">Administracija</a></li>
            @endguest
            <li><a class='nav-link' href="{{route('contact')}}">Kontakt</a></li>
            @auth
            <li><a class="logout" href="{{route('logout')}}">Odjavi se</a> </li>
            @endauth
            
        </ul>
        <div class="auth-links">
            
            
            
        </div>
        
    </nav>
    
    
</header>