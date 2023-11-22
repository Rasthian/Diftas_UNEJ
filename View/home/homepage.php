<?php
require_once 'config/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('dropdown-button');
            const menu = document.getElementById('dropdown-menu');
            const selectedfakultasInput = document.getElementById('selectedfakultas');

            button.addEventListener('click', function() {
                menu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                const isClickInside = button.contains(event.target) || menu.contains(event.target);

                if (!isClickInside) {
                    menu.classList.add('hidden');
                }
            });

            // Update the selectedfakultas value and ID when an option is clicked
            const dropdownOptions = document.querySelectorAll('#dropdown-menu a');
            dropdownOptions.forEach(function(option) {
                option.addEventListener('click', function() {
                    const fakultasID = option.dataset.fakultasid;
                    const fakultasName = option.textContent;

                    selectedfakultasInput.value = fakultasID;
                    button.textContent = fakultasName;
                    menu.classList.add('hidden');
                });
            });
        });
    </script>
</head>

<body>
    <header class="flex border-b-2 items-center h-[136px]">
        <div class='flex pl-5 pr-5 mx-auto w-[640px] sm:w-[640px] md:w-[760px]  lg:w-[1000px] xl:w-[1280px] 2xl:w-[1920px] md:text-2xl font-medium'>
            <img src="assets/images/Diftas_Warna.png" class="!flex sm:!flex md:!flex lg:!fWlex xl:!flex 2xl:!flex" alt="">
            <ul class='flex w-[1930px] justify-between items-center text-neutral-800 font-[Montserrat]'>
                <li class='hidden sm:block ml-5'><a href="<?= BASEURL ?>">Diftas</a></li>
                <li class='hidden sm:block'><a href="?action=profile">Akun</a></li>
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
                    <form action="?action=filter" class="flex items-center" method="post" role="form">
                    
                    <div class=' w-[200px] h-[60px] flex items-center justify-evenly'>
                        <div class="relative inline-block text-left ml-5 mr-5 lg:ml-96 lg:mr-96 mt-5 mb-5">
                            <button id="dropdown-button" type="button" class="w-[200px] h-[60px] rounded-lg items-center justify-evenly inline-flex    px-4 py-2 text-sm font-medium text-gray-700   border-gray-300   focus:outline-none">
                                <?php if(empty($fakultas['nama'])){
                                    echo 'Fakultas';
                                } else {
                                    echo $fakultas['nama'];
                                }
                                 ?>
                                <svg class="w-4 h-4 ml-2 -mr-1 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 14l6-6H4l6 6z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="dropdown-menu" class="absolute right-0 hidden w-40 mt-2 bg-white border border-gray-300 rounded-md shadow-lg">
                                <div class="py-1">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $fakultasID = $row['id'];
                                        $fakultasName = $row['nama'];
                                        echo "<a data-fakultasid='$fakultasID' class='block px-4 py-2 text-sm text-gray-700 no-hover' href='#'>$fakultasName</a>";
                                    }
                                    ?>
                                </div>
                                <input type="hidden" name="fakultas" id="selectedfakultas" value="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-32 flex h-[30p] bg-blue-200 rounded-md  items-center justify-evenly border" >Filter</button>
                    </form>
                </div>
                <?php foreach ($diskusi as $diskusi) : ?>
                    <a href="index.php?action=diskusi&id=<?= $diskusi['id']; ?>" class='flex justify-center items-center mt-7'>
                        <div class='bg-white w-[900px] rounded-lg'>
                            <div class='header m-5'>
                                <p class='text-neutral-800 text-xl font-medium'><?= $diskusi['nama'] ?></p>
                                <p class='text-neutral-800 text-xl font-normal'><?= $diskusi['waktu_pembuatan'] ?></p>
                            </div>
                            <div class="isi m-5">
                                <p class='text-neutral-800 text-xl font-bold'><?= $diskusi['judul'] ?></p>
                                <p class='text-neutral-800 text-xl font-normal'><?= $diskusi['isi'] ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class='kanan'>
                <div class='flex justify-center font-medium  mt-20 '>
                    <a href="?action=diskusiku">
                        <img src="assets/images/diskusku.png" alt="">
                    </a>
                    <a href="?action=diskusiku" class="flex self-center ml-3">
                        <p class="text-netural-800">DiskusKu</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    //footer
    <script>
        $(document).ready(function() {
            $('#fakultasDropdown').change(function() {
                var selectedFakultas = $(this).val();
                window.location.href = 'index.php?action=filter_diskusi&fakultas=' + selectedFakultas;
            });
        });
    </script>
</body>

</html>