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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function loadComments() {
            var diskusiId = <?php echo $id; ?>;
            $.ajax({
                url: '?action=showCommentRealTime&id=' + diskusiId,
                method: 'GET',
                data: {
                    id: diskusiId
                },
                success: function(response) {
                    // Update the comments container with the new comments
                    $('#komentar-container').html(response);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        $(document).ready(function() {
            loadComments();
            setInterval(function() {
                loadComments();
            }, 3000);
        });
    </script>
    
</head>

<body class="font-[Montserrat]">
    <header class="flex border-b-2 items-center h-[136px]">
        <div class='flex pl-5 pr-5 mx-auto w-[640px] sm:w-[640px] md:w-[760px] lg:w-[1000px] xl:w-[1280px] 2xl:w-[1920px] md:text-2xl font-medium'>
            <img src="assets/images/Diftas_Warna.png" class="!flex sm:!flex md:!flex lg:!fWlex xl:!flex 2xl:!flex" alt="">
            <ul class='flex w-full justify-between items-center text-neutral-800 font-[Montserrat]'>
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

                <?php
                if ($result['user_id'] == $_SESSION['session_id']) {
                    echo "<div class='flex justify-center mr-2 font-medium mt-7'>
            <a href='#' onclick='confirmDelete({$result['id']})' class='w-12'>
                <img class='w-10' src='assets/images/delete.png' alt=''>
            </a>
            <a href='#' onclick='confirmDelete({$result['id']})' class='flex self-center ml-3'>
                <p class=''>hapus</p>
            </a>
        </div>";
                } else {
                    echo "";
                }
                ?>

                <script>
                    function confirmDelete(diskusiId) {
                        var confirmDelete = confirm("Apakah Anda yakin akan menghapus diskusi ini?");
                        if (confirmDelete) {
                            window.location.href = '?action=deleteDiskusi&id=' + diskusiId;
                        }
                    }
                </script>

   

            </div>
            <div class='tengah border-r  flex flex-col justify-center mt-12 ml-4 mb-5'>
                <div class="bg-white w-[1300px] rounded-lg p-6 ">
                    <p class="text-netural-800 font-medium mt-2 text-xl flex justify-between"><?php echo $result['nama'] ?>  <a class=" mr-10 bg-white font-bold text-center w-32 h-[30px] border-2 text-red-500 bord border-red-500 rounded-lg" href="?action=showLaporan&id=<?= $id ?>"> Laporkan</a></p>
                   
                    <p class='text-neutral-800 text-xl font-normal'><?php echo $result['waktu_pembuatan'] ?></p>
                    <h1 class="text-2xl font-bold mt-4"><?php echo $result['judul'] ?></h1>
                    <p class=""><?php echo $result['isi'] ?></p>
                </div>

                <h2 class="text-xl font-bold mt-6">Komentar</h2>
                <form action="?action=addKomentar&id=<?php echo $id ?>" method="post">
                    <div class='textarea-container w-[900px] bg-white rounded-lg border flex items-end'>
                        <textarea id="isi_komentar" name="isi_komentar" class="h-[60px] bg-slate-100 rounded-[5px] p-2 m-2 w-[80%] resize-none" placeholder="Apa yang ingin Anda komentari?" oninput="autoExpandTextarea(this)" required></textarea>
                        <button type="submit" class='bg-blue-400 h-[50px] text-white p-2 rounded-lg mb-3'>Komentar</button>
                    </div>
                </form>
                <div id="komentar-container" class="komentar">

                </div>
            </div>
        </div>
    </div>
    <footer class="flex  justify-center border-b-2 bg-blue-400 items-center h-[200px]">
        <div class='flex flex-grow pl-5 pr-5 mx-auto w-[640px] sm:w-[640px] md:w-[760px]  lg:w-[1000px] xl:w-[1280px] 2xl:w-[1920px] md:text-2xl font-medium placeholder justify-between'>
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