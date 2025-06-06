
@extends('layouts.layout')

@section('title', "| Kontakt")

@section('content')


<main>
    <section class="hero-section sub" >
        <div class="hero-inner-text">
            <h1 class="main-title">Kontakt</h1>
            <h3 class="main-subtitle">Kontakt informacije</h3>
            
            
        </div>     

        
        
    </section>
    
    <section class="content-section medium" style="">
        <div class="contact-container">
            <div class="contact-box">
                <div class="title-wrapper">
                    <h1 class="main-title" style="font-size: 3.5rem;">Javite se</h1>
                    <h3 class="main-subtitle">Odgovor u najkraćem mogućem roku</h3>
                    <hr>
                    <div class="icons-wrapper">
                        
                        <a href="/facebook.com"><i class="fa-brands fa-square-facebook"></i></a>
                        <a href="mailto:office@znamo.net"><i class="fa-solid fa-envelope"></i></a>
                         <a href="tel:+381646511918"><i class="fa-solid fa-phone"></i></a> 
                        
                    </div>
                </div>
            </div>
            
            <div class="contact-form-wrapper">
                <form action="{{route('contact-submit')}}" class="form-wrapper" id='contact-form'>
                    <input type="text" placeholder="Ime" id='name'>
                    
                    <input type="tel" placeholder="Broj telefona"  id='phone'>
                    
                    <input type="email" placeholder="Email adresa" id='email'>
                    
                    <textarea name="message" id="message" placeholder="Vaša poruka"></textarea>
                    <span class="message"></span>
                    <button type="submit" class='btn btn-neutral' style="margin-top: 1rem">Pošalji upit</button>
                   
                </form>
            </div>
            
            
        </div>
        
        
    </section>
    
    <div class="bridge">
        <h1>Dodatne informacije</h1>
        <h3>Naredna sekcija pruža dodatne informacije o kompaniji.</h3>
        
    </div>

    <section class="content-section dark">
        <div class="contact-info-container">
            <div class="box">
                <h3>Kontakt detalji</h3>

                <div class="box-content">
                    <h4>Telefon</h4>
                    <strong>064/65-11-918</strong>
                    <strong>026/61-77-77,</strong>
                </div>
                <div class="box-content">
                    <h4>Email</h4>
                    <strong>office@znamo.net</strong>
                    
                </div>

                <div class="box-content">
                    <h4>Adresa</h4>
                    <strong>Smederevo 11300, Panonska 5</strong>
                    
                </div>

                <div class="box-content">
                    <h4>WEB</h4>
                    <strong>www.znamo.net</strong>
                    
                </div>
            </div>
            <div class="box">
                <h3>Identifikacija</h3>

                <div class="box-content">
                    <h4>Naziv firme</h4>
                    <strong>Agencija za projektovanje softverskih sistema ZNAMO</strong>
                    <strong>Miodrag Nikolić pr. Smederevo, Panonska 5</strong>
                </div>
                <div class="box-content">
                    <h4>Poslovni podaci</h4>
                    <strong>Šifra delatnosti: 6201</strong>
                    <strong>Matični broj: 61045783</strong>
                    <strong>PIB: 105438561</strong>
                    
                </div>

                <div class="box-content">
                    <h4>Tekuči račun</h4>
                    <strong>200-2755710101829-95</strong>
                    <strong>Banka POŠTANSKA ŠTEDIONICA </strong>
                    
                </div>
            </div>
            
        </div>
    </section>
    
</main>


@endsection
