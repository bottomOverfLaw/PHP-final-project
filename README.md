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

| Table | Description |
|---|---|
| `utenti` | Registered users (id, name, email, password, role) |
| `prodotti` | Products available in the store (id, name, price, description, category, manufacturer) |
| `carrello` | Shopping cart entries linking users to products |
| `categoria` | Product categories |
| `produttore` | Product manufacturers/brands |

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
