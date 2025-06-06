import { LoginForm } from "../models/LoginForm";
import axios from "axios";

export class LoginFormService {
    async submit(form: LoginForm) {
        return await axios.post('/login', {
            email: form.email,
            password: form.password,
            remember: form.remember
        })
    }
}