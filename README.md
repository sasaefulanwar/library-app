# 📚 Sistem Manajemen Perpustakaan (Library Management System)

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![Status](https://img.shields.io/badge/Status-Completed-success?style=for-the-badge)

Aplikasi manajemen perpustakaan modern yang dibangun menggunakan **Laravel 12** dan **Bootstrap 5**. Proyek ini dirancang untuk mempermudah sirkulasi peminjaman buku, pengelolaan data anggota, serta manajemen stok buku secara *real-time* dan otomatis.

## 📸 Tampilan Aplikasi (Screenshots)

| Dashboard Utama | Peminjaman Buku |
|:---:|:---:|
| ![Dashboard](public/screenshots/dashboard.png) | ![Form Pinjam](public/screenshots/create.png) |

*(Pastikan Anda mengganti path gambar di atas dengan screenshot asli aplikasi Anda)*

## 🚀 Fitur Unggulan

### 1. 📊 Dashboard & Statistik
- Ringkasan jumlah buku, anggota aktif, dan buku yang sedang dipinjam.
- Tampilan kartu statistik yang interaktif.

### 2. 📖 Manajemen Buku (Inventory)
- **CRUD Lengkap:** Tambah, Edit, Hapus data buku.
- **Manajemen Stok Otomatis:**
  - Stok berkurang otomatis saat buku dipinjam.
  - Stok bertambah otomatis saat buku dikembalikan.
  - Mencegah peminjaman jika stok habis (0).

### 3. 👥 Manajemen Anggota
- Registrasi anggota baru.
- Validasi data (Email unik, format no telepon).
- Riwayat peminjaman per anggota.

### 4. 🔄 Sirkulasi Peminjaman
- **Pencatatan Transaksi:** Mencatat tanggal pinjam dan jatuh tempo (otomatis +7 hari).
- **Status Badge:** Indikator visual untuk status:
  - 🟡 *Dipinjam*
  - 🔴 *Terlambat* (Jika melewati due date)
  - 🟢 *Dikembalikan*
- **Validasi Bisnis:** Memastikan data valid sebelum transaksi terjadi.

### 5. 🎨 UI/UX Modern
- Menggunakan **Bootstrap 5**.
- Font **Poppins** untuk tampilan yang bersih.
- Komponen interaktif: Floating labels, Modal confirm, Alert notifications.

## 🛠️ Teknologi

- **Backend:** Laravel 12 (PHP 8.2+)
- **Frontend:** Blade Templates, Bootstrap 5, FontAwesome
- **Database:** MySQL / MariaDB

## 📦 Cara Instalasi (Local Setup)

Ikuti langkah ini untuk menjalankan proyek di komputer Anda:

1. **Clone Repositori**
   ```bash
   git clone [https://github.com/USERNAME-ANDA/library-app.git](https://github.com/USERNAME-ANDA/library-app.git)
   cd library-app
````

2.  **Install Dependencies**

    ```bash
    composer install
    npm install && npm run build
    ```

3.  **Konfigurasi Environment**

      - Duplikat file `.env.example` menjadi `.env`
      - Sesuaikan konfigurasi database:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=library_db
        DB_USERNAME=root
        DB_PASSWORD=
        ```

4.  **Generate Key & Migrasi Database**

    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```

    *(Perintah `--seed` akan mengisi database dengan data dummy untuk testing)*

5.  **Jalankan Server**

    ```bash
    php artisan serve
    ```

    Buka browser dan akses: `http://127.0.0.1:8000`

## 🤝 Kontribusi

Jika ingin berkontribusi, silakan *fork* repositori ini dan buat *Pull Request*.

## 📄 Lisensi

Proyek ini bersifat open-source di bawah lisensi [MIT License](https://opensource.org/licenses/MIT).
