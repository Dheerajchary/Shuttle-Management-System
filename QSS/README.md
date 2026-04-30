<div align="center">

<img src="https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white"/>
<img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white"/>
<img src="https://img.shields.io/badge/XAMPP-Ready-FB7A24?style=for-the-badge&logo=apache&logoColor=white"/>

<br/><br/>

# 🚌 Quick Shuttle Services (QSS)

### A Transport Management System built with PHP & MySQL

<br/>

> *Commuting shouldn't be complicated. QSS is a full-stack web application that brings order to shuttle management — letting passengers book rides in seconds while giving admins complete control over routes, vehicles, and schedules. Built with plain PHP and MySQL, it's lightweight, fast, and straightforward to deploy.*

<br/>

</div>

---
## 📸 Screenshots

### 🏠 Home Page
Landing page where passengers can see available routes and get started.
<p align="center">
  <img src="public/assets/img/home_page.jpeg" width="600"/>
</p>

### 📅 User Booking
Passengers can book shuttles by giving their date, pickup and destination details.
<p align="center">
  <img src="public/assets/img/user_booking_request.jpeg" width="600"/>
</p>

### 🛡️ Admin Booking
Admins can view, confirm, or delete passenger bookings from a central dashboard.
<p align="center">
  <img src="public/assets/img/bookings_admin.jpeg" width="600"/>
</p>

### 🔐 Login
Secure login system for both passengers and admins.
<p align="center">
  <img src="public/assets/img/login.png" width="600"/>
</p>

### 📊 Admin Dashboard
Overview of vehicles, routes, and bookings with live counts.
<p align="center">
  <img src="public/assets/img/admin_home_page.png" width="600"/>
</p>

---

## ✨ Features

**For Passengers**
- 🔐 Secure signup & login with bcrypt password hashing
- 📅 Book a shuttle with date picker — pickup point to destination
- 📋 View, edit, and delete your own bookings
- 🗓️ See upcoming confirmed journeys at a glance
- 🗺️ Browse all available routes and bus schedules

**For Admins**
- 🛡️ Separate admin login with role-based access control
- 🚌 Full vehicle management — add, update, delete vehicles & drivers
- 📍 Route & schedule management — add stops, update timings
- ✅ Confirm or delete passenger bookings from a central dashboard
- 📊 Dashboard overview with live counts of bookings, vehicles & routes

---

## 🗂️ Project Structure

```
QSS/
├── config/
│   └── db.php                  ← Single DB connection (reads from .env)
├── helpers/
│   ├── auth.php                ← require_user() / require_admin() guards
│   └── db_helpers.php          ← Reusable DB utility functions
├── public/
│   └── assets/
│       ├── css/                ← style.css, footer.css
│       └── img/                ← Site images
├── views/
│   ├── layout/                 ← Shared partials: head, navbar, footer
│   ├── user/                   ← Passenger-facing pages
│   └── admin/                  ← Admin-only pages
├── actions/                    ← Form handlers (booking, delete, confirm, logout)
├── database/
│   ├── database.sql            ← Schema — run this first
│   └── tables_data.sql         ← Sample data
├── .env.example                ← Copy to .env and fill credentials
├── .gitignore
└── README.md
```

---

## ⚙️ Setup & Installation

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (PHP 8.0+, MySQL)
- Git

### Steps

**1. Clone the repository**
```bash
git clone https://github.com/YOUR-USERNAME/QSS.git
```

**2. Move to XAMPP's web root**
```
Copy the QSS folder into:  C:\xampp\htdocs\QSS
```

**3. Set up the database**
- Start **Apache** and **MySQL** in XAMPP Control Panel
- Open `http://localhost/phpmyadmin`
- Import `database/database.sql` first, then `database/tables_data.sql`

**4. Configure environment**
```bash
# Copy the example env file
cp .env.example .env
```
Edit `.env` with your local values:
```
DB_HOST=localhost
DB_USER=root
DB_PASS=
DB_NAME=transport
```

**5. Open the app**
```
http://localhost/QSS/views/user/home.php
```

---

## 🔗 Key Pages

| Page | URL |
|------|-----|
| 🏠 Home | `/views/user/home.php` |
| 🔐 User Login | `/views/user/login.php` |
| 📝 Sign Up | `/views/user/signup.php` |
| 📅 Book a Shuttle | `/views/user/booking.php` |
| 🛡️ Admin Login | `/views/admin/login_admin.php` |
| 📊 Admin Dashboard | `/views/admin/admin.php` |

---


## 🛠️ Tech Stack

| Layer | Technology |
|-------|------------|
| Backend | PHP 8.0+ (plain PHP, no framework) |
| Database | MySQL via MySQLi |
| Frontend | Bootstrap 5.3, Font Awesome 6 |
| Local Server | XAMPP (Apache + MySQL) |
| Version Control | GitHub |

---

## 📁 Database Schema

| Table | Description |
|-------|-------------|
| `users` | Passengers and admins (role-based) |
| `booking` | Shuttle booking records |
| `route` | Route definitions (source → destination) |
| `schedule` | Bus stop timings per route |
| `vehicle` | Driver and vehicle registry |

---


<div align="center">

Made by [Dheeraj Kumar Vadla](https://github.com/Dheerajchary)

</div>
