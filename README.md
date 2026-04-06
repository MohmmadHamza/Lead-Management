# Lead Management System

A **Lead Management System** built using **Laravel (PHP Framework)** to help businesses manage leads, track follow-ups, and organize customer inquiries efficiently.

The system allows teams to store lead information, schedule follow-ups, and manage the lead lifecycle from initial contact to conversion.

This project demonstrates backend development using **Laravel MVC architecture**, database integration, and dynamic Blade templates.

---

## Tech Stack

* PHP
* Laravel Framework
* MySQL Database
* Blade Template Engine
* JavaScript
* Tailwind CSS
* Vite

---

## Key Features

* Lead creation and management
* Customer information tracking
* Follow-up scheduling and tracking
* Database driven lead records
* Dynamic web interface using Blade templates
* Responsive UI
* Clean MVC project architecture
* Scalable backend structure

---

## Use Cases

This system can be used by:

* sales teams
* marketing agencies
* customer relationship teams
* service providers
* small and medium businesses managing client inquiries

---

## Project Structure

Important Laravel directories used in this project:

```
app/            Application controllers and models
bootstrap/      Framework bootstrap files
config/         Application configuration
database/       Database migrations and seeds
public/         Public assets and entry point
resources/      Blade templates and frontend assets
routes/         Application routes
storage/        Application storage
tests/          Test files
```

Key project files:

```
artisan
composer.json
package.json
vite.config.js
tailwind.config.js
```

---

## Installation

Clone the repository:

```
git clone https://github.com/MohmmadHamza/Lead-Management.git
```

Navigate to the project directory:

```
cd Lead-Management
```

Install PHP dependencies:

```
composer install
```

Install frontend dependencies:

```
npm install
```

Create environment configuration:

```
cp .env.example .env
```

Generate application key:

```
php artisan key:generate
```

---

## Database Setup

The repository contains a database SQL file for the lead management data.

Steps:

1. Create a MySQL database.
2. Import the `follow_up.sql` file.
3. Update database credentials in `.env`.

Example:

```
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

If migrations exist, run:

```
php artisan migrate
```

---

## Running the Application

Start the Laravel development server:

```
php artisan serve
```

Open in browser:

```
http://127.0.0.1:8000
```

---

## Future Improvements

Possible enhancements for this project:

* authentication system
* role-based access control
* lead status tracking (new, contacted, converted)
* notification and reminder system
* analytics dashboard
* API endpoints for CRM integrations

---

## Author

**Mohammed Hamza**

Backend Developer specializing in **PHP, Laravel, REST APIs, and scalable web applications**

GitHub
https://github.com/MohmmadHamza/Lead-Management

---

## License

This project is open-source and available under the **MIT License**.
