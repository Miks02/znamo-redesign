import { User } from "../models/User";
import { UserDTO } from "../models/UserDTO";
import { UserService } from "../services/UserService";
import { formStyle } from "../Utility/Ui";
import { renderDashboardView } from "../Utility/dashboard";

export class UserController {
    userId: number = 0;


    constructor(private userService: UserService) {

    }

    getAuthId = async () => {
        try {
            const response = await this.userService.getAuthUserId();
             return response.data;
        } catch (err) {
           alert('Došlo je do greške sa serverom (Detalji su u konzoli)');
            console.log(err);
        }
    }

    getId = () => this.userId;
    setId = (value: number) => this.userId = value;


    getIsUserAdmin = async () => {

        try {
            const response = await this.userService.isAuthAdmin();
            return response.data;
        } catch (err) {
            alert('Došlo je do greške sa serverom (Detalji su u konzoli)');
            console.log(err);
        }
    }

    getIsAuthenticated = async () => {

    }

    addUser = async (e: Event) => {
        e.preventDefault();


        const form = this.getFormData();

        const users: Promise<User[]> = this.getUsers();
        const found = (await users).find((u) => form.email === u.email || form.username === u.username);

        if (found) {
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



    getFormData = () => {
        const firstName = document.querySelector('#firstName') as HTMLInputElement;
        const lastName = document.querySelector('#lastName') as HTMLInputElement;
        const email = document.querySelector('#email') as HTMLInputElement;
        const username = document.querySelector('#username') as HTMLInputElement;
        const password = document.querySelector('#password') as HTMLInputElement;
        const phoneNumber = document.querySelector('#phoneNumber') as HTMLInputElement;
        const role = document.querySelector('#role') as HTMLSelectElement;

        const isAdmin = role.value === 'User' ? false : true

        const form: Omit<UserDTO, 'id'> = {
            first_name: String(firstName?.value),
            last_name: String(lastName?.value),
            email: String(email?.value),
            username: String(username?.value),
            password: String(password?.value),
            phone_number: String(phoneNumber?.value),
            is_admin: isAdmin
        }

        return form;
    }

    getFormInputs = () => {
        const inputs = {
            firstName: document.querySelector('#firstName') as HTMLInputElement,
            lastName: document.querySelector('#lastName') as HTMLInputElement,
            email: document.querySelector('#email') as HTMLInputElement,
            username: document.querySelector('#username') as HTMLInputElement,
            password: document.querySelector('#password') as HTMLInputElement,
            confirmPassowrd: document.querySelector('#confirmPassword') as HTMLInputElement,
            phoneNumber: document.querySelector('#phoneNumber') as HTMLInputElement,
            role: document.querySelector('#role') as HTMLSelectElement
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
        if (table) {
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

        if (icons.length === 0) {
            console.log("ikonice nisu tu")
            return;
        }

        icons.forEach(i => {

            i.addEventListener('click', async () => {
                if (i.dataset.editId) {
                    const id = Number(i.dataset.editId);
                    if (id == await this.getAuthId()) {
                        await renderDashboardView('profile');
                        await this.fillProfile(id);
                        this.editProfile();
                        return;
                    }
                    const view = 'add-user';
                    await renderDashboardView(view, id);

                    this.setId(id);
                    await this.editUser();
                }

                if (i.dataset.deleteId) {
                    const id: number = Number(i.dataset.deleteId);
                    try {
                        await this.deleteProfile(id);
                        const freshUsers = this.getUsers();
                        this.fillTable(freshUsers);
                        this.refreshStats(freshUsers);


                    } catch (Exception) {
                        alert("Doslo je do greske prilikom brisanja korisnika!");
                        console.log("Greska: " + Exception);
                    }

                }

            })
        })

    }

    editUser = async () => {
        let authUser: boolean = true;
        const authId: number = await this.getAuthId();

        let submitBtn = document.querySelector('.button-wrapper .submit');

        if (this.getId() !== authId) {
            authUser = false;
            let header = document.querySelector('.component-wrapper h2');


            if (header) {
                header.textContent = "Izmena korisnika";
                console.log(header.textContent);
            }
            if (submitBtn)
                submitBtn.textContent = "Izmeni korisnika";
        }


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

            if (isAdmin == true)
                formInputs.role.value = "Admin";


            submitBtn?.addEventListener('click', async (e) => {
                e.preventDefault();

                user.first_name = formInputs.firstName.value;
                user.last_name = formInputs.lastName.value;
                user.email = formInputs.email.value;
                user.username = formInputs.username.value;
                user.phone_number = formInputs.phoneNumber.value;
                const isAdmin = formInputs.role.value === 'User' ? false : true
                user.is_admin = isAdmin;

                if (formInputs.confirmPassowrd) {

                    if(formInputs.confirmPassowrd.value && !formInputs.password.value) {
                        alert("Unesite lozinku!")
                        return;
                    }
                 
                    if (formInputs.password.value) {
                        if (!formInputs.confirmPassowrd.value) {
                            alert("Potvrdite lozinku!");
                            return;
                        }
                        if (formInputs.password.value !== formInputs.confirmPassowrd.value) {
                            alert("Unesite iste vrednosti u oba polja!");
                            return;
                        }
                        if(formInputs.confirmPassowrd.value && !formInputs.password.value) {
                            alert("Unesite lozinku!");
                            return;
                        } 

                        user.password = formInputs.confirmPassowrd.value;

                    }


                }
                else if (formInputs.password.value) {

                    user.password = formInputs.password.value;
                }

                try {
                    await this.userService.patchUser(this.getId(), user);
                    if(authUser) {
                        alert("Vaš profil je uspešno azuriran!");
                        return;
                    }
                    alert("Korisnik je uspešno ažuriran!");
                    this.redirectTo('/dashboard/admin');
                } catch (err) {
                    console.log("Doslo je do greske prilikom izmene korisnika \n" + err);
                    alert('Doslo je do greske prilikom izmene korisnika');
                }


            });


        } catch (err) {
            console.log(err);
            alert("Korisnik nije pronadjen!");
            this.redirectTo('dashboard/admin');
        }

    }

    deleteProfile = async (id: number) => {
        const authId = await this.getAuthId();
        this.userService.deleteUser(id);
        if (id == authId) {
            alert('Vas profil je obrisan! \nPreusmeravanje na login stranicu....');
            this.redirectTo('/login');
            return;
        }
        alert('Korisnik je obrisan uspesno!');

    }

    fillProfile = async (authId: number) => {
        const inputs = this.getFormInputs();

        try {
            const response = await this.userService.getUserById(authId);
            const user: UserDTO = response.data;

            inputs.firstName.value = user.first_name;
            inputs.lastName.value = user.last_name;
            inputs.email.value = user.email;
            inputs.username.value = user.username;
            inputs.phoneNumber.value = user.phone_number;
            inputs.role.value = user.is_admin ? "Admin" : "Korisnik";


        } catch (err) {
            console.log(err);
        }

    }

    editProfile = async () => {
        const authId = await this.getAuthId();
        this.setId(authId);

        this.editUser();

    }

    refreshStats = async (users: Promise<User[]>) => {
        const box = document.querySelector('.box');

        if (box && box.querySelector('.user-count')) {
            const span = document.querySelector('span');
            if (span)
                span.textContent = (await users).length.toString();
        }
    }

    logout = async () => {
        try {
            const response = await this.userService.signOutUser();
            this.redirectTo('/login');
            console.log(response.data);

        } catch (err) {
            alert("Doslo je do greske prilikom odjavljivanja korisnika");
            console.log(err);
        }
    }

    redirectTo = (route: string) => {
        window.location.href = `${route}`;
    }



}