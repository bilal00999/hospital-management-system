# Hospital Management System

A basic hospital management system built with Laravel and PHP, featuring user authentication, patient management, doctor management, and appointment scheduling.

## Features

- **User Authentication**: Login/Registration with role-based access (Admin, Doctor, Patient)
- **Patient Management**: Full CRUD operations for patient records
- **Doctor Management**: Full CRUD operations for doctor profiles
- **Appointment Scheduling**: Schedule and manage appointments
- **Form Validation**: Comprehensive input validation
- **Soft Deletes**: Restore deleted records from trash
- **SQLite Database**: Local development setup with SQLite

## System Requirements

- PHP 8.1+
- Composer
- Node.js & npm (optional, for front-end assets)
- Laragon or similar local development environment

## Installation

### 1. Navigate to Project Directory

```bash
cd c:\laragon\www\hospital management system
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Generate Application Key

```bash
php artisan key:generate
```

### 4. Create SQLite Database

```bash
touch database/hospital.sqlite
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Optional: Create Admin User

```bash
php artisan tinker
```

In the tinker shell, run:

```php
App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'admin@hospital.local',
    'password' => bcrypt('password'),
    'role' => 'admin'
])
```

## Running the Application

### Start Development Server

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

### Or use Laragon

1. Start Laragon
2. The project should be accessible at `http://hospital management system`

## Usage

### Login Credentials

**Default Admin:**

- Email: `admin@hospital.local`
- Password: `password`

### User Roles

1. **Admin**: Full access to all features; can manage patients, doctors, and appointments
2. **Doctor**: Can view their appointments and manage their profile
3. **Patient**: Can view their appointments and medical records

## Database Schema

### Users Table

- id
- name
- email (unique)
- password
- role (admin, doctor, patient)
- email_verified_at
- remember_token
- timestamps
- soft deletes

### Patients Table

- id
- user_id (foreign key)
- date_of_birth
- gender (M, F, Other)
- blood_type
- phone
- medical_history
- timestamps
- soft deletes

### Doctors Table

- id
- user_id (foreign key)
- department
- specialization
- license_number (unique)
- phone
- timestamps
- soft deletes

### Appointments Table

- id
- patient_id (foreign key)
- doctor_id (foreign key)
- appointment_date
- appointment_time
- status (pending, confirmed, completed, cancelled)
- notes
- timestamps
- soft deletes

## Main Routes

### Authentication

- `GET /login` - Login form
- `POST /login` - Process login
- `GET /register` - Registration form
- `POST /register` - Process registration
- `POST /logout` - Logout

### Dashboard

- `GET /dashboard` - Main dashboard (role-specific)

### Patients (Protected)

- `GET /patients` - List all patients
- `GET /patients/create` - Create patient form
- `POST /patients` - Store new patient
- `GET /patients/{id}` - Show patient details
- `GET /patients/{id}/edit` - Edit patient form
- `PUT /patients/{id}` - Update patient
- `DELETE /patients/{id}` - Delete patient (soft delete)
- `POST /patients/{id}/restore` - Restore deleted patient

### Doctors (Protected)

- `GET /doctors` - List all doctors
- `GET /doctors/create` - Create doctor form
- `POST /doctors` - Store new doctor
- `GET /doctors/{id}` - Show doctor details
- `GET /doctors/{id}/edit` - Edit doctor form
- `PUT /doctors/{id}` - Update doctor
- `DELETE /doctors/{id}` - Delete doctor (soft delete)
- `POST /doctors/{id}/restore` - Restore deleted doctor

### Appointments (Protected)

- `GET /appointments` - List all appointments
- `GET /appointments/create` - Schedule appointment form
- `POST /appointments` - Store new appointment
- `GET /appointments/{id}` - Show appointment details
- `GET /appointments/{id}/edit` - Edit appointment form
- `PUT /appointments/{id}` - Update appointment
- `DELETE /appointments/{id}` - Delete appointment (soft delete)
- `POST /appointments/{id}/restore` - Restore deleted appointment

## Project Structure

```
hospital management system/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php
│   │       ├── DashboardController.php
│   │       ├── PatientController.php
│   │       ├── DoctorController.php
│   │       └── AppointmentController.php
│   └── Models/
│       ├── User.php
│       ├── Patient.php
│       ├── Doctor.php
│       └── Appointment.php
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_000001_create_users_table.php
│   │   ├── 2024_01_01_000002_create_doctors_table.php
│   │   ├── 2024_01_01_000003_create_patients_table.php
│   │   └── 2024_01_01_000004_create_appointments_table.php
│   └── hospital.sqlite
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── dashboard/
│       │   └── index.blade.php
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
│       └── appointments/
│           ├── index.blade.php
│           ├── create.blade.php
│           ├── show.blade.php
│           └── edit.blade.php
├── routes/
│   └── web.php
└── README.md
```

## Key Features Explained

### Soft Deletes

All models support soft deletes. When a record is deleted, it's marked as deleted but not removed from the database. Administrators can restore deleted records from the trash.

### Form Validation

All forms include comprehensive validation:

- Required field validation
- Email format validation
- Unique email validation
- Date validation
- Password confirmation
- Duplicate prevention

### Authentication

Built-in Laravel authentication with role-based access control (RBAC). Users can only access features appropriate to their role.

### SQLite Database

Uses SQLite for local development, making the system easy to set up without requiring a MySQL server.

## Common Commands

### Create a New Migration

```bash
php artisan make:migration migration_name
```

### Run All Migrations

```bash
php artisan migrate
```

### Rollback Last Migration

```bash
php artisan migrate:rollback
```

### Create New Controller

```bash
php artisan make:controller ControllerName
```

### Clear Cache

```bash
php artisan cache:clear
```

### Access Tinker Shell

```bash
php artisan tinker
```

## Troubleshooting

### Database Connection Issues

- Ensure `database/hospital.sqlite` exists
- Check `.env` file has correct `DB_DATABASE` path
- Run `php artisan migrate` to create tables

### Migration Errors

- Clear cache: `php artisan cache:clear`
- Run: `php artisan migrate:refresh`
- Check migration syntax in `/database/migrations/`

### 404 Errors

- Ensure routes are defined in `/routes/web.php`
- Clear route cache: `php artisan route:clear`

### Permission Errors on Laragon

- Check file permissions on database folder
- Ensure Laragon has write access to the project directory

## Future Enhancements

- Email notifications for appointments
- SMS alerts
- Medical records management
- Prescription system
- Billing and invoicing
- Advanced reporting
- API endpoints for mobile app
- Two-factor authentication
- Audit logging

## License

This is a basic educational project created for learning purposes.

## Support

For issues or questions, check the Laravel documentation at https://laravel.com/docs
#   h o s p i t a l - m a n a g e m e n t - s y s t e m  
 #   h o s p i t a l - m a n a g e m e n t - s y s t e m  
 