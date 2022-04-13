
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## About Project

Simple project from [Laravel Daily](https://laraveldaily.com/test-junior-laravel-developer-sample-project/) for testing my junior skills.

## Features
- ✅ MVC
- ✅ Auth
- ✅ CRUD and Resource Controllers
- ✅ Eloquent and Relationships
- ✅ Database migrations and seeds
- ✅ Form Validation using Form Requests
- ✅ File management using Traits
- ✅ Basic Tailwind front-end
- ✅ Pagination

## Extra tasks
- ✅ Tests with PHPUnit
- ✅ Email notification using Laravel Notification
- ✅ Multi-language

## Installation
```bash
git clone https://github.com/ryczek02/laravel-minicrm.git
cd laravel-minicrm
npm install
npm run dev
composer install
```
Rename .env.example to .env (and configure database and SMTP for mailing)
```bash
php artisan migrate:fresh
php artisan key:generate
composer test
php artisan serve
```
### Mailing
Uncomment these lines in app/Http/Controllers/CompanyController.php and configure SMTP in .env
```php
Auth::user()->notify(new NewCompanyNotifcation([
    'name' => $company->name,
    'email' => $company->email,
    'website' => $company->website
]));
```


## License

The project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
