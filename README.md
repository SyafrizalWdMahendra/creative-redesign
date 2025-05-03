# Creative Redesign Website

Website resmi Creative Media dengan berbagai fitur untuk menampilkan informasi perusahaan, layanan, karya siswa, dan lainnya.

## Tech Stack

-   **Framework**: Laravel 12
-   **PHP Version**: 8.2.12
-   **Database**: MySQL
-   **Frontend**: (Tambahkan jika menggunakan framework frontend seperti Bootstrap/Tailwind dll)

## Installation Guide

### Prerequisites

-   PHP 8.2.12
-   Composer
-   MySQL
-   Node.js (jika menggunakan frontend tools)

### Installation Steps

1. Download folder zip.
2. Ekstrak folder zip.
3. Masuk ke folder yang sudah terekstrak dan buka terminal.
4. Instal dependensi yang diperlukan

```bash
    git clone [repository-url]
    cd creative-redesign
```

5. Atur lingkungan proyek

```bash
    cp .env.example .env
    php artisan key:generate
```

6. Atur penamaan database pada file .env
   DB_DATABASE=creative_redesign
   DB_USERNAME=root
   DB_PASSWORD=
7. Jalankan migration

```bash
    php artisan migrate
```

8. Simpan data akun ke database

```bash
    php artisan db:seed
```

9. Jalankan server laravel untuk menjalankan website

```bash
    php artisan serve
```

NOTE: Jika gambar tidak muncul ketikan perintah berikut

```bash
    rm -rf public/storage
    php artisan storage:link
```

Credential Akun:
email : care@creativemedia.id
password : creative_M.id
