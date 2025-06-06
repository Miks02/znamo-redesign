import { ContactForm } from "../models/ContactForm";
import { ContactFormService } from "../services/ContactFormService";

export class ContactFormController {
    
    
    message = document.querySelector('.message') as HTMLSpanElement;
    
    constructor(private contactService: ContactFormService) {}
    
    
    
    handleSubmit = async (event: Event) => {
        event.preventDefault();       
        
        const formName = document.querySelector('#name') as HTMLInputElement;
        const formPhone = document.querySelector('#phone')  as HTMLInputElement;
        const formEmail = document.querySelector('#email') as HTMLInputElement;
        const formMessage = document.querySelector('#message') as HTMLInputElement;
        
        console.log('submit kliknut')
        
        const form: ContactForm = {
            name: String(formName.value),
            phone: String(formPhone.value),
            email: String(formEmail.value),
            message: String(formMessage.value)
            
        }
        
        if(!this.isValid(form)) {
            this.message.style.color = "rgb(188, 10, 10)";    
            return;
        }
        else 
        this.message.textContent = "";
        this.message.style.color = "green";
        
        try {
            const response = await this.contactService.submit(form);
            
            console.log("Forma je uspesno poslata" + response);
            
            this.message.textContent = "Upit je uspešno poslat";
            
            formName.value = '';
            formPhone.value = '';
            formEmail.value = '';
            formMessage.value = '';
        } catch (err) {
            console.log("Došlo je do greške prilikom slanja forme " + err);
            this.message.style.color = "rgb(188, 10, 10)";
            this.message.textContent = "Došlo je do greške prilikom slanja forme";
        }
        
        return;
    }
    
    isValid(form: ContactForm): boolean {
        this.message.style.opacity = "1";
        if(form.name.trim() == "")
            {
            this.message.textContent = "Ime ne sme biti prazno!";
            return false;
        }
        if(!this.isPhoneValid(form))
            {
            this.message.textContent = "Broj telefona nije validan";
            return false;
        }
        if(!this.isEmailValid(form)) {
            this.message.textContent = "Email adresa nije validna!";
            return false;
        }
        if(!form.email.includes('@')) {
            this.message.textContent = "Nevalidan format email adrese";
            return false;
        }
        if(form.message.length < 10) {
            this.message.textContent = "Poruka ne sme biti previše kratka (minimum 10 karaktera)";
            return false;
        }
        
        return true;
    }
    
    isPhoneValid(form: ContactForm): boolean {
        const phoneRegex = /^\+?[\d\s]+$/;      
        return phoneRegex.test(form.phone.trim()) && form.phone.trim().length >= 9 && form.phone.trim().length <= 15;
    }
    
    isEmailValid(form: ContactForm): boolean {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(form.email);
    }
    
    formStyle() {
        const inputs: HTMLInputElement[] = [
            document.querySelector('#name') as HTMLInputElement,
            document.querySelector('#phone') as HTMLInputElement,
            document.querySelector('#email') as HTMLInputElement,
            document.querySelector('#message') as HTMLInputElement
        ];
        
        if (inputs.some(input => !input)) return;
        
        document.addEventListener("click", (e) => {
            const target = e.target as Node;
            
            inputs.forEach(input => {
                input.style.border = input.contains(target) 
                ? "1px solid #fff" 
                : "1px solid transparent";
            });
        });
    }
    
}