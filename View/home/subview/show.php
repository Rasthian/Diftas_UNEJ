<?php
// Ambil diskusi dari controller
$diskusi = $data['diskusi'];

// Tampilkan informasi diskusi
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mx-auto mt-10">
        <div class="bg-white rounded-lg p-6">
            <h1 class="text-2xl font-bold"><?= $diskusi['judul'] ?></h1>
            <p class="text-gray-500 mt-2"><?= $diskusi['nama'] ?> - <?= $diskusi['waktu_pembuatan'] ?></p>
            <p class="mt-4"><?= $diskusi['isi'] ?></p>
        </div>

        <!-- Tampilkan komentar jika ada -->
        <?php if (!empty($diskusi['komentar'])): ?>
            <h2 class="text-xl font-bold mt-6">Komentar</h2>
            <div class="bg-white rounded-lg p-6 mt-4">
                <?php foreach ($diskusi['komentar'] as $komentar): ?>
                    <div class="border-t-2 pt-4 mt-4">
                        <p class="text-gray-500"><?= $komentar['nama'] ?> - <?= $komentar['waktu_pembuatan'] ?></p>
                        <p class="mt-2"><?= $komentar['isi'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>