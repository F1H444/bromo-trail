# 🏔️ Bromotrail - Premium Motor Rental & Adventure

<p align="center">
  <img src="public/hero-img.png" width="800" alt="Bromotrail Banner">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Tailwind_CSS-v4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Vite-6.0-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite">
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
</p>

---

## 🌟 Overview

**Bromotrail** is a high-end web application designed for off-road motor rental enthusiasts exploring the majestic landscape of Mount Bromo. Built with a focus on **Visual Excellence** and **Seamless User Experience**, it features a fully responsive design and a powerful back-office for administrators.

---

## 🚀 Key Features

### 👤 User Experience

- **Interactive Landing Page**: Sleek, modern homepage with cinematic hero sections.
- **Easy Booking Flow**: Streamlined rental process for motors and adventure accessories.
- **Payment Verification**: Simple upload for proof of payment.
- **Mobile Responsive**: Fully optimized for adventure on the go.

### 🛠️ Admin Back-Office (Superpowers)

- **Advanced Dashboard**: Real-time stats and recent activity monitoring.
- **Fleet Management**: Full CRUD for motors with status tracking.
- **Stock Control**: Manage additional items (Helm, Goggles, etc.) with real-time stock updates.
- **Transaction Engine**: Manage rentals, from booking to completion.
- **Condition Logs**: Document motor condition before and after rental with photo evidence.
- **Analytical Reporting**: Professional business reports with financial summaries.

---

## 🎨 Design Philosophy

> "Adventure meets Elegance."

The UI uses a curated palette of **Zinc & Modern Accents**, glassmorphism effects, and custom-tailored Tailwind CSS 4 utilities. All tables are standardized for professional alignment, ensuring a pixel-perfect administrative experience.

---

## 💻 Tech Stack

- **Framework**: [Laravel 11](https://laravel.com)
- **Styling**: [Tailwind CSS 4](https://tailwindcss.com) (Alpha/Modern builds)
- **Build Tool**: [Vite](https://vitejs.dev)
- **Database**: MySQL / Supabase
- **Icons**: FontAwesome 6 Pro

---

## 🛠️ Installation & Setup

1. **Clone the repository**

    ```bash
    git clone https://github.com/your-username/bromotrail.git
    cd bromotrail
    ```

2. **Install dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database Configuration**
   Update your `.env` with your database credentials, then run:

    ```bash
    php artisan migrate --seed
    ```

5. **Run Development Server**
    ```bash
    php artisan serve
    npm run dev
    ```
