<section class="page-banner-section">
    <div class="container">
        <h1><?= $kelas["nama"] ?></h1>
        <ul class="page-depth">
            <li><a href="<?= base_url() ?>"><?= $app_name ?></a></li>
            <li><a href="<?= base_url("topik") ?>">Kelas</a></li>
            <li><a href="<?= current_url() ?>"><?= $kelas["nama"] ?></a></li>
        </ul>
    </div>
</section>

<section class="single-course-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-course-box">
                    <!-- single top part -->
                    <div class="product-single-top-part">
                        <div class="product-info-before-gallery">
                            <div class="course-author before-gallery-unit">
                                <div class="icon">
                                    <i class="material-icons">account_box</i>
                                </div>
                                <div class="info">
                                    <span class="label">Pengajar</span>
                                    <div class="value">
                                        <a href="<?= base_url("pengajar/" . slug($kelas["pengajar"]->nama)) ?>">
                                            <?= $kelas["pengajar"]->nama ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="course-category before-gallery-unit">
                                <div class="icon">
                                    <i class="material-icons">bookmark_border</i>
                                </div>
                                <div class="info">
                                    <span class="label">Kategori</span>
                                    <div class="value">
                                        <?php foreach ($kelas["produk_kategori"] as $pk) : ?>
                                            <a href="<?= base_url("topik/" . $pk->kategori->slug) ?>">
                                                <?= $pk->kategori->nama ?>,
                                            </a>
                                        <?php endforeach ?>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="course-rating before-gallery-unit">
                                <div class="star-rating has-ratings">
                                    <span class="rating">4.50</span>
                                    <span class="votes-number">4 Votes</span>
                                </div>
                            </div> -->
                        </div>
                        <div class="course-single-gallery">
                            <img style="height: 450px; object-fit:cover" src="<?= asset("gambar/" . $kelas["gambar"]) ?>" alt="">
                        </div>

                    </div>

                    <!-- single course content -->
                    <div class="single-course-content">
                        <h2>Deskripsi</h2>
                        <div>
                            <?= $kelas["deskripsi"] ?>
                        </div>

                        <!-- course section -->
                        <div class="course-section">
                            <!-- <h3>Akses Belajar</h3> -->
                            <div class="panel-group">
                                <div class="course-panel-heading">
                                    <div class="panel-heading-left">
                                        <div class="course-lesson-icon">
                                            <i class="fa fa-play-circle-o"></i>
                                        </div>
                                        <div class="title">
                                            <h4>Akses Kelas<span class="badge-item video"><?= $kelas["media"] ?></span>
                                            </h4>
                                            <p class="subtitle"><?= longdate_indo($kelas["tanggal"], TRUE) ?> </p>
                                        </div>
                                    </div>
                                    <div class="panel-heading-right">
                                        <div class="private-lesson">
                                            <i class="fa fa-lock"></i>
                                            <span>Klik Untuk Melihat Akses</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content">
                                    <div class="panel-content-inner">
                                        <!-- Link : <a target="_blank" href="https://meet.google.com/pem-xkqd-atf">https://meet.google.com/pem-xkqd-atf</a>
                                        <br> Bergabung melalui telepon: (US) +1 385-404-5382 PIN: 279 975 318# -->

                                        <b style="color:red">Silahkan Membeli kelas ini terlebih dahulu untuk membuka akses kelas ini</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end course section -->

                    </div>
                    <!-- end single course content -->

                    <!-- course reviews -->
                    <div class="course-reviews">
                        <div class="course-review-title">
                            <h3>
                                <i class="material-icons">chat_bubble_outline</i> Masukan Pembelajar
                            </h3>
                        </div>
                        <div class="course-reviews-inner">
                            <div class="ratings-box">
                                <div class="rating-average">
                                    <p>Peringkat Kursus</p>
                                    <div class="average-box">
                                        <span class="num">4.5</span>
                                        <span class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span>
                                        <span class="txt">4 Ratings</span>
                                    </div>
                                </div>
                                <div class="detailed-rating">
                                    <p>Detail Rating</p>
                                    <div class="detailed-box">
                                        <ul class="detailed-lines">
                                            <li>
                                                <span>5 Stars</span>
                                                <div class="outer">
                                                    <span class="inner-fill" style="width: 75%"></span>
                                                </div>
                                                <span>3</span>
                                            </li>
                                            <li>
                                                <span>4 Stars</span>
                                                <div class="outer">
                                                    <span class="inner-fill" style="width: 25s%"></span>
                                                </div>
                                                <span>1</span>
                                            </li>
                                            <li>
                                                <span>3 Stars</span>
                                                <div class="outer">
                                                    <span class="inner-fill"></span>
                                                </div>
                                                <span>0</span>
                                            </li>
                                            <li>
                                                <span>2 Stars</span>
                                                <div class="outer">
                                                    <span class="inner-fill"></span>
                                                </div>
                                                <span>0</span>
                                            </li>
                                            <li>
                                                <span>1 Stars</span>
                                                <div class="outer">
                                                    <span class="inner-fill"></span>
                                                </div>
                                                <span>0</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="comments">
                                <li>
                                    <div class="image-holder">
                                        <img src="upload/blog/avatar4.jpg" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <h2>
                                            Rafli Firdausy Irawan
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                        </h2>
                                        <p>Kursusnya sangat bermanfaat!</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="image-holder">
                                        <img src="upload/blog/avatar4.jpg" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <h2>
                                            Ervina Nadia Salsabila
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </h2>
                                        <p>Mudah dipahami, mantap!</p>
                                    </div>
                                </li>
                            </ul>
                            <form class="add-review">
                                <h1>Tambah Ulasan</h1>
                                <label>Your rating</label>
                                <select>
                                    <option>Rate...</option>
                                    <option>Sangat Baik</option>
                                    <option>Baik</option>
                                    <option>Biasa Saja</option>
                                    <option>Buruk</option>
                                    <option>Sangat Buruk</option>
                                </select>
                                <label>Ulasan Kamu</label>
                                <textarea></textarea>
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- end course reviews -->

                </div>

            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="widget course-widget">
                        <p class="price">
                            <span class="price-label">Harga</span>
                            <span class="amount"><?= $kelas["harga_diskon"] > 0 ? " <del> Rp " . Rupiah3($kelas["harga"]) . "</del> Rp " . Rupiah3($kelas["harga"] - $kelas["harga_diskon"]) : Rupiah3($kelas["harga"])  ?></span>
                        </p>
                        <a class="button-one" href="#">Ambil Kelas Ini</a>
                    </div>
                    <div class="widget profile-widget">
                        <div class="top-part">
                            <img style="width: 80px; height:80px; object-fit:cover" src="<?= asset("pengajar/" . $kelas["pengajar"]->foto) ?>" alt="<?= $kelas["pengajar"]->nama ?>">
                            <div class="name">
                                <h3><?= $kelas["pengajar"]->nama ?></h3>
                                <span class="job-title"><?= $kelas["pengajar"]->jabatan ?></span>
                            </div>
                        </div>
                        <div class="content">
                            <p class="text-justify"><?= $kelas["pengajar"]->deskripsi ?></p>
                            <a class="button-one text-center" href="<?= base_url("pengajar/" . slug($kelas["pengajar"]->nama)) ?>" style="width: 100%;">
                                Lihat Profile Lengkap
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>