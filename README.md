# Modulr API Laravel Passport

API documentation [here](https://documenter.getpostman.com/view/1657780/RW1ejGzL) in postman

## Table of Contents

- [Installation](#installation)
- [Dependencies](#dependencies)
- [Routes](#routes)
    - [Authentication](#authentication)
    - [Password Reset](#password-reset)


### Installation

1. Install composer dependencies

```bash
composer install
```

2. Generate APP_KEY

```bash
php artisan key:generate
```

3. Configure .env file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=user
DB_PASSWORD=secret
```

4. Run migrations

```bash
php artisan migrate
```

5. Create client
```bash
php artisan passport:install
```

### Configuration

CORS are enabled from all hosts via the `barryvdh/laravel-cors` package. If you want to restrict access, remove the package and middleware in `Kernel.php` and implement your own solution, or edit to your liking.

### Dependencies

- [laravolt/avatar](https://github.com/laravolt/avatar) - Generate avatars for users of application


### Routes

##### Authentication

- POST /auth/login
- GET /auth/logout
- POST /auth/signup
- GET /auth/signup/activate/{token}
- GET /auth/user


##### Password Reset

- POST /password/create
- GET /password/find/{token}
- POST /password/reset
