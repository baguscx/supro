
# Supro - Web Pengajuan Proposal

Project berfungsi untuk melakukan pengajuan inovasi proposal. Dibuat oleh [Bagus Cahyono](https://github.com/baguscx/). Jangan lupa beri ⭐ ya!




## Tech Stack
[![My Skills](https://skillicons.dev/icons?i=html,css,js,bootstrap,php,laravel)](https://skillicons.dev)
## Screenshots

![App Screenshot](https://i.ibb.co.com/CPDVV4W/Screenshot-2024-09-27-224427.png)
## Features

- Login
- Register
- Pengajuan Proposal
- Konfirmasi Proposal
- Edit Profile
- Edit Pengguna



## Installation
Tools yang dibutuhkan:
- Git
- Composer
- Laragon PHP 8+
- Vscode

Clone dan Setup
```bash
$ git clone git@github.com:baguscx/supro.git
$ cd supro
$ cp .env.example .env
```
Buat & sesuaikan nama databasenya didalam .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

Generate Application Key
```bash
$ php artisan key:generate
```

Jalankan Migrasi Database
```bash
$ php artisan migrate
```

Jalankan Migrasi Database
```bash
$ php artisan migrate
```

Jalankan Server Pengembangan
```bash
$ php artisan serve
```

Clear Cache (Opsional)  
Kadang-kadang, ketika mengubah file .env atau mengedit konfigurasi, Laravel mungkin masih menggunakan data cache. Untuk memastikan cache bersih, Anda bisa menjalankan perintah berikut:

Untuk membersihkan cache konfigurasi:
```bash
$ php artisan config:clear
```
Untuk membersihkan route cache:
```bash
$ php artisan route:clear
```
Untuk membersihkan cache view:
```bash
$ php artisan view:clear
```
Untuk membersihkan semua cache:
```bash
$ php artisan cache:clear
```
