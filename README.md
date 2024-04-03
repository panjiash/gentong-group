# Test IT Programmer Tripilar Kreasi Digital

#### A. Requirement

##### 1. MySQL MariaDB Database

##### 2. PHP Versi 7 atau lebih

##### 3. Laravel 8

#### B. Buat Database

Database yang saya gunakan disini adalah MySQL dengan versi:

```
mysql  Ver 15.1 Distrib 10.4.32-MariaDB
```

Login ke mysql dan jalankan perintah berikut:

```
create database ptxyz;
```

Clone repository

```
git clone https://github.com/panjiash/gentong-group.git
```

Di dalam repo terdapat database (ptxyz.sql) yang akan di import untuk keperluan login ke aplikasi:

```
mysql -u ${username} -p ${password} ptxyz < /path/to/ptxyz.sql
```

#### C. Installasi

Setelah clone repository anda bisa jalankan perintah berikut untuk proses Installasi:

```
cd gentong-group
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Setelah dijalankan maka server aplikasi akan berjalan di port 8000
