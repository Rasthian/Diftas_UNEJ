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

        @media (min-width: 640px) {
            body {
                flex-direction: row;
            }
        }
    </style>
</head>

<body>
    <div class="icon-image h-screen w-full md:w-2/3 bg-center font-['Poppins'] flex flex-col items-center justify-center text-white">
        <img class="w-40" src="assets/images/Diftas.png" alt="">
        <h1 class="text-5xl m-6">DIFTAS</h1>
        <p class="text-center">Discussion Forum and<br>Task Sharing</p>
    </div>
    <div class="form-container h-screen w-full md:w-1/2 p-8">
        <h1 class="mt-4 md:mt-40 text-3xl font-bold text-blue-400 text-center">Login</h1>
        <div class="mt-2 md:mt-10 flex flex-col">
            <label class="font-bold text-blue-700" for="Username">Username</label>
            <input name="" class="outline-none w-full md:w-4/5 h-10 bg-slate-100 rounded-sm mt-2" type="text"
                placeholder="Masukkan username anda">
        </div>
        <div class="mt-2 flex flex-col">
            <label class="font-bold text-blue-700" for="Password">Password</label>
            <input name="" class="outline-none w-full md:w-4/5 h-10 bg-slate-100 rounded-sm mt-2" type="password"
                placeholder="Masukkan password anda">
        </div>
        <a href=""><p class="flex flex-col items-end text-blue-700 mt-3 md:mt-1">Lupa password?</p></a>
        <div class="flex flex-col items-center mt-7">
            <button class="w-full md:w-full h-10 bg-blue-400 text-white font-bold">Log In</button>
        </div>
        <a href=""><p class="flex flex-col items-center text-blue-700 mt-3">Buat akun jika belum punya</p></a>
    </div>
</body>

</html>
