import { ContactFormController } from "./controllers/ContactFormController";
import { ContactFormService } from "./services/ContactFormService";
import { LoginFormController } from "./controllers/LoginFormController";
import { LoginFormService } from "./services/LoginFormService";
import { navbarToggler, sidebarToggler } from "./Utility/Ui";
import { pagination } from "./Utility/Ui";
import { dashboardLoad } from "./Utility/dashboard";


const contactForm: ContactFormController = new ContactFormController(new ContactFormService);
const loginForm: LoginFormController = new LoginFormController(new LoginFormService);

const path = window.location.pathname;

window.addEventListener('DOMContentLoaded', async () => {
    navbarToggler();
    sidebarToggler();
    pagination();
    loginForm.formStyle();
    contactForm.formStyle();
   

    if(path.startsWith('/dashboard'))
        dashboardLoad();
})
 document.querySelector('#contact-form')?.addEventListener('submit', contactForm.handleSubmit)
    document.querySelector('#login-form')?.addEventListener('submit', loginForm.handleSubmit)

