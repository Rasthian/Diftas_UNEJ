<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    
</head>

<body>
    <header class="flex border-b-2 items-center h-[136px]">
        <div class='flex pl-5 pr-5 mx-auto w-[640px] sm:w-[640px] md:w-[760px]  lg:w-[1000px] xl:w-[1280px] 2xl:w-[1920px] md:text-2xl font-medium'>
            <img src="assets/images/Diftas_Warna.png" class="!flex sm:!flex md:!flex lg:!fWlex xl:!flex 2xl:!flex" alt="">
            <ul class='flex w-full justify-between items-center text-neutral-800 font-[Montserrat]'>
                <li class='hidden sm:block ml-5'>Diftas</li>
                <li class='hidden sm:block'>Admin</li>
            </ul>
        </div>
    </header>
    <div class="container h-screen bg-slate-100 min-w-full pb-5 pt-5">
    <?php if(empty($laporan)){
        echo "<h1 class='text-red-500 text-center font-bold text-4xl'>Tidak ada Laporan</h1>";
                            } ?>
        <?php foreach ($laporan as $laporan) : ?>
            <div class='flex justify-center items-center mt-7'>
                <div class='bg-white w-[900px] rounded-lg'>
                    <a href="?action=showLaporanAdmin&id=<?=$laporan['disId']?>">
                    <div class='header m-5'>
                        <p class='text-neutral-800 text-xl font-medium'><?= $laporan['nama'] ?></p>
                        <p class='text-neutral-800 text-xl font-normal'><?= $laporan['nama_fakultas'] ?> - <?= $laporan['waktu_pembuatan'] ?>
                        </p>
                    </div>
                    <div class="isi m-5">
                        <h2 class="text-xl font-bold mt-6">Diskusi</h2>
                        <p class='text-neutral-800 text-xl font-semibold'><?= $laporan['judul'] ?></p>
                        <div id="content-<?= $laporan['judul']; ?>">
                            <h2 class="text-xl text-red-600 font-bold mt-6">LAPORAN !!!!</h2>
                            <p class='text-neutral-800 text-xl font-normal'>
                                <?= strlen($laporan['keterangan']) > 200 ? substr($laporan['keterangan'], 0, 200) . '...' : $laporan['keterangan']; ?>
                            </p>
                        </div>
                        <?php if (strlen($laporan['keterangan']) > 100) : ?>
                            <button id="button-<?= $laporan['disId']; ?>" onclick="toggleReadMore(<?= $laporan['disId']; ?>)" class="text-gray-400">Baca Selengkapnya</button>
                        <?php endif; ?>
                    </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="#" onclick="confirmLogout()" class="bg-blue-400 p-2 relative left-[1600px] bottom-[270px] flex  mt-5 w-[150px] font-bold  text-white justify-center rounded-lg">
            Logout Admin
        </a>
        <script>
            function confirmLogout() {
                var confirmLogout = window.confirm("Apakah Anda yakin ingin logout?");
                    if (confirmLogout) {
                        window.location.href = '?action=logout';
                    } else {
                    }
                }
        </script>
    <footer class="flex border-b-2 bg-blue-400 items-center h-[200px]">
        <div class='flex pl-5 pr-5 mx-auto w-[640px] sm:w-[640px] md:w-[760px]  lg:w-[1000px] xl:w-[1280px] 2xl:w-[1920px] md:text-2xl font-medium placeholder justify-between'>
            <img src="assets/images/Diftas.png" class="!flex sm:!flex md:!flex lg:!fWlex xl:!flex 2xl:!flex w-[90px] h-[80px]" alt="">
            <div class='flex text-white '>
                <div class='flex flex-col justify-center items-center'>
                    <a href="?action=login" class='font-normal'>Login</a>
                    <a href="?action=rregister" class='font-normal'>Register</a>
                </div>
                <div class='flex flex-col ml-10 justify-center items-center'>
                    <p>Kontak:</p>
                    <a href="mailto: humas@unej.ac.id " class='font-normal'>humas@unej.ac.id</a>
                </div>
                <div class="flex flex-col ml-10 justify-center items-center">
                    <p>UNIVERSITAS JEMBER</p>
                    <p class='font-normal'>Jl Kalimantan No.37</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>