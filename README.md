# Demasjid

Aplikasi untuk manajemen masjid

## Instalasi

- git clone git@github.com:pandigresik/easycrud-ci4.git
- composer install
- buat database
- copy env menjadi .env ==> cp env .env
- sesuaikan isi .env dengan settingan koneksi database anda
- php spark migrate --all
- php spark db:seed
- php spark key:generate

## Generator

- composer run swagger-doc, untuk generate doc swagger
- php spark make:crud wilayah --namespace App/Modules/Masjid --force, untuk generate CRUD admin **wilayah** adalah nama tabe, jadi nanti bisa disesuaikan

## Login

- Username **admin@admin.com**, password **admin@admin.com**

## Setting multiple domains dengan satu core aplikasi

- copy domains-example menjadi domains
- dalam folder contoh telah ada folder almuhajirin, copy file env menjadi .env dan sesuaikan dengan settingan aplikasi anda
- setting virtual host yang mengarah ke folder almuhajirin, didalam juga sudah ada contoh sederhana konfigurasi vhost untuk nginx

## Postman link

- [Postman Collection](https://www.getpostman.com/collections/3b1f23682fbf40fd101f)

## Server Requirements

This currently has the same requirements as CodeIgniter 4.

## Third Party Software Used

- [Bootstrap 5](https://getbootstrap.com/) for the CSS foundation
- [FontAwesome 5](https://fontawesome.com/) icons used in the admin
- [Alpine.js](https://alpinejs.dev/) handles interactivity within the page for the admin area.
- [htmx](https://htmx.org/) provides AJAX form handling, and more.
- [Tatter/Alerts](https://github.com/tattersoftware/codeigniter4-alerts) CodeIgniter library for simple user alerts.
