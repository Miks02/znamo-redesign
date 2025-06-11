


<div class="container">
    <form action="" class="form-wrapper" id="login-form">
        @csrf
        <div id="contact-details-form">
            <div class="wrapper-title">
                <h2>Kontakt detalji</h2>
            </div>
            <div class="form-inputs">
                <div class="form-control">
                    <div class="input">
                        <input type="text" id="firstName" placeholder="Ime" name="firstName" value="{{Auth::user()->name}}">
                    </div>
                    
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="lastName" placeholder="Prezime" name="lastName" value="Nikolić">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="email" id="email" placeholder="Email adresa" name="email" value="{{Auth::user()->email}}" autocomplete="nope">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="tel" id="phoneNumber" placeholder="Broj telefona" name="phoneNumber" value="{{Auth::User()->phone_number}}">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="username" placeholder="Korisničko ime" name="username" value="{{Auth::User()->username}}">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="role" placeholder="Uloga" name="role" disabled value="@if(Auth::User()->is_admin) Admin @else Korisnik @endif ">
                    </div>
                </div>
            </div>
            
            
            
            
        </div>
        
        <div class="edit-password-form">
            <div class="wrapper-title">
                <h2>Izmena lozinke</h2>
            </div>
            <div class="form-inputs">
                <div class="form-control">
                    <div class="input">
                        
                        <input type="password" id="oldPassword" placeholder="Stara lozinka" name="oldPassword" autocomplete="new-password">
                    </div>
                    
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="password" id="newPassword" placeholder="Nova lozinka" name="newPassword" autocomplete="off">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="password" id="confirmPassword" placeholder="Potvrdite lozinku" name="confirmPassword" autocomplete="off">
                    </div>
                </div>
                
                
                
            </div>

            <div class="button-wrapper">
                <div class="btn btn-negative">Obriši profil</div>
                <div class="btn btn-positive">Sačuvaj izmene</div>
            </div>
        </div>
        
        
    </form>
</div>