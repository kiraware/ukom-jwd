<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tentang Kami</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50">
    <?php
        include("header.php");
    ?>

    <section class="min-h-screen">
        <figure class="relative w-full">
            <img src="img/living-room-2821x3537.jpg" alt="Zatel Hero" loading="lazy" class="object-cover" />
            <figcaption class="absolute left-0 right-0 top-1/4 mx-auto">
                <h2 class="font-bold text-7xl sm:text-9xl text-slate-50 text-center">Zatel</h2>
                <h3 class="font-semibold text-4xl text-slate-100 text-center">
                    Temukan Kenyamanan <br>
                    Dalam Keindahan
                </h3>
            </figcaption>
        </figure>

        <div class="max-w-6xl mx-auto p-4 my-16">
            <p class="font-medium text-lg sm:text-2xl text-center text-slate-900">
                Zatel adalah sebuah hotel yang menyediakan berbagai macam fasilitas
                untuk memberikan kenyamanan bagi anda. Anda dapat memilih kamar yang
                cocok bagi anda sehingga anda tidak perlu khawatir dan tentunya anda
                akan puas
            </p>
        </div>

        <div class="max-w-6xl p-4 mx-auto">
            <h2 class="text-lg sm:text-2xl font-semibold text-center text-slate-900">HUBUNGI KAMI</h2>
            <address class="not-italic text-xl text-center text-slate-700">
                Jl. Kapten Abdul Haq Gg. Masjid Albarokah No. 77, Kedamaian, Bandar
                Lampung 351452
            </address>
            <p class="font-medium text-xl text-center text-slate-700">Telp : 0821-8005-7777</p>
            <p class="font-medium text-xl text-center text-slate-700">customer@Zatel.com</p>
        </div>
    </section>

    <?php
        include("footer.php");
    ?>
</body>

</html>