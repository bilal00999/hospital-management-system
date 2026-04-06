🏥 Hospital Management System

A simple Hospital Management System built with Laravel and PHP.
This system manages patients, doctors, and appointments with role-based authentication.

🚀 Features
User Authentication (Admin, Doctor, Patient)
Patient Management (CRUD)
Doctor Management (CRUD)
Appointment Scheduling
Role-Based Access Control
Form Validation
Soft Deletes
SQLite Database Support
🛠️ Technologies Used
Laravel
PHP
SQLite
Blade Templates
HTML/CSS
Composer
⚙️ Installation

Clone the repository:

git clone https://github.com/your-username/hospital-management-system.git
cd hospital-management-system

Install dependencies:

composer install
npm install

Generate application key:

php artisan key:generate

Create database:

touch database/hospital.sqlite

Run migrations:

php artisan migrate

Start server:

php artisan serve

Open in browser:

http://localhost:8000
👤 Default Admin (Optional)

You can create an admin using:

php artisan tinker

Then run:

App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@hospital.local',
    'password' => bcrypt('password'),
    'role' => 'admin'
]);
📂 Modules
Authentication
Patients Management
Doctors Management
Appointments Management
Dashboard
📌 Future Improvements
Email Notifications
Billing System
Prescription Management
Reports & Analytics
📄 License

This project is created for educational purposes.
