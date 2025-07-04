# Znamo - Website Redesign & Admin System

## 📝 Project Description (ENG)

This project consists of:

- A **static website** (homepage, about us, etc.)
- A **dynamic admin panel** with a login system built directly into the website

The goal is to provide an internal project management system for a small company. The **admin (my uncle)** can:

- Create, edit, and delete any user's projects
- Manage users (add/edit/delete)

Regular users (employees) can:

- Add and edit **only their own projects** (currently in progress)

This project was developed to **learn raw TypeScript without frameworks**, in order to better understand how frameworks like React and Angular work "under the hood".

---

## 🌐 Technologies Used

- **Frontend**: HTML, SCSS, TypeScript (no framework)
- **Backend**: Laravel, MySQL

---

## 🚀 How to Run

> ⚠️ The project is not deployed online. It currently runs on `localhost` and is configured to work **only when my phone is sharing mobile data** to the PC, so I can test it directly from my phone.

To run the project locally:

1. Clone the repository
2. Install backend dependencies with Composer and frontend assets with NPM (if applicable)
3. Set up your `.env` file for Laravel and run migrations
4. Run Laravel server with `php artisan serve`
5. Access the frontend via configured localhost IP (it is neccessary to edit files like vite.config so that the vite server can run on localhost)

---

## 🖼️ Screenshots

Screenshots of the projects are at the bottom of this readme file

---

## 👨‍💻 Author

- Solo project by me – design, frontend, backend, and architecture

---

## 📚 Why this project?

The main reason for this project was to learn how to build interactive web apps using **pure TypeScript** before diving into frameworks like React and Angular.

---


---

## 🌍 Opis Projekta (SRB)

Ovaj projekat se sastoji iz:

- **Statičkog sajta** (početna stranica, projekti (delimicno statičan deo), itd.)
- **Dinamičke web aplikacije** sa login sistemom i admin panelom

Cilj aplikacije je da omogući internu evidenciju i upravljanje projektima u firmi mog strica.

**Administrator sajta (vlasnik firme)** može:
- Dodavati, uređivati i brisati sve projekte
- Uređivati i upravljati korisnicima

**Obični korisnici (zaposleni)** mogu:
- Dodavati i uređivati **samo svoje projekte** (u izradi)

Ovaj projekat radim sa ciljem da se **nauči suvi TypeScript bez framework-a**, kako bih stekao bolju sliku o tome kako funkcionišu biblioteke poput React-a i Angular-a "ispod haube".

- Trenutno postoje funkcionalnosti za: dodavanje,brisanje i uredjivanje korisnika, login sistem i slične sitnice sa backend-a. Preostalo je dodati funkcionalnost za dodavanje projekata.
- Stim da je svaki projekat vezan za korisnika (zaposlenog) koji ga je dodao. Nakon toga treba odraditi punu validaciju sa frontenda i backenda i takodje dodati paginaciju i sortiranje

---

## 💻 Tehnologije

- **Frontend**: HTML, SCSS, TypeScript
- **Backend**: Laravel, MySQL

---

## ⚙️ Pokretanje Projekta

> ⚠️ Projekat nije hostovan na internetu. Podesio sam da se pokreće **samo kada moj telefon deli mobilne podatke** sa računarom, kako bih lakše pristupio sajtu sa telefona (localhost konfiguracija).

Koraci za lokalno pokretanje:

1. Kloniraj repozitorijum
2. Instaliraj Laravel zavisnosti pomoću Composer-a i frontend alate ako je potrebno
3. Podesi `.env` fajl i pokreni migracije
4. Pokreni server: `php artisan serve`
5. Otvori frontend u browseru preko lokalne IP adrese (potrebno je urediti dodatne fajlove kao što su vite.config kako bi vite server mogao da radi na localhost-u)

---

## 📷 Slike/Screenshots

-- Static part | Statički deo

![home-1](https://github.com/user-attachments/assets/52696c7f-9017-4b5e-aed4-70d968558907)
![about-section](https://github.com/user-attachments/assets/0b82c745-76fa-41ac-b410-3ebf3bb2b67a)
![projects](https://github.com/user-attachments/assets/f0d5578a-4506-46e4-8436-09537e312d27)


-- Dynamic part | Dinamički deo
- Table in projects page is hardcoded for test purposes | Tabela na stranici "tabela projekata" je hardkodirana radi trenutnog testiranja

![login](https://github.com/user-attachments/assets/d2e84bd6-f51d-49fe-888a-249f2fa346cb)
![dashboard-1](https://github.com/user-attachments/assets/7930c837-78c1-4c48-91cd-26056a1aa192)
![dashboard-2](https://github.com/user-attachments/assets/400aba51-e1cc-4cbd-8406-e7b619d02047)
![dashboard-3](https://github.com/user-attachments/assets/bb1b0395-63c4-41d2-86ea-efe5543a522c)
![dashboard-4](https://github.com/user-attachments/assets/f2d2592a-e6c3-4a5b-b627-a577ea003247)
![dashboard-5](https://github.com/user-attachments/assets/76a931cf-32dc-412c-9fd5-2e2be8589ade)

