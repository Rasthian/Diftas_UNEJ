<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <form action="?action=forgotPassword" class="w-full h-full flex justify-center" method="post">
    <div class="form-container h-screen w-full md:w-1/2 p-8">
        <h1 class="mt-4 text-3xl font-bold text-blue-400 text-center">Forget Password</h1>
        <div class="all-form">
            <div class="mt-2 flex flex-col ml-5 mr-5">
                <label class="font-bold text-blue-500" for="email">Email:</label>
                <input name="email" class="outline-none w-full  h-10 bg-blue-50 p-2 rounded-sm mt-2" type="email" placeholder="Masukkan nama anda" required>
            </div>
            <div class="mt-2 flex flex-col ml-5 mr-5">
                <label class="font-bold text-blue-500" for="newPassword">New Password:</label>
                <input name="newPassword" class="outline-none w-full h-10 bg-blue-50 p-2 rounded-sm mt-2" type="text" placeholder="Masukkan NIM anda" required>
            </div>
            <div class="mt-2 flex flex-col ml-5 mr-5">
                <label class="font-bold text-blue-500" for="confirmPassword">Confirm Password:</label>
                <input name="confirmPassword" class="outline-none w-full  h-10 bg-blue-50 p-2 rounded-sm mt-2" type="text" placeholder="Masukkan email anda" required>
            </div>
            <div class="mt-2 flex flex-col ml-5 mr-5">
                <button class="w-full md:w-full h-10 bg-blue-400 text-white font-bold mt-5" type="submit">Reset Password</button>
            </div>
        </div>
    <a href="?action=login">
        <p class="flex flex-col items-center text-blue-500 mt-3">Kembali ke halaman login</p>
    </a>
    <?php
    if (isset($error)) {
        echo "<div class='error flex justify-center text-red-500 mt-3'>$error</div>";
    }
    ?>
    </div>
    </form>
</body>
</html>