@extends('layouts.layout')
@section('title', '| Projekti')
@section(('content'))

<main>
    <section class="hero-section sub">
        <div class="hero-inner-text">
            <h1 class="main-title">Projekti</h1>
            <h3 class="main-subtitle">Prikaz svih dosadašnjih projekata <br>Aktivnih ili ugašenih</h3>  
        </div>
        
        
    </section>
    
    <section class="projects-section" >
        <div class="controls-container">
            <select name="status" id="status-filter" class="filter-select">
                <option value="all">Podrazumevano</option>
                <option value="active">Aktuelni</option>
                <option value="finished">Završeni</option>
                <option value="newest">Najnoviji</option>
                <option value="oldest">Najstariji</option>
            </select>
            
            
            <div class="filter-radio-wrapper">
                <input type="radio" id='all' value="all" checked name="radio">
                <label for="all" class='custom-radio'>Svi projekti</label>
                
                <input type="radio" id='active' value="active" name="radio">
                <label for="active" class='custom-radio'>Aktuelni</label>
                
                <input type="radio" id='finished' value="finished" name="radio">
                <label for="finished" class='custom-radio'>Završeni</label>
            </div>
            
            
        </div>
        
        <div class="projects-container">
            
            {{-- page-1 --}}
            
            <div  class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/image.png')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>Stanko LLC
                        New Chicago PVC and ALU windows dealer
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2024</li>
                            <li>Aktivan</li>
                            <li>Da</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                </div>
            </div>
            
            <div class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/page.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>RGS Innovations
                        Urban Air Mobility Solutions Developer
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2022</li>
                            <li>Aktivan</li>
                            <li>Da</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            
            <div href="" class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/page-1.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>HI-MOM projekat
                        Program IDEJE, Fond za nauku
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2022</li>
                            <li>Završen</li>
                            <li>Ne</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            
            <div class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/ceramic.png')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>Serbian ceramic society
                        Srpsko keramičko društvo
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Redizajn:</li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2014</li>
                            <li>2022</li>
                            <li>Aktivan</li>
                            <li>Da</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            
            
            
            <div  class="project-card">
                <a href="">
                    <div class="project-image">
                        <img  src="{{asset('img/vitisense.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>VitiSense A novel digital vineyard service
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2022</li>
                            <li>Aktivan</li>
                            <li>Ne</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            
            <div class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/sindikat.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>
                        Sindikat Telekoma "Srbija"
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Redizajn: </li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2003</li>
                            <li>2021</li>
                            <li>Aktivan</li>
                            <li>Da</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                </div>
            </div>
            
            {{-- page-2 --}}
            
            
            <div href="" class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/slobodni.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>Konfederacija slobodnih sindikata
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Redizajn: </li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2007</li>
                            <li>Ne</li>
                            <li>Aktivan</li>
                            <li>Da</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            
            <div class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/telekom.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>Sindikat Telekoma "Srbija", SO Smederevo
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Redizajn: </li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2002</li>
                            <li>2022</li>
                            <li>Aktivan</li>
                            <li>Da</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                    
                </div>
            </div>
            
            <div class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/drone.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>urbanDRONEscheduler platform for drone operation in an urban area
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Redizajn: </li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2021</li>
                            <li>Ne</li>
                            <li>Završen</li>
                            <li>Ne</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            
            <div class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/apoteka.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>
                        Apoteka velika plana
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Redizajn: </li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2012</li>
                            <li>Ne</li>
                            <li>Aktivan</li>
                            <li>Da</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            
            <div  class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/udruzenje vlasnika.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>
                        Udruženje vlasnika akcija Telekoma
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Redizajn: </li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2011</li>
                            <li>Ne</li>
                            <li>Aktivan</li>
                            <li>Da</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            
            <div href="" class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/nano.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>
                        nano DNA sequencing project
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Redizajn: </li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2009</li>
                            <li>Ne</li>
                            <li>Završen</li>
                            <li>Ne</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            <div href="" class="project-card">
                <a href="">
                    <div class="project-image">
                        <img src="{{asset('img/nano.jpg')}}" alt="Naziv projekta">
                    </div>
                </a>
                
                <div class="project-info">
                    <h3>
                        nano DNA sequencing project
                    </h3>
                    <div class="project-meta">
                        <ul>
                            <li>Godina:</li>
                            <li>Redizajn: </li>
                            <li>Status:</li>
                            <li>Ažuriranje:</li>
                        </ul>
                        
                        <ul>
                            <li>2009</li>
                            <li>Ne</li>
                            <li>Završen</li>
                            <li>Ne</li>
                        </ul>
                    </div>
                    @auth
                    <div class="project-options">
                        <i class="fa-solid fa-trash"></i>
                        <i class="fa-solid fa-pen"></i>
                    </div>
                    @endauth
                    
                </div>
            </div>
            
            
        </div>
        
        <div class="pagination-wrapper">
            <button class="btn page-btn previous"><</button>
            <button class="btn page-btn" data-page='1'>1</button>
            <button class="btn page-btn" data-page='2'>2</button>
            <button class="btn page-btn" data-page='3'>3</button>
            <button class="btn page-btn next" >></button>
        </div>
        
    </section>
    
    <div class="bridge" id="apps">
        <h1>Aplikacije</h1>
        <h3>Prikaz završenih aplikacija </h3>
    </div>
    
    <div class="content-section dark">
        <div class="projects-list">
            <ul class="accordion">
                <li>
                    <input type="radio" id="first" name="accordion" checked>
                    <label for="first">Programski paket PagerAlarm5</label>
                    <div class="content">
                        <p>
                            Praćenje alarma na javnim centralama GTD-5C preko Paging sistema, 
                            rad publikovan na TELFOR 1997, korišćen u GN Smederevo od 1997 do 
                            kraja rada Paging sistema 
                        </p>
                    </div>
                </li>
            </ul>
            <ul class="accordion">
                <li>
                    <input type="radio" id="second" name="accordion">
                    <label for="second">
                        Program for electron density determination from 
                        the experimental hydrogen Hβ line profile
                    </label>
                    <div class="content">
                        <p>
                            Dec 1999 - Jul 2000; The program H-beta is an object oriented application for Win 95 and Win NT system platform. It consists of an user-friendly graphic interface and the fit routines collected in FORTRAN dynamic link libraries. 
                            Ja sam uradio gore pomenuti "user-friendly graphic interface".
                        </p>
                    </div>
                </li>
            </ul>
            <ul class="accordion">
                <li>
                    <input type="radio" id="third" name="accordion">
                    <label for="third">Program LabDIARY</label>
                    <div class="content">
                        <p>
                            Evidencija i praćenje izdavanja galenskih i 
                            magistralnih preparata u laboratoriji, 
                            korišćen u Apoteci Smederevo 
                        </p>
                    </div>
                </li>
            </ul>
            <ul class="accordion">
                <li>
                    <input type="radio" id="fourth" name="accordion">
                    <label for="fourth">Programski paket MTU server</label>
                    <div class="content">
                        <p>
                            Softverska emulacija billing magnetnih jedninica na 
                            javnim centralama GTD-5C, za EI TEST iz Niša, zajednički rad sa Jakovljević Zoranom, u delu obrada sirovih billing podataka i prezentacija podataka kroz WEB interfejs, od 2002 korišćen u 5 centrala tog tipa u Telekomu Srbija do kraja rada tih centrala
                            (jedna je još u upotrebi, u Barajevu) 
                        </p>
                    </div>
                </li>
            </ul>
            <ul class="accordion">
                <li>
                    <input type="radio" id="fifth" name="accordion">
                    <label for="fifth">mVaga</label>
                    <div class="content">
                        <p>
                            Program za magacinsko poslovanje i kolsku vagu, i
                            zdavanje potrebne dokumentacije, 
                            Borealis L.A.T., pogon Smederevo 
                        </p>
                    </div>
                </li>
            </ul>
            <ul class="accordion">
                <li>
                    <input type="radio" id="sixth" name="accordion">
                    <label for="sixth">ProjFin</label>
                    <div class="content">
                        <p>
                            Intranet paket za praćenje sredstava projekata korišćen 
                            nekoliko godina u Institutu za fiziku Beograd 
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="bridge">
        <h1>Neaktivni | Preuzeti</h1>
        <h3>Spisak ugašenih i preuzetih sajtova</h3>
        
    </div>
    
    <div class="content-section medium">
        <div class="projects-list" style="width: 100%">
            
            <div class="projects-wrapper" style="display: flex; width: 100%; justify-content: space-evenly;flex-wrap: wrap">
                <ul class="accordion">
                <li>
                    <input type="checkbox" id="projects-checkbox" name="accordion">
                    <label for="projects-checkbox">Sada neaktivni sajtovi, ugašene , preregistrovane firme...</label>
                    <div class="content" id="projects-content">
                        <p>
                            
                        </p>

                        <ul>
                            <li>
                                <h4>IRACS</h4>
                                <span>Institute for Research and Advancement in Complex Systems</span>
                            </li>
                            <li>
                                <h4>TRIJUMF</h4>
                                <span>Prodaja lekovitih preparata i suplemenata</span>
                            </li>
                            <li>
                                <h4>KIR STEFAN SRBIN</h4>
                                <span>Gradski ženski hor Smederevo</span>
                            </li>
                            <li>
                                <h4>AS BODY</h4>
                                <span>Program boja za automobile</span>
                            </li>
                            <li>
                                <h4>CORIDOR</h4>
                                <span>Nameštaj iz uvoza</span>
                            </li>
                            <li>
                                <h4>DUNVASKI OGLASI</h4>
                                <span>Regionalni oglasnik</span>
                            </li>
                            <li>
                                <h4>LUGAVČINA</h4>
                                <span>Mesna zajednica Lugavčina</span>
                            </li>
                            <li>
                                <h4>MIGOMI</h4>
                                <span>Prodaja Disney programa</span>
                            </li>
                            <li>
                                <h4>MY OPEL CORSA PROBLEMS</h4>
                                <span>Privatni sajt nezadovoljnog korisnika </span>
                            </li>
                            <li>
                                <h4>PEST</h4>
                                <span>Kovano gvožđe Smederevo</span>
                            </li>
                            <li>
                                <h4>SHG TESTER</h4>
                                <span>Privatni sajt pronalazača</span>
                            </li>
                            <li>
                                <h4>ZOKII GRILL</h4>
                                <span>Ugostitelj, Beograd </span>
                            </li>
                            <li>
                                <h4>STIG INŽENJERING</h4>
                                <span>Građevinsko preduzeće, Požarevac </span>
                            </li>
                            <li>
                                <h4></h4>
                                <span></span>
                            </li>
                            <li>
                                <h4>TALEB</h4>
                                <span>Škola računara i prodaja IT opreme Beograd </span>
                            </li>
                            <li>
                                <h4>UKS</h4>
                                <span>Udruženje kozmetičara Srbije </span>
                            </li>
                            <li>
                                <h4>UNIJA PEKARA SRBIJE</h4>
                                <span>Sajt udruženja</span>
                            </li>
                            <li>
                                <h4>OPŠTE UDRUŽENJE PREDUZETNIK BEOGRADA</h4>
                                <span>Udruženje preduzetnika Beograda</span>
                            </li>
                            <li>
                                <h4>CVEĆE SREĆE</h4>
                                <span>Feng shui - umetnost lepog življenja, Ljubica Buba Nikolić </span>
                            </li>
                            <li>
                                <h4>GOLDONI SMEDEREVO</h4>
                                <span>Prodaja poljoprivrednih mašina</span>
                            </li>
                            <li>
                                <h4>GLOBAL EXPRESS</h4>
                                <span>Door to door dostava </span>
                            </li>
                            <li>
                                <h4>ATOMIZERI SMEDEREVO</h4>
                                <span>Prodaja poljoprivrednih mašina </span>
                            </li>
                            <li>
                                <h4>H BETA</h4>
                                <span>Sajt projekta </span>
                            </li>
                            <li>
                                <h4>SFKM</h4>
                                <span>Simpozijum o fizici kondenzovanog stanja 2004 </span>    
                            </li>
                            <li>
                                <h4>OZIRIS</h4>
                                <span>Oziris electric klima sistemi</span>
                            </li>
                            <li>
                                <h4>AMERICOOL</h4>
                                <span>Americool klima uređaji za potrebe Oziris electric </span>
                            </li>
                            <li>
                                <h4>TELECOBRA</h4>
                                <span>Udruženje za zaštitu korisnika TK, IK i RTV usluga Beograd </span>
                            </li>
                            <li>
                                <h4>GIBAGROUP</h4>
                                <span>GIBA group, Brzi priručnik za lekovito bilje i drugo </span>
                            </li>
                            <li>
                                <h4>DRVENI KONJIĆ</h4>
                                <span>Mala radionica za izradu drvenih igračaka Smederevo </span>
                            </li>
                            <li>
                                <h4>OLIVERART</h4>
                                <span>Izrada umetničkih predmeta i nakita, Beograd </span>
                            </li>
                            <li>
                                <h4>GLIVA SA TIBETA</h4>
                                <span>Verina iskustva u lečenju, Beograd </span>
                            </li>
                            
                        </ul>

                    </div>
                </li>
            </ul>

            <ul class="accordion">
                <li>
                    <input type="checkbox" id="projects-checkbox-2" name="accordion">
                    <label for="projects-checkbox-2">Sajtovi sada redizajnirani, preuzeti od strane korisnika ili drugih webmastera</label>
                    <div class="content" id="projects-content">
                        <p>
                            
                        </p>

                        <ul>
                            <li>
                                <h4>TESLA RALLY</h4>
                                <span>Popularizacija zelenih tehnologija u automobilizmu </span>
                            </li>
                            <li>
                                <h4>OD SRCA</h4>
                                <span>Udruženje dobrovoljnih davalaca krvi Telekoma </span>
                            </li>
                            <li>
                                <h4>SAVEZ VASPITAČA SRBIJE</h4>
                                <span>Sajt saveza </span>
                            </li>
                            <li>
                                <h4>DRAGICA</h4>
                                <span>Kozmetički salon</span>
                            </li>
                            <li>
                                <h4>LUX RADIO</h4>
                                <span>Lux radio Smederevo </span>
                            </li>
                            <li>
                                <h4>APOTEKA SMEDEREVO</h4>
                                <span>Prva verzija sajta </span>
                            </li>
                            <li>
                                <h4>OŠ DR JOVAN CVIJIĆ SMEDEREVO</h4>
                                <span>Sajt škole, prva verzija sajta </span>
                            </li>
                            <li>
                                <h4>EKABO</h4>
                                <span> Prodaja polovnih automobila </span>
                            </li>
                            <li>
                                <h4>INJAC</h4>
                                <span>Publicista i pravnik Oliver Injac, prva verzija sajta </span>
                            </li>
                            <li>
                                <h4>IPB</h4>
                                <span>Institut za fiziku Beograd, neko vreme </span>
                            </li>
                           
                            
                        </ul>

                    </div>
                </li>
            </ul>
            </div>

             
            <ul class="accordion">
            </div>
            
        </div>
        
    </main>
    
    
    
    
    
    @endsection