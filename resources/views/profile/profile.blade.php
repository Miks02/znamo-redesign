
@extends('layouts.layout')

@section('content')

<main>
    <section class="hero-section sub" >
        <div class="hero-inner-text">
            <h1 class="main-title" >Nalog</h1>
            <h3 class="main-subtitle">Profilna stranica</h3>
            
        </div>
    </section>
    
    <section class="content-section medium">
        
        <div class="profile-info-container">
            <div class="profile-info">
                <div class="wrapper-title">
                    <h2>Informacije o nalogu</h2>
                </div>
                
                <div class="info">
                    <ul>
                        <li><strong>Ime: </strong> </li>
                        <li><strong>Korisničko ime:</strong> </li>
                        <li><strong>Email adresa:</strong></li>
                        <li><strong>Telefon:</strong></li>
                    </ul>

                    <ul>
                        <li>{{Auth::user()->name}}</li>
                        <li>{{Auth::user()->username}}</li>
                        <li>{{Auth::user()->email}}</li>
                        <li>{{Auth::user()->phone_number}}</li>
                    </ul>
                </div>
                
                
                <div class="buttons">
                    <button type="submit" id="delete-cancel" class="btn btn-negative">Obriši profil</button>
                    <button type="submit" id="edit-save" class="btn btn-positive">Uredi profil</button>
                    <a href="{{route('logout')}}" class="btn btn-neutral">Logout</a>
                </div>
                
            </div>
            
        </div>
    </section>
    
</main>

@endsection