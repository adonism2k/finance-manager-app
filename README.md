<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h1 align="center">
  Personal Finance Manager (PFM)
</h1>

Ini merupakan aplikasi untuk mengelola keuangan pribadi. Aplikasi ini dibuat untuk belajar mengimplementasikan Clean Architecture dan Repository Design Pattern serta mempertahankan Prinsip SOLID pada PHP yang mana setiap Class hanya punya 1 tujuan atau pekerjaan. 

## 🧾 Requirements

1.  **Docker**
2.  **PHP** >= 8.0.2
3.  **Laravel** >= 9.19

## 🔱 Reference

- [Github Link](https://github.com/adonism2k/finance-manager-app)
- [API Collection](https://www.getpostman.com/collections/06e64b36f05d66cefccf)
- [UI Design](https://xd.adobe.com/view/a141ddbb-e6d8-4d25-9d43-63f219deef39-f412/)

## 🚀 Quick start

1. **Clone the repository**

    ```shell
    git clone https://github.com/adonism2k/finance-manager-app
    cd finance-manager-app
    git checkout finance-manager-app
    ```

2. **Starting up**

    ```shell
    ./vendor/bin/sail up -d
    ./vendor/bin/sail artisan migrate:refresh --seed
    ```

3. **Open the code and start customizing!**

   Your API is now running at http://localhost:8000/api/.

## 📦 Used packages

- [laravel/sail](https://laravel.com/docs/9.x/sail)
- [laravel/scout](https://laravel.com/docs/9.x/scout)
- [laravel/pint](https://laravel.com/docs/9.x/pint)
- [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth)
- [pestphp/pest](https://github.com/pestphp/pest)
- [meilisearch](https://www.meilisearch.com/)
