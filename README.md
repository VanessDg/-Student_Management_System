# Student Management System

A Laravel-based student management system demonstrating MVC architecture, database migrations, form validation, and resource routing.

## Setup Instructions

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL or any supported database
- XAMPP (optional, for local development)

### Installation Steps

1. **Clone or Download the Project**
   ```bash
   cd c:\xampp\htdocs\student-management-system
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Create Environment File**
   ```bash
   cp .env.example .env
   ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the Development Server**
   
   **Option A: Using PHP Built-in Server**
   ```bash
   php artisan serve
   ```
   The application will be available at `http://127.0.0.1:8000`

   **Option B: Using XAMPP**
   - Place the project in `C:\xampp\htdocs\student-management-system`
   - Start Apache and MySQL from XAMPP Control Panel
   - Access the application at `http://localhost/student-management-system/public`

## Environment Configuration Checklist

Before running the application, ensure the following variables are configured in the `.env` file:

- [ ] **DB_CONNECTION**: Set to `mysql` (or your database type)
- [ ] **DB_HOST**: `127.0.0.1` (or your database host)
- [ ] **DB_PORT**: `3306` (default MySQL port)
- [ ] **DB_DATABASE**: `student_management` (or your database name)
- [ ] **DB_USERNAME**: `root` (or your database username)
- [ ] **DB_PASSWORD**: `` (or your database password)
- [ ] **APP_KEY**: Generated via `php artisan key:generate`
- [ ] **APP_URL**: `http://localhost` (adjust based on your environment)

## Project Features

### Dashboard / Index View
- Display all registered students with their Name, Email, and Age
- Clean, structured table layout
- Checkbox selection for bulk operations

### Student Creation
- Form for adding new students
- Input validation for:
  - Name (required, string)
  - Email (required, email, unique)
  - Age (required, integer, min 1, max 100)
- Success message upon creation

### Student Deletion
- Delete button with safety confirmation prompt
- Prevents accidental data loss
- Success notification after deletion

### Edit Student
- Update student information
- Form validation applied
- User-friendly error messages

## Database Schema

The `students` table includes the following columns:

| Column | Type | Nullable | Description |
|--------|------|----------|-------------|
| id | BIGINT | No | Primary key (auto-increment) |
| name | VARCHAR(255) | No | Student's full name |
| email | VARCHAR(255) | No | Student's email (unique) |
| age | INTEGER | No | Student's age |
| created_at | TIMESTAMP | No | Record creation timestamp |
| updated_at | TIMESTAMP | No | Record last update timestamp |

## Routes & Controllers

### Resource Routes
The application uses Laravel's resourceful routing with the `StudentController`:

| Method | URI | Action | Description |
|--------|-----|--------|-------------|
| GET | /students | index | Display all students |
| GET | /students/create | create | Show student creation form |
| POST | /students | store | Save new student to database |
| GET | /students/{id}/edit | edit | Show student edit form |
| PUT | /students/{id} | update | Update student in database |
| DELETE | /students/{id} | destroy | Delete student from database |

### Controller: StudentController
Located at `app/Http/Controllers/StudentController.php`

- **index()**: Retrieves all students and displays the list view
- **create()**: Returns the student creation form
- **store()**: Validates and stores a new student
- **edit()**: Retrieves a student and shows the edit form
- **update()**: Validates and updates a student record
- **destroy()**: Deletes a student record

## MVC Architecture

### Models (`app/Models/`)
- **Student.php**: Defines the Student model with fillable attributes

### Views (`resources/views/`)
- **layouts/app.blade.php**: Main layout template
- **students/index.blade.php**: Student list view
- **students/create.blade.php**: Create student form
- **students/edit.blade.php**: Edit student form

### Controllers (`app/Http/Controllers/`)
- **StudentController.php**: Handles all student-related operations

## Blade Templating Engine

The application uses Blade, Laravel's templating engine, to:
- Render dynamic HTML with PHP
- Use template inheritance via `@extends`
- Include reusable sections with `@section`
- Execute loops and conditionals with `@foreach`, `@if`
- Display variables with `{{ $variable }}`

## Troubleshooting

### Database Connection Issues
- Verify MySQL is running
- Check `.env` file database credentials
- Ensure the database exists or migrations create it

### Port Already in Use
If port 8000 is in use with `php artisan serve`:
```bash
php artisan serve --port=8001
```

### Missing Migrations
If migrations haven't run:
```bash
php artisan migrate:refresh
```

## Support

For Laravel documentation, visit [laravel.com](https://laravel.com)

---

**Project Status**: ✅ Completed  
**Last Updated**: May 30, 2026
