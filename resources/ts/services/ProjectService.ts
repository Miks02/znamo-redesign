import { Project } from "../models/Project"
import axios from "axios"

export class ProjectService {
    
    async addProject(data: Project) {
        return await axios.post('/dashboard/add-project', {
            title: data.title,
            year_of_creation: data.year_of_creation,
            year_of_redesign: data.year_of_redesign,
            project_link: data.project_link,
            status: data.status,
            is_updating: data.is_updating,
            image_path: data.image_path
        });
    }

    async getProjects() {
        return await axios.get('/dashboard/getAllProjects', {withCredentials: true});
    }

}