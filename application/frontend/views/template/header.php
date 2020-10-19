   <!-- Header ================================================== -->
   <header class="clearfix">

       <form method="get" action="<?= base_url("topik") ?>" class="search_bar" id="searchBar" style="height: 75px; margin-top: 0px;">
           <div class="container">
               <input type="search" name="search" class="search-input" placeholder="Cari Apa Saja" style="padding: 23px 45px 32px 0;">
               <button type="submit" class="submit">
                   <i class="material-icons">search</i>
               </button>
           </div>
       </form>

       <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 75px;">
           <div class="container">

               <a class="navbar-brand" href="<?= base_url() ?>">
                   <img src="<?= asset("static/kepodemy.png") ?>" height="50px" alt="">
               </a>

               <a href="#" class="mobile-nav-toggle">
                   <span></span>
               </a>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav mr-auto">
                       <li class="drop-link">
                           <a class="" href="<?= base_url() ?>">Beranda</a>
                       </li>

                       <li class="drop-link">
                           <a href="#!">Topik Kelas<i class="fa fa-angle-down"></i></a>
                           <ul class="dropdown level2">
                               <li>
                                   <a href="<?= base_url("topik/") ?>">Semua Topik</a>
                               </li>
                               <?php foreach ($topik as $tp) : ?>
                                   <li class="<?= (sizeof($tp["sub"]) > 0) ? "drop-link" : "" ?>">
                                       <a href="<?= base_url("topik/" . $tp["slug"]) ?>"><?= $tp["nama"] ?></a>
                                       <?= getSubKategori($tp["sub"]) ?>
                                   </li>
                               <?php endforeach ?>

                               <?php
                                function getSubKategori($kategoriArray = [])
                                {
                                    $string = "";
                                    if (sizeof($kategoriArray) > 0) {
                                        $string .= '<ul class="dropdown level2">';
                                        foreach ($kategoriArray as $dt) {
                                            $class = sizeof($dt["sub"]) > 0 ? "drop-link" : "";
                                            $string .= '<li class="' . $class . '">';
                                            $string .= '<a href="' . base_url("topik/" . $dt["slug"]) . '">' . $dt["nama"] . '</a>';
                                            $string .= getSubKategori($dt["sub"]);
                                        }
                                        $string .= "</ul>";
                                    }
                                    return $string;
                                }
                                ?>
                           </ul>
                       </li>

                       <li class="drop-link">
                           <a class="" href="<?= base_url() ?>">Merchandise</a>
                       </li>

                       <li class="drop-link">
                           <a class="" href="<?= base_url() ?>">Tentang <?= $app_name ?></a>
                       </li>

                   </ul>
                   <button class="search-icon btn">
                       <i class="material-icons open-search">search</i>
                       <i class="material-icons close-search" style="display: none;">close</i>
                   </button>
                   <a href="<?= base_url("keranjang") ?>" class="btn btn-sm mr-2">
                       <i class="material-icons">shopping_cart</i>
                       <?php if (sizeof($keranjang_) > 0) : ?>
                           <span style="vertical-align: top;color:#fff;padding:3px;background-color: #4783f3;line-height: 15px;font-size: 11px;border-radius: 3px;margin-top: -20px;margin-left: 0px;text-align: center;">
                               <?= sizeof($keranjang_) ?>
                           </span>
                       <?php endif ?>

                   </a>
                   <?php if (!$this->session->has_userdata(SESSION)) : ?>
                       <a href="#" id="btnMasuk" class="register-modal-opener btn btn-outline-primary mr-2 pr-3 pl-3" data-toggle="modal" data-target="#exampleModalCenter">Masuk</a>
                       <a href="<?= base_url("auth/register") ?>" class="register-modal-opener btn btn-primary pr-3 pl-3">Daftar</a>
                   <?php else : ?>
                       <a href="<?= base_url("auth/logout") ?>" class="register-modal-opener btn btn-primary pr-3 pl-3">Keluar</a>
                   <?php endif ?>

               </div>
           </div>
       </nav>

       <div class="mobile-menu">
           <div class="search-form-box">
               <form method="get" action="<?= base_url("topik") ?>" class="search-form">
                   <input name="search" type="search" class="search-field p-2" placeholder="Cari Apa Saja ...">
                   <button type="submit" class="search-submit">
                       <i class="material-icons open-search">search</i>
                       <i class="material-icons close-search">close</i>
                   </button>
               </form>
           </div>
           <div class="shopping-cart-box">
               <a class="shop-icon" href="<?= base_url("keranjang") ?>">
                   <i class="material-icons">shopping_cart</i> Cart
                   <?php if (sizeof($keranjang_) > 0) : ?>
                       <span class="studiare-cart-number"><?= sizeof($keranjang_) ?></span>
                   <?php endif ?>
               </a>
           </div>
           <nav class="mobile-nav">
               <ul class="mobile-menu-list">
                   <li class="drop-link">
                       <a class="" href="<?= base_url() ?>">Beranda</a>
                   </li>

                   <li class="drop-link">
                       <a href="#">Topik Kelas</a>
                       <ul class="drop-level">
                           <li>
                               <a href="<?= base_url("topik/") ?>">Semua Topik</a>
                           </li>
                           <?php foreach ($topik as $tp) : ?>
                               <li class="<?= (sizeof($tp["sub"]) > 0) ? "drop-link" : "" ?>">
                                   <a href="<?= base_url("topik/" . $tp["slug"]) ?>"><?= $tp["nama"] ?></a>
                                   <?= getSubKategori2($tp["sub"]) ?>
                               </li>
                           <?php endforeach ?>

                           <?php
                            function getSubKategori2($kategoriArray = [])
                            {
                                $string = "";
                                if (sizeof($kategoriArray) > 0) {
                                    $string .= '<ul class="drop-level">';
                                    foreach ($kategoriArray as $dt) {
                                        $class = sizeof($dt["sub"]) > 0 ? "drop-link" : "";
                                        $string .= '<li class="' . $class . '">';
                                        $string .= '<a href="' . base_url("topik/" . $dt["slug"]) . '">' . $dt["nama"] . '</a>';
                                        $string .= getSubKategori2($dt["sub"]);
                                    }
                                    $string .= "</ul>";
                                }
                                return $string;
                            }
                            ?>
                       </ul>
                   </li>

                   <li class="drop-link">
                       <a class="" href="<?= base_url() ?>">Merchandise</a>
                   </li>

                   <li class="drop-link">
                       <a class="" href="<?= base_url() ?>">Tentang <?= $app_name ?></a>
                   </li>

               </ul>
           </nav>
       </div>

   </header>
   <!-- End Header -->

   <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;" id="exampleModalCenterTitle">
                       <?= $app_name ?> - Masuk Sekarang</h2>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <div class="container-fluid">
                       <br>
                       <div class="row">
                           <div class="col-md-6 text-center">
                               <img src="<?= asset("frontend/login.png") ?>" class="img-fluid img-responsive mx-auto " style="height: 350px;">
                           </div>
                           <div class="col-md-6">
                               <form action="<?= base_url("auth/login") ?>" id="formLogin" method="post">
                                   <div class="form-group">
                                       <label class="label-font" for="exampleFormControlInput1">Email</label>
                                       <input type="text" value="" class="form-control" name="email" autocomplete="off" id="email" placeholder="Masukan email mu disini ..">
                                   </div>
                                   <div class="form-group">
                                       <label class="label-font" for="exampleFormControlInput1">Password</label>
                                       <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password mu disini ..">
                                   </div>
                                   <p class="terms">
                                       Belum punya akun? daftar <a href="<?= base_url("auth/register") ?>"> disini.</a>
                                   </p>
                                   <button id="btnsubmit" class="btn btn-info text-center" href="#" style="width: 100%;">Masuk</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>