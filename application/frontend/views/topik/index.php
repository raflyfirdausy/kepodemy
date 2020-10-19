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
                        <select class="custom-select custom-select-ld" id="sortSelect">
                            <option <?= $this->input->get("sort") == null ? "selected" : "" ?>>Urutkan</option>
                            <option <?= $this->input->get("sort") == "terbaru" ? "selected" : "" ?> value="terbaru">Terbaru</option>
                            <option <?= $this->input->get("sort") == "populer" ? "selected" : "" ?> value="populer">Populer</option>
                            <option <?= $this->input->get("sort") == "tertinggi" ? "selected" : "" ?> value="tertinggi">Peringkat Tinggi</option>
                        </select>
                    </div>
                    <form class="search-course" id="searchKelas">
                        <input value="<?= $this->input->get("search") ?>" type="search" name="search" id="search_kelas" placeholder="Cari kelas..." />
                        <button type="submit">
                            <i class="material-icons">search</i>
                        </button>
                    </form>
                </div>

                <?php foreach ($kelas as $k) : ?>
                    <div class="course-post list-style">
                        <div class="row">
                            <div class="course-thumbnail-holder">
                                <a href="<?= base_url("kelas/" . slug($k["nama"])) ?>">
                                    <img style="height: 240px; object-fit:cover;" src="<?= asset("gambar/" . $k["gambar"]) ?>" alt="">
                                </a>
                            </div>
                            <div class="course-content-holder">
                                <div class="course-content-main">
                                    <h2 class="course-title">
                                        <a href="<?= base_url("kelas/" . slug($k["nama"])) ?>"><?= $k["nama"] ?></a> <br>
                                        <?php foreach ($k["produk_kategori"] as $pk) : ?>
                                            <a href="<?= base_url("topik/" . $pk->kategori->slug) ?>">
                                                <span class="text-info" style="font-size: 12px;"><?= $pk->kategori->nama ?>, </span>
                                            </a>
                                        <?php endforeach ?>

                                    </h2>
                                    <div class="course-rating-teacher">
                                        <div class="star-rating has-ratings" title="Rated 5.00 out of 5">
                                            <span style="width:100%">
                                                <!-- <span class="rating">5.00</span>
                                                <span class="votes-number">0 Votes</span> -->
                                                <!-- <span class=""><?= $k["tanggal"] . " " . $k["jam_mulai"] . " - " . $k["jam_selesai"] ?></span> -->
                                                <span class="course-loop-teacher"><?= longdate_indo($k["tanggal"]) ?> |</span>
                                            </span>
                                        </div>
                                        <a href="<?= base_url("pengajar/" . slug($k["pengajar"]->nama)) ?>" class="course-loop-teacher"><?= $k["pengajar"]->nama ?></a>
                                    </div>
                                    <p>
                                        <?= substr(strip_tags($k['deskripsi']), 0, 110) . "..."; ?>
                                    </p>
                                </div>
                                <div class="course-content-bottom">
                                    <div class="course-students">
                                        <!-- <i class="material-icons">group</i> -->
                                        <!-- <span>64</span> -->
                                    </div>
                                    <div class="course-price mr-3">
                                        <span>Rp <?= $k["harga_diskon"] > 0 ? "<del>" . Rupiah3($k["harga"]) . "</del>" . Rupiah3($k["harga"] - $k["harga_diskon"]) : Rupiah3($k["harga"])  ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach ?>

                <?php
                function getUrlHalaman($no = 1)
                {
                    $x = current_url() . "?" . $_SERVER['QUERY_STRING'];
                    $parsed = parse_url($x);
                    if (isset($parsed['query'])) {
                        $query = $parsed['query'];
                    } else {
                        $query = "page=1";
                    }
                    parse_str($query, $params);
                    unset($params['page']);
                    $params["page"]    = $no;
                    $string = current_url() . "?" . http_build_query($params);
                    return $string;
                }
                ?>

                <?php if ($totalPage > 1) : ?>
                    <center>
                        <ul class="page-pagination" style="margin-bottom: 40px;">
                            <?php $currentPage = $this->input->get("page") ?: 1; ?>
                            <li>
                                <a href="<?= $currentPage == 1 ? "javascript:void(0)" : getUrlHalaman($currentPage - 1) ?>"><i class="fa fa-angle-left"></i></a>
                            </li>
                            <?php
                            for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li>
                                    <a href="<?= getUrlHalaman($i) ?>" class="<?= $currentPage == $i ? "active" : ""  ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor ?>
                            <li>
                                <a href="<?= $currentPage == $totalPage ? "javascript:void(0)" : getUrlHalaman($currentPage + 1) ?>"><i class="fa fa-angle-right"></i></a>
                            </li>
                        </ul>
                    </center>
                <?php endif ?>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">

                    <div class="category-widget widget">
                        <h2>Topik Kelas</h2>
                        <ul class="category-list">
                            <li><a href="<?= base_url("topik/") ?>">Semua Topik</a></li>
                            <?php foreach ($topik_root as $tp) : ?>
                                <li><a href="<?= base_url("topik/" . $tp["slug"]) ?>"><?= $tp["nama"] ?></a></li>
                            <?php endforeach ?>
                            <!-- <li><a href="#">Strategic Management <span class="badge badge-primary badge-pill pull-right">14</span></a></li>                             -->
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

<script>
    $(document).ready(function() {
        let currentUrl = document.URL;
        let url = new URL(currentUrl);
        $("#sortSelect").change(function(e) {
            url.searchParams.set("sort", this.value); // setting your param            
            window.location.replace(url.href);
        });

        $("#searchKelas").submit(function(e) {
            e.preventDefault();
            url.searchParams.set("search", $("#search_kelas").val()); // setting your param
            url.searchParams.set("page", "1"); // setting your param
            window.location.replace(url.href);
        })
    });
</script>