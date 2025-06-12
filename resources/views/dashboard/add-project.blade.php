<div class="container">
    <form action="" class="form-wrapper" id="add-project">
        @csrf
        <div class="wrapper-title">
            <h2>Dodaj projekat</h2>
        </div>
        <div id="add-project-form">
            
            <div class="form-inputs">
                <div class="form-control">
                    <div class="input">
                        <input type="text" id="projectName" placeholder="Naziv projekta" name="projectName" >
                    </div>
                    
                </div>
                
                <div class="form-control">
                    <div class="input">
                        
                        <input type="number" id="projectYear" placeholder="Godina izrade" name="projectYear">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="projectLink" placeholder="Link projekta" name="projectLink">
                    </div>
                </div>
                
                
                
            </div>
            <div class="select-wrapper">
                
                {{-- <input type="checkbox" id="role" placeholder="Uloga" name="role">
                <label for="role">Admin</label> --}}
                <select name="role" id="role">
                    <option value="" selected disabled hidden>Status</option>
                    <option value="Active">Aktivan</option>
                    <option value="Inactive">Neaktivan</option>
                    <option value="Finished">Završen</option>
                </select>
            </div>
            <div class="form-inputs">
                <div class="form-control checkbox">
                    <input type="checkbox" id="projectUpdate" name="projectUpdate" required style="display: block;">
                    <label for="projectUpdate">Aktivno ažuriranje</label>
                    
                </div>
            </div>

            <div class="project-image-box">
                <img src="{{asset('img/default-featured-image.png.jpg')}}" alt="">
            </div>
            
            <div class="form-inputs">
                <div class="form-control">
                    <input type="file" id="projectImage" name="projectImage" accept="image/*" required style="display: none;">
                    <label for="projectImage" class="btn btn-upload">
                        <i class="fa fa-upload"></i> Izaberi sliku projekta
                    </label>
                    
                </div>
            </div>
            
            
            
            <div class="button-wrapper">
                <div class="btn btn-negative">Odustani</div>
                <div class="btn btn-positive">Dodaj projekat</div>
            </div>
            
        </div>
        
        
    </div>
    
    
</form>
</div>