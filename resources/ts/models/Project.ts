import { Status } from "../Enums/ProjectEnums";

export interface Project  {
    title: string,
    year_of_creation: number,
    year_of_redesign?: number,
    project_link: string,
    status: Status,
    is_updating: boolean,
    image_path: string
}