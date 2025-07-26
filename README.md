# My Shop – Laravel E-Commerce Website

A simple and clean e-commerce web application built using **Laravel 12**.

## 🚀 Features

- User Registration & Login
- Product Listing & Details Page
- Add to Cart (database-based)
- Checkout with Address Form
- Place Order & Success Page
- Admin Panel for:
  - Category Management
  - Product Management (with image upload)
  - Order Management

## 🛠 Tech Stack

- Laravel 12 (Backend)
- MySQL (Database)
- Blade Templating + Bootstrap 5 (Frontend)
- Laravel ui


---

## 🧑‍💻 Local Setup Instructions

Follow these steps to run the project locally:

```bash
# 1. Clone the repository
git clone git@github.com:Nitin-Saxena-ns/my-shop.git
cd my-shop

# 2. Install PHP dependencies
composer install

# 3. Copy .env file and set your environment variables
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Set your DB credentials in `.env` file

# 6. Run migrations
php artisan migrate

# 7. (Optional) Seed sample data
php artisan db:seed

# 8. Create symbolic link for storage (for image access)
php artisan storage:link

# 9. Install frontend dependencies
npm install

# 10. Build assets
npm run dev

# 11. Start the Laravel server
php artisan serve
✅ Admin Panel Access
Login URL: /login
You can register manually and update is_admin = 1 in the users table via database.

📁 Folder Structure (Important)
app/Http/Controllers/Admin — Admin-specific controllers

resources/views/admin — Admin views

resources/views/frontend — Customer-facing views

public/storage — Product image uploads

🧑‍💻 Developer
🔗 Nitin Saxena
📧 ns792999@gmail.com

📌 Note
For product image upload to work, make sure storage is linked using php artisan storage:link

For admin access, manually set is_admin = 1 for a user in DB
