
<head>
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
    <a href='?action=homepage' class='absolute text-white font-bold ml-5 mt-5 text-xl'>
        < Back to homepage
    </a>
    <div class="icon-image h-screen w-full md:w-2/3 bg-center font-['Poppins'] flex flex-col items-center justify-center text-white">
        <img class="w-40" src="assets/images/Diftas.png" alt="">
        <h1 class="text-5xl m-6">DIFTAS</h1>
        <p class="text-center">Discussion Forum and <?php $err ?> <br>Task Sharing</p>
    </div>
    <form class="form-container h-screen w-full md:w-1/2 p-8" action="?action=login" method="post" role="form">
        <h1 class="mt-4 md:mt-40 text-3xl font-bold text-blue-400 text-center">Login</h1>
        <div class="mt-2 md:mt-10 flex flex-col">
            <label class="font-bold text-blue-500" for="Username">Username</label>
            <input value="" name="nim"  class="outline-none w-full md:w-4/5 h-10 bg-blue-50 p-2 rounded-sm mt-2" type="text"
                placeholder="Masukkan username anda">
        </div>
        <div class="mt-2 flex flex-col">
            <label class="font-bold text-blue-500" for="Password">Password</label>
            <input name="password" class="outline-none w-full md:w-4/5 h-10 bg-blue-50 p-2 rounded-sm mt-2" type="password"
                placeholder="Masukkan password anda">
        </div>
        <a href="?action=forgotPassword"><p class="flex flex-col items-end text-blue-500 mt-3 md:mt-1">Lupa password?</p></a>
        <div class="flex flex-col items-center mt-7">
            <button name="login" class="w-full md:w-full h-10 bg-blue-400 text-white font-bold">Log In</button>
            <?php if(!empty($err)){ ?>
            <div id="login-alert" class="alert mt-3">
            <?php echo $err; ?>
            </div>
            <?php }?>   
        </div>
        <a href="?action=register"><p class="flex flex-col items-center text-blue-500 mt-3">Buat akun jika belum punya</p></a>

    </form>
    
</body>

</html>
</body>
</html>