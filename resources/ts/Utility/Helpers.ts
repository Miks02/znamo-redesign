import { UserDTO } from "../models/UserDTO";
import { ProjectDTO } from "../models/ProjectDTO.ts";
import { Project } from "../models/Project.ts";
import { Status } from "../Enums/ProjectEnums.ts";
import { UserFormInputs } from "../models/UserFormInputs.ts";
import { ProjectFormInputs } from "../models/ProjectFormInputs.ts";

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
        if (path === '/dashboard/add-project') {
            return {
                title: document.querySelector('#projectTitle') as HTMLInputElement,
                year_of_creation: document.querySelector('#yearOfCreation') as HTMLInputElement,
                year_of_redesign: document.querySelector('#yearOfRedesign') as HTMLInputElement,
                project_link: document.querySelector('#projectLink') as HTMLInputElement,
                status: document.querySelector('#status') as HTMLSelectElement,
                is_updating: document.querySelector('#isUpdating') as HTMLInputElement,
                image_path: document.querySelector('#imagePath') as HTMLInputElement
            }
        };
        return {};
    }

    static getFormData(): Omit<UserDTO, 'id'> | Omit<Project, 'id'> | undefined {
        const inputs = this.getFormInputs();
        console.log(inputs);
        const path = window.location.pathname;
        if (path === '/dashboard/add-user') {
            return {
                first_name: String(inputs.firstName?.value),
                last_name: String(inputs.lastName?.value),
                email: String(inputs.email?.value),
                username: String(inputs.username?.value),
                password: inputs.password?.value,
                phone_number: String(inputs.phoneNumber?.value),
                is_admin: inputs.role?.value === 'User' ? false : true

            }
        }
        // if(path === '/dashboard/add-project') {
        //     return {
        //         title: String(inputs.title?.value),
        //         year_of_creation: Number(inputs.year_of_creation?.value),
        //         year_of_redesign: inputs.year_of_redesign?.value ? Number(inputs.year_of_redesign.value) : undefined,
        //         project_link: String(inputs.project_link?.value),
        //         status: inputs.status?.value as Status,
        //         is_updating: inputs.is_updating?.checked ?? false,
        //         image_path: String(inputs.image_path?.value)
        //     }
        // }
        return undefined;
    }
}