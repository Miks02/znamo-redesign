export interface User {
    id: number,
    first_name: string,
    last_name: string,
    username: string,
    email: string,
    password: string,
    phoneNumber: string,
    is_admin: boolean
    projects_count: number
}