# 📝 Blog Website  

A simple blog platform where **guests** can explore blogs, and **registered users** can log in to create and manage their own posts.  

## 🚀 Features  

-  **Guest Access**: View all blogs without logging in.  
- **User Authentication**: Register/Login to post your own blogs.  
- **Create Blogs**: Logged-in users can write and publish blogs.  
- **Manage Blogs**: Edit or delete your own posts.  
- **Responsive Design**: Clean and user-friendly interface.  

## 🛠️ Tech Stack  

- **Backend**: [Laravel](https://laravel.com/)  
- **Frontend**: HTML, CSS, JavaScript  
- **Database**: MySQL  

## ⚙️ Installation  

Follow these steps to set up and run the project locally:  

### 1. Clone the repository  
```bash
git clone https://github.com/your-username/blog-website.git
cd blog-website
```
### 2. Install dependencies
```bash
composer install
```
### 3. Copy .env.example to .env
```bash
cp .env.example .env
```
### 4.Database Setup
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_db //use your database name
DB_USERNAME=root
DB_PASSWORD=your_password
```
### 5. Run Migration Command
```bash
php artisan migrate
```

### 6.Generate App Key
```bash
php artisan key:generate
```

### 7.Run Application 
```bash
php artisan serve
```

### ▶️ Quick Start

Clone repo

Run composer install

Copy .env.example → .env

Create database in MySQL

Update .env with DB credentials

Run php artisan migrate

Run php artisan key:generate

Start server → php artisan serve
