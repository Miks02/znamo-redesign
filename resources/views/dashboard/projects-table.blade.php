

<div class="container">
    <div class="table">
        <section class="table-head">
            <div class="wrapper-title">
                <h2>Projekti</h2>
            </div>
            <div class="table-actions">
                
                <div class="controls-container">
                    
                    <select name="status" id="status-filter" class="filter-select">
                        <option value="all">Podrazumevano</option>
                        <option value="newest">Najnoviji</option>
                        <option value="oldest">Najstariji</option>
                    </select>
                    
                    
                    <div class="filter-radio-wrapper">
                        <input type="radio" id='all' value="all" checked name="radio">
                        <label for="all" class='custom-radio'>Svi projekti</label>
                        
                        <input type="radio" id='active' value="Aktivan" name="radio">
                        <label for="active" class='custom-radio'>Aktivni</label>
                        
                        <input type="radio" id='inactive' value="Neaktivan" name="radio">
                        <label for="inactive" class='custom-radio'>Neaktivni</label>
                        <input type="radio" id='finished' value="Završen" name="radio">
                        <label for="finished" class='custom-radio'>Završeni</label>
                    </div>
                    
                    
                </div>
            </div>
        </section>
        <section class="table-body">
            <table>
                <thead>
                    <tr>
                        <th>Naziv projekta</th>
                        <th>Godina izrade</th>
                        <th>Status</th>
                        <th>Ažuriranje</th> 
                        <th>Link</th>        
                        <th>Izmeni</th>
                        <th>Obriši</th>
                    </tr>
                </thead>
                <tbody>
                   
                        
                        
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