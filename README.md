# SIM-Barang

**Sistem Informasi Pengelolaan Inventaris Barang Jurusan**

# Identitas 
- Nama   : Retno Endah Pratiwi
- Kelas  : 3IB
- Matkul : Pemrograman Web
- Dosen  : Agus Setiawan, M.Kom
Praktikum Pemrograman Web – D3 Manajemen Informatika, POLSRI.

## Gambaran Proyek

SIM-Barang merupakan sistem informasi berbasis web yang digunakan untuk mengelola data inventaris barang di jurusan. Sistem ini ditujukan bagi admin atau petugas inventaris untuk mempermudah pencatatan, pemantauan, dan pengelolaan barang. Fitur yang direncanakan meliputi penambahan data barang, pengubahan data, penghapusan data, pencarian barang, dan pemantauan jumlah serta kondisi barang.

## Konsep HTTP

### Request

HTTP Request adalah permintaan yang dikirimkan oleh client, seperti browser, kepada server untuk meminta atau mengirimkan data.

Bagian utama HTTP Request meliputi:
- **Method:** Jenis permintaan, seperti GET, POST, PUT, dan DELETE.
- **URL:** Alamat sumber daya yang dituju.
- **Header:** Informasi tambahan tentang permintaan.
- **Body:** Data yang dikirimkan ke server, biasanya pada request POST atau PUT.

### Response

HTTP Response adalah balasan yang dikirimkan oleh server kepada client setelah menerima dan memproses request.

Bagian utama HTTP Response meliputi:
- **Status Code:** Kode yang menunjukkan hasil permintaan, misalnya 200 (OK), 404 (Not Found), dan 500 (Internal Server Error).
- **Header:** Informasi tentang respons, seperti jenis konten.
- **Body:** Isi respons yang dikirimkan, misalnya HTML, JSON, atau pesan kesalahan.

### Contoh Alur

1. Pengguna membuka halaman SIM-Barang melalui browser.
2. Browser mengirimkan HTTP Request ke server untuk meminta halaman `index.php`.
3. Server menjalankan PHP dan mengambil data dari database MySQL jika diperlukan.
4. Server mengirimkan HTTP Response yang berisi HTML ke browser.
5. Browser menampilkan halaman SIM-Barang kepada pengguna.

## Teknologi

Teknologi yang digunakan dalam pengembangan SIM-Barang:
- **HTML5:** Membuat struktur halaman web.
- **CSS3:** Mengatur tampilan dan tata letak halaman.
- **JavaScript:** Menambahkan interaksi pada halaman web.
- **PHP:** Memproses data dan logika aplikasi di sisi server.
- **MySQL:** Menyimpan dan mengelola data inventaris barang.
- **Git:** Mengelola versi kode program.

## Rencana Per Pertemuan

1. **Pertemuan 1:** Pengenalan proyek SIM-Barang dan persiapan lingkungan pengembangan.
2. **Pertemuan 2:** Pembuatan struktur halaman menggunakan HTML5.
3. **Pertemuan 3:** Pengaturan tampilan halaman menggunakan CSS3.
4. **Pertemuan 4:** Pengenalan JavaScript dan interaksi pengguna.
5. **Pertemuan 5:** Pembuatan database MySQL dan koneksi PHP.
6. **Pertemuan 6:** Implementasi fitur pengelolaan data inventaris barang.
7. **Pertemuan 7:** Pengujian aplikasi, perbaikan, dan dokumentasi proyek.

---

**Catatan:** Rencana pertemuan di atas merupakan contoh dan dapat disesuaikan dengan materi praktikum yang sebenarnya.