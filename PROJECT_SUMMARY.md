# Hospital Management System - Project Summary

## 🏥 Project Overview

A complete, basic Hospital Management System built with **Laravel** and **PHP** using **SQLite** database. The system provides comprehensive functionality for managing hospital operations including employee records (Doctors), patients, and appointments with complete CRUD operations, form validation, and soft delete support.

Created: April 2026
Framework: Laravel
Database: SQLite
Language: PHP 8.1+

---

## ✨ Key Features Implemented

### 1. **Authentication System**

- User registration and login
- Role-based access control (Admin, Doctor, Patient)
- Password hashing and encryption
- Session management
- Logout functionality

### 2. **Patient Management**

- Create, Read, Update, Delete patient records
- Store medical history
- Track blood type and emergency contacts
- Gender and date of birth recording
- Soft delete with restore capability

### 3. **Doctor Management**

- Full CRUD operations for doctor profiles
- Department and specialization tracking
- License number management
- Phone and availability tracking
- Soft delete with restore capability

### 4. **Appointment System**

- Schedule appointments between patients and doctors
- Track appointment date, time, and status
- Multiple status options (pending, confirmed, completed, cancelled)
- Add notes to appointments
- Soft delete with restore capability

### 5. **Dashboard**

- Role-specific dashboards
- Admin: System statistics and quick actions
- Doctor: View assigned appointments
- Patient: View scheduled appointments

### 6. **Form Validation**

- Required field validation
- Email format validation
- Unique email validation across tables
- Date validation
- Password confirmation
- Duplicate prevention

### 7. **Soft Deletes**

- Non-destructive deletion of records
- Restore deleted records from trash
- All models support soft deletes

### 8. **Database Management**

- SQLite for local development
- Complete migrations for all tables
- Proper foreign key constraints
- Data integrity with cascading deletes

---

## 📁 Project Structure

```
hospital management system/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php (Base controller)
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── PatientController.php
│   │   │   ├── DoctorController.php
│   │   │   └── AppointmentController.php
│   │   └── Middleware/
│   │       ├── Authenticate.php
│   │       └── VerifyCsrfToken.php
│   └── Models/
│       ├── User.php
│       ├── Patient.php
│       ├── Doctor.php
│       └── Appointment.php
│
├── config/
│   ├── app.php (Application configuration)
│   ├── auth.php (Authentication configuration)
│   ├── database.php (Database configuration)
│   └── middleware.php (Middleware configuration)
│
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_000001_create_users_table.php
│   │   ├── 2024_01_01_000002_create_doctors_table.php
│   │   ├── 2024_01_01_000003_create_patients_table.php
│   │   └── 2024_01_01_000004_create_appointments_table.php
│   └── hospital.sqlite (SQLite database file)
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php (Main layout template)
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── dashboard/
│       │   ├── index.blade.php
│       │   ├── admin.blade.php
│       │   ├── doctor.blade.php
│       │   └── patient.blade.php
│       ├── patients/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       ├── doctors/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       ├── appointments/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── show.blade.php
│       │   └── edit.blade.php
│       └── welcome.blade.php
│
├── routes/
│   └── web.php (All application routes)
│
├── bootstrap/
├── storage/
│   ├── logs/
│   └── app/
│
├── public/
│   ├── css/
│   └── js/
│
├── .env (Environment configuration)
├── .gitignore (Git ignore file)
├── README.md (Full documentation)
├── SETUP.md (Quick setup guide)
└── PROJECT_SUMMARY.md (This file)
```

---

## 🗄️ Database Schema

### Users Table

```
- id (Primary Key)
- name (String)
- email (Unique)
- password (Hashed)
- role (Enum: admin, doctor, patient)
- email_verified_at (Timestamp, nullable)
- remember_token (String, nullable)
- created_at
- updated_at
- deleted_at (Soft delete)
```

### Doctors Table

```
- id (Primary Key)
- user_id (Foreign Key → users)
- department (String)
- specialization (String)
- license_number (Unique)
- phone (String)
- created_at
- updated_at
- deleted_at (Soft delete)
```

### Patients Table

```
- id (Primary Key)
- user_id (Foreign Key → users)
- date_of_birth (Date)
- gender (Enum: M, F, Other)
- blood_type (String, nullable)
- phone (String)
- medical_history (Text, nullable)
- created_at
- updated_at
- deleted_at (Soft delete)
```

### Appointments Table

