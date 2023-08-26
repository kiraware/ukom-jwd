function setHarga(harga) {
    document.getElementById("harga").value = harga;
}

function hitungTotal() {
    harga = document.getElementById("harga").value;
    durasi = document.getElementById("durasi_menginap").value;
    breakfast = document.getElementById("termasuk_breakfast").checked;

    total = harga * durasi;
    if (durasi > 3) {
        total = total * 0.9
    }
    if (breakfast) {
        total = total + 80000
        document.getElementById("termasuk_breakfast").value = 1;
    }

    document.getElementById("total_bayar").value = total;
}