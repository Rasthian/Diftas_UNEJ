
<?php
require_once 'config/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready
    </script>
</head>
<body>
    <header class="flex border-b-2 items-center h-[136px]">
        <div class='flex pl-5 pr-5 mx-auto w-[640px] sm:w-[640px] md:w-[760px]  lg:w-[1000px] xl:w-[1280px] 2xl:w-[1920px] md:text-2xl font-medium'>
        <h1><?php $username ?></h1>
            <img src="assets/images/Diftas_Warna.png" class="!flex sm:!flex md:!flex lg:!fWlex xl:!flex 2xl:!flex" alt="">
            <ul class='flex w-[1930px] justify-between items-center text-neutral-800 font-[Montserrat]'>
                <li class='hidden sm:block ml-5'><a href="<?=BASEURL?>">Diftas</a></li>
                <li class='hidden sm:block'><a href="akun">Akun</a></li>
            </ul>
        </div>
    </header>
    <div class="container min-w-full bg-slate-100 pb-5 font-[Montserrat]">
        <div class='grid grid-cols-[1fr,2fr,1fr]'>
            
            <div class='kiri border-r'>
                <div class='flex justify-center font-medium  mt-20 '>
                    <a href="<?= BASEURL ?>">
                        <img src="assets/images/diskusi_home.png" alt="">
                    </a>
                    <a href="<?= BASEURL ?>" class="flex self-center ml-3">
                        <p class="text-blue-400">Diskusi</p>
                    </a>
                </div>
                <div class='flex justify-center  mr-2 font-medium font-[Montserrat] mt-7'>
                    <a href="tugas">
                        <img src="assets/images/tugas_home.png" alt="">
                    </a>
                    <a href="tugas" class="flex self-center ml-3">
                        <p class="text-neutral-800">Tugas</p>
                    </a>
                </div>
            </div>
            <div class='tengah border-r '>
                <div class='flex justify-center mt-10'>
                    <a href="index.php?action=add-diskusi">
                        <div class=' w-[900px] h-[80px] bg-white rounded-lg flex items-center justify-center border  '>
                            <div class='bg-slate-100 w-[880px] flex items-center justify-start rounded-lg'>
                                <p class=' text-neutral-400 font-medium py-5 rounded p-5'>Apa yang ingin anda diskusikan?</p> 
                            </div>
                        </div>
                    </a>
                </div>
                <div class='mt-7 flex justify-end mr-7 '>
                    <div class=' w-[200px] h-[60px] bg-white rounded-lg flex items-center justify-evenly border'>
                        <select name="" id="fakultasDropdown">
                            <option value="">Fakultas</option>
                            <?php foreach ($fakultasList as $fakultas): ?>
                                <option value="<?= $fakultas['id'] ?>"><?$fakultas['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                </div>
                <?php foreach ($diskusis = ModelDiskusi::getAllDiskusi() as $diskusi): ?>
                <a href="index.php?action=diskusi&id=<?= $diskusi['id'];?>" class='flex justify-center items-center mt-7'>
                    <div class='bg-white w-[900px] rounded-lg'>
                        <div class='header m-5'>
                            <p class='text-neutral-800 text-xl font-medium'><?= $diskusi['nama']?></p>
                            <p class='text-neutral-800 text-xl font-normal'><?= $diskusi['waktu_pembuatan']?></p>
                        </div>
                        <div class="isi m-5">
                            <p class='text-neutral-800 text-xl font-bold'><?= $diskusi['judul']?></p>
                            <p class='text-neutral-800 text-xl font-normal'><?= $diskusi['isi']?></p>
                        </div>
                    </div>
                </a>
                <?php endforeach ;?>
            </div>
            <div class='kanan'>
                <div class='flex justify-center font-medium  mt-20 '>
                    <a href="<?= BASEURL ?>">
                        <img src="assets/images/diskusku.png" alt="">
                    </a>
                    <a href="<?= BASEURL ?>" class="flex self-center ml-3">
                        <p class="text-netural-800">DiskusKu</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php include '../footer.php'; ?>
    <script>
    $(document).ready(function () {
        $('#fakultasDropdown').change(function () {
            var selectedFakultas = $(this).val();
            window.location.href = 'index.php?action=filter_diskusi&fakultas=' + selectedFakultas;
        });
    });
    </script>
</body>
</html>
