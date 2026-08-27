# Sistem Informasi Toko Buku

Aplikasi web sederhana untuk mengelola data buku menggunakan PHP native,
MySQL, HTML, dan CSS. Sistem ini ditujukan untuk admin dan memiliki fitur
login serta CRUD (Create, Read, Update, Delete) data buku.

## Fitur

- Login admin
- Proteksi halaman admin menggunakan session
- Menampilkan daftar buku
- Menambahkan buku baru
- Mengedit data buku
- Menghapus buku
- Mencetak daftar buku atau menyimpannya sebagai PDF melalui fitur print browser
- Logout admin

## Struktur Folder

```text
MyWeb/
├── admin/
│   └── project/
│       ├── edit.php       # Form dan proses mengedit buku
│       ├── hapus.php      # Proses menghapus buku
│       ├── index.php      # Dashboard utama admin
│       ├── menu.php       # Daftar buku dan tombol aksi
│       └── tambah.php     # Form dan proses menambah buku
├── assets/
│   ├── css/
│   │   ├── edit-data.css
│   │   ├── login.css
│   │   ├── tambah-data.css
│   │   └── tampil-data.css
│   └── img/               # Gambar latar halaman
├── auth/
│   ├── login.php          # Form dan proses login
│   └── logout.php         # Menghapus session dan keluar
├── config/
│   └── koneksi.php        # Koneksi ke database MySQL
└── Readme.md
```

## Persiapan Database

1. Jalankan **Apache** dan **MySQL** melalui XAMPP.
2. Buka phpMyAdmin.
3. Buat database dengan nama `toko2`.
4. Buat tabel `buku` dengan kolom berikut:

| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | `INT` | Primary key, auto increment |
| `judul` | `VARCHAR(255)` | Judul buku |
| `deskripsi` | `TEXT` | Deskripsi buku |
| `harga` | `INT` | Harga buku |

Contoh SQL:

```sql
CREATE DATABASE toko2;

USE toko2;

CREATE TABLE buku (
	 id INT AUTO_INCREMENT PRIMARY KEY,
	 judul VARCHAR(255) NOT NULL,
	 deskripsi TEXT NOT NULL,
	 harga INT NOT NULL
);
```

## Konfigurasi Koneksi

File `config/koneksi.php` menghubungkan aplikasi ke MySQL menggunakan:

- Host: `localhost`
- User: `root`
- Password: kosong
- Database: `toko2`

Jika konfigurasi MySQL berbeda, ubah nilai koneksi pada file tersebut.

## Cara Menjalankan

1. Simpan folder project di `C:\xampp\htdocs\MyWeb`.
2. Jalankan Apache dan MySQL di XAMPP.
3. Pastikan database dan tabel sudah dibuat.
4. Buka alamat berikut di browser:

	`http://localhost/MyWeb/auth/login.php`

5. Gunakan akun bawaan:

	- Username: `admin`
	- Password: `admin123`

## Penjelasan File Utama

### `auth/login.php`

Memulai session dan menampilkan form login. Data login diperiksa dengan
username `admin` dan password `admin123`. Jika benar, username disimpan ke
`$_SESSION['usn1']`, lalu admin diarahkan ke dashboard.

### `admin/project/index.php`

Menjadi halaman dashboard utama. Halaman ini hanya dapat dibuka jika session
`usn1` tersedia.

### `admin/project/menu.php`

Menampilkan seluruh data dari tabel `buku` menggunakan query `SELECT`. Setiap
baris memiliki tombol **Edit** dan **Hapus**. Tombol print menggunakan
`window.print()` dari JavaScript browser.

### `admin/project/tambah.php`

Menampilkan form untuk memasukkan `judul`, `desk`, dan `harga`. Saat tombol
Tambah diklik, PHP memeriksa apakah semua field sudah diisi. Jika valid, data
dimasukkan dengan query `INSERT` dan halaman diarahkan ke `menu.php`.

### `admin/project/edit.php`

Menerima ID buku melalui parameter URL `edit`, mengambil data dengan query
`SELECT`, lalu menampilkannya pada form. Saat disimpan, data diperbarui dengan
query `UPDATE`.

### `admin/project/hapus.php`

Menerima ID melalui parameter URL `hapus`, menghapus data dengan query
`DELETE`, kemudian mengarahkan kembali ke `menu.php`.

### `auth/logout.php`

Menghapus seluruh data session menggunakan `session_unset()` dan
`session_destroy()`, kemudian mengarahkan pengguna kembali ke halaman login.

## Catatan Pengembangan

Versi saat ini cocok untuk latihan PHP dasar. Untuk penggunaan nyata,
disarankan menambahkan:

- Prepared statement untuk mencegah SQL injection.
- Validasi dan sanitasi input yang lebih ketat.
- Password yang disimpan menggunakan `password_hash()`.
- Konfirmasi sebelum menghapus data.
- Validasi ID dan pengecekan error database.
- Pesan sukses dan gagal yang ditampilkan di halaman tujuan.