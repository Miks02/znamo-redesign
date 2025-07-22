import { UserDTO } from "../models/UserDTO";
import { ProjectDTO } from "../models/ProjectDTO.ts";
import { Project } from "../models/Project.ts";
import { Status } from "../Enums/ProjectEnums.ts";
import { UserFormInputs } from "../models/UserFormInputs.ts";
import { ProjectFormInputs } from "../models/ProjectFormInputs.ts";
import { UserService } from "../services/UserService.ts";
import { User } from "../models/User.ts";
import axios from "axios";
import { UserController } from "../controllers/UserController.ts";
import { ProjectController } from "../controllers/ProjectController.ts";

export class Helpers {

    static getFormInputs() {
        const path = window.location.pathname;
        if (path.startsWith('/dashboard/add-user') || path === '/dashboard/profile') {

            return {
                firstName: document.querySelector('#firstName') as HTMLInputElement,
                lastName: document.querySelector('#lastName') as HTMLInputElement,
                email: document.querySelector('#email') as HTMLInputElement,
                username: document.querySelector('#username') as HTMLInputElement,
                password: document.querySelector('#password') as HTMLInputElement,
                confirmPassword: document.querySelector('#confirmPassword') as HTMLInputElement,
                phoneNumber: document.querySelector('#phoneNumber') as HTMLInputElement,
                role: document.querySelector('#role') as HTMLSelectElement
            };
        }
        if (path === '/dashboard/add-project' || path.startsWith('/dashboard/add-project')) {
            return {
                title: document.querySelector('#projectTitle') as HTMLInputElement,
                year_of_creation: document.querySelector('#yearOfCreation') as HTMLInputElement,
                year_of_redesign: document.querySelector('#yearOfRedesign') as HTMLInputElement,
                project_link: document.querySelector('#projectLink') as HTMLInputElement,
                status: document.querySelector('#status') as HTMLSelectElement,
                is_updating: document.querySelector('#isUpdating') as HTMLInputElement,

            }
        };
        return {};
    }

    static getFormData(): Omit<UserDTO, 'id'> | Omit<Project, 'id'> | undefined {
        const inputs = this.getFormInputs();
        const path = window.location.pathname;
        if (path.startsWith('/dashboard/add-user') || path === "/dashboard/profile") {
            return {
                first_name: String(inputs.firstName?.value),
                last_name: String(inputs.lastName?.value),
                email: String(inputs.email?.value),
                username: String(inputs.username?.value),
                password: inputs.password?.value,
                confirm_password: inputs.confirmPassword?.value,
                phone_number: String(inputs.phoneNumber?.value),
                is_admin: inputs.role?.value === 'User' ? false : true

            }
        }
        if (path === '/dashboard/add-project') {
            return {
                title: String(inputs.title?.value),
                year_of_creation: Number(inputs.year_of_creation?.value),
                year_of_redesign: inputs.year_of_redesign?.value ? Number(inputs.year_of_redesign.value) : undefined,
                project_link: String(inputs.project_link?.value),
                status: inputs.status?.value as Status,
                active_updating: inputs.is_updating?.checked ?? false,

            }
        }
        return undefined;
    }

    static formValidator(editMode?: boolean) {
        const path: string = window.location.pathname;
        const errors: string[] = [];
        let data = this.getFormData();
        let inputs = this.getFormInputs();

        if (path.startsWith('/dashboard/add-user') || path === "/dashboard/profile") {
            data = data as UserDTO
            console.log(inputs);
            if (!data.first_name || data.first_name.trim() === "") errors.push('Unesite ime korisnika.');
            if (this.containsNumbers(data.first_name)) errors.push('Ime ne sme sadrzati brojeve');
            if (!data.last_name || data.last_name.trim() === "") errors.push('Unesite prezime korisnika');
            if (this.containsNumbers(data.last_name)) errors.push("Prezime ne sme sadržati brojeve")
            if (!data.email || data.email.trim() === "") errors.push("Unesite email adresu!");
            if (!this.isValidEmail(data.email)) errors.push("Nevalidan format email adrese");
            if (!data.username || data.username.trim() === "") errors.push("Unesite korisničko ime");
            if (!data.phone_number || data.phone_number.trim() === "") errors.push("Unesite broj telefona");
            if (!this.isPhoneValid(data.phone_number)) errors.push('Nevalidan format telefonskog broja');
            

            if (editMode) {
                if (inputs.confirmPassword) {
                    if (data.confirm_password && !data.password) errors.push("Unesite lozinku");
                    if (data.confirm_password !== data.password) errors.push('Lozinke se ne poklapaju');
                    if (data.password && data.confirm_password!.length < 6) errors.push("Lozinka je previše kratka (minimum 6 karaktera)")
                }
                else {
                    if (data.password)
                        if(data.password.length < 6) errors.push('Lozinka je previše kratka (minimum 6 karaktera)')
                }

            }
            else {
                if (!data.password || data.password.trim() === "") errors.push('Unesite lozinku');
                if(data.password!.length < 6) errors.push('Lozinka je previše kratka (minimum 6 karaktera)');

            }


        }

        errors.forEach(e => {
            console.log(e);
        })

        const alert = document.querySelector('.alert') as HTMLSpanElement;

        alert.style.visibility = "hidden";

        if(errors.length > 0) {
            alert.style.visibility = "visible"
            alert.textContent = errors[0];
        }
         
        

        return errors;

    }

    static containsNumbers(input: string): boolean {
        return /^\d+$/.test(input)
    }

    static isValidEmail(email: string): boolean {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    static isPhoneValid(phone: string) {
        const phoneRegex = /^(\+381|0)\s*[1-9]\d{0,2}\s*\d{3,4}\s*\d{3,4}$/;
        return phoneRegex.test(phone.trim()) && phone.trim().length >= 9 && phone.trim().length <= 15;
    }


    static refreshStats = async (users: Promise<User[]>) => {
        // const box = document.querySelector('.box');
        // if (box && box.querySelector('.users-count')) {
        //     const span = document.querySelector('span');
        //     if (span) {
        //         box.querySelector('.users-count')!.textContent = (await users).length.toString();

        //     }

        // }


        const statsContainer = document.querySelector('.container.stats');
        console.log(statsContainer)
        if (!statsContainer)
            return;

        let usersCount = statsContainer.querySelector('.box .users-count') as HTMLSpanElement;
        let projectsCount = statsContainer.querySelector('.box .projects-count') as HTMLSpanElement;

        usersCount.textContent = (await users).length.toString();


    }

    static redirectTo = (route: string) => {
        window.location.href = `${route}`;
    }

}