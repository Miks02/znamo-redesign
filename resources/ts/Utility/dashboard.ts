import { formStyle } from "./Ui";

export function dashboardLoad(): void {
    const sidebarLinks = document.querySelectorAll('.sidebar .sidebar-navigation .comp-link');
    const mainContent = document.querySelector('.component-wrapper') as Element;
    const initialComponent = "admin";
    
    if(sidebarLinks.length === 0)
        return;
    
    loadDashboardComponent(initialComponent, mainContent);
    
    sidebarLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            
            const view = link.getAttribute('data-view');
            if (!view) return;
            
            loadDashboardComponent(view, mainContent);
           
        });
    });
    
    async function loadDashboardComponent(view: string, mainContent: Element): Promise<void> {
        try {
            const response = await fetch(`/dashboard-views/${view}`);
            if (!response.ok) throw new Error("Greška: " + response.status);
            
            const newUrl = `/dashboard/${view}`;
            
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
    window.addEventListener('popstate', (event) => {
        const view = (event.state && event.state.view) || initialComponent;
        loadDashboardComponent(view, mainContent);
        
        
    });
    
    
}


