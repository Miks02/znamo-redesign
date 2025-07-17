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
                        <input type="text" id="projectTitle" placeholder="Naziv projekta" name="projectTitle" >
                    </div>
                    
                </div>
                
                <div class="form-control">
                    <div class="input">
                        
                        <input type="number" id="yearOfCreation" placeholder="Godina izrade" name="yearOfCreation">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="number" id="yearOfRedesign" placeholder="Godina redizajna" name="yearOfRedesign">
                    </div>
                </div>
                <div class="form-control">
                    <div class="input">
                        
                        <input type="text" id="projectLink" placeholder="Link projekta" name="projectLink">
                    </div>
                </div>
                
                
                
            </div>
            <div class="select-wrapper">
                
                <select name="status" id="status">
                    <option value="" selected disabled hidden>Status</option>
                    <option value="Active">Aktivan</option>
                    <option value="Inactive">Neaktivan</option>
                    <option value="Finished">Završen</option>
                </select>
            </div>
            <div class="form-inputs">
                <div class="form-control checkbox">
                    <input type="checkbox" id="isUpdating" name="isUpdating" required style="display: block;">
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