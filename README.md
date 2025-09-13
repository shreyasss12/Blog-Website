<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="#"><img src="https://www.google.com/search?q=https://img.shields.io/badge/PHP-8.1%2B-blue.svg" alt="PHP Version"></a>
<a href="#"><img src="https://www.google.com/search?q=https://img.shields.io/badge/Laravel-Framework-orange.svg" alt="Laravel Framework"></a>
<a href="#"><img src="https://www.google.com/search?q=https://img.shields.io/badge/HTML/CSS/JS-Frontend-red.svg" alt="Frontend Technologies"></a>
</p>

About This Project
This is a robust and user-friendly blog application featuring a full-fledged backend powered by the Laravel framework and a classic frontend built with HTML, CSS, and JavaScript. This project allows for seamless blog management, from public viewing to personal content creation and editing.

Key Features
Public Blog View: Guests can browse and read all published blog posts.

User Authentication: Secure user registration and login functionality.

Personal Dashboard: A private area where authenticated users can view their own blogs.

CRUD Operations: Users can Create, Read, Update, and Delete their own blog posts.

Technologies Used
Backend
PHP: The core programming language.

Laravel: A powerful PHP framework for building web applications.

Database: A relational database (e.g., MySQL or PostgreSQL).

Frontend
HTML5: For the website structure.

CSS3: For styling and design.

JavaScript: For dynamic, client-side interactions.

Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

Prerequisites
Make sure you have the following installed on your system:

PHP: Version 8.1 or higher.

Composer: PHP dependency manager.

Node.js & npm: For frontend asset compilation (if needed, though this project uses classic JS).

A Database: (e.g., MySQL)

nstallation
Clone the repository:

git clone [https://github.com/your-username/your-repo-name.git](https://github.com/your-username/your-repo-name.git)

Navigate to the project directory:

cd your-repo-name

Install PHP dependencies:

composer install

Create and configure your environment file:

cp .env.example .env

Open the newly created .env file and update your database credentials:

Usage
Start the Laravel development server:

php artisan serve

Open your web browser and navigate to the URL provided in the terminal (usually http://127.0.0.1:8000).

You can now view blogs, register a new account, and begin creating your own content!

License
The Laravel framework is open-sourced software licensed under the MIT license.

Author
Shreyas

GitHub: [Your GitHub Profile](https://github.com/shreyasss12)

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

Generate the application key:

php artisan key:generate

Run database migrations:

php artisan migrate