```
- id (Primary Key)
- patient_id (Foreign Key → patients)
- doctor_id (Foreign Key → doctors)
- appointment_date (Date)
- appointment_time (Time)
- status (Enum: pending, confirmed, completed, cancelled)
- notes (Text, nullable)
- created_at
- updated_at
- deleted_at (Soft delete)
```

---

## 🔌 API Routes

### Authentication Routes

| Method | Route       | Description            |
| ------ | ----------- | ---------------------- |
| GET    | `/login`    | Show login form        |
| POST   | `/login`    | Process login          |
| GET    | `/register` | Show registration form |
| POST   | `/register` | Process registration   |
| POST   | `/logout`   | Logout user            |

### Dashboard Route

| Method | Route        | Description                  |
| ------ | ------------ | ---------------------------- |
| GET    | `/dashboard` | Show role-specific dashboard |

### Patient Routes (Protected)

| Method | Route                         | Description             |
| ------ | ----------------------------- | ----------------------- |
| GET    | `/patients`                   | List all patients       |
| GET    | `/patients/create`            | Show create form        |
| POST   | `/patients`                   | Store new patient       |
| GET    | `/patients/{patient}`         | Show patient details    |
| GET    | `/patients/{patient}/edit`    | Show edit form          |
| PUT    | `/patients/{patient}`         | Update patient          |
| DELETE | `/patients/{patient}`         | Soft delete patient     |
| POST   | `/patients/{patient}/restore` | Restore deleted patient |

### Doctor Routes (Protected)

| Method | Route                       | Description            |
| ------ | --------------------------- | ---------------------- |
| GET    | `/doctors`                  | List all doctors       |
| GET    | `/doctors/create`           | Show create form       |
| POST   | `/doctors`                  | Store new doctor       |
| GET    | `/doctors/{doctor}`         | Show doctor details    |
| GET    | `/doctors/{doctor}/edit`    | Show edit form         |
| PUT    | `/doctors/{doctor}`         | Update doctor          |
| DELETE | `/doctors/{doctor}`         | Soft delete doctor     |
| POST   | `/doctors/{doctor}/restore` | Restore deleted doctor |

### Appointment Routes (Protected)

| Method | Route                                 | Description             |
| ------ | ------------------------------------- | ----------------------- |
| GET    | `/appointments`                       | List all appointments   |
| GET    | `/appointments/create`                | Show schedule form      |
| POST   | `/appointments`                       | Store new appointment   |
| GET    | `/appointments/{appointment}`         | Show appointment        |
| GET    | `/appointments/{appointment}/edit`    | Show edit form          |
| PUT    | `/appointments/{appointment}`         | Update appointment      |
| DELETE | `/appointments/{appointment}`         | Soft delete appointment |
| POST   | `/appointments/{appointment}/restore` | Restore deleted         |

---

## 🚀 Quick Start

### 1. Install Dependencies

```bash
cd c:\laragon\www\hospital management system
composer install
```

### 2. Setup Database

```bash
php artisan key:generate
touch database/hospital.sqlite
php artisan migrate
```

### 3. Create Admin User (Optional)

```bash
php artisan tinker
App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@hospital.local',
    'password' => bcrypt('password'),
    'role' => 'admin'
])
exit
```

### 4. Start Server

