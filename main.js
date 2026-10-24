const form = document.querySelector("form");

form.addEventListener("submit", function (e) {
  const kode = document.getElementById("kode").value.trim();
  const jumlah = Number(document.getElementById("jumlah").value);

  // Validasi kode: harus BRG- diikuti angka
  if (!/^BRG-\d+$/.test(kode)) {
    e.preventDefault();
    alert("Kode barang harus diawali BRG- diikuti angka, contoh: BRG-001");
    return;
  }

  // Validasi jumlah: harus angka lebih dari 0
  if (isNaN(jumlah) || jumlah <= 0) {
    e.preventDefault();
    alert("Jumlah barang harus berupa angka lebih dari 0");
    return;
  }
  // Lolos validasi: tampilkan toast
  e.preventDefault();   // sementara, supaya halaman tidak pindah
  const toast = document.getElementById("toast");
  toast.classList.add("tampil");
  setTimeout(function () {
    toast.classList.remove("tampil");
  }, 3000);
});
// ===== FITUR PENCARIAN =====
const inputCari = document.getElementById("cari");
const barisTabel = document.querySelectorAll("tbody tr");

inputCari.addEventListener("input", function () {
  const kataKunci = inputCari.value.toLowerCase();

  barisTabel.forEach(function (baris) {
    const teksBaris = baris.textContent.toLowerCase();

    if (teksBaris.includes(kataKunci)) {
      baris.style.display = "";      // tampilkan
    } else {
      baris.style.display = "none";  // sembunyikan
    }
  });
});