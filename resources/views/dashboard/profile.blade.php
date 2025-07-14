


<div class="container">
    <form action="" class="form-wrapper" autocomplete="off">
        @csrf
        <div id="contact-details-form">
            <div class="wrapper-title">
                <h2>Kontakt detalji</h2>
            </div>
            <div class="form-inputs">
                <div class="form-control">
                    <div class="input">
                        <input type="text" id="firstName" placeholder="Ime" name="firstName" >
                    </div>
                    
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="lastName" placeholder="Prezime" name="lastName">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="email" id="email" placeholder="Email adresa" name="email">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="tel" id="phoneNumber" placeholder="Broj telefona" name="phoneNumber">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="username" placeholder="Korisničko ime" name="username" autocomplete="off">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="role" placeholder="Uloga" name="role" disabled >
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
                        
                        <input type="password" id="password" placeholder="Nova lozinka" name="Password" autocomplete="new-password">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="password" id="confirmPassword" placeholder="Potvrdite lozinku" name="confirmPassword">
                    </div>
                </div>
                
                
                
            </div>

            <div class="button-wrapper">
                <div class="btn btn-negative" id="deleteProfile" type="submit">Obriši profil</div>
                <div class="btn btn-positive submit" id="saveChanges" type="submit">Sačuvaj izmene</div>
            </div>
        </div>
        
        
    </form>
</div>