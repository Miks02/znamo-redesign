<div class="container">
    <form action="" class="form-wrapper" id="login-form">
        @csrf
        <div id="add-project-form">
            <div class="wrapper-title">
                <h2>Registracija korisnika</h2>
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
                        
                        <input type="email" id="email" placeholder="Email adresa" name="email" autocomplete="nope">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="username" placeholder="Korisničko ime" name="username">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="password" placeholder="Lozinka" name="password">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="tel" id="phoneNumber" placeholder="Broj telefona" name="phoneNumber" >
                    </div>
                </div>
                
                
            </div>
            <div class="select-wrapper">
                
                {{-- <input type="checkbox" id="role" placeholder="Uloga" name="role">
                <label for="role">Admin</label> --}}
                <select name="role" id="role">
                    <option value="Admin">Admin</option>
                    <option value="User">Korisnik</option>
                </select>
            </div>
            
            
            
            
        </div>
        
        <div class="button-wrapper">
            <div class="btn btn-negative">Odustani</div>
            <div class="btn btn-positive">Dodaj korisnika</div>
        </div>
    </div>
    
    
</form>
</div>