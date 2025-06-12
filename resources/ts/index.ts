import { ContactFormController } from "./controllers/ContactFormController";
import { ContactFormService } from "./services/ContactFormService";
import { LoginFormController } from "./controllers/LoginFormController";
import { LoginFormService } from "./services/LoginFormService";
import { navbarToggler, sidebarToggler } from "./Utility/Ui";
import { pagination } from "./Utility/Ui";
import { UserController } from "./controllers/UserController";
import { UserService } from "./services/UserService";
import { dashboardLoad } from "./Utility/dashboard";
import { formStyle } from "./Utility/Ui";

const contactForm: ContactFormController = new ContactFormController(new ContactFormService);
const loginForm: LoginFormController = new LoginFormController(new LoginFormService);


navbarToggler();
sidebarToggler();
pagination();
loginForm.formStyle();
contactForm.formStyle();

window.addEventListener('DOMContentLoaded', () => {
   
    const userController: UserController = new UserController(new UserService);
    
    userController.updateProfile();
    dashboardLoad();
})

document.querySelector('#contact-form')?.addEventListener('submit', contactForm.handleSubmit)
document.querySelector('#login-form')?.addEventListener('submit', loginForm.handleSubmit)
