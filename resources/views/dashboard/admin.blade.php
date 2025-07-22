<h1>Admin panel</h1>

<div class="container stats">
    <div class="box">
        <i class="fa-solid fa-users"></i>
        <h3>Broj korisnika</h3>
        <span class="users-count"></span>
    </div>
    <div class="box">
        <i class="fa-solid fa-diagram-project"></i>
        <h3>Broj projekata</h3>
        <span class="projects-count">0</span>
    </div>
    <div class="box">
        <i class="fa-solid fa-signal"></i>
        <h3>Aktivni korisnici</h3>
        <span>1</span>
    </div>
</div>

<div class="container">
    <div class="table">
        <section class="table-head">
            <div class="wrapper-title">
                <h2>Korisnici</h2>
            </div>
            <div class="table-actions">
                
                <div class="controls-container">
                    
                    <select name="status" id="status-filter" class="filter-select">
                        <option value="all">Podrazumevano</option>
                        <option value="projects">Projekti</option>
                        <option value="role">Uloga</option>
                        
                    </select>
                    
                    
                    
                    
                </div>
            </div>
        </section>
        <section class="table-body">
            <table>
                <thead>
                    <tr>
                        <th >Ime</th>
                        <th>Korisničko ime</th>
                        <th>Email</th>
                        <th>Projekti</th>   
                        <th>Uloga</th>   
                        <th>Izmeni</th>
                        <th>Obriši</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td data-label="Ime">{{Auth::User()->name}}</td>
                        <td data-label="Korisničko ime">{{Auth::User()->username}}</td>
                        <td data-label="Email">{{Auth::User()->email}}</td>
                        <td data-label="Broj projekata">0</td>
                        <td data-label="Uloga">Admin</td>
                        <td data-label="Izmeni"><i class="fa-solid fa-user-pen"></i></td>
                        <td data-label="Obriši"><i class="fa-solid fa-user-slash"></i></td>
                    </tr> --}}
                    {{-- <tr>
                        <td data-label="Ime">Miodrag</td>
                        <td data-label="Korisničko ime">mija.n68</td>
                        <td data-label="Email">mija.n@mts.rs</td>
                        <td data-label="Broj projekata">18</td>
                        <td data-label="Uloga">Admin</td>
                        <td data-label="Izmeni"><i class="fa-solid fa-user-pen"></i></td>
                        <td data-label="Obriši"><i class="fa-solid fa-user-slash"></i></td>
                    </tr>
                    <tr>
                        <td data-label="Ime">Andrija</td>
                        <td data-label="Korisničko ime">aki_03</td>
                        <td data-label="Email">aki.pantovic03@gmail.com</td>
                        <td data-label="Broj projekata">11</td>
                        <td data-label="Uloga">Korisnik</td>
                        <td data-label="Izmeni"><i class="fa-solid fa-user-pen"></i></td>
                        <td data-label="Obriši"><i class="fa-solid fa-user-slash"></i></td>
                    </tr>
                    <tr>
                        <td data-label="Ime">Tamara</td>
                        <td data-label="Korisničko ime">Taca05</td>
                        <td data-label="Email">tamarajocic391@gmail.com</td>
                        <td data-label="Broj projekata">8</td>
                        <td data-label="Uloga">Korisnik</td>
                        <td data-label="Izmeni"><i class="fa-solid fa-user-pen"></i></td>
                        <td data-label="Obriši"><i class="fa-solid fa-user-slash"></i></td>
                    </tr>
                    <tr>
                        <td data-label="Ime">Jovana</td>
                        <td data-label="Korisničko ime">Vana03</td>
                        <td data-label="Email">jovana.sijakovic03@gmail.com</td>
                        <td data-label="Broj projekata">6</td>
                        <td data-label="Uloga">Korisnik</td>
                        <td data-label="Izmeni"><i class="fa-solid fa-user-pen"></i></td>
                        <td data-label="Obriši"><i class="fa-solid fa-user-slash"></i></td>
                    </tr> --}}
                </tbody>
            </table>
        </section>
        <section class="table-footer">
            <div class="pagination-wrapper">
                <button class="btn page-btn previous"><</button>
                <button class="btn page-btn" data-page='1'>1</button>
                <button class="btn page-btn" data-page='2'>2</button>
                <button class="btn page-btn" data-page='3'>3</button>
                <button class="btn page-btn next" >></button>
            </div>
        </section>
    </div>
</div>