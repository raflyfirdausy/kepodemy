<section class="page-banner-section">
    <div class="container">
        <h1><?= $pengajar["nama"] ?></h1>
        <ul class="page-depth">
            <li><a href="<?= base_url() ?>"><?= $app_name ?></a></li>
            <li><a href="<?= base_url("pengajar") ?>">Pengajar</a></li>
            <li><a href="<?= current_url() ?>"><?= $pengajar["nama"] ?> </a></li>
        </ul>
    </div>
</section>

<section class="teachers-section">
    <div class="container">
        <div class="teachers-box">

            <div class="row">
                <div class="col-lg-6">
                    <div class="profile-image">
                        <div class="image-holder">
                            <img style="object-fit: cover;" src="<?= $pengajar["foto"] ?>" alt="">
                        </div>

                        <ul class="social-links">
                            <!-- <li><a href="#" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="profile-details">
                        <h1>Detail Pengajar</h1>

                        <div class="line-details">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="detail-item">
                                        <div class="icon-holder">
                                            <i class="fa fa-id-card-o"></i>
                                        </div>
                                        <div class="detail-content">
                                            <h2>Pekerjaan</h2>
                                            <span><?= $pengajar["jabatan"]  ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="line-details">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="detail-item">
                                        <div class="icon-holder">
                                            <i class="fa fa-envelope-o"></i>
                                        </div>
                                        <div class="detail-content">
                                            <h2>Email</h2>
                                            <a href="mailto:<?= $pengajar["email"] ?>"><?= $pengajar["email"]  ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="line-details">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="detail-item">
                                        <div class="icon-holder">
                                            <i class="fa fa-mobile"></i>
                                        </div>
                                        <div class="detail-content">
                                            <h2>Phone</h2>
                                            <a href="tel:<?= $pengajar["no_hp"] ?>"><?= $pengajar["no_hp"] ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="teacher-content">
                <h1>Tentang Saya</h1>
                <p><?= $pengajar["deskripsi"] ?></p>
            </div>

            <div class="teacher-content mt-3">
                <h1>Kursus Saya (<?= sizeof($produk) ?>)</h1>
                <div class="row">

                    <?php foreach ($produk as $pd) : ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="course-post">
                                <div class="course-thumbnail-holder">
                                    <a href="<?= base_url("kelas/" . slug($pd["nama"])) ?>">
                                        <img style="height: 200px;" src="<?= $pd["gambar"] ?>" alt="">
                                    </a>
                                </div>
                                <div class="course-content-holder">
                                    <div class="course-content-main">
                                        <h2 class="course-title">
                                            <a href="<?= base_url("kelas/" . slug($pd["nama"])) ?>"><?= $pd["nama"] ?></a>
                                        </h2>
                                        <a href="<?= base_url("pengajar/" . slug($pengajar["nama"])) ?>" class="course-loop-teacher"><?= $pengajar["nama"] ?></a>
                                        <!-- <div class="course-rating-teacher">
                                         <div class="star-rating has-ratings" title="Rated 5.00 out of 5">
                                             <span style="width:100%">
                                                 <span class="rating">0.00</span>
                                                 <span class="votes-number">0 Votes</span>
                                             </span>
                                         </div>
                                         <a href="#" class="course-loop-teacher"><?= $pd["pengajar"]->nama ?></a>
                                     </div> -->
                                    </div>
                                    <div class="course-content-bottom">
                                        <div class="course-students">
                                            <!-- <i class="material-icons">group</i>
                                            <span>0</span> -->
                                        </div>
                                        <div class="course-price">
                                            <span>Rp <?= $pd["harga_diskon"] > 0 ? ("<strike>" . Rupiah3($pd["harga"]) . "</strike> " . Rupiah3($pd["harga_diskon"])) : Rupiah3($pd["harga"]) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

        </div>
    </div>
</section>