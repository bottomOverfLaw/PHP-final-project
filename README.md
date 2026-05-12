# TSS - Tecnico Sviluppo Software

A school project simulating a basic e-commerce web application built with PHP, MySQL, and Bootstrap.

---

## 📋 Description

TSS is a fake e-commerce web app developed as a school project. It mimics the core functionality of an online store, allowing users to register, browse products, and manage a shopping cart — without any real payment processing.

---

## ✨ Features

- **Authentication** — Register a new account or log in with existing credentials
- **Change account data** — Update personal info or change your password from your profile
- **Product browsing** — Browse products filtered by category or manufacturer
- **Shopping cart** — Add products to your cart or remove them at any time
- **Session management** — Secure login/logout with PHP sessions
- **Role-based access** — Guest users have restricted access (e.g. no cart)

---

## 🗄️ Database Structure
 
The application uses a MySQL database with the following tables:
 
### `utenti`
| Column | Type | Notes |
|---|---|---|
| UtenteId | int | PK, auto increment |
| Mail | varchar(50) | Not null |
| Nome | varchar(25) | Not null |
| Cognome | varchar(50) | Not null |
| Telefono | varchar(15) | |
| Indirizzo | varchar(50) | |
| Cap | varchar(4) | |
| Provincia | varchar(25) | |
| TipoUtente | varchar(5) | |
| Password | varchar(500) | |
 
### `prodotti`
| Column | Type | Notes |
|---|---|---|
| ProdottoID | int | PK, auto increment |
| Prodotto | varchar(50) | Not null |
| Descrizione | varchar(500) | Not null |
| UnitaMisura | varchar(10) | Not null |
| Prezzo | float | Not null |
| ProduttoreId | int | Not null, FK |
| CategoriaId | int | Not null, FK |
| NomeImmagine | varchar(100) | Not null |
| Attivo | char(5) | |
 
### `carrello`
| Column | Type | Notes |
|---|---|---|
| CarrelloId | int | PK, auto increment |
| UtenteId | int | Not null, FK |
| ArticoloId | int | Not null, FK |
| Prezzo | decimal(10,2) | Not null |
| Qta | int | Not null |
 
### `categoria`
| Column | Type | Notes |
|---|---|---|
| CategoriaId | int | PK, auto increment |
| NomeCategoria | varchar(100) | Not null |
 
### `produttore`
| Column | Type | Notes |
|---|---|---|
| NomeProduttore | varchar(100) | Not null |
| ProduttoreId | int | PK, auto increment |
 
---
 
---

## 🛠️ Tech Stack

- **Backend** — PHP
- **Database** — MySQL (via WAMP)
- **Frontend** — HTML, Bootstrap 5, Font Awesome
- **Server** — WAMP64 (local development)

---

## 🚀 Installation & Setup

> Make sure you have [WAMP](https://www.wampserver.com/) installed.

1. Clone or download this repository into your WAMP `www` folder:
   ```
   C:\wamp64\www\final_project\
   ```

2. Import the database:
   - Open **phpMyAdmin** at `http://localhost/phpmyadmin`
   - Create a new database (e.g. `tss_db`)
   - Import the provided `.sql` file

3. Configure the database connection in your config/common file with your credentials.

4. Start WAMP and navigate to:
   ```
   http://localhost/final_project/
   ```

---

## 👩‍💻 Author

**Laura Albrile**
- GitHub: [@bottomOverfLaw](https://github.com/bottomOverfLaw)
