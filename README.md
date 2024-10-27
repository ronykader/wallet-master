# Wallet Master

Wallet Master is an API-based Financial Management System built with Laravel 11, designed for managing users, roles, organizations, accounts, transactions, budgets, family members, and subscription plans.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Seeding the Database](#seeding-the-database)
- [API Usage](#api-usage)
- [Running with Laravel Sail](#running-with-laravel-sail)
- [Testing](#testing)
- [License](#license)

---

## Features

- **Role-Based Access Control**: Roles like Admin, Manager, and Regular User with assigned permissions
- **Organization Management**: User management within organizations with subscription plans
- **Financial Management**: Account, transaction, budget, and category management
- **Family Member Access**: Shared accounts and permissions for family members

## Requirements

- Docker and Docker Compose (for Laravel Sail)
- PHP 8.2+ (if not using Sail)
- MySQL 5.7+ or MariaDB (if not using Sail)
- Composer
- Laravel 11.x

## Installation

1. **Clone the Repository**
    ```bash
    git clone https://github.com/ronykader/wallet-master.git
    cd wallet-master
    ```

2. **Install Dependencies**
    ```bash
    composer install
    ```

3. **Environment Configuration**
    - Copy the `.env.example` file to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Update the `.env` file with your database and other environment configurations:
      ```dotenv
      DB_CONNECTION=mysql
      DB_HOST=mysql
      DB_PORT=3306
      DB_DATABASE=your_database_name
      DB_USERNAME=your_database_username
      DB_PASSWORD=your_database_password
      ```

4. **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

## Database Setup

1. **Run Migrations**
    ```bash
    php artisan migrate
    ```

2. **Database Seeding**
    - Seed the database with essential data like roles, subscription plans, and organizations:
    ```bash
    php artisan db:seed
    ```

## API Usage

1. **Run the Development Server**
    ```bash
    php artisan serve
    ```

2. **Base URL**
    Access the API at `http://127.0.0.1:8000/api`.

3. **Authentication**
    - The API uses JWT or Sanctum for authentication. Configure this in the `.env` file and authenticate using `Bearer <token>` for each request.
    - To obtain a token, register a user or log in and use the `/api/login` endpoint.

4. **API Endpoints**
    - The main endpoints for the API include:

        - **User Management**:
            - `POST /api/register` - Register a new user
            - `POST /api/login` - Log in and obtain an auth token
            - `GET /api/user` - Retrieve authenticated user details

        - **Organization Management**:
            - `GET /api/organizations` - List all organizations
            - `POST /api/organizations` - Create a new organization (Admin only)

        - **Account Management**:
            - `GET /api/accounts` - List user accounts
            - `POST /api/accounts` - Create a new account
            - `GET /api/accounts/{id}` - View account details

        - **Transaction Management**:
            - `GET /api/transactions` - List transactions
            - `POST /api/transactions` - Create a new transaction

        - **Budget Management**:
            - `GET /api/budgets` - List budgets
            - `POST /api/budgets` - Set a new budget

        - **Family Member Management**:
            - `GET /api/family-members` - List family members
            - `POST /api/family-members` - Add a new family member

    - Detailed API documentation is available in the `docs` folder or by using tools like Postman to import available routes.

## Running with Laravel Sail

Laravel Sail provides a Docker-powered local development environment:

1. **Install Sail**
    ```bash
    composer require laravel/sail --dev
    ```

2. **Initialize Sail**
    ```bash
    php artisan sail:install
    ```

    Follow the prompts to set up Sail with MySQL (or your preferred database).

3. **Start the Docker Containers**
    ```bash
    ./vendor/bin/sail up -d
    ```

4. **Access the Application**
    The app will be accessible at `http://localhost` once the Docker containers are up and running.

5. **Running Migrations with Sail**
    ```bash
    ./vendor/bin/sail artisan migrate
    ```

6. **Running Seeders with Sail**
    ```bash
    ./vendor/bin/sail artisan db:seed
    ```

## Testing

Run unit and feature tests using Sail:
```bash
./vendor/bin/sail artisan test
