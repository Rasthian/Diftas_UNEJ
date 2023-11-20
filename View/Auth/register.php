<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .icon-image {
            background-image: url('assets/images/Ditas_3.png');
            background: linear-gradient(325deg, #619DE7 0.57%, rgba(97, 157, 231, 0.00) 186.57%);
        }

        .form-container {
            flex: 1;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var passwordInput = document.getElementsByName('password')[0];
            var confirmPasswordInput = document.getElementsByName('konfirmasi-password')[0];

            function validatePassword() {
                if (passwordInput.value !== confirmPasswordInput.value) {
                    confirmPasswordInput.setCustomValidity('Konfirmasi password harus sama dengan password');
                } else {
                    confirmPasswordInput.setCustomValidity('');
                }
            }

            passwordInput.addEventListener('input', validatePassword);
            confirmPasswordInput.addEventListener('input', validatePassword);
        });
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('dropdown-button');
            const menu = document.getElementById('dropdown-menu');

            button.addEventListener('click', function() {
                menu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                const isClickInside = button.contains(event.target) || menu.contains(event.target);

                if (!isClickInside) {
                    menu.classList.add('hidden');
                }
            });
        });
    </script>


</head>
<form action="" class="w-full h-full flex justify-center">
    <div class="form-container h-screen w-full md:w-1/2 p-8">
        <h1 class="mt-4 text-3xl font-bold text-blue-400 text-center">Register</h1>
        <div class="all-form">
            <div class="mt-2 flex flex-col ml-5 mr-5 lg:ml-96 lg:mr-96">
                <label class="font-bold text-blue-700" for="Username">Nama</label>
                <input name="nama" class="outline-none w-full  h-10 bg-slate-100 rounded-sm mt-2" type="text" placeholder="Masukkan nama anda">
            </div>
            <div class="mt-2 flex flex-col ml-5 mr-5 lg:ml-96 lg:mr-96">
                <label class="font-bold text-blue-700" for="Password">NIM</label>
                <input name="NIM" class="outline-none w-full h-10 bg-slate-100 rounded-sm mt-2" type="number" placeholder="Masukkan NIM anda">
            </div>
            <div class="mt-2 flex flex-col ml-5 mr-5 lg:ml-96 lg:mr-96">
                <label class="font-bold text-blue-700" for="Password">Email</label>
                <input name="email" class="outline-none w-full  h-10 bg-slate-100 rounded-sm mt-2" type="email" placeholder="Masukkan email anda">
            </div>
            <div class="mt-2 flex flex-col ml-5 mr-5 lg:ml-96 lg:mr-96">
                <label class="font-bold text-blue-700" for="Password">Password</label>
                <input name="password" class="outline-none w-full  h-10 bg-slate-100 rounded-sm mt-2" type="password" placeholder="Masukkan Password">
            </div>
            <div class="mt-2 flex flex-col ml-5 mr-5 lg:ml-96 lg:mr-96">
                <label class="font-bold text-blue-700" for="Password">Confirm Password</label>
                <input name="konfirmasi-password" class="outline-none w-full h-10 bg-slate-100 rounded-sm mt-2" type="password" placeholder="Masukkan Konfirmasi Password">
            </div>
            <div class="relative inline-block text-left ml-5 mr-5 lg:ml-96 lg:mr-96 mt-10">
                <button id="dropdown-button" type="button" class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:bg-gray-200">
                    Pilih Prodi
                    <svg class="w-4 h-4 ml-2 -mr-1 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 14l6-6H4l6 6z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="dropdown-menu" class="absolute right-0 hidden w-40 mt-2 bg-white border border-gray-300 rounded-md shadow-lg">
                    <div class="py-1">
                        <a class="block px-4 py-2 text-sm text-gray-700 no-hover">Ilmu Komputer</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">Teknologi Informasi</a>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center mt-7 ml-5 mr-5 lg:ml-96 lg:mr-96">
                <button class="w-full md:w-full h-10 bg-blue-400 text-white font-bold" type="submit">Register</button>
            </div>
        </div>
        <a href="?action=index">
            <p class="flex flex-col items-center text-blue-700 mt-3">Log in jika telah ada akun</p>
        </a>
    </div>
<body>

</body>

</html>