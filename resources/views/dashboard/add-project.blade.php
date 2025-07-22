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
                    <option value="Aktivan">Aktivan</option>
                    <option value="Neaktivan">Neaktivan</option>
                    <option value="Završen">Završen</option>
                </select>
            </div>
            <div class="form-inputs">
                <div class="form-control checkbox">
                    <input type="checkbox" id="isUpdating" name="isUpdating"  style="display: block;">
                    <label for="projectUpdate">Aktivno ažuriranje</label>
                    
                </div>
            </div>

            <div class="project-image-box">
                <!-- <img src="{{asset('img/default-featured-image.png.jpg')}}" alt=""> -->
                <div class="project-image" style="background-image: url({{asset('img/default-featured-image.png.jpg')}});"></div>
            </div>
            
            <div class="form-inputs">
                <div class="form-control">
                    <input type="file" id="imageUpload" name="imageUpload" accept="image/*"  style="display: none;">
                    <label for="imageUpload" class="btn btn-upload">
                        <i class="fa fa-upload"></i> Izaberi sliku projekta
                    </label>
                    
                </div>
            </div>
            
            
            
            <div class="button-wrapper">
                <button class="btn btn-negative">Odustani</button>
                <button class="btn btn-positive submit" id="add-project" type="submit">Dodaj projekat</button>
            </div>
            
        </div>
        <span class="alert">alert</span>
        
    </div>
    
    
</form>
</div>