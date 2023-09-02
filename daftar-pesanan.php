<?php
    require 'connect.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Pesanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50">
    <?php
        include("header.php");
    ?>

    <section class="min-h-screen">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID Pemesanan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Pemesan 
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nomor Identitas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email Pemesan 
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipe Kamar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Pesan 
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Durasi Menginap
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Breakfast
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Bayar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT id_pemesanan, email_pemesan, nama_pemesan, jenis_kelamin, nomor_identitas, id_produk, tanggal_pesan, durasi_menginap, termasuk_breakfast, total_bayar FROM `pemesanan`";
                        $result = mysqli_query($con, $sql);
                        
                        $sql2 = "SELECT id_produk, nama_produk FROM `produk`";
                        $result2 = mysqli_query($con, $sql2);
                        $nama_kamar = array();

                        if ($result2) {
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $id_produk = $row2['id_produk'];
                                $nama_produk = $row2['nama_produk'];
                                $nama_kamar[$id_produk] = $nama_produk;
                            }
                        }

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id_pemesanan = $row['id_pemesanan'];
                                $email_pemesan = $row['email_pemesan'];
                                $nama_pemesan = $row['nama_pemesan'];
                                $jenis_kelamin = $row['jenis_kelamin'];
                                $nomor_identitas = $row['nomor_identitas'];
                                $id_produk = $row['id_produk'];
                                $tanggal_pesan = $row['tanggal_pesan'];
                                $durasi_menginap = $row['durasi_menginap'];
                                $termasuk_breakfast = $row['termasuk_breakfast'];
                                $total_bayar = $row['total_bayar'];

                                echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">';
                                echo "<th scope=\"row\" class=\"px-6 py-4 font-medium text-gray-900  whitespace-nowrap dark:text-white\"> $id_pemesanan </th>";
                                echo "<td class=\"px-6 py-4\">$nama_pemesan</td>";
                                echo "<td class=\"px-6 py-4\">$jenis_kelamin</td>";
                                echo "<td class=\"px-6 py-4\">$nomor_identitas</td>";
                                echo "<td class=\"px-6 py-4\">$email_pemesan</td>";
                                echo "<td class=\"px-6 py-4\">$nama_kamar[$id_produk]</td>";
                                echo "<td class=\"px-6 py-4\">$tanggal_pesan</td>";
                                echo "<td class=\"px-6 py-4\">$durasi_menginap</td>";
                                echo "<td class=\"px-6 py-4\">$termasuk_breakfast</td>";
                                echo "<td class=\"px-6 py-4\">$total_bayar</td>";
                                '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <?php
        include("footer.php");
    ?>

</body>

</html>