# CinemaVault

A responsive e-commerce website using HTML, CSS, JavaScript, and PHP, allowing users to browse and preview movies, add selections to a cart with automatic total price calculation, and manage user accounts with login, signup, and password change functionalities.

## 🚀 Key Features

*   **Product List:** The list of the products are available in the Home page and the movies page.
*   **Product Preview:** Upon clickin "info" button you can see additional details of the procust also can watch the trailor of the movie.
*   **User registration:** A user can get registered to the website. And the passwords are encrypted.
*   **User login:** User entered email and password will be checked from the backend if it matches with the existing password for that purticular email. If matched then the user can login else user won't be able log into the system.
*   **Add to card option:** User can add any movie item to the cart and the to tal cost will be generated automatically.


## 💻 Technology Stack

*   **Frontend:** HTML5, CSS3, JavaScript. Features a completely bespoke, modern design system utilizing CSS variables and flexbox for a cleanly unified, premium layout.
*   **Backend:** PHP (8.x) structured to offer modular RESTful APIs that return JSON.
*   **Database:** MySQL (accessed strictly via PHP PDO for secure, prepared SQL queries).
*   **Environment:** Designed to run seamlessly on a **WAMP64** or any standard Apache server environment.



## 🛠️ Setup Instructions (Local Environment)

To run this project locally on your machine:

1.  **Environment Setup:** Ensure you have WAMP installed and actively running.
2.  **Repository Placement:** Place this project folder exactly inside your WAMP server's web root (`C:\wamp64\www\CinemaVault`).
3.  **Database Configuration:**
    *   Start your MySQL service via your WAMP control panel.
    *   Open phpMyAdmin and create a MySQL database (ensure the name matches what is required in `Backend/config/ecom.php`).
4.  **Run Application:** Access the system by pointing your web browser to: 
    ```url
    http://localhost/CinemaVault/ecom/ecom/index.php
    ```

## 🎨 Theme & Design
The project features a highly unified, responsive visual language initialized via a streamlined CSS approach:
- **Unified Foundation (`global.css`)**: Centralizes brand colors, sidebars, top headers, modal designs, and table aesthetics.
- **Fast & Modern Aesthetic**: Employs the `Inter` font family and clean, standard inline SVGs for maximum crispness and reduced external dependencies.
