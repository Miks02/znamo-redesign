import { formStyle } from "./Ui";

export function dashboardLoad(): void {
    const sidebarLinks = document.querySelectorAll('.sidebar .sidebar-navigation .comp-link');
    const mainContent = document.querySelector('.component-wrapper') as Element;
    const initialComponent = "admin";
    
    if(sidebarLinks.length === 0)
        return;
    
    loadDashboardComponent(initialComponent, mainContent);
    
    sidebarLinks.forEach(link => {
        link.addEventListener('click', async (e) => {
            e.preventDefault();
            
            const view = link.getAttribute('data-view');
            if (!view) return;
            
            await loadDashboardComponent(view, mainContent);
        });
    });
    
    async function loadDashboardComponent(view: string, mainContent: Element): Promise<void> {
        try {
            const response = await fetch(`/api/dashboard-views/${view}`);
            if (!response.ok) throw new Error("Greška: " + response.status);
            
            const newUrl = `/dashboard/${view}`;
            
            if(window.location.pathname !== `/dashboard/${view}`) {
                history.pushState({ view }, '', newUrl);
            }
            console.log(window.location.pathname);
            const html = await response.text();
            mainContent.innerHTML = html;
            console.log("Učitano: " + html);
            formStyle();
        } catch (err) {
            mainContent.innerHTML = "<p>Došlo je do greške prilikom učitavanja sadržaja</p>";
        }
    }
    window.addEventListener('popstate', (event) => {
        const view = (event.state && event.state.view) || initialComponent;
        loadDashboardComponent(view, mainContent);
        console.log("Navigated to: " + event.state.view);
        
        
    });
    
    
}


