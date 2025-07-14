import { User } from "../models/User";
import { UserDTO}  from '../models/UserDTO'
import axios, { AxiosResponse } from 'axios';

export class UserService {
    
    async addUser(data: Omit<UserDTO, 'id'>) : Promise<AxiosResponse> {
        
        return await axios.post('/dashboard/add-user', {
            
            firstName: data.first_name,
            lastName: data.last_name,
            username: data.username,
            email: data.email,
            password: data.password,
            phoneNumber: data.phone_number,
            is_admin: data.is_admin
        })
    }
    
    async getUsers() {
        return await axios.get('/dashboard/getAll', {withCredentials: true});
    }
    
    async getUserById(id: number) {
        return await axios.get(`/dashboard/getUser/${id}`);
    }
    
    async deleteUser(id: number) {
        return await axios.delete(`/dashboard/delete/${id}`);
    }
    
    async patchUser(id: number, data: Omit<UserDTO, 'id'>) {
        return await axios.patch(`/dashboard/patch/${id}`, {
            firstName: data.first_name,
            lastName: data.last_name,
            username: data.username,
            email: data.email,
            password: data.password,
            phoneNumber: data.phone_number,
            is_admin: data.is_admin
        });
    }

    async signOutUser() {
        return await axios.get('/logout', {withCredentials: true});

    }

    async isAuthAdmin() {
        return await axios.get('/isAdmin', {withCredentials: true})        
    }

    async getAuthUserId() {
        return await axios.get('/getAuthUserId', {withCredentials: true});
    }
    
}