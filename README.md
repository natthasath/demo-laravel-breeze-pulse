# 🎉 DEMO Laravel Breeze

Laravel Pulse is a comprehensive toolkit for Laravel developers that provides monitoring, debugging, and performance insights into applications. It offers real-time alerts, detailed metrics, and advanced error tracking to ensure your Laravel applications run smoothly and efficiently.

![version](https://img.shields.io/badge/version-1.0-blue)
![rating](https://img.shields.io/badge/rating-★★★★★-yellow)
![uptime](https://img.shields.io/badge/uptime-100%25-brightgreen)

### 🚀 Setup

- Create Project

```shell
composer create-project laravel/laravel example-app
```

- Install Package

```shell
composer require laravel/pulse
```

- Configure Environment

```shell
cp .env.example .env
```

- Vendor Publish

```shell
php artisan vendor:publish --provider="Laravel\Pulse\PulseServiceProvider"
php artisan vendor:publish --tag=pulse-dashboard
```

- Migrate

```shell
php artisan migrate
```

### 🏆 Run

- [http://localhost:8000/](http://localhost:8000/) username : `admin` password : `admin`

```shell
php artisan serve
```
