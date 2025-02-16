# Translation Management System

## Introduction
This is a Laravel-based Translation Management System that provides an API for managing translations. It includes authentication, CRUD operations for translations, tagging, and an export endpoint. The system follows PSR-12 coding standards, SOLID principles, and ensures optimized SQL queries for scalability.

## Features
- User authentication with JWT tokens
- Create, update, delete, and fetch translations
- Tagging system for translations
- Search translations by key or content
- Export translations in JSON format
- Scalable database structure
- Optimized queries and performance

## Installation

### Prerequisites
- PHP 8+
- Composer
- MySQL or any supported database
- Laravel 10+

### Setup
1. Clone the repository:
   ```sh
   git clone https://github.com/AliSheikhDev/translation_api.git
   cd translation-management
   ```
2. Install dependencies:
   ```sh
   composer install
   ```
3. Create an environment file:
   ```sh
   cp .env.example .env
   ```
4. Configure database settings in `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=translation_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Generate an application key:
   ```sh
   php artisan key:generate
   ```
6. Run migrations and seed the database:
   ```sh
   php artisan migrate --seed
   ```
7. Generate JWT secret key:
   ```sh
   php artisan jwt:secret
   ```
8. Start the Laravel development server:
   ```sh
   php artisan serve
   ```

## API Endpoints

### Authentication
- **Register**: `POST /api/register`
- **Login**: `POST /api/login`

### Translation Routes (Require Authentication)
- **Create Translation**: `POST /api/translations`
- **Update Translation**: `PUT /api/translations/{id}`
- **Get All Translations**: `GET /api/translations`
- **Export Translations**: `GET /api/translations/export`
- **Delete Translation**: `DELETE /api/translations/{id}`
- **Search Translations**: `GET /api/translations/search`

## Database Structure

### Tables
- `users`
- `translations`
- `tags`
- `translation_tags` (Pivot table)

### Migrations
Migrations are available for creating the database schema.
```sh
php artisan migrate
```

## Factories & Seeders
- `UserFactory` generates test users.
- `TranslationFactory` generates translations with random tags.
- `UserSeeder` and `TranslationsTableSeeder` populate the database.

To seed data:
```sh
php artisan db:seed
```

## Scalability & Performance Optimizations
- **Indexes on frequently queried columns**
- **Optimized SQL queries for minimal joins**
- **Pagination for large dataset retrieval**
- **Efficient JSON response handling**

## Contributing
Feel free to submit pull requests or report issues.

## License
MIT License

## Author
Ali Sheikh  
alibsseku@gmail.com
