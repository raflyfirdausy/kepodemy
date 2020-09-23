<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masuk Sisdes | Sistem Informasi Desa</title>
    <link rel="icon" href="<?= asset('website/img/favicon.svg') ?>" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= asset("website/css/login.css"); ?>">
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-5 intro-section">
                    <div class="brand-wrapper">
                        <img src="<?= asset('website/img/logo_sisdes_light.svg'); ?>" class="logo" />
                    </div>
                    <div class="intro-content-wrapper">
                        <h1 class="intro-title">Selamat Datang</h1>
                        <p class="intro-text">di Sistem Informasi Desa</p>
                    </div>
                    <div class="intro-section-footer">
                        <p>Copyright &copy <?= date('Y') ?> All Rights Reserved by <a style="color: #ffffff; font-weight: 800" href="https://ultranesia.com" target="blank">ultranesia.com</a></p>
                    </div>
                </div>
                <div class="col-sm-7 form-section">
                    <div class="login-wrapper">
                        <h2 class="login-title">Masuk Sistem</h2>
                        <form method="POST" role="form" action="<?= base_url('auth/login') ?>">
                            <?php if ($this->session->flashdata("gagal")) : ?>
                                <div class="alert bg-danger alert-dismissible fade show" role="alert">
                                    <strong class="text-white">Gagal !</strong> <span class="text-white"><?= $this->session->flashdata("gagal") ?>.</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username akun anda">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password akun anda">
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <input name="login" id="login" class="btn login-btn" type="submit" value="Masuk">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>