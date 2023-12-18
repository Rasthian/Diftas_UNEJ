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
            <ul class='flex w-full justify-between items-center text-neutral-800'>
                <li class='hidden sm:block ml-5'><a href="<?=BASEURL?>">Diftas</a></li>
                <li class='hidden sm:block'><a href="?action=profile">Akun</a></li>
            </ul>
        </div>
    </header>
    <div class="container min-w-full h-screen bg-slate-100 pb-5 ">
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
