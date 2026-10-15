[readme.md](https://github.com/user-attachments/files/33508731/readme.md)
# 🛒 Laravel Store

A robust and modern E-Commerce web application built with **Laravel**, leveraging **Livewire** for dynamic UI interactions and featuring an integrated admin panel. Link https://laravel-store.duckdns.org

## 📸 Project Screenshots

<img width="1470" height="733" alt="Знімок екрана 2026-10-15 о 21 31 19" src="https://github.com/user-attachments/assets/ad507c33-c2c5-44b6-9d15-ffa2038dbca8" />
<img width="1470" height="733" alt="Знімок екрана 2026-10-15 о 21 31 10" src="https://github.com/user-attachments/assets/8a2c9801-1dee-4614-bc29-50e714a38199" />
<img width="1470" height="733" alt="Знімок екрана 2026-10-15 о 21 31 32" src="https://github.com/user-attachments/assets/bc3bdd69-441c-4cba-9bb8-64ca9ff46bce" />
<img width="1470" height="733" alt="Знімок екрана 2026-10-15 о 21 31 59" src="https://github.com/user-attachments/assets/6237e92a-c851-46d4-b1a4-46ca9d2c90d8" />




## ✨ Key Features

### 🛍️ For Customers:

* **Interactive Catalog:** Real-time product search, filtering, and sorting without page reloads (powered by Livewire).
* **Shopping Cart:** Seamlessly add, remove, and update product quantities.
* **Checkout Process:** Data validation, shipping selection, and payment options.
* **User Dashboard:** View order history and real-time order processing status.

### 🛠️ For Administrators:

* **Admin Dashboard:** Intuitive management interface for administrative tasks.
* **Catalog Management:** Full CRUD operations for products, categories, and brands.
* **Order Processing:** Update order statuses (e.g., Pending, Shipped, Completed).
* **Role-Based Access Control:** Role separation for regular Users and Administrators.

## 🛠 Tech Stack

* **PHP:** `^8.1` or higher
* **Framework:** [Laravel](https://laravel.com/)
* **Reactive UI:** [Livewire](https://livewire.laravel.com/)
* **Frontend / Styling:** Tailwind CSS / Blade Templates
* **Database:** MySQL / PostgreSQL
* **Iconography:** Heroicons / FontAwesome

## 🚀 Local Installation & Setup

Follow these steps to get the project up and running locally:

### 1. Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/laravel-store.git
cd laravel-store
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JS / CSS dependencies
npm install
```

### 3. Environment Configuration (`.env`)

```bash
# Copy the example environment file
cp .env.example .env

# Generate a unique application key
php artisan key:generate
```

Open your `.env` file and set up your database parameters:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_store
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Database Migrations & Seeding

```bash
# Run migrations along with seeders (creates demo products & default admin account)
php artisan migrate --seed
```

### 5. Build Assets & Start Server

```bash
# Compile frontend assets in development mode
npm run dev

# In another terminal tab/window, start the local server
php artisan serve
```

The application will be accessible at: **`http://localhost:8000`**

## 🔑 Demo Credentials (If applicable)

If your database seeders generate default users, you can list them here:

* **Admin Account:** `admin@example.com` / `password`
* **Customer Account:** `user@example.com` / `password`

## 📝 License

This project is open-source software licensed under the [MIT license](LICENSE).
