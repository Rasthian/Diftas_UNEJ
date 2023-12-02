<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <div class="profile-container">
        <div class="head-title">
            </div> 
        <div class="content-profile">
            <h1>Profile</h1>
            <div class="head">
                <div class="username">
                    <h5>haris ardian></h5>
                    <h6>Fakultasnya nanti</h6>
                    <p>Teknologi Informasi</p>
                </div>
            </div>
            <div class="middle">
                <div class="content-middle">
                    <h5>Informasi Pribadi</h5>
                    <div class="table-info">
                        <div class="left-info">
                            <div class="nama">
                                <label for="staticEmail"><h6>Nama</h6></label>
                                <p>Haris</p>
                            </div>
                            <div class="nim">
                                <label for="staticEmail"><h6>Fakultas</h6></label>
                                <p>Ilmu Komputer</p>
                            </div>
                            <div class="email">
                                <label for="staticEmail"><h6>Email</h6></label>
                                <p>harisned$gmail.com</p>
                            </div>
                        </div>
                        <div class="right-info">
                            <div class="nim">
                                <label for="staticEmail"><h6>Nim</h6></label>
                                <p>2049</p>
                            </div>
                            <div class="prodi">
                                <label for="staticEmail"><h6>Prodi</h6></label>
                                <p>Teknologi Informasi</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="Edit" tabindex="1" aria-labelledby="EditData" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="EditData">Edit data profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?php echo BASEURL; ?>/profile/updateProfile" method="post">
                                    <div class="modal-body">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['user']['username']; ?>" name="username">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['user']['nama']; ?>" name="nama">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Nim</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['user']['nim']; ?>" name="nim">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                            <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['user']['email']; ?>" name="email">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                                            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['user']['password']; ?>" name="password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Edit">
                    Edit
                </button>
            </div>
            <div class="bottom">
                <div class="bottom-title">
                    <h5>Tentang Akun</h5>
                </div>
                <div class="table-info">
                    <div class="left-info">
                        <div class="username">
                            <label for="staticEmail"><h6>Username</h6></label>
                            <p>xxxxxx</p>
                        </div>
                    </div>
                    <div class="right-info">
                        <div class="password">
                            <label for="staticEmail"><h6>Password</h6></label>
                            <p>xxxxxxx</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>