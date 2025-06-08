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
            const response = await fetch(`/dashboard/${view}`);
            if (!response.ok) throw new Error("Greška: " + response.status);
            
            const html = await response.text();
            mainContent.innerHTML = html;
            formStyle();
        } catch (err) {
            mainContent.innerHTML = "<p>Došlo je do greške prilikom učitavanja sadržaja</p>";
        }
    }
    
    
}


