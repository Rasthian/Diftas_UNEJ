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
            <ul class='flex w-[1930px] justify-between items-center text-neutral-800 font-[Montserrat]'>
                <li class='hidden sm:block ml-5'>Diftas</li>
                <li class='hidden sm:block'>Admin</li>
            </ul>
        </div>
    </header>
    <div class="container bg-slate-100 min-w-full pb-5 pt-5">
        <?php foreach ($diskusi as $diskusi) : ?>
            <a href="#" class='flex justify-center items-center mt-7'>
                <div class='bg-white w-[900px] rounded-lg'>
                    <div class='header m-5'>
                        <p class='text-neutral-800 text-xl font-medium'><?= $diskusi['nama'] ?></p>
                        <p class='text-neutral-800 text-xl font-normal'><?= $diskusi['f_nama'] ?> - <?= $diskusi['waktu_pembuatan'] ?>
                        </p>
                    </div>
                    <div class="isi m-5">
                        <p class='text-neutral-800 text-xl font-bold'><?= $diskusi['judul'] ?></p>
                            <div id="content-<?= $diskusi['dis_id']; ?>">
                                <p class='text-neutral-800 text-xl font-normal'>
                                    <?= strlen($diskusi['isi']) > 200 ? substr($diskusi['isi'], 0, 200) . '...' : $diskusi['isi']; ?>
                                </p>
                            </div>
                        <?php if (strlen($diskusi['isi']) > 100) : ?>
                            <button id="button-<?= $diskusi['dis_id']; ?>" onclick="toggleReadMore(<?= $diskusi['dis_id']; ?>)" class="text-gray-400">Baca Selengkapnya</button>
                        <?php endif; ?>
                    </div>
                </div>
            </a> 
        <?php endforeach; ?>
    </div>
</body>
</html>