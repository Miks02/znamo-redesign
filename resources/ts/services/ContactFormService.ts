import { ContactForm } from "../models/ContactForm";
import axios from 'axios';

export class ContactFormService {

    async submit(form: ContactForm): Promise<void> {
        await axios.post('/kontakt', {
            name: form.name,
            phone: form.phone,
            email: form.email,
            message: form.message
        })

    }
}
