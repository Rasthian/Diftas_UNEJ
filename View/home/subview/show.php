<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function autoExpandTextarea(element) {
            element.style.height = "auto";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>
</head>
<body class="font-[Montserrat]">
    <header class="flex border-b-2 items-center h-[136px]">
        <div class='flex pl-5 pr-5 mx-auto w-[640px] sm:w-[640px] md:w-[760px] lg:w-[1000px] xl:w-[1280px] 2xl:w-[1920px] md:text-2xl font-medium'>
            <img src="assets/images/Diftas_Warna.png" class="!flex sm:!flex md:!flex lg:!fWlex xl:!flex 2xl:!flex" alt="">
            <ul class='flex w-[1930px] justify-between items-center text-neutral-800 font-[Montserrat]'>
                <li class='hidden sm:block ml-5'><a href="<?= BASEURL ?>">Diftas</a></li>
                <li class='hidden sm:block'><a href="?action=profile">Akun</a></li>
            </ul>
        </div>
    </header>
    <div class="container min-w-full bg-slate-100">
        <div class='grid grid-cols-[1fr,3fr]'>
            <div class='kiri border-r'>
                <div class='flex justify-center font-medium  mt-20 '>
                    <a href="<?= BASEURL ?>">
                        <img src="assets/images/diskusi_home.png" alt="">
                    </a>
                    <a href="<?= BASEURL ?>" class="flex self-center ml-3">
                        <p class="text-blue-400">Diskusi</p>
                    </a>
                </div>
            </div>
            <div class='tengah border-r  flex flex-col justify-center mt-12 ml-4 mb-5'>
                <div class="bg-white w-[1300px] rounded-lg p-6 ">
                    <p class="text-netural-800 font-medium mt-2 text-xl"><?= $diskusi['nama'] ?></p>
                    <p class='text-neutral-800 text-xl font-normal'><?= $diskusi['f_nama'] ?> - <?= $diskusi['waktu_pembuatan'] ?></p>
                    <h1 class="text-2xl font-bold"><?= $diskusi['judul'] ?></h1>
                    <p class="mt-4"><?= $diskusi['isi'] ?></p>
                </div>
                <h2 class="text-xl font-bold mt-6">Komentar</h2>
                <form action="?action=diskusi&id=<?= $idDiskusi ?>" method="post">
                    <div class='textarea-container w-[900px] bg-white rounded-lg border flex items-end'>
                        <textarea 
                            name='komentar' 
                            class="h-[60px] bg-slate-100 rounded-[5px] p-2 m-2 w-[80%] resize-none"
                            placeholder="Apa yang ingin Anda komentari?" 
                            oninput="autoExpandTextarea(this)"
                            required
                        ></textarea>
                        <button type="submit" class='bg-blue-400 h-[50px] text-white p-2 rounded-lg mb-3'>Komentar</button>
                    </div>
                </form>
                <?php if (!empty($diskusi['komentar'])): ?>
                    <div class='w-[1300px] bg-white rounded-lg p-3 mt-4'>
                        <?php foreach ($diskusi['komentar'] as $komentar): ?>
                            <div class="mb-5 bg-white rounded-lg ">
                                <p class='text-neutral-800 text-xl font-medium'><?= $komentar['nama_komentar'] ?></p>
                                <p class="text-gray-500"><?= $komentar['nama'] ?> - <?= $komentar['waktu_komentar'] ?></p>
                                <p class="mt-2"><?= $komentar['isi'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
