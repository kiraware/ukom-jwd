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

            <form class="max-w-sm mt-8">
                <div class="mb-6">
                    <label for="nama" class="block mb-2 text-sm font-medium text-zinc-950">Nama Pemesan</label>
                    <input type="text" id="nama" name="nama"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Abdul Wahid" required />
                </div>

                <div class="mb-6">
                    <label for="jenis-kelamin" class="block mb-2 text-sm font-medium text-zinc-950">Jenis
                        Kelamin</label>

                    <div class="flex">
                        <div class="flex items-center mr-4">
                            <input id="laki-laki" type="radio" checked value="" name="jenis-kelamin"
                                class="w-4 h-4 text-blue-600 bg-zinc-100 border-zinc-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-zinc-800 focus:ring-2 dark:bg-zinc-700 dark:border-zinc-600" />
                            <label for="laki-laki" class="ml-2 text-sm font-medium text-zinc-950">Laki Laki</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input id="perempuan" type="radio" value="" name="jenis-kelamin"
                                class="w-4 h-4 text-blue-600 bg-zinc-100 border-zinc-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-zinc-800 focus:ring-2 dark:bg-zinc-700 dark:border-zinc-600" />
                            <label for="perempuan" class="ml-2 text-sm font-medium text-zinc-950">Perempuan</label>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="nomor-identitas" class="block mb-2 text-sm font-medium text-zinc-950">Nomor
                        Identitas</label>
                    <input type="text" id="nomor-identitas" name="nomor-identitas"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="16 digit" required onchange="check16Digit(this)" />
                </div>

                <div class="mb-6">
                    <label for="tipe-kamar" class="block mb-2 text-sm font-medium text-zinc-950">Tipe Kamar</label>
                    <select id="tipe-kamar"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="standar">Standar</option>
                        <option value="deluxe">Deluxe</option>
                        <option value="executive">Family</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="harga" class="block mb-2 text-sm font-medium text-zinc-950">Harga</label>
                    <input type="text" id="harga" name="harga"
                        class="bg-zinc-200 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Rp. 0" disabled />
                </div>

                <div class="mb-6">
                    <label for="tanggal" class="block mb-2 text-sm font-medium text-zinc-950">Tanggal Pesan</label>
                    <input type="date" id="tanggal" name="tanggal"
                        class="bg-zinc-200 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>

                <div class="mb-6">
                    <label for="durasi" class="block mb-2 text-sm font-medium text-zinc-950">Durasi Menginap
                        <span class="text-blue-500">( Hari )</span></label>
                    <input type="text" id="durasi" name="durasi"
                        class="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="0 hari" required onchange="checkNumber(this)" />
                </div>

                <div class="flex items-center mb-6">
                    <label for="breakfast" class="mr-2 text-sm font-medium text-zinc-950">Termasuk Breakfast</label>
                    <input id="breakfast" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        name="breakfast" />
                </div>

                <div class="mb-6">
                    <label for="total-bayar" class="block mb-2 text-sm font-medium text-zinc-950">Total Bayar</label>
                    <input type="text" id="total-bayar" name="total-bayar"
                        class="bg-zinc-200 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Rp. 0" disabled />
                </div>

                <div class="flex items-center justify-center gap-4">
                    <button
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Hitung Total Bayar
                    </button>
                    <button type="submit"
                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Simpan
                    </button>
                    <button
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