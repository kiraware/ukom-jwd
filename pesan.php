<?php
    require 'connect.php';

    if (isset($_POST['submit'])) {
        $nama_pemesan = $_POST['nama_pemesan'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $nomor_identitas = $_POST['nomor_identitas'];
        $id_produk = $_POST['id_produk'];
        $tanggal_pesan = $_POST['tanggal_pesan'];
        $durasi_menginap = $_POST['durasi_menginap'];
        $termasuk_breakfast = $_POST['termasuk_breakfast'];

        $sql = "SELECT harga_produk FROM `produk` WHERE id_produk=$id_produk";
        $result = mysqli_query($con, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $harga_produk = $row['harga_produk'];
            }
        }
        $total_bayar = $harga_produk * $durasi_menginap;

        if ($durasi_menginap > 3) {
            $total_bayar = $total_bayar * 0.9;
        }
        if ($termasuk_breakfast) {
            $total_bayar = $total_bayar + 80000;
        }

        $sql = "INSERT INTO `pemesanan` (nama_pemesan,jenis_kelamin,nomor_identitas,id_produk,tanggal_pesan,durasi_menginap,termasuk_breakfast,total_bayar) VALUES('$nama_pemesan', '$jenis_kelamin', '$nomor_identitas', '$id_produk', '$tanggal_pesan', '$durasi_menginap', '$termasuk_breakfast', '$total_bayar')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            // echo 'Data inserted successfully';
            header('location:index.php');
        } else {
            echo 'Data inserted failed';
            die(mysqli_error($con));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesan Kamar Hotel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50">
    <?php
        include("header.php");
    ?>

    <section>
        <section class="max-w-6xl mx-auto p-4 shadow-lg rounded-lg my-16 flex items-center justify-center flex-col">
            <h1 class="font-bold text-2xl text-center text-slate-900">Pesan Kamar Hotel</h1>

            <form method="post" class="max-w-sm mt-8">
                <fieldset>
                    <div class="mb-6">
                        <label for="nama_pemesan" class="block mb-2 text-sm font-medium text-zinc-950">Nama Pemesan</label>
                        <input type="text" id="nama_pemesan" name="nama_pemesan"
                            class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Abdul Wahid" required />
                    </div>

                    <div class="mb-6">
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-zinc-950">Jenis
                            Kelamin</label>

                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input id="laki-laki" type="radio" checked value="L" name="jenis_kelamin"
                                    class="w-4 h-4 text-blue-600 bg-zinc-100 border-zinc-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-zinc-800 focus:ring-2 dark:bg-zinc-700 dark:border-zinc-600" />
                                <label for="laki-laki" class="ml-2 text-sm font-medium text-zinc-950">Laki Laki</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="perempuan" type="radio" value="P" name="jenis_kelamin"
                                    class="w-4 h-4 text-blue-600 bg-zinc-100 border-zinc-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-zinc-800 focus:ring-2 dark:bg-zinc-700 dark:border-zinc-600" />
                                <label for="perempuan" class="ml-2 text-sm font-medium text-zinc-950">Perempuan</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="nomor_identitas" class="block mb-2 text-sm font-medium text-zinc-950">Nomor
                            Identitas</label>
                        <input type="text" id="nomor_identitas" name="nomor_identitas"
                            class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="16 digit" required onchange="check16Digit(this)" />
                    </div>

                    <div class="mb-6">
                        <label for="id_produk" class="block mb-2 text-sm font-medium text-zinc-950">Tipe Kamar</label>
                        <select id="id_produk" name="id_produk"
                            class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected="true" disabled>Pilih Kamar</option>
                            <?php
                                $sql = "SELECT id_produk, nama_produk, harga_produk FROM `produk`";
                                $result = mysqli_query($con, $sql);

                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id_produk = $row['id_produk'];
                                        $nama_produk = $row['nama_produk'];
                                        $harga_produk = $row['harga_produk'];

                                        echo "<option value=\"$id_produk\" onclick=\"setHarga($harga_produk)\">$nama_produk</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="harga" class="block mb-2 text-sm font-medium text-zinc-950">Harga</label>
                        <input type="text" id="harga" name="harga"
                            class="bg-zinc-200 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Rp. 0" disabled />
                    </div>

                    <div class="mb-6">
                        <label for="tanggal_pesan" class="block mb-2 text-sm font-medium text-zinc-950">Tanggal Pesan</label>
                        <input type="date" id="tanggal_pesan" name="tanggal_pesan"
                            class="bg-zinc-200 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>

                    <div class="mb-6">
                        <label for="durasi_menginap" class="block mb-2 text-sm font-medium text-zinc-950">Durasi Menginap
                            <span class="text-blue-500">( Hari )</span></label>
                        <input type="number" id="durasi_menginap" name="durasi_menginap"
                            class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="0 hari" required onchange="checkNumber(this)" />
                    </div>

                    <div class="flex items-center mb-6">
                        <label for="termasuk_breakfast" class="mr-2 text-sm font-medium text-zinc-950">Termasuk Breakfast</label>
                        <input id="termasuk_breakfast" type="checkbox" value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            name="termasuk_breakfast" />
                    </div>

                    <div class="mb-6">
                        <label for="total_bayar" class="block mb-2 text-sm font-medium text-zinc-950">Total Bayar</label>
                        <input type="text" id="total_bayar" name="total_bayar"
                            class="bg-zinc-200 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Rp. 0" disabled />
                    </div>
                </fieldset>

                <div class="flex items-center justify-center gap-4">
                    <button type="button" onclick="hitungTotal()"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Hitung Total Bayar
                    </button>
                    <button type="submit" name="submit"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Simpan
                    </button>
                    <button type="reset"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Cancel
                    </button>
                </div>
            </form>
        </section>
    </section>

    <?php
        include("footer.php");
    ?>

    <script src="script.js"></script>
</body>

</html>