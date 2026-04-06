# Hospital Management System - Quick Reference

## 🏥 System Overview

- **Type:** Hospital Management System
- **Framework:** Laravel
- **Database:** SQLite
- **Language:** PHP 8.1+
- **Default Port:** 8000
- **Role Support:** Admin, Doctor, Patient

---

## ⚡ Get Started in 5 Minutes

```bash
# 1. Navigate to project
cd c:\laragon\www\hospital management system

# 2. Install dependencies
composer install

# 3. Setup database
php artisan key:generate
touch database/hospital.sqlite
php artisan migrate

# 4. Create admin (optional)
php artisan tinker
App\Models\User::create(['name'=>'Admin','email'=>'admin@hospital.local','password'=>bcrypt('password'),'role'=>'admin'])
exit

# 5. Start server
php artisan serve
```

**Access:** http://localhost:8000

---

## 👤 Default Credentials (After Admin Creation)

- Email: `admin@hospital.local`
- Password: `password`

---

## 📊 Main Features at a Glance

| Feature               | Admin | Doctor | Patient |
| --------------------- | ----- | ------ | ------- |
| Manage Patients       | ✅    | ❌     | ❌      |
| Manage Doctors        | ✅    | ❌     | ❌      |
| Schedule Appointments | ✅    | ❌     | ❌      |
| View Appointments     | ✅    | ✅     | ✅      |
| Update Profile        | ✅    | ✅     | ✅      |
| Delete Records        | ✅    | ❌     | ❌      |

---

## 🗂️ Key Files Location

| Item        | Location                   |
| ----------- | -------------------------- |
| Controllers | `app/Http/Controllers/`    |
| Models      | `app/Models/`              |
| Views       | `resources/views/`         |
| Routes      | `routes/web.php`           |
| Database    | `database/hospital.sqlite` |
| Migrations  | `database/migrations/`     |
| Config      | `config/`                  |

---

## 📋 Menu Structure

```
Home Page
├── Login
├── Register
└── About

Dashboard (Authenticated)
├── Patients
│   ├── List
│   ├── Add
│   ├── View
│   ├── Edit
│   └── Delete
├── Doctors
│   ├── List
│   ├── Add
│   ├── View
│   ├── Edit
│   └── Delete
└── Appointments
    ├── List
    ├── Schedule
    ├── View
    ├── Edit
    └── Delete
```

---

## 🎯 Quick Actions

### Add Patient

1. Go to Patients → Add Patient
2. Fill: Name, Email, Password, DOB, Gender, Phone, Blood Type
3. Click "Add Patient"

### Add Doctor

1. Go to Doctors → Add Doctor
2. Fill: Name, Email, Password, Department, Specialization, License #, Phone
3. Click "Add Doctor"

### Schedule Appointment

1. Go to Appointments → Schedule Appointment
2. Select: Patient, Doctor, Date, Time, Status
3. Add Notes (optional)
4. Click "Schedule Appointment"

---

## 💾 Database Tables

**Users** - Master user table
**Doctors** - Doctor profiles linked to users
**Patients** - Patient records linked to users
**Appointments** - Appointments linking patients & doctors

_All tables support soft deletes (restore capability)_

---

## 🔐 Authentication Paths

| Action    | Route        | Method |
| --------- | ------------ | ------ |
| Login     | `/login`     | POST   |
| Register  | `/register`  | POST   |
| Logout    | `/logout`    | POST   |
| Dashboard | `/dashboard` | GET    |

---

## ✅ Validation Summary

### Required Fields

- User: Name, Email, Password
- Patient: DOB, Gender, Phone
- Doctor: Department, License #
- Appointment: Patient, Doctor, Date, Time

### Unique Fields

- Email (users table)
- License # (doctors table)

---

## 🎨 Default Colors

- **Primary:** #3498db (Blue)
- **Success:** #27ae60 (Green)
- **Danger:** #e74c3c (Red)
- **Dark:** #2c3e50 (Charcoal)
- **Light:** #ecf0f1 (Light Gray)

---

## 🚫 Common Mistakes to Avoid

❌ Forget to run migrations after setup
❌ Not creating the SQLite file
❌ Forgetting to use `touch` command for database file
❌ Accessing routes without authentication
❌ Using wrong database path in .env

✅ Always run: `php artisan migrate` after setup
✅ Always create: `database/hospital.sqlite`
✅ Always generate: Application key with `key:generate`

---

## 🔍 Debugging Tips

```bash
# Clear all cache
php artisan cache:clear

# Clear only routes
php artisan route:clear

# Check database connection
php artisan tinker
DB::connection()->getPdo()

# View all users
php artisan tinker
App\Models\User::all()

# Reset everything
php artisan migrate:reset
php artisan migrate
```

---

## 📱 API Endpoints Overview

```
GET    /                    # Home page
GET    /login              # Login form
POST   /login              # Login submit
GET    /register           # Register form
POST   /register           # Register submit
POST   /logout             # Logout

GET    /dashboard          # Dashboard
GET    /patients           # List patients
GET    /doctors            # List doctors
GET    /appointments       # List appointments

POST   /patients           # Create patient
POST   /doctors            # Create doctor
POST   /appointments       # Create appointment

GET    /patients/{id}      # Show patient
PUT    /patients/{id}      # Update patient
DELETE /patients/{id}      # Delete patient

(Same patterns for doctors and appointments)
```

---

## 🎓 Code Snippets

### Create a Relationship

```php
// In Model
public function appointments()
{
    return $this->hasMany(Appointment::class);
}
```

### Query with Relationships

```php
$doctors = Doctor::with('user', 'appointments')->get();
```

### Soft Delete

```php
$doctor->delete();           // Soft delete
$doctor->restore();          // Restore
Doctor::withTrashed()->get(); // Include deleted
```

### Authenticate Check

```php
if (auth()->check()) {
    // User is logged in
}

if (auth()->user()->isAdmin()) {
    // Is admin
}
```

---

## ⚙️ Environment Variables

```
APP_NAME=Hospital Management System
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000
DB_CONNECTION=sqlite
DB_DATABASE=database/hospital.sqlite
MAIL_FROM_ADDRESS=admin@hospital.local
```

---

## 📞 When You Get Stuck

### "Database Error"

→ Check if `database/hospital.sqlite` exists

### "Route Not Found"

→ Run `php artisan route:clear` and `php artisan cache:clear`

### "Migration Error"

→ Run `php artisan migrate:refresh` or `php artisan migrate:reset`

### "Login Failed"

→ Check user exists: `php artisan tinker` → `User::all()`

### "SQL Error"

→ Run migrations: `php artisan migrate`

---

## 🚀 Performance Tips

1. Clear cache regularly: `php artisan cache:clear`
2. Use tinker for quick tests: `php artisan tinker`
3. Check logs: `storage/logs/laravel.log`
4. Pagination: Use `->paginate(15)` for large lists
5. Eager load: Use `with()` to prevent N+1 queries

---

## 📈 Growth Path

1. ✅ **Phase 1:** Basic CRUD (Completed)
2. ⏳ **Phase 2:** Email notifications (Request features)
3. ⏳ **Phase 3:** Prescriptions & billing
4. ⏳ **Phase 4:** Advanced reporting
5. ⏳ **Phase 5:** Mobile API

---

## 📚 Learn More

- **Laravel Tutorials:** https://laravel.com/docs
- **Blade Syntax:** https://laravel.com/docs/blade
- **Eloquent Guide:** https://laravel.com/docs/eloquent
- **Forms & Validation:** https://laravel.com/docs/validation

---

## 🆘 Emergency Commands

```bash
# If everything breaks, reset everything:
php artisan cache:clear
php artisan route:clear
php artisan migrate:refresh
php artisan serve

# If database is corrupted:
rm database/hospital.sqlite
touch database/hospital.sqlite
php artisan migrate
```

---

## ✨ Quick Checklist for First Use

- [ ] Run `composer install`
- [ ] Run `php artisan key:generate`
- [ ] Create `database/hospital.sqlite`
- [ ] Run `php artisan migrate`
- [ ] Create admin user (optional)
- [ ] Run `php artisan serve`
- [ ] Visit http://localhost:8000
- [ ] Register or login
- [ ] Test all features
- [ ] Create sample data

---

## 🎯 Mission Possible!

**You now have a complete, working Hospital Management System!**

Next: Customize it, extend it, learn from it! 🚀

---

_For detailed documentation, see README.md, SETUP.md, and PROJECT_SUMMARY.md_
