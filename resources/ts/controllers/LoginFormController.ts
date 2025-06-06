import { LoginForm } from "../models/LoginForm";
import { LoginFormService } from "../services/LoginFormService";

export class LoginFormController {
    
    message = document.querySelector('.message') as HTMLSpanElement;
    
    constructor (private loginService: LoginFormService) {}
    
    handleSubmit = async (e: Event) => {
        e.preventDefault();
        
        const formUsername = document.getElementById("username") as HTMLInputElement;
        const formPassword = document.getElementById("password") as HTMLInputElement;
        const formCheckbox = (document.getElementById('rememberMe') as HTMLInputElement);
        
        
        console.log("Radi funkcija")
        
        
        const form: LoginForm = {
            email: formUsername.value,
            password: formPassword.value,
            remember: formCheckbox.checked
        } ;
        
        if(!this.isValid(form))
            {
            this.message.style.color = "rgb(188, 10, 10)";  
            return;
        }
        this.message.textContent = "";
        
        console.log("Forma poslata uspesno :))");
        
        try {
            const response = await this.loginService.submit(form);
            window.location.href = response.data.redirect_url;
            
        } catch(err) {
            console.log("Greška prilikom prijavljivanja: " + err);
            this.message.textContent = "Pogrešno korisničko ime ili lozinka";
            this.message.style.color = "rgb(188, 10, 10)";  
            
        }
        
        
    }
    
    isValid(form: LoginForm): boolean {
        
        this.message.style.opacity = "1";
        console.log("Pozivam isValid()")
        
        if(form.email == "") {
            this.message.textContent = "Unesite korisničko ime!";
            return false;
        }
        if(form.password == "") {
            this.message.textContent = "Unesite lozinku!";
            return false;
        }
        
        return true;
    }
    
    formStyle() {
        
        const formUsername = document.getElementById("username") as HTMLInputElement;
        const formPassword = document.getElementById("password") as HTMLInputElement;
        
        document.addEventListener('click', (e) => {
            if(!formUsername) return;
            if(!formPassword) return;
            
            if(formUsername.contains(e.target as Node)) 
                formUsername.style.border = "1px solid #fff";
            else
            formUsername.style.border = "1px solid transparent";
            
            
            if(formPassword.contains(e.target as Node)) 
                formPassword.style.border = "1px solid #fff";
            else
            formPassword.style.border = "1px solid transparent";
        })
    }
    
}