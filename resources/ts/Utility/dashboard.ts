import { formStyle } from "./Ui";
import { UserController } from "../controllers/UserController";
import { UserService } from "../services/UserService";
import { User } from "../models/User";
import { ProjectController } from "../controllers/ProjectController";
import { Project } from "../models/Project";
import { ProjectService } from "../services/ProjectService";
import { ProjectDTO } from "../models/ProjectDTO";

export async function dashboardLoad() {
    const userController: UserController = new UserController(new UserService);
    const projectController: ProjectController = new ProjectController(new ProjectService);
    let authId: number = await userController.getAuthId();
    let isAdmin: boolean = await userController.getIsUserAdmin();


    const sidebarLinks = document.querySelectorAll('.sidebar .sidebar-navigation .comp-link');
    const initialComponent = isAdmin ? 'admin' : 'add-project';
    
    if(sidebarLinks.length === 0)
        return;
    
    dashboardRouter(initialComponent);
    
    sidebarLinks.forEach(link => {
        link.addEventListener('click', async (e) => {
            e.preventDefault();
            
            const view = link.getAttribute('data-view');
            if (!view) return;
            if(view == 'logout')
            {
                await userController.logout();
                return;
            }
            dashboardRouter(view);
             
        });
    });
    
    async function dashboardRouter(view: string) {
        const users: Promise<User[]> = userController.getUsers();
        const projects: Promise<ProjectDTO[]> = projectController.getProjects();
        await renderDashboardView(view);

        switch(window.location.pathname) {
                case '/dashboard/admin':
                
                await userController.fillTable(users);
                
                break;
                case '/dashboard/add-user':
                

                document.querySelector('#register-user')?.addEventListener('submit', userController.addUser);
                break;
                case '/dashboard/add-project':
                    projectController.loadProjectImage();
                    document.querySelector('#add-project')?.addEventListener('submit', projectController.addproject)
                    break;
                    case '/dashboard/projects-table':
                    await projectController.fillTable(projects);
                        break;
                case '/dashboard/profile':
                   await userController.fillProfile(authId);

                   userController.editProfile();

                   document.querySelector('#deleteProfile')?.addEventListener('click', async (e) => {
                    e.preventDefault();
                    await userController.deleteProfile(authId);
                   });
                break;      
                
            }
    }
    
    window.addEventListener('popstate', (event) => {
        const view = (event.state && event.state.view) || initialComponent;
        dashboardRouter(view);
         
    });
    
}

export async function renderDashboardView(view: string, id?: number)  {

        const mainContent = document.querySelector('.component-wrapper') as Element;
        try {
            const response = await fetch(`/dashboard-views/${view}`);
            if (!response.ok) throw new Error("Greška: " + response.status);
            
            const newUrl = id ? `/dashboard/${view}/${id}` : `/dashboard/${view}`;
            
            if(window.location.pathname !== `/dashboard/${view}`) {
                history.pushState({ view }, '', newUrl);
            }
            const html = await response.text();
            mainContent.innerHTML = html;
            formStyle();
            
        } catch (err) {
            mainContent.innerHTML = "<h1>Došlo je do greške prilikom učitavanja sadržaja</h1>";
        }
    }


