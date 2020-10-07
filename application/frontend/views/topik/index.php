<section class="page-banner-section">
    <div class="container">
        <h1>Daftar Topik Kelas</h1>
        <ul class="page-depth">
            <li><a href="<?= base_url() ?>">Beranda</a></li>
            <li><a href="<?= base_url("topik") ?>">Topik Kelas</a></li>
            <?php if ($kategori) : ?>
                <li><a href="<?= base_url("topik/" . $kategori["slug"]) ?>"><?= $kategori["nama"] ?></a></li>
            <?php endif ?>

        </ul>
    </div>
</section>

<section class="courses-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="courses-top-bar">
                    <div class="courses-view">
                        <select class="custom-select custom-select-ld ">
                            <option selected>Urutkan</option>
                            <option value="1">Terbaru</option>
                            <option value="2">Populer</option>
                            <option value="3">Peringkat Tinggi</option>
                        </select>
                    </div>
                    <form class="search-course">
                        <input type="search" name="search" id="search_course" placeholder="Cari Kursus..." />
                        <button type="submit">
                            <i class="material-icons">search</i>
                        </button>
                    </form>
                </div>

                <?php foreach ($kelas as $k) : ?>
                    <div class="course-post list-style">
                        <div class="row">
                            <div class="course-thumbnail-holder">
                                <a href="3. Detail.html">
                                    <img style="height: 240px; object-fit:cover;" src="<?= asset("gambar/" . $k["gambar"]) ?>" alt="">
                                </a>
                            </div>
                            <div class="course-content-holder">
                                <div class="course-content-main">
                                    <h2 class="course-title">
                                        <a href="3. Detail.html"><?= $k["nama"] ?></a> <br>
                                        <span class="text-info" style="font-size: 12px;">Web Development</span>
                                    </h2>
                                    <div class="course-rating-teacher">
                                        <div class="star-rating has-ratings" title="Rated 5.00 out of 5">
                                            <span style="width:100%">
                                                <span class="rating">5.00</span>
                                                <span class="votes-number">1 Votes</span>
                                            </span>
                                        </div>
                                        <a href="#" class="course-loop-teacher">Rafli Firdausy Irawan</a>
                                    </div>
                                    <p>Apa yang akan dipelajari ? Membuat Website AGC untuk Affiliate Program, Membuat Website AGC untuk toko onl...</p>
                                </div>
                                <div class="course-content-bottom">
                                    <div class="course-students">
                                        <i class="material-icons">group</i>
                                        <span>64</span>
                                    </div>
                                    <div class="course-price">
                                        <span>IDR 85.5K</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach ?>


                <?= $pagination ?>

            </div>

            <div class="col-lg-4">
                <div class="sidebar">

                    <div class="category-widget widget">
                        <h2>Topik Kursus</h2>
                        <ul class="category-list">
                            <li><a href="#">Strategic Management <span class="badge badge-primary badge-pill pull-right">14</span></a></li>
                            <li><a href="#">Operation Management <span class="badge badge-primary badge-pill pull-right">1</span></a></li>
                            <li><a href="#">Financial Accounting <span class="badge badge-primary badge-pill pull-right">4</span></a></li>
                            <li><a href="#">Project Management <span class="badge badge-primary badge-pill pull-right">24</span></a></li>
                            <li><a href="#">Web Development <span class="badge badge-primary badge-pill pull-right">10</span></a></li>
                        </ul>
                    </div>

                    <div class="products-widget widget" style="display: none;">
                        <h2>Products</h2>
                        <ul class="products-list">
                            <li>
                                <a href="single-course.html"><img src="upload/courses/thumb1.jpg" alt=""></a>
                                <div class="list-content">
                                    <h3><a href="single-course.html">Introduction Web Design with HTML</a></h3>
                                    <span>$244</span>
                                </div>
                            </li>
                            <li>
                                <a href="single-course.html"><img src="upload/courses/thumb2.jpg" alt=""></a>
                                <div class="list-content">
                                    <h3><a href="single-course.html">Special Education Needs Teaching</a></h3>
                                    <span>$74.99</span>
                                </div>
                            </li>
                            <li>
                                <a href="single-course.html"><img src="upload/courses/thumb3.jpg" alt=""></a>
                                <div class="list-content">
                                    <h3><a href="single-course.html">Environmental Science BTEC Course</a></h3>
                                    <span>$59.99</span>
                                </div>
                            </li>
                            <li>
                                <a href="single-course.html"><img src="upload/courses/thumb4.jpg" alt=""></a>
                                <div class="list-content">
                                    <h3><a href="single-course.html">Distance Learning MBA Management</a></h3>
                                    <span>$17.88</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>