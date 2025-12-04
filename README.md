# 📚 Sistem Manajemen Perpustakaan (Library Management System)

Aplikasi manajemen perpustakaan sederhana namun powerful yang dibangun menggunakan **Laravel 12** dan **Bootstrap 5**. Proyek ini dibuat untuk menangani sirkulasi peminjaman buku, manajemen anggota, dan stok buku secara *real-time*.

## 📸 Screenshots
*(Simpan screenshot aplikasi di folder `public/screenshots/` dan tautkan di sini nanti)*
## 🚀 Fitur Utama
- **Manajemen Buku:** CRUD Buku dengan kategori dan stok otomatis.
- **Sirkulasi Peminjaman:**
  - Otomatis mengurangi stok saat dipinjam.
  - Otomatis menambah stok saat dikembalikan.
  - Penanda status (Dipinjam/Kembali/Terlambat) menggunakan Badge warna.
- **Validasi Bisnis:** Mencegah peminjaman jika stok habis atau user tidak valid.

## 🛠️ Teknologi yang Digunakan
- **Backend:** Laravel 12
- **Frontend:** Bootstrap 5 (Blade Templates)
- **Database:** MySQL

## 📦 Cara Install (Installation)

1. **Clone Repositori**
   ```bash
   git clone [https://github.com/username-anda/library-app.git](https://github.com/username-anda/library-app.git)
   cd library-app

2. Install Dependencies
composer install
npm install && npm run build

3. Setup Environment
Copy file .env.example menjadi .env.
Atur koneksi database di file .env.

4.Generate Key & Migrations
php artisan key:generate
php artisan migrate --seed
(Flag --seed akan mengisi database dengan data dummy buku & anggota)

5.Jalankan Server
php artisan serve

📄 Lisensi
Proyek ini bersifat open-source di bawah lisensi MIT license.

---

### 2. Tambahkan Screenshot (Penting!)

Visual itu sangat penting.
1.  Jalankan aplikasi (`php artisan serve`).
2.  Buka halaman daftar peminjaman dan halaman tambah peminjaman.
3.  Screenshot (Print Screen).
4.  Buat folder baru: `public/screenshots`.
5.  Simpan gambar di sana.
6.  Uncomment (hilangkan tanda ``) bagian screenshot di `README.md` di atas.

---

### 3. Push ke GitHub

Buka terminal di dalam folder proyek Anda, lalu jalankan perintah ini satu per satu:

```bash
# 1. Inisialisasi Git (jika belum)
git init

# 2. Masukkan semua file ke staging area
git add .

# 3. Commit pertama
git commit -m "First commit: Library Management System with Laravel 12"

# 4. Ganti 'main' dengan nama branch utama Anda (biasanya main atau master)
git branch -M main

# 5. Hubungkan ke repositori GitHub Anda
# (Buat repo baru dulu di github.com, lalu copy URL-nya)
git remote add origin https://github.com/USERNAME_ANDA/NAMA_REPO.git

# 6. Push kodingan
git push -u origin main
