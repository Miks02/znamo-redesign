import { Project } from "../models/Project";
import { ProjectDTO } from "../models/ProjectDTO";
import { ProjectService } from "../services/ProjectService";
import { Helpers } from "../Utility/Helpers";
import { Status } from "../Enums/ProjectEnums";
import { renderDashboardView } from "../Utility/dashboard";
import { ProjectFormInputs } from "../models/ProjectFormInputs";
import { formStyle } from "../Utility/Ui";

export class ProjectController {
    projectId: number = 0;
    imagePath: File;
    isEditMode: boolean = false;

    constructor(private projectService: ProjectService) { }


    getId = () => this.projectId;
    setId = (value: number) => this.projectId = value;

    getProjectImage = () => this.imagePath;
    setProjectImage = (value: File) => this.imagePath = value;

    getIsEditMode = () => this.isEditMode;
    setIsEditMode = (value: boolean) => this.isEditMode = value;

    getProjects = async () => {
        try {
            const response = await this.projectService.getProjects();
            console.log(response.data);
            return response.data;
        } catch (err) {
            console.log("Greška prilikom učitavanja projekata\n", err);
        }
    }

    getProjectsCount = async () => {
        const response = await this.getProjects()
        return response.data;
    }

    loadProjectImage = (imagePath?: string) => {


        const display = document.querySelector('.project-image-box .project-image') as HTMLDivElement;
        const uploadBtn = document.querySelector('#imageUpload') as HTMLInputElement;
        let image;

        if (!uploadBtn && !display)
            return;

        if (imagePath)
            display.style.backgroundImage = `URL(/storage/${imagePath})`
                ;

        uploadBtn.addEventListener('change', (e) => {
            e.preventDefault();
            const reader = new FileReader();
            if (!uploadBtn.files) {
                console.log('files are null');
                return;
            }

            console.log(uploadBtn.files[0])
            reader.readAsDataURL(uploadBtn.files[0]);
            console.log(reader.result);
            this.setProjectImage(uploadBtn.files[0])
            reader.onload = () => {
                display.style.backgroundImage = `URL(${reader.result})`;

            }
            image = this.getProjectImage();

        })
        return image;

    }

    addproject = async (e: Event) => {
        e.preventDefault();
        const image = this.getProjectImage();
        console.log(image);
        const form = Helpers.getFormData();
        if (typeof form === 'object' && 'title' in form! && 'year_of_creation' in form) {
            if (Helpers.formValidator(false, image).length > 0)
                return;
            try {
                const response = await this.projectService.addProject(form, image)
                alert('Uspešno dodavanje projekta!')
                console.log('Uspešno dodavanje projekta!\n' + response.data);

            } catch (err) {
                alert("Došlo je do greške prilikom dodavanja projekta");
                console.log(err);
            }
        } else {
            alert("Došlo je do greške prilikom učitavanja getFormData funkcije");
            console.log(form);
        }

    }

    fillTable = async (projects: Promise<ProjectDTO[]>) => {
        const table = document.querySelector('tbody');

        if (table) {
            table.innerHTML = "";
            (await projects).forEach(p => {
                const row = document.createElement('tr');
                row.innerHTML = `
                            <td data-label="Naziv projekta">${p.title}</td>
                            <td data-label="Godina izrade">${p.year_of_creation}</td>
                            <td data-label="Status">${p.status}</td>
                            <td data-label="Ažuriranje">${p.active_updating ? 'Da' : 'Ne'}</td>
                            <td data-label="Link"><i class="fa-solid fa-link"></i></td>
                            <td data-label="Izmeni"><i class="fa-solid fa-pen icon " data-edit-id=${p.id}></i></td>
                            <td data-label="Obriši"><i class="fa-solid fa-trash icon" data-delete-id="${p.id}"></i></td>
                        </tr>
                            `;

                table.appendChild(row);

                const linkIcon = document.querySelectorAll('.fa-solid.fa-link');

                if (linkIcon)
                    linkIcon.forEach(link => {
                        link.addEventListener('click', () => {

                            Helpers.redirectTo(`https://${p.project_link}`);
                        })
                    });


            })

            this.editDelete();

        }

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

                    const view = 'add-project';
                    await renderDashboardView(view, id);

                    this.setId(id);
                    await this.editProject();
                }

                if (i.dataset.deleteId) {
                    const id: number = Number(i.dataset.deleteId);
                    try {
                        await this.deleteProject(id);
                        const freshProjects = this.getProjects();
                        this.fillTable(freshProjects);
                        // Helpers.refreshStats(freshUsers);

                        alert("Projekat je uspešno obrisan!");
                    } catch (err) {
                        alert("Doslo je do greske prilikom brisanja projekta!");
                        console.log("Greska: " + err);
                    }

                }

            })
        })

    }

    editProject = async () => {
        this.setIsEditMode(true);
        let submitBtn = document.querySelector('.button-wrapper .submit');
        console.log(this.getId());


        let header = document.querySelector('.component-wrapper h2');

        if (header)
            header.textContent = "Izmena projekta";
        if (submitBtn)
            submitBtn.textContent = "Sačuvaj izmene";



        formStyle();



        try {
            const response = await this.projectService.getProjectById(this.getId());
            const project: ProjectDTO = response.data;
            const formInputs = Helpers.getFormInputs() as ProjectFormInputs;
            console.log(response.data);


            formInputs.title!.value = project.title;
            formInputs.year_of_creation!.value = String(project.year_of_creation)
            formInputs.year_of_redesign!.value = String(project.year_of_redesign);
            formInputs.project_link!.value = project.project_link;
            formInputs.status!.value = project.status;
            formInputs.is_updating!.checked = project.active_updating

            this.loadProjectImage(project.image_path);


            submitBtn?.addEventListener('click', async (e) => {
                e.preventDefault();



                project.title = formInputs.title!.value;
                project.year_of_creation = Number(formInputs.year_of_creation!.value);
                project.year_of_redesign = Number(formInputs.year_of_redesign!.value);
                project.status = formInputs.status!.value as Status;
                project.active_updating = formInputs.is_updating!.checked;



                try {
                    if (Helpers.formValidator(true, this.getProjectImage()).length > 0)
                        return;
                    await this.projectService.patchProject(this.getId(), project, this.getProjectImage());

                    alert("Projekat je uspešno ažuriran!");
                    //Helpers.redirectTo('/dashboard/admin');
                } catch (err) {
                    console.log("Doslo je do greske prilikom izmene projekta \n" + err);
                    alert('Doslo je do greske prilikom izmene projekta');
                }


            });


        } catch (err) {
            console.log(err);
            alert("Projekat nije pronadjen!");
            Helpers.redirectTo('dashboard/admin');
        }

    }

    deleteProject = async (id: number) => {

        await this.projectService.deleteProject(id);


    }

}