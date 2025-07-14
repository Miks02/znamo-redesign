export interface UserDTO {
    id: number,
    first_name: string,
    last_name: string,
    username: string,
    email: string,
    password?: string,
    confirm_password?: string,
    phone_number: string,
    is_admin: boolean
}