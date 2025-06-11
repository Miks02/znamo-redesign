

export function navbarToggler(): void {
  console.log("TS Radi")
  
  const menuOpen:HTMLElement = document.querySelector('#menu-open') as HTMLElement;
  const mobileNavbar:HTMLElement = document.querySelector('.navbar.mobile ul') as HTMLElement;
  const header = document.querySelector('header') as HTMLElement;
  
  if(mobileNavbar == null)
    return;
  
  menuOpen.addEventListener('click', () => {
    
    const display = window.getComputedStyle(mobileNavbar).maxHeight;
    if(display === '0px')
      mobileNavbar.style.maxHeight = '400px';
    else
    mobileNavbar.style.maxHeight = '0px';
  })
  
  const element = document.querySelector('.hero-section') as Element;
  
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      console.log(entry);
      if(!entry.isIntersecting) {
        header.classList.add('darker-background');
      } else {
        header.classList.remove('darker-background');
      }
    })
  })
  
  observer.observe(element);
}

export function sidebarToggler(): void {
  const menuOpen:HTMLElement = document.querySelector('#menu-open') as HTMLElement;
  const sidebar:HTMLElement = document.querySelector('.sidebar') as HTMLElement;
  
  menuOpen.addEventListener('click', () => {
    
    if(sidebar.style.transform === "translateX(0%)")
      sidebar.style.transform = "translateX(-100%)";
    else
    {
      sidebar.style.transform = "translateX(0%)"
      
    }
  })
  
}

export function pagination(): void {
  const cards = document.querySelectorAll('.project-card') as NodeListOf<HTMLElement>
  const buttons = document.querySelectorAll('.page-btn') as NodeListOf<HTMLElement>;
  const previous = document.querySelector('.previous') as HTMLElement;
  const next = document.querySelector('.next') as HTMLElement;
  const cardsPerPage = 6;
 
  
  
  function showPage(pageNumber: number): void {
    const start: number = (pageNumber - 1) * cardsPerPage;
    const end: number = start + cardsPerPage;
    
    cards.forEach((card, index) => {
      if(index >= start && index < end)
        card.style.display = "block";
      else
      card.style.display = "none";
    })
    
  }
  
  showPage(1);
  
  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      let pageAttr = btn.dataset.page;
      let page = pageAttr ? parseInt(pageAttr) : 1
      
      showPage(page);
    })
  })
}

export function formStyle(): void {
  
  const inputs = document.querySelectorAll('.input') as NodeListOf<HTMLElement>;
  
  if(inputs.length == 0) return;
  
  document.addEventListener('click', (e) => {
    inputs.forEach(i => {
      if(i.contains(e.target as Node))
        i.style.border = "1px solid #fff";
      else
      i.style.border = "1px solid rgb(119, 116, 116)";
    })
  })
  
}

