<?php
require_once 'config/conn.php';
require_once 'controller/diskusiController.php';
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
<body class='font-[Montserrat]'>
    <header class="flex border-b-2 items-center h-[136px]">
        <div class='flex pl-5 pr-5 mx-auto w-[640px] sm:w-[640px] md:w-[760px]  lg:w-[1000px] xl:w-[1280px] 2xl:w-[1920px] md:text-2xl font-medium'>
            <img src="assets/images/Diftas_Warna.png" class="!flex sm:!flex md:!flex lg:!fWlex xl:!flex 2xl:!flex" alt="">
            <ul class='flex w-[1930px] justify-between items-center text-neutral-800'>
                <li class='hidden sm:block ml-5'><a href="<?=BASEURL?>">Diftas</a></li>
                <li class='hidden sm:block'><a href="akun">Akun</a></li>
            </ul>
        </div>
    </header>
    <div class="container min-w-full bg-slate-100 pb-5 ">
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
                <div class='flex justify-center  mr-2 font-medium mt-7'>
                    <a href="tugas">
                        <img src="assets/images/tugas_home_hitam.png" alt="">
                    </a>
                    <a href="tugas" class="flex self-center ml-3">
                        <p class="text-neutral-800">Tugas</p>
                    </a>
                </div>
            </div>
            <div class='tengah border-r  flex justify-center mt-20 '>
                <form action="?action=add-diskusi" method="post">
                    <div class=' w-[900px] bg-white rounded-lg border border-blue-400'>
                        <div class='m-5 flex flex-col '>
                            <label for="judul" class='text-neutral-800 text-4xl font-medium]'>Judul Diskusi</label>
                            <input type="text" name='judul' class=" h-[60px] bg-slate-100 rounded-[5px] p-2 mt-3" placeholder="Apa yang ingin di diskusikan?" required > 
                            <label for="judul" class='text-neutral-800 text-4xl font-medium] mt-5'>Isi Diskusi</label>
                            <textarea type="text" name='isi' class=" bg-slate-100 rounded-[5px] p-2 mt-3" placeholder="Apa yang ingin di diskusikan?" required ></textarea>
                            <input type="submit" value='Posting' class='border rounded-lg h-16 bg-blue-400 mt-5 text-white text-2xl font-medium'>
                        </div>
                    </div>
                </form> 
            </div> 
        </div>
    </div>
</body>
</html>
