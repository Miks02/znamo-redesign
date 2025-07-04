import { User } from "../models/User";
import { UserDTO } from "../models/UserDTO";
import { UserService } from "../services/UserService";
import { formStyle } from "../Utility/Ui";
import { renderDashboardView } from "../Utility/dashboard";

export class UserController {
    userId: number = 0;
    
    constructor(private userService: UserService) {
        
    }
    
    getId = (): number => this.userId 
    setId = (value: number) => this.userId = value;
    
    
    addUser = async (e: Event) => {
        e.preventDefault();
        
        
        const form = this.getFormData();
        
        const users: Promise<User[]> = this.getUsers();
        // Provera duplikata korisnika i sprecavanje dalje izvrsavanje u slucaju da postoji duplikat
        const found = (await users).find((u) => form.email === u.email || form.username === u.username);
        
        if(found)
            {
            alert("Korisnik sa navedenom email adresom ili korisnickim imenom vec postoji!");
            return;
        }
        
        try {
            const response = await this.userService.addUser(form)
            alert("Uspesno dodavanje korisnika!");
            console.log("Uspesno dodavanje korisnika! \n" + response.data);
        }
        catch (err) {
            alert("Doslo je do greske prilikom dodavanja korisnika");
            console.log("Greska prilikom dodavanja korisnika \n" + err);
        }
        
        
    }
    
    editUser = async () => {
        let header = document.querySelector('.component-wrapper h2');
        let submitBtn = document.querySelector('.button-wrapper .submit');
        if(header)
            header.textContent = "Izmena korisnika";
        if(submitBtn) 
            submitBtn.textContent = "Izmeni korisnika";
        
        formStyle();
        
        try {
            const response = await this.userService.getUserById(this.getId());
            const user: UserDTO = response.data;
            const formInputs = this.getFormInputs();
            console.log(response.data);
            formInputs.firstName.value = user.first_name;
            formInputs.lastName.value = user.last_name;
            formInputs.email.value = user.email;
            formInputs.username.value = user.username;
            formInputs.phoneNumber.value = user.phone_number;
            const isAdmin = user.is_admin;
            console.log(isAdmin);
            if(isAdmin == true)
                formInputs.role.value = "Admin";
            console.log("Role value " + formInputs.role.value);
            
            
            
            submitBtn?.addEventListener('click', async (e) => {
                e.preventDefault();
                
                user.first_name = formInputs.firstName.value;
                user.last_name = formInputs.lastName.value;
                user.email = formInputs.email.value;
                user.username = formInputs.username.value;
                user.phone_number = formInputs.phoneNumber.value;
                const isAdmin = formInputs.role.value === 'User' ? false : true 
                user.is_admin = isAdmin;
                
                
                if(formInputs.password.value)
                    user.password = formInputs.password.value;
                
                console.log(user);
                
                try {
                    const response = await this.userService.patchUser(this.getId(), user);
                    // console.log(response.data);
                    alert("Korisnik je uspesno azuriran!");
                    
                } catch(err) {
                    console.log("Doslo je do greske prilikom izmene korisnika \n" + err);
                    alert('Doslo je do greske prilikom izmene korisnika');
                }
                
                
            });
            
            
        } catch (err) {
            console.log(err);
            alert("Korisnik nije pronadjen!");
            window.location.href = "/dashboard/admin";
        }
        
    }
    
    getFormData = () => {
        const firstName = document.querySelector('#firstName') as HTMLInputElement;
        const lastName = document.querySelector('#lastName') as HTMLInputElement;
        const email = document.querySelector('#email') as HTMLInputElement;
        const username = document.querySelector('#username') as HTMLInputElement;
        const password = document.querySelector('#password') as HTMLInputElement;
        const phoneNumber = document.querySelector('#phoneNumber') as HTMLInputElement;
        const role = document.querySelector('#role') as HTMLSelectElement;
        
        const isAdmin = role.value === 'User' ? false : true 
        
        
        
        const form: Omit<User, 'id'> = {
            first_name: String(firstName?.value),
            last_name: String(lastName?.value),
            email: String(email?.value),
            username: String(username?.value),
            password: String(password?.value),
            phoneNumber: String(phoneNumber?.value),
            is_admin: isAdmin
        }
        
        return form;
    }
    
