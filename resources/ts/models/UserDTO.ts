export interface UserDTO {
    id: number,
    first_name: string,
    last_name: string,
    username: string,
    email: string,
    password?: string,
    phone_number: string,
    is_admin: boolean
}