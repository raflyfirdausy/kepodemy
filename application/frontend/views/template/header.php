   <!-- Header ================================================== -->
   <header class="clearfix">

       <form class="search_bar" style="height: 75px; margin-top: 0px;">
           <div class="container">
               <input type="search" class="search-input" placeholder="Cari Apa Saja" style="padding: 23px 45px 32px 0;">
               <button type="submit" class="submit">
                   <i class="material-icons">search</i>
               </button>
           </div>
       </form>

       <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 75px;">
           <div class="container">

               <a class="navbar-brand" href="index.html">
                   <img src="<?= "assets/user/images/tp.png" ?>" height="50px" alt="">
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
                           <a href="javascript.void(0)">Topik Kelas<i class="fa fa-angle-down"></i></a>
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
                           <a class="" href="<?= "#" ?>">Tentang <?= $app_name ?></a>
                       </li>e

                       <!-- <li><a href="#">Kalender</a></li> -->
                       <!-- <li><a href="#">Buku</a></li>
                <li><a href="#">Merchandise</a></li> -->

                   </ul>
                   <button class="search-icon btn">
                       <i class="material-icons open-search">search</i>
                       <i class="material-icons close-search" style="display: none;">close</i>
                   </button>
                   <a href="#" class="btn btn-sm mr-2"><i class="material-icons">shopping_cart</i><span style="vertical-align: top;color:#fff;padding:3px;background-color: #4783f3;line-height: 15px;font-size: 11px;border-radius: 3px;margin-top: -20px;margin-left: 0px;text-align: center;">10</span></a>

                   <a href="#" class="register-modal-opener btn btn-outline-primary mr-2 pr-3 pl-3" data-toggle="modal" data-target="#exampleModalCenter">Masuk</a>
                   <a href="#" class="register-modal-opener btn btn-primary pr-3 pl-3">Daftar</a>
               </div>
           </div>
       </nav>

       <div class="mobile-menu">
           <div class="search-form-box">
               <form class="search-form">
                   <input type="search" class="search-field p-2" placeholder="Enter keyword...">
                   <button type="submit" class="search-submit">
                       <i class="material-icons open-search">search</i>
                       <i class="material-icons close-search">close</i>
                   </button>
               </form>
           </div>
           <div class="shopping-cart-box">
               <a class="shop-icon" href="cart.html">
                   <i class="material-icons">shopping_cart</i> Cart
                   <span class="studiare-cart-number">0</span>
               </a>
           </div>
           <nav class="mobile-nav">
               <ul class="mobile-menu-list">
                   <li>
                       <a href="index.html">Home</a>
                   </li>
                   <li class="drop-link">
                       <a href="#">Pages</a>
                       <ul class="drop-level">
                           <li><a href="about.html">About Us</a></li>
                           <li><a href="pricing.html">Pricing Packages</a></li>
                           <li><a href="portfolio.html">Portfolio</a></li>
                           <li><a href="single-project.html">Portfolio Single</a></li>
                           <li><a href="teachers.html">Teachers</a></li>
                           <li><a href="single-teacher.html">Teacher Single</a></li>
                           <li><a href="cart.html">Shopping Cart</a></li>
                           <li><a href="checkout.html">Checkout</a></li>
                           <li><a href="single-teacher.html">Teacher Single</a></li>
                           <li class="drop-link">
                               <a href="#">Submenu Level 1</a>
                               <ul class="drop-level">
                                   <li><a href="#">Submenu Level 2</a></li>
                                   <li class="drop-link">
                                       <a href="#">Submenu Level 2</a>
                                       <ul class="drop-level">
                                           <li><a href="#">Submenu Level 3</a></li>
                                           <li><a href="#">Submenu Level 3</a></li>
                                       </ul>
                                   </li>
                                   <li><a href="#">Submenu Level 2</a></li>
                               </ul>
                           </li>
                       </ul>
                   </li>
                   <li class="drop-link">
                       <a href="blog.html">Blog</a>
                       <ul class="drop-level">
                           <li class="drop-link">
                               <a href="blog-list.html">Blog List</a>
                               <ul class="drop-level">
                                   <li><a href="blog-list-leftsidebar.html">Blog List - Sidebar Left</a></li>
                                   <li><a href="blog-list-rightsidebar.html">Blog List - Sidebar Right</a></li>
                                   <li><a href="blog-list.html">No Sidebar</a></li>
                               </ul>
                           </li>
                           <li class="drop-link">
                               <a href="blog-grid-3.html">Blog Grid</a>
                               <ul class="drop-level">
                                   <li><a href="blog-grid-3.html">3 Column</a></li>
                                   <li><a href="blog-grid-4.html">4 Column</a></li>
                                   <li><a href="blog-grid-leftsidebar.html">Sidebar Left</a></li>
                                   <li><a href="blog-grid-rightsidebar.html">Sidebar Right</a></li>
                               </ul>
                           </li>
                           <li><a href="blog.html">Blog Classic</a></li>
                           <li><a href="single-post.html">Post Single</a></li>
                       </ul>
                   </li>
                   <li>
                       <a href="courses.html">Courses</a>
                   </li>
                   <li>
                       <a href="events.html">Events</a>
                   </li>
                   <li>
                       <a href="contact.html">Contact</a>
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
                       Kepodemy - Masuk Sekarang</h2>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <div class="container-fluid">
                       <br>
                       <div class="row">
                           <div class="col-md-6 text-center">
                               <img src="http://localhost/learnify/assets/img/modal-login-2.png" class="img-fluid img-responsive mx-auto " style="height: 350px;">
                           </div>
                           <div class="col-md-6">
                               <form action="" method="post">
                                   <div class="form-group">
                                       <label class="label-font" for="exampleFormControlInput1">Email</label>
                                       <input type="text" value="" class="form-control" name="email" autocomplete="off" id="email" placeholder="Masukan email mu disini ..">
                                   </div>
                                   <div class="form-group">
                                       <label class="label-font" for="exampleFormControlInput1">Password</label>
                                       <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password mu disini ..">
                                   </div>
                                   <div class="form-check mt-2">
                                       <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                       <label class="form-check-label" for="defaultCheck1">Ingat saya.
                                       </label>
                                   </div>
                                   <p class="terms">Dengan login anda menyetujui
                                       <i>privasi dan persyaratan ketentuanhukum kami </i> . belum punya akun? daftar <a href="7. Pendaftaran.html"> disini.</a>
                                   </p>
                                   <button class="btn btn-block font-weight-bold" style="background-color: #4dbf1c;color:white;font-size:18px;">Login Sekarang!</button>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>