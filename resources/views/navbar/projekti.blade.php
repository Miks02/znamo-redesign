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

        <section class="projects-section">

            <form method="GET" action="{{ route('projects') }}">
                <div class="controls-container">


                    <div class="filter-radio-wrapper">
                        <input type="radio" id="default" value="default" name="sort" {{ $sort == 'default' ? 'checked' : '' }}
                            onchange="this.form.submit()">
                        <label for="default" class="custom-radio">Podrazumevano</label>

                        <input type="radio" id="newest" value="newest" name="sort" {{ $sort == 'newest' ? 'checked' : '' }}
                            onchange="this.form.submit()">
                        <label for="newest" class="custom-radio">Noviji</label>

                        <input type="radio" id="oldest" value="oldest" name="sort" {{ $sort == 'oldest' ? 'checked' : '' }}
                            onchange="this.form.submit()">
                        <label for="oldest" class="custom-radio">Stariji</label>
                    </div>
                </div>

            </form>


            <div class="projects-container">
                @foreach ($projects as $project)
                    <div class="project-card">
                        <a href="{{ $project->project_link }}">
                            <div class="project-image">
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}">
                            </div>
                        </a>

                        <div class="project-info">
                            <h3>{{ $project->title }}<br></h3>
                            <div class="project-meta">
                                <ul>
                                    <li>Godina:</li>
                                    <li>Redizajn:</li>
                                    <li>Status:</li>
                                    <li>Ažuriranje:</li>
                                </ul>

                                <ul>
                                    <li>{{ $project->year_of_creation }}</li>
                                    <li>{{ $project->year_of_redesign ?? "Ne" }}</li>
                                    <li>{{ $project->status }}</li>
                                    <li>{{ $project->is_updating ? 'Da' : 'Ne' }}</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            

            @php
                $currentPage = $projects->currentPage();
                $lastPage = $projects->lastPage();
                $queryParams = request()->except('page'); 
            @endphp

            <div class="pagination-wrapper">
           
                @if ($currentPage <= 1)
                <a class="btn " style="pointer-events: none; opacity: 0.8"><</a>
                        
                 @endif
                @if ($currentPage > 1)
                    <a class="btn "
                        href="{{ request()->url() }}?{{ http_build_query(array_merge($queryParams, ['page' => $currentPage - 1])) }}">
                        < </a>
                @endif

                        @for ($i = 1; $i <= $lastPage; $i++)
                            <a class="btn  {{ $i == $currentPage ? 'active' : '' }}" data-page="{{ $i }}"
                                href="{{ request()->url() }}?{{ http_build_query(array_merge($queryParams, ['page' => $i])) }}">
                                {{ $i }}
                            </a>
                        @endfor
                       
                        @if ($currentPage < $lastPage)
                            <a class="btn "
                                href="{{ request()->url() }}?{{ http_build_query(array_merge($queryParams, ['page' => $currentPage + 1])) }}">
                                >
                            </a>
                        @endif
                        @if($currentPage >= $lastPage)
                        <a style="pointer-events: none; opacity: 0.8" class="btn ">></a>
                        @endif
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
                                Dec 1999 - Jul 2000; The program H-beta is an object oriented application for Win 95 and Win
                                NT system platform. It consists of an user-friendly graphic interface and the fit routines
                                collected in FORTRAN dynamic link libraries.
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
                                javnim centralama GTD-5C, za EI TEST iz Niša, zajednički rad sa Jakovljević Zoranom, u delu
                                obrada sirovih billing podataka i prezentacija podataka kroz WEB interfejs, od 2002 korišćen
                                u 5 centrala tog tipa u Telekomu Srbija do kraja rada tih centrala
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

                <div class="projects-wrapper"
                    style="display: flex; width: 100%; justify-content: space-evenly;flex-wrap: wrap">
                    <ul class="accordion">
                        <li>
                            <input type="checkbox" id="projects-checkbox" name="accordion">
                            <label for="projects-checkbox">Sada neaktivni sajtovi, ugašene , preregistrovane
                                firme...</label>
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
                            <label for="projects-checkbox-2">Sajtovi sada redizajnirani, preuzeti od strane korisnika ili
                                drugih webmastera</label>
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