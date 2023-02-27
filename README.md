
# 💰 vrestaurant - Restaurant Reservations

Restauran reservations and landing page management system. Powered by laravel 9, pato template and coreui template. 


## 📸 Showcase

<p align="center">
<img src="./public/assets/demo.gif" width="600"><br>
</p>


## ⚡ Features

- Reservation
- Landing Page CMS
- Analytical Reservations Dashboard


## 🚀 Ship vrestaurant

vrestaurant require PHP >= 8.0.

Simply you can clone this repository:

```bash
git clone https://github.com/vantanto/vrestaurant.git
cd vrestaurant
```

Install dependencies using composer

```bash
composer install
```

Copy and Setup database in `.env` file

```bash
cp .env.example .env
```

Generate key & Run migration, seeding & Start local developement

```bash
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

You can now access the server at http://localhost:8000

Optional Reservations Seeder with 1.000 dummy data for Analytical Reservation Dashboard 

```bash
php artisan db:seed ReservationsSeeder
```

> **📃**
> View more documentation in <a href="https://vantanto.github.io/pages/documentation/vrestaurant.html" target="_blank">here</a>.

## 📝 Credit

#### Special Thanks
- [Laravel](https://laravel.com/)
- [Pato](https://github.com/technext/pato/)
- [CoreUI](https://coreui.io/)

This project is [MIT](https://github.com/vantanto/vrestaurant/blob/master/LICENSE) licensed.