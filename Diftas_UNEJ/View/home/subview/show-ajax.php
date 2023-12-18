<style>
 .isi {
    background-color: white;
    word-wrap: break-word;
  }

</style>
<?php

foreach ($komentar as $k) {
    echo "
          <div class='w-[1300px] bg-white rounded-lg p-3 mt-4'>

          <div class='mb-5 bg-white rounded-lg '>
              <p class='text-neutral-800 text-xl font-medium'>{$k['nama']}</p>
              <p class='text-gray-500'>{$k['waktu_komentar']}</p>
              <p class='mt-2'>{$k['isi']}</p>
          </div>

      </div>"
          ;
}
?>
