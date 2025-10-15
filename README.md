--------------------- **Tes Programmer Diskominfo DIY – Bagian A** ---------------------
Database Project: “sekolahku”

Repository ini berisi script SQL untuk pembuatan dan pengujian database sederhana bernama sekolahku, yang digunakan dalam Tes Tenaga Ahli Programmer Diskominfo DIY (Bagian A).
Seluruh langkah dan query ditulis agar mudah dijalankan menggunakan XAMPP / phpMyAdmin / MySQL CLI.

**Struktur Project**
tes-programmer-diskominfo/
│
├── database.sql   ← berisi seluruh script SQL (CREATE, INSERT, dan SELECT)
└── README.md      ← dokumentasi proyek

**Cara Menjalankan Project**
1. Persiapan Awal

Pastikan kamu sudah menginstal:

XAMPP atau MySQL Server

phpMyAdmin (opsional)

Text editor (VS Code, dll)

2. Buat Folder Project
mkdir tes-programmer-diskominfo
cd tes-programmer-diskominfo
code .

3. Jalankan Script SQL

Buka phpMyAdmin atau MySQL CLI

Jalankan seluruh isi file database.sql

⚠️ **Jika muncul error #1007** - Can't create database 'sekolahku'; database exists,
hapus dulu database lama:

DROP DATABASE sekolahku;

lalu jalankan ulang script.

**Isi File database.sql**
1. Membuat Database
CREATE DATABASE sekolahku;
USE sekolahku;

2. Membuat Tabel
a. users

Menyimpan data siswa.

Field	Type	Keterangan
id	INT	Primary Key
name	VARCHAR(100)	Nama siswa
gender	ENUM('L','P')	Jenis kelamin
birth_date	DATE	Tanggal lahir
b. courses

Menyimpan daftar mata kuliah dan data mentor.

c. userCourse

Tabel relasi antara siswa dan mata kuliah.

**Tools yang Digunakan**

MySQL / MariaDB (via XAMPP)

phpMyAdmin

Visual Studio Code

--------------------- **Tes Programmer Diskominfo DIY – Bagian B** ---------------------

Terdapat pada Sub Folder Repositori ini dengan nama sekolahku-app

**Lisensi**

Proyek ini bersifat open-source dan dapat digunakan untuk keperluan belajar atau pengujian teknis.
Tidak ada dependensi eksternal yang digunakan.

**Kontributor**

Leonardo Septa
– Front-End & Web Developer –
Diskominfo DIY – Tes Programmer