```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## 🎯 User Roles & Permissions

### Admin

- ✅ Manage all doctors
- ✅ Manage all patients
- ✅ Manage all appointments
- ✅ View system statistics
- ✅ Restore deleted records

### Doctor

- ✅ View assigned appointments
- ✅ Update own profile
- ✅ View patient information (for assigned patients)
- ❌ Cannot create patients/doctors

### Patient

- ✅ View own appointments
- ✅ Update own profile
- ✅ View own medical records
- ❌ Cannot create doctor/patient records

---

## 📋 Validation Rules

### Patient Registration

- Name: Required, string, max 255
- Email: Required, email, unique
- Password: Required, min 8, confirmed
- Date of Birth: Required, date, before today
- Gender: Required, in (M, F, Other)
- Blood Type: Optional
- Phone: Required, string, max 20
- Medical History: Optional, string

### Doctor Registration

- Name: Required, string, max 255
- Email: Required, email, unique
- Password: Required, min 8, confirmed
- Department: Required, string
- Specialization: Required, string
- License Number: Required, unique
- Phone: Required, string, max 20

### Appointment Scheduling

- Patient ID: Required, exists in patients table
- Doctor ID: Required, exists in doctors table
- Date: Required, date, after today
- Time: Required, time format HH:MM
- Notes: Optional, string

---

## 🎨 Frontend Features

- Responsive design
- Clean, minimal UI with CSS styling
- Form validation with error messages
- Alert messages for success/failure
- Navigation menu with role-based links
- Pagination for list views
- Modal confirmations for delete operations
- Professional color scheme

---

## ⚙️ Configuration Files

### .env

- APP_NAME: Hospital Management System
- APP_ENV: local
- APP_DEBUG: true
- DB_CONNECTION: sqlite
- DB_DATABASE: database/hospital.sqlite

### config/app.php

- Application name and timezone
- Locale and debugging settings
- Service providers
- Class aliases

### config/auth.php

- Authentication guards
- User providers
- Password validation rules

### config/database.php

- SQLite connection
- Optional MySQL, PostgreSQL config

---

## 📝 Code Examples

### Create Patient

```php
Patient::create([
    'user_id' => $user->id,
    'date_of_birth' => '1990-05-15',
    'gender' => 'M',
    'blood_type' => 'O+',
    'phone' => '555-0123',
    'medical_history' => 'Allergy to Penicillin'
]);
```

### Schedule Appointment

```php
Appointment::create([
    'patient_id' => 1,
    'doctor_id' => 1,
    'appointment_date' => '2024-05-20',
    'appointment_time' => '10:30',
    'status' => 'pending',
    'notes' => 'Regular checkup'
]);
```

### Soft Delete

```php
$patient->delete(); // Soft delete
$patient->restore(); // Restore
```

---

## 🔒 Security Features

- Password hashing using bcrypt
- CSRF token protection
- SQL injection prevention (Eloquent ORM)
- XSS protection (Blade templating)
- Authenticated routes (auth middleware)
- Role-based access control
- Secure session management

---

## 📊 Statistics Available

### Admin Dashboard

- Total Patients Count
- Total Doctors Count
- Total Appointments Count
- Pending Appointments Count

---

## 🐛 Troubleshooting

### Issue: Database Error

**Solution:** Ensure `database/hospital.sqlite` exists

```bash
touch database/hospital.sqlite
php artisan migrate
```

### Issue: Route Not Found

**Solution:** Clear route cache

```bash
php artisan route:clear
php artisan cache:clear
```

### Issue: Migration Failed

**Solution:** Reset database

```bash
php artisan migrate:reset
php artisan migrate
```

---

## 📚 File Descriptions

| File                      | Purpose                       |
| ------------------------- | ----------------------------- |
| AuthController.php        | Handle login/register/logout  |
| DashboardController.php   | Dashboard for each role       |
| PatientController.php     | Patient CRUD operations       |
| DoctorController.php      | Doctor CRUD operations        |
| AppointmentController.php | Appointment management        |
| User.php                  | User model with auth          |
| Patient.php               | Patient model & relations     |
| Doctor.php                | Doctor model & relations      |
| Appointment.php           | Appointment model & relations |
| web.php                   | All routes                    |
| app.blade.php             | Main layout template          |

---

## ✅ Test the System

1. **Register** as a new patient
2. **Login** with admin or created account
3. **Create** a doctor
4. **Create** a patient
5. **Schedule** an appointment
6. **Update** records
7. **Delete** and restore items

---

## 🔄 Next Steps

### To Extend the System:

1. Add email notifications
2. Implement prescription system
3. Add medical records management
4. Create billing system
5. Build mobile API
6. Add advanced reporting
7. Implement SMS alerts
8. Add payment processing

---

## 📞 Support

- **Laravel Docs:** https://laravel.com/docs
- **Blade Reference:** https://laravel.com/docs/blade
- **Eloquent ORM:** https://laravel.com/docs/eloquent

---

## 🎓 Learning Outcomes

By using this system, you'll learn:

- Laravel routing and controllers
- Eloquent ORM and relationships
- Database migrations
- Blade templating
- Form validation
- Authentication in Laravel
- Soft deletes
- Role-based access control
- MVC architecture
- Modern PHP practices

---

## 📄 License

Educational project for learning purposes.

---

**Created:** April 2026  
**Framework:** Laravel  
**Database:** SQLite  
**Status:** Complete and Ready for Use ✅

---

## Quick Commands Reference

```bash
# Setup
composer install
php artisan key:generate
touch database/hospital.sqlite
php artisan migrate

# Development
php artisan serve

# Database
php artisan tinker
php artisan migrate:refresh
php artisan migrate:reset

# Cache
php artisan cache:clear
php artisan route:clear

# Utilities
php artisan make:model ModelName
php artisan make:controller ControllerName
php artisan make:migration migration_name
```

---

✨ **Hospital Management System - Complete and Ready for Use!** ✨
