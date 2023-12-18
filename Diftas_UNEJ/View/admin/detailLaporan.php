<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    function konfirmasiHapus(diskusiId) {
        var konfirmasi = confirm("Apakah Anda yakin untuk menghapus diskusi ini?");
        if (konfirmasi) {
            window.location.href = "?action=deleteDiskusiAdmin&id=" + diskusiId;
        } else {
        }
    }
</script>
</head>
<body>
<header class="flex border-b-2 items-center h-[136px]">
        <div class='flex pl-5 pr-5 mx-auto w-[640px] sm:w-[640px] md:w-[760px]  lg:w-[1000px] xl:w-[1280px] 2xl:w-[1920px] md:text-2xl font-medium'>
            <img src="assets/images/Diftas_Warna.png" class="!flex sm:!flex md:!flex lg:!fWlex xl:!flex 2xl:!flex" alt="">
            <ul class='flex w-[1930px] justify-between items-center text-neutral-800 font-[Montserrat]'>
                <li class='hidden sm:block ml-5'>Diftas</li>
                <li class='hidden sm:block'>Admin</li>
            </ul>
        </div>
    </header>       
                    <a href="?action=adminPage" class='text-slate-500 m-5'>< Kembali ke homepage admin</a>
                    <div class="bg-white w-[1300px] rounded-lg p-6 ">
                    <p class="text-netural-800 font-medium mt-2 text-xl flex justify-between"><?php echo $result['nama'] ?> <a href="#" onclick="konfirmasiHapus(<?=$id?>)" class='text-center bg-red-500 w-60 h-[50px] border-white border-1 text-white p-2 rounded-full mb-3'>Hapus</a></p>
                    <p class='text-neutral-800 text-xl font-normal'><?php echo $result['waktu_pembuatan'] ?></p>
                    <h1 class="text-2xl font-bold mt-4"><?php echo $result['judul'] ?></h1>
                    <p class=""><?php echo $result['isi'] ?></p>
                    <?php foreach ($laporan as $laporanItem) : ?>
    <div class='flex justify-start items-center mt-7'>
        <div class='bg-white w-[900px] rounded-lg border-2 border-red-500'>
                <div class="isi m-1">
                    <h2 class="text-2xl text-red-600 font-bold mt-2">LAPORAN !!!!</h2>
                    <h2 class=" text-lg mb-2 font-semibold">by <?=$laporanItem['nama']?></h2>
                    <p class='text-neutral-800 text-xl font-normal'>
                        <?= strlen($laporanItem['keterangan']) > 200 ? substr($laporanItem['keterangan'], 0, 200) . '...' : $laporanItem['keterangan']; ?>
                    </p>
                </div>
                <?php if (strlen($laporanItem['keterangan']) > 100) : ?>
                    <button id="button-<?= $laporanItem['disId']; ?>" onclick="toggleReadMore(<?= $laporanItem['disId']; ?>)" class="text-gray-400 ml-5 mt-3">Baca Selengkapnya</button>
                <?php endif; ?>
         
        </div>
    </div>
<?php endforeach; ?>

                </div>
</body>
</html>