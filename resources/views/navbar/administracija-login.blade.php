
@extends('layouts.layout')

@section('title', '| Admimnistracija')

@section('content')


<main>
    
    <section class="hero-section sub" >
        <div class="hero-inner-text">
            <h1 class="main-title" >Administracija</h1>
            <h3 class="main-subtitle">Trenutno, samo za zaposlene</h3>
            
        </div>
    </section>
    
    <section class="content-section medium">
        <div class="login-form">
            <form action="" class="form-wrapper" id="login-form">
                @csrf
                <div class="wrapper-title">
                    <h2>Login forma</h2>
                </div>
                
                <div class="form-inputs">
                    <div class="form-control">
                        <input name="email" id="username" type="text" placeholder="Email adresa" autocomplete="off">
                        <div class="icon">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                    
                    <div class="form-control">
                        <input name="password" id="password" type="password" placeholder="Lozinka" autocomplete="off">
                        <div class="icon">
                            <i class="fa-solid fa-lock"></i>  
                        </div>
                    </div>
                    <div class="form-control">
                        <div id="login-checkbox">
                            <input id="rememberMe" style="width: auto" type="checkbox" name="remember">
                            <label for="rememberMe">Zapamti me</label>
                        </div>
                    </div>
                    <div class="form-control">
                        <button class="btn btn-vibrant" type='submit'>Prijavi se</button>
                        
                    </div>
                    <div class="form-control" style='margin-top: 1.1rem;'>
                        <span class="message"></span>
                    </div>
                </div>
                
            </form>
        </div>
    </section>
    
</main>



@endsection