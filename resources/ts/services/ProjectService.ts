import { Project } from "../models/Project"
import { ProjectDTO } from "../models/ProjectDTO";
import axios from "axios"

export class ProjectService {

    async addProject(data: Project, image: File) {
        const formData = new FormData;
        if (data.year_of_redesign)
            formData.append('year_of_redesign', data.year_of_redesign.toString());

        formData.append('title', data.title);
        formData.append('year_of_creation', data.year_of_creation.toString());
        formData.append('project_link', data.project_link);
        formData.append('status', data.status);
        formData.append('is_updating', data.active_updating ? '1' : '0');
        formData.append('image', image);

        return await axios.post('/dashboard/add-project', formData, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                'Content-Type': 'multipart/form-data',
            }
        });
    }

    async getProjects() {
        return await axios.get('/dashboard/getAllProjects', { withCredentials: true });
    }

    async getProjectById(id: number) {
        return await axios.get(`/dashboard/getProject/${id}`);
    }

    async patchProject(id: number, data: Project, image: File) {
        const formData = new FormData;
        if (data.year_of_redesign)
            formData.append('year_of_redesign', data.year_of_redesign.toString());

        formData.append('title', data.title);
        formData.append('year_of_creation', data.year_of_creation.toString());
        formData.append('project_link', data.project_link);
        formData.append('status', data.status);
        formData.append('is_updating', data.active_updating ? '1' : '0');
        if(image)
            formData.append('image', image);
        
        formData.append('_method', 'PATCH');

        return await axios.post(`/dashboard/patchProject/${id}`, formData, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                'Content-Type': 'multipart/form-data',
            }
        });
    }

    async deleteProject(id: number) {
        return await axios.delete(`/dashboard/delete/${id}`, { withCredentials: true });
    }



}