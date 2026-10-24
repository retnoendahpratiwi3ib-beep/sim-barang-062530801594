// ===== Ambil elemen =====
const form = document.getElementById('form-barang');
const inputKode = document.getElementById('kode');
const inputJumlah = document.getElementById('jumlah');
const inputHarga = document.getElementById('harga');
const pesanError = document.getElementById('pesan-error');
const inputCari = document.getElementById('cari');
const tabelBody = document.querySelector('#inventaris tbody');
const toast = document.getElementById('toast');

// ===== Validasi saat form di-submit =====
form.addEventListener('submit', function (event) {
  const kode = inputKode.value.trim();
  const jumlah = Number(inputJumlah.value);
  const harga = Number(inputHarga.value);

  // Aturan 1: kode harus "BRG-" diikuti angka
  if (!/^BRG-\d+$/.test(kode)) {
    event.preventDefault(); // batalkan kirim HANYA kalau salah
    tampilkanError('Kode barang harus diawali "BRG-" diikuti angka, contoh: BRG-006.');
    inputKode.focus();
    return;
  }

  // Aturan 2: jumlah harus angka positif (> 0)
  if (isNaN(jumlah) || jumlah <= 0) {
    event.preventDefault();
    tampilkanError('Jumlah barang harus berupa angka lebih dari 0.');
    inputJumlah.focus();
    return;
  }

  // Harga tidak boleh negatif
  if (isNaN(harga) || harga < 0) {
    event.preventDefault();
    tampilkanError('Harga satuan tidak boleh negatif.');
    inputHarga.focus();
    return;
  }

  // Lolos validasi: form dikirim ke simpan.php
  sembunyikanError();
  sessionStorage.setItem('berhasil', '1'); // penanda untuk toast
});

function tampilkanError(teks) {
  pesanError.textContent = teks;
  pesanError.hidden = false;
}

function sembunyikanError() {
  pesanError.textContent = '';
  pesanError.hidden = true;
}

// ===== Fitur 1: pencarian tabel real-time =====
inputCari.addEventListener('input', function () {
  const kataKunci = inputCari.value.toLowerCase();
  tabelBody.querySelectorAll('tr').forEach(function (tr) {
    const teks = tr.textContent.toLowerCase();
    tr.style.display = teks.includes(kataKunci) ? '' : 'none';
  });
});

// ===== Fitur 2: toast notifikasi =====
function tampilkanToast(pesan) {
  toast.textContent = pesan;
  toast.classList.add('tampil');
  setTimeout(function () {
    toast.classList.remove('tampil');
  }, 3000);
}

// Toast saat form lolos validasi: tampil di halaman ringkasan lewat index
// (jika kembali ke index.html setelah simpan)
if (sessionStorage.getItem('berhasil')) {
  sessionStorage.removeItem('berhasil');
  tampilkanToast('Data berhasil divalidasi dan dikirim!');
}