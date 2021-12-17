# Easycrud-ci4

Starter application with crud generator, adpoted from https://github.com/lonnieezell/Bonfire2.git

## Instalasi

- git clone git@github.com:pandigresik/easycrud-ci4.git
- composer install
- create database
- copy env menjadi .env ==> cp env .env
- setting configuration .env
- php spark migrate --all

## Custom template command

- You can override default template on folder app/Commands/Views/view and app/Commands/API/template

## Usage

- php spark make:crud <tablename> --namespace <your namespace> --force

## Setting multiple domains (example)

- copy domains-example to domains
- in example folder copy or rename file env to .env, adjust configuration in .env
- set your virtual host document root to that folders

## Server Requirements

This currently has the same requirements as CodeIgniter 4.

## Third Party Software Used

- [Bootstrap 5](https://getbootstrap.com/) for the CSS foundation
- [FontAwesome 5](https://fontawesome.com/) icons used in the admin
- [Alpine.js](https://alpinejs.dev/) handles interactivity within the page for the admin area.
- [htmx](https://htmx.org/) provides AJAX form handling, and more.
- [Tatter/Alerts](https://github.com/tattersoftware/codeigniter4-alerts) CodeIgniter library for simple user alerts.

## Support

- for professional support you can [chat me on +6285733659400](https://wa.me/6285733659400)
