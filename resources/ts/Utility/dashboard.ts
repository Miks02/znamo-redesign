import { formStyle } from "./Ui";
import { UserController } from "../controllers/UserController";
import { UserService } from "../services/UserService";
import { User } from "../models/User";

export function dashboardLoad(): void {
    const userController: UserController = new UserController(new UserService);
    
    const sidebarLinks = document.querySelectorAll('.sidebar .sidebar-navigation .comp-link');
    const initialComponent = "admin";
    
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
                userController.logout();
                return;
            }
            dashboardRouter(view);
            
        });
    });
    
    async function dashboardRouter(view: string) {
        const users: Promise<User[]> = userController.getUsers();
        await renderDashboardView(view);

        switch(window.location.pathname) {
                case '/dashboard/admin':
                
                userController.fillTable(users);
                
                break;
                case '/dashboard/add-user':
                

                document.querySelector('#register-user')?.addEventListener('submit', userController.addUser);
                break;
                case '/dashboard/profile':
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


