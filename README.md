# CoreTI - Proyek Toko Online Komponen Komputer

CoreTI adalah proyek aplikasi web e-commerce fungsional yang dibangun menggunakan **PHP** prosedural dan **MySQL**. Aplikasi ini mensimulasikan toko online yang menjual komponen komputer, lengkap dengan fitur untuk pengguna dan panel admin untuk manajemen.
![Tampilan Halaman Checkout](https://user-images.githubusercontent.com/9180368/239890288-7a73a948-d368-4a11-8232-a2d05f32b845.png)
*(Anda bisa mengganti URL gambar di atas dengan URL screenshot Anda setelah diunggah ke GitHub)*
---

## Fitur Utama

Proyek ini terbagi menjadi dua bagian utama: halaman untuk pengguna (user) dan panel khusus untuk admin.

### Fitur Pengguna (User)
* **Autentikasi**: Pengguna dapat mendaftar dan masuk ke akun mereka.
* **Katalog Produk**: Menampilkan semua produk yang tersedia dengan gambar, nama, dan harga.
* **Pencarian Produk**: Fungsionalitas untuk mencari produk berdasarkan nama.
* **Keranjang Belanja**: Pengguna dapat menambah, melihat, memperbarui jumlah, dan menghapus produk dari keranjang.
* **Proses Checkout**: Formulir untuk memasukkan detail pengiriman dan melakukan pemesanan.
* **Riwayat Pesanan**: Pengguna dapat melihat semua pesanan yang telah mereka buat beserta statusnya.
* **Halaman Kontak**: Formulir untuk mengirim pesan kepada admin.

### Fitur Panel Admin
* **Dashboard Informatif**: Menampilkan ringkasan data seperti total pendapatan, jumlah pesanan, produk, dan pengguna.
* **Manajemen Produk (CRUD)**: Admin dapat menambah, melihat, mengedit, dan menghapus produk.
* **Manajemen Pesanan**: Melihat detail pesanan dari semua pengguna dan memperbarui status pembayaran (misalnya dari 'pending' menjadi 'completed').
* **Manajemen Pengguna**: Melihat daftar semua pengguna dan admin, serta dapat menghapus akun.
* **Kotak Masuk Pesan**: Membaca dan menghapus pesan yang dikirim oleh pengguna melalui halaman kontak.

---

## 💻 Teknologi yang Digunakan

* **Backend**: PHP
* **Database**: MySQL
* **Frontend**: HTML, CSS, JavaScript
* **Server Lokal (Rekomendasi)**: XAMPP

---

## 🚀 Cara Menjalankan Proyek Secara Lokal

Berikut adalah langkah-langkah untuk menjalankan proyek ini di komputer Anda:

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/YUDHNATA/CoreTI.git](https://github.com/YUDHNATA/CoreTI.git)
    ```

2.  **Setup Server**
    * Pindahkan folder proyek yang sudah di-clone ke dalam direktori `htdocs` pada instalasi XAMPP Anda.

3.  **Setup Database**
    * Jalankan XAMPP Control Panel, lalu start **Apache** dan **MySQL**.
    * Buka browser dan akses `http://localhost/phpmyadmin`.
    * Buat database baru dengan nama `shop_db`.
    * Pilih database `shop_db`, lalu klik tab **Import**.
    * Pilih file `shop_db.sql` yang ada di dalam folder proyek dan klik **Import**.

4.  **Konfigurasi Koneksi**
    * Buka file `config.php`. Pastikan detail koneksi sudah sesuai dengan pengaturan server lokal Anda (secara *default* untuk XAMPP biasanya sudah benar).

5.  **Jalankan Aplikasi**
    * Buka browser dan akses URL: `http://localhost/CoreTI/`
    * Aplikasi siap digunakan! Anda bisa mendaftar sebagai *user* baru atau sebagai *admin* untuk mengakses panel admin.
