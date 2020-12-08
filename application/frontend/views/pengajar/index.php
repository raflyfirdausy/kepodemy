<section class="page-banner-section">
    <div class="container">
        <h1>Pengajar</h1>
        <ul class="page-depth">
            <li><a href="<?= base_url() ?>"><?= $app_name ?></a></li>
            <li><a href="<?= current_url() ?>">Pengajar</a></li>
        </ul>
    </div>
</section>

<section class="teachers-section">
    <div class="container">
        <div class="teachers-box">
            <div class="row">

                <?php foreach ($pengajar as $dt) : ?>

                    <div class="col-lg-3 col-md-4">
                        <div class="teacher-post">
                            <a href="<?= base_url("pengajar/" . slug($dt["nama"])) ?>">
                                <img style="height: 225px; object-fit: cover" src="<?= $dt["foto"] ?>" alt="">
                                <div class="hover-post">
                                    <h2><?= $dt["nama"] ?></h2>
                                    <span><?= $dt["jabatan"] ?></span>
                                </div>
                            </a>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>
        </div>
    </div>
</section>