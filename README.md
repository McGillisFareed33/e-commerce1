# Laravel E-Commerce Backend

A backend-focused e-commerce project built with Laravel. The project focuses on user authentication, middleware-based access control, and CRUD operations for managing application data.

## Features

- User registration and login
- Authentication using Laravel middleware
- Access control for authorized users
- Admin functionality
- CRUD operations for managing resources
- Backend application structure using Laravel

## Technologies

- PHP
- Laravel
- MySQL
- Eloquent ORM
- Laravel Middleware
- Postman

## Project Focus

This project was developed to practice backend web development with Laravel.

The main focus is on authentication, authorization, and data management rather than frontend development. Administrative functionality is designed to be accessible only to authorized users.

## Getting Started

### Prerequisites

- PHP
- Composer
- MySQL
- Laravel-compatible development environment

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/McGillisFareed33/e-commerce1.git
   cd e-commerce1
   ```

2. Install dependencies:

   ```bash
   composer install
   ```

3. Create your environment configuration:

   ```bash
   cp .env.example .env
   ```

4. Configure your database settings in `.env`.

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Run database migrations:

   ```bash
   php artisan migrate
   ```

7. Start the development server:

   ```bash
   php artisan serve
   ```

## Future Improvements

- Develop a frontend interface
- Add shopping cart and checkout functionality
- Integrate a payment system

## Author

Poyraz Kocaoglu

[GitHub Profile](https://github.com/McGillisFareed33)
