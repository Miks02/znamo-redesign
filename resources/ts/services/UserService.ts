import { User } from "../models/User";
import axios from 'axios';

export class UserService {

    public async updateProfile(id:number, user: Omit<User, 'id' | 'is_admin' | 'password'>): Promise<any> {
        return await axios.put(`/profile/${id}`, user);
    }

}