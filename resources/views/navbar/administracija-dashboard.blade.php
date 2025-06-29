@extends('layouts.dashboard-layout')

@section('content')

<main class="dashboard-layout">
    <aside class="sidebar">
        <div class="logo-wrapper">
            <a href="{{route('home')}}" class="logo">ZNAMO</a>
            
        </div>
        <div class="line">
            <hr>
        </div>
        <div class="user">
            <h2>{{Auth::User()->name}}</h2>
            
        </div>
        <nav class="sidebar-navigation">
            <ul>

                @if(Auth::user()->is_admin == true)
                
                <li><a class="comp-link" href="#" data-view="admin"><i class="fa-regular fa-address-card"></i>Admin panel</a></li>
                <li><a class="comp-link" href="#" data-view="add-user"><i class="fa-solid fa-user-plus"></i>Dodaj korisnika</a></li>
                
                @endif
                <li><a class="comp-link" href="#" data-view="add-project"><i class="fa-solid fa-plus"></i>Dodaj projekat</a></li>
                <li><a class="comp-link" href="#" data-view="projects-table"><i class="fa-solid fa-table-list"></i>Tabela projekata</a></li>
                
                <li><a class="comp-link" href="#" data-view="profile"><i class="fa-solid fa-id-badge"></i>Profil</a></li>
                <li><a href="{{route ('home')}}"><i class="fa-solid fa-door-open"></i>Izlaz</a></li>
                <li><a href="{{route ('logout')}}" class="logout"><i class="fa-solid fa-right-from-bracket"></i>Odjava</a></li>
            </ul>
        </nav>
    </aside>
    
    <div class="main-content">
        <div class="dashboard-header">
            <div class="heading">
                
            </div>
            <h2>{{Auth::User()->name}}</h2>
            
            <i class="fa-solid fa-bars" id="menu-open"></i>
            
        </div>
        
        <section class="component-wrapper">
            
        </section>
    </div>
</main>



@endsection