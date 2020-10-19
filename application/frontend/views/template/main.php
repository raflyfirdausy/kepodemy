<!doctype html>


<html lang="en" class="no-js">

<head>
    <title><?= $app_name . " | " . $title ?></title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= asset("user/css/studiare-assets.min.css") ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset("user/css/fonts/font-awesome/font-awesome.min.css") ?>" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= asset("user/css/fonts/elegant-icons/style.css") ?>" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= asset("user/css/fonts/iconfont/material-icons.css") ?>" media="screen">
    <link rel="stylesheet" type="text/css" href="<?= asset("user/css/style.css") ?>">
    <script src="<?= asset("user/js/studiare-plugins.min.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

    <!-- Container -->
    <div id="container">
        <?php $this->load->view("template/header") ?>

        <?= $__content ?>

        <?php $this->load->view("template/footer") ?>

    </div>
    <!-- End Container -->

    <script src="<?= asset("user/js/jquery.countTo.js") ?>"></script>
    <script src="<?= asset("user/js/popper.js") ?>"></script>
    <script src="<?= asset("user/js/bootstrap.min.js") ?>"></script>
    <script src="<?= asset("user/js/gmap3.min.js") ?>"></script>
    <script src="<?= asset("user/js/script.js") ?>"></script>


    <?php if (!$this->session->has_userdata(SESSION)) : ?>
        <script>
            $("#formLogin").submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Loading',
                    text: 'Proses Masuk <?= $app_name ?>',
                    onBeforeOpen: () => {
                        Swal.showLoading();
                        //START AJAX
                        $.ajax({
                            type: "POST",
                            url: '<?= base_url("auth/login") ?>',
                            data: $(this).serialize(),
                            dataType: "json",
                            success: function(data) {
                                console.log(JSON.stringify(data));
                                if (data.response_code == 200) {
                                    Swal.close();
                                    Swal.fire('Sukses', data.response_message, 'success').then((result) => {
                                        // $("#formLogin")[0].reset();
                                        window.location.replace("<?= current_url() ?>");
                                    })
                                } else {
                                    Swal.close();
                                    Swal.fire("Oops", data.response_message, "error");
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                Swal.fire("Oops", xhr.responseText, "error");
                            }
                        });
                    }
                });
            })
        </script>
    <?php endif ?>
</body>

</html>