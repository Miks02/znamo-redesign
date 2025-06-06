@extends('layouts.layout')

@section('content')


   
    
    <main>
        <section class="hero-section main">
            <div class="hero-inner-text">
                <h1 class="main-title">ZNAMO</h1>
                <h3 class="main-subtitle">Ili znamo ko zna</h3>
                <p> 
                    <strong>Izrađujemo i održavamo web sajtove, aplikacije i pružamo IT obuke. </strong>
                    <br>
                    Pravimo moderna i funkcionalna softverska rešenja po meri. 
                    Od ideje do realizacije – sve na jednom mestu.
                </p>
                <a class="btn" href="{{route('contact')}}">Kontaktirajte nas</a>
                
                <div id="hero-stats-container">
                    <div class="stat-item">
                        <h3 class="count">25+</h3>
                        <span class="title">Godina iskustva</span>                    
                    </div>
                    <div class="stat-item">
                        <h3 class="count">100+</h3>
                        <span class="title">Završenih projekata</span>  
                    </div>
                    <div class="stat-item">
                        <h3 class="count">200+</h3>
                        <span class="title">Srećnih klijenata</span>  
                    </div>
                </div>
                
            </div>
            
            
            <div class="hero-image">
                <div class="image-title">
                    <h1>Admin from anywhere</h1>
                    <h3>Nice, France, 2012. (urgent STS news)</h3>
                </div>
            </div>
            
        </section>
        
        <section class="content-section light">
            
            
            <div class="service-box-container">
                <div class="service-box">
                    <h2>WEB Dizajn</h2>
                    <h3>Treba vam sajt?<br>Mi pravimo i održavamo WEB sajtove</h3>
                    <ul>
                        <li>Izrada novih sajtova od početka (HTML,CSS,PHP,JavaScript)</li>
                        <li>Postavljanje sajtova uz neki od CMS rešenja (WordPress,Joomla...)</li>
                        <li>Redizajn i optimizacija postojećih WEB sajtova, SEO.</li>
                        <li>Izrada namenskih WEB aplikacija.</li>
                        <li>Posredovanje kod provajdera oko registracije domena i hostinga.</li>
                    </ul>
                    <span>Pogledajte WEB portfolio na strani <a href="{{route('projects')}}">PROJEKTI</a></span>
                </div>
                <div class="service-box">
                    <h2>Izrada aplikacija</h2>
                    <h3>Treba vam aplikacija a niste našli ni jednu koja ispunjava sve vaše zahteve?<br>Mi pravimo aplikacije po meri korisnika</h3>
                    <ul>
                        <li>Windows i android aplikjacije</li>
                        <li>Definisanje grupa korisnika i njihovih prava,</li>
                        <li>Izrada i štampanje dokumentacije (pdf),</li>
                        <li>Jednostavan i intuitivan interfejs, laka podešavanja,</li>
                        
                    </ul>
                    <span>Pogledajte portfolio na strani <a href="{{route('apps')}}">PROJEKTI/Aplikacije</a></span>
                </div>
                <div class="service-box">
                    <h2>Obuka za rad na računaru</h2>
                    <h3>Treba vam Word ili Excel za posao, a nema ko da vam pokaže? Uz naše iskustvo u individualnoj i grupnoj obuci, lako savladate osnovni ili napredni nivo.</h3>
                    <ul>
                        <li>Kurs za Windows početnike: savladajte osnovne veštine i oterajte strah od kompjutera,</li>
                        <li>Microdoft WORD: izrada dopisa, stručnih radova, pozivnica,</li>
                        <li>Microsoft EXCEL: tabelarna izračunavanja za svaki zadatak,</li>
                        <li>Microsoft PowerPoint: pravite prezentacije kao profesionalac,</li>
                        <li>Autodesk AUTOCad: inženjersko tehničko crtanje, 2D i 3D,</li>
                    </ul>
                    
                </div>
                <div class="service-box">
                    <h2>Škola programiranja</h2>
                    <h3>Online kursevi vam ne odgovaraju a trebam vam programiranje za školu. Pronašli ste idealno rešenje.</h3>
                    <ul>
                        <li>C, C++, C#,</li>
                        <li>Pascal, Delphi,</li>
                        <li>Redizajn i optimizacija postojećih WEB sajtova, SEO.</li>
                        <li>Java,.</li>
                        <li>Python</li>
                    </ul>
                    
                </div>
            </div>
            
            
        </section>
        
        <section id="call-to-action">
            <h1>Kako do saradnje ?</h1>
            <h3>Javite se, probaćemo zajedno da nađemo optimalno rešenje za vas. Ako ne, popićemo kafu.</h3>
            <a href="{{route('contact')}}" class="btn">Zakažimo sastanak</a>
        </section>
        
        <section class="content-section dark">
            
            <section class="about-section" id="about">
                
                <div class="title-wrapper">
                    <h1 class="main-title">Znamo</h1>
                    <h3 class="main-subtitle">Since 2008</h3>
                    <p>
                        Nakon nekoliko godina rada po Ugovorima o delu, 
                        autorskim ugovorima i raznim vrstama solarnog plaćanja (pare na sunce), od 1. marta 2008. godine aktivna je Agencija za projektovanje softverskih sistema "ZNAMO", i nakon više od deset godina rada, drago mi je da u reklami mogu da stavim i ovo "SINCE". 
                        Zasad nigde nema reklame (ako izuzmeo ovaj sajt), samo preporuke.
                    </p>
                </div>
                
                
                <div class="about-content">
                    
                    
                    
                    <div class="about-inner-text">
                        <p>
                            Ideja je bila da naziv bude "ZNAM", ali su domeni ZNAM.com, 
                            ZNAM.net, ZNAM.rs i tome slični bili zauzeti, pa je izabrano ovo "ZNAMO", i uz nadu da će se ekipa uvećati. Jer, kako je govorio moj pokojni brat Branislav Bane Nikolić, "Niko se od svog rada nije obogatio", a
                            ni ja ne bih bio gadljiv na ideju da se obogatim, materijalno obezbedim...
                        </p>
                        
                        <p>
                            Kako se ovde piše ono "Vizija i misija", 
                            iskoristiću priliku da kao viziju pomenem mudrost drage prijateljice, nekada klijenta iz škole računara Taleb, gospođe Vere, "Ne planiram da napravim firmu kao što je Coca Cola, 
                            ali bi bilo dobro da napravim firmu koju mogu da ostavim deci".
                        </p>
                        
                        <p>
                            Bilo je i velikih i malih poslova, bilo je manjih i većih izazova, i većina je uspešno savladana. Na žalost, neke od firmi s
                            a kojima sam sarađivao više nisu aktivne, pa ni sajtovi koji su za njih napravljeni.
                        </p>
                    </div>
                    
                    <div class="about-image">
                        <div class="profile-image-wrapper">
                            <img src="{{asset('img/mija_kafa_roma.jpg')}}" alt="">
                            
                        </div>
                    </div>
                    
                    
                </div>
                
                
                
                
                
            </section>
            
        </section>
        
    </main>
    
    




@endsection
