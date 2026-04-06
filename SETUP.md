# Quick Setup Guide - Hospital Management System

## Prerequisites

- Laragon installed and running
- PHP 8.1+ configured in Laragon
- Composer installed globally

## Step-by-Step Setup

### 1. Navigate to Project

```bash
cd c:\laragon\www\hospital management system
```

### 2. Install Composer Dependencies

```bash
composer install
```

### 3. Create Environment File

The `.env` file is already created. Verify it has:

```
APP_NAME="Hospital Management System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
DB_CONNECTION=sqlite
DB_DATABASE=database/hospital.sqlite
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Create SQLite Database File

```bash
touch database/hospital.sqlite
```

Or manually create an empty file: `hospital.sqlite` in the `database/` folder

### 6. Run Database Migrations

```bash
php artisan migrate
```

### 7. (Optional) Create Admin User

Open Tinker console:

```bash
php artisan tinker
```

Run these commands:

```php
App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'admin@hospital.local',
    'password' => bcrypt('password123'),
    'role' => 'admin'
]);
exit
```

### 8. Start Development Server

**Option A - Using Artisan:**

```bash
php artisan serve
```

Then access: `http://localhost:8000`

**Option B - Using Laragon:**

1. Ensure Laragon is running
2. Access: `http://hospital-management-system.local` (or check Laragon's domain)

## First Login

**If you created an admin user:**

- Email: `admin@hospital.local`
- Password: `password123`

**Or register a new account:**

- Click "Register" on the home page
- Fill in the registration form
- You'll be registered as a patient role

## Testing the System

### Create Test Data

1. **Login to admin account**

2. **Add a Doctor:**
   - Go to Doctors → Add Doctor
   - Fill in the form with sample data
   - Click "Add Doctor"

3. **Add a Patient:**
   - Go to Patients → Add Patient
   - Fill in the form with sample data
   - Click "Add Patient"

4. **Schedule an Appointment:**
   - Go to Appointments → Schedule Appointment
   - Select a patient and doctor
   - Choose a future date and time
   - Click "Schedule Appointment"

## Database Structure

### Key Tables:

- `users` - User accounts
- `doctors` - Doctor profiles
- `patients` - Patient records
- `appointments` - Appointment bookings

All tables have soft delete support (deleted_at column)

## Common Issues & Solutions

### Issue: "Could not find driver" Error

**Solution:** Ensure SQLite extension is enabled in PHP

- Check `php.ini` in Laragon
- Make sure `extension=pdo_sqlite` is uncommented

### Issue: Database Error

**Solution:**

1. Delete the SQLite file: `database/hospital.sqlite`
2. Create a new empty file with same name
3. Run migrations again: `php artisan migrate`

### Issue: Route Not Found

**Solution:** Clear route cache

```bash
php artisan route:clear
php artisan cache:clear
```

### Issue: Can't Login After Registration

**Solution:**

- Check `.env` file - ensure DB_CONNECTION=sqlite and DB_DATABASE path is correct
- Verify migrations ran successfully
- Check user was created in database: `php artisan tinker` → `App\Models\User::all()`

## Project Files Overview

```
hospital management system/
├── app/
│   ├── Http/Controllers/       # Application controllers
│   └── Models/                 # Database models
├── config/                     # Configuration files
├── database/
│   ├── migrations/             # Database schemas
│   └── hospital.sqlite         # SQLite database
├── resources/views/            # Blade templates
├── routes/web.php              # Route definitions
├── .env                        # Environment configuration
└── README.md                   # Full documentation
```

## Next Steps

1. **Explore the Features:**
   - Create doctors and patients
   - Schedule appointments
   - Test the role-based dashboards

2. **Customize:**
   - Edit views in `/resources/views/`
   - Modify validation rules in controllers
   - Add additional fields as needed

3. **Extend Functionality:**
   - Add prescription management
   - Implement email notifications
   - Create reporting features

## Need Help?

- Check `/resources/views/` for all available pages
- Review controllers in `/app/Http/Controllers/`
- Check `/routes/web.php` for all routes
- Read the full `README.md` for detailed documentation

## Support Resources

- Laravel Documentation: https://laravel.com/docs
- Laragon Documentation: https://laragon.org
- PHP Manual: https://www.php.net/manual

---

**Ready to start?** Run `php artisan serve` and visit `http://localhost:8000`