    getFormInputs = () => {
        const inputs = {
            firstName: document.querySelector('#firstName') as HTMLInputElement,
            lastName : document.querySelector('#lastName') as HTMLInputElement,
            email : document.querySelector('#email') as HTMLInputElement,
            username : document.querySelector('#username') as HTMLInputElement,
            password : document.querySelector('#password') as HTMLInputElement,
            phoneNumber : document.querySelector('#phoneNumber') as HTMLInputElement,
            role : document.querySelector('#role') as HTMLSelectElement
        }
        
        return inputs;
    }
    
    getUsers = async () => {
        try {
            const response = await this.userService.getUsers() 
            console.log(response.data);
            return response.data     
        }
        catch (err) {
            console.log("Greska prilikom prikaza svih korisnika \n" + err);
        }
    }
    
    fillTable = async (users: Promise<User[]>) => {
        const table = document.querySelector('tbody');
        if(table)
            {
            table.innerHTML = "";
            (await users).forEach(u => {
                const row = document.createElement('tr');
                row.innerHTML = `
                        <td data-label="Ime">${u.first_name}</td>
                        <td data-label="Korisničko ime">${u.username}</td>
                        <td data-label="Email">${u.email}</td>
                        <td data-label="Broj projekata">0</td>
                        <td data-label="Uloga">${u.is_admin == true ? "Admin" : "korisnik"}</td>
                        <td data-label="Izmeni"><i class="fa-solid fa-user-pen icon" data-edit-id=${u.id}></i></td>
                        <td data-label="Obriši"><i class="fa-solid fa-user-slash icon" data-delete-id="${u.id}"></i></td>
                        `;
                
                table.appendChild(row);
            })
        }
        this.refreshStats(users);
        this.editDelete();
        
    }
    
    editDelete = () => {
        const icons = document.querySelectorAll('.icon') as NodeListOf<HTMLElement>
        const mainContent = document.querySelector('.component-wrapper')!;
        
        if(icons.length === 0)
            {
            console.log("ikonice nisu tu")
            return;
        }
        
        icons.forEach(i => {
            
            i.addEventListener('click', async () => {
                if(i.dataset.editId)
                    {
                    const id = Number(i.dataset.editId);
                    console.log("Edit ID: " + Number(i.dataset.editId));
                    const view = 'add-user';
                    renderDashboardView(view, id);

                    this.setId(id);
                    this.editUser();
                }
                
                if(i.dataset.deleteId)
                    {
                    const id: number = Number(i.dataset.deleteId);
                    console.log("Delete ID: " + Number(i.dataset.deleteId));
                    try {
                        const response = await this.userService.deleteUser(id);
                        console.log("Jel ulogovan korisnik?: " + response.data);
                        if(response.data == true) {
                            alert('Vas profil je obrisan! \nPreusmeravanje na login stranicu....');
                            this.redirectTo('/login');
                            return;
                        }
                        const freshUsers = this.getUsers();
                        this.fillTable(freshUsers);
                        this.refreshStats(freshUsers);
                        alert('Korisnik je obrisan uspesno!');
                        
                            
                        
                    } catch(Exception) {
                        alert("Doslo je do greske prilikom brisanja korisnika!");
                        console.log("Greska: " + Exception);
                    }
                    
                }
                
            })
        })
        
    }
    
    refreshStats = async (users: Promise<User[]>) => {
        const box = document.querySelector('.box');
        
        if(box && box.querySelector('.user-count')) {
            const span = document.querySelector('span');
            if(span)
                span.textContent = (await users).length.toString();      
        }
    }
    
    logout = async () => {
        try {
            const response = await this.userService.signOutUser();
            window.location.href = "/login";
            console.log(response.data);
            
        } catch(err) {
            alert("Doslo je do greske prilikom odjavljivanja korisnika");
            console.log(err);
        }
    }

    redirectTo = (route: string) => {
        window.location.href = `${route}`;
    }
    
    
    
}