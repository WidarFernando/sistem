# 📦 Desi Collection - Sistem Informasi Manajemen Inventori

Sistem Informasi Manajemen Inventori **Desi Collection** berbasis web yang dibangun menggunakan **CodeIgniter 3**, **PHP**, **MySQL**, dan **SB Admin 2 (Bootstrap 4)**. Aplikasi ini dirancang untuk mengelola pencatatan transaksi barang masuk, barang keluar, filtering data, serta integrasi logging/debugging.

---

## 🚀 Fitur Utama

- **Manajemen Barang Masuk (CRUD):** Tambah, lihat, ubah, dan hapus data transaksi barang masuk.
- **Pencarian & Filtering:** Pencarian data barang secara dinamis berdasarkan kata kunci (*server-side GET query*).
- **Sanitasi Data & Keamanan:** Penggunaan `html_escape()` untuk mencegah serangan *Cross-Site Scripting (XSS)* serta enkapsulasi validasi form.
- **Debugging & Error Handling:** 
  - Server-side log menggunakan PHP Console log.
  - Client-side error tracking dengan penanganan pengecualian (*try-catch block*) pada JavaScript.
- **Antarmuka Responsif:** Menggunakan *template* SB Admin 2 berbasis Bootstrap 4.

---

## 🛠️ Teknologi & Pustaka

* **Backend:** PHP (v7.4+ / v8.x) & Framework CodeIgniter 3
* **Database:** MySQL / MariaDB
* **Frontend:** HTML5, CSS3, JavaScript (ES6), jQuery, Bootstrap 4, FontAwesome 5
* **Version Control:** Git & GitHub

---

## 📂 Struktur Modul Utamanya

```text
application/
├── controllers/
│   └── BarangMasuk.php          # Logika bisnis & aturan validasi form
├── models/
│   └── PenggajianModel.php      # Interaksi database & query builder
└── views/
    └── admin/
        ├── barangMasuk.php      # View tabel utama & script debugging
        ├── formTambahBarang.php # Form pendaftaran barang masuk
        └── formUpdateBarang.php # Form pembaruan data barang

![TAMPILAN DASHBOARD](https://github.com/WidarFernando/sistem/blob/2590ce4222a8ce0b151573212135215ece5eff1a/assets/img/hal1.png)
