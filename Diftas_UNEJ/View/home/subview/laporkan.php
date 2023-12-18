<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col justify-center items-center h-screen">
    <h2 class="text-xl font-bold mt-6">Laporkan</h2>

    <form action="?action=addLaporan&id=<?php echo $id ?>" method="post" class="flex flex-col items-center">
        <div class='textarea-container w-[400px] md:w-[600px] bg-white rounded-lg border flex items-end'>
            <input name="isi_laporan" class="h-[60px] bg-slate-100 rounded-[5px] p-2 m-2 w-[80%] resize-none" placeholder="Apa yang ingin Anda Laporkan?" oninput="autoExpandTextarea(this)" required></input>
            <button type="button" class='bg-red-500 h-[50px] text-white p-2 rounded-lg mb-3' onclick="konfirmasiLaporan()">Laporkan</button>
        </div>
    </form>

    <script>
        function konfirmasiLaporan() {
            var konfirmasi = confirm("Apakah Anda yakin untuk melaporkan?");
            if (konfirmasi) {
                document.forms[0].submit();
            } else {
                
            }
        }

       
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault(); 
            }
        });
    </script>
</body>

</html>
