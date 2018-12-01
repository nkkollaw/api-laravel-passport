# Foorious Laravel API

~~API documentation [here](https://documenter.getpostman.com/view/1657780/RW1ejGzL) in postman~~

## Table of Contents

- [Installation](#installation)
- [Dependencies](#dependencies)
- [Routes](#routes)
    - [Authentication](#authentication)
    - [Password Reset](#password-reset)


### Installation

#### 1. Configure web server (set document root, enable htaccess, etc.)

For instance, with Apache on Ubuntu, edit `/etc/apache2/apache2.conf`, and change:

```bash
<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
</Directory>
```

into:

```bash
<Directory /var/www/>
        Options -Indexes
        AllowOverride All
        Require all granted
</Directory>
```

Then, edit `/etc/apache2/sites-available/000-default.conf`, and change the document root from `/var/www/html/` to `/var/www/public/` (or `/var/www/html/public/`, or wherever you dir is).

Then, run:

```bash
service apache2 restart
```

#### 2. Install composer dependencies

Navigate into the document root, then run:

```bash
composer install
```

#### 3. Generate APP_KEY

```bash
php artisan key:generate
```

#### 4. Configure .env file

NOTE: `DB_HOST` should be set to `my_database` for `foorious-docker-lamp`, try `localhost` or `127.0.0.1` if running on bare metal)

```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=my_database
DB_USERNAME=username
DB_PASSWORD=password
```

#### 5. Run migrations

```bash
php artisan migrate
```

#### 6. Create client
```bash
php artisan passport:install
```

#### 7. Make sure we can write logs
```
chown -v -R www-data /var/www/storage/logs/
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
