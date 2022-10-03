
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone https://github.com/jassarillo/api_codigos_postales.git

Switch to the repo folder

    cd api_codigos_postales

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

    
In the database/ folder you can find next file for your database: codigos_postales.sql

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


***Important:

You can see the next code on serve. Please click here or cut and paste this url

https://jobs.devaap.com/api/get_datos/01210




