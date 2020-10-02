 <!-- home-section -->
 <section id="home-section">
     <div id="rev_slider_202_1_wrapper" class="rev_slider_wrapper" data-alias="concept1" style="background-color:#000000;padding:0px;">
         <!-- START REVOLUTION SLIDER 5.1.1RC fullscreen mode -->
         <div id="rev_slider_202_1" class="rev_slider" data-version="5.1.1RC">
             <ul>
                 <!-- SLIDE  -->
                 <?php $index = 0;
                    foreach ($slider as $s) : ?>

                     <li data-index="rs-<?= $index ?>" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?= asset("slider/" . $s->foto) ?>" data-rotate="0" data-saveperformance="off" data-title="unique" data-description="">
                         <!-- MAIN IMAGE -->
                         <img src="<?= asset("slider/" . $s->foto) ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                         <!-- LAYERS -->

                         <!-- LAYER NR. 1 -->
                         <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme" id="slide-672-layer-1" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['130','130','130','130']" data-width="['530','530','430','420']" data-height="330" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="500" data-responsive_offset="on" style="z-index: 5;background-color:rgba(255, 255, 255, 1.00);border-color:rgba(0, 0, 0, 0);">
                         </div>

                         <!-- LAYER NR. 2 -->
                         <div class="tp-caption Woo-TitleLarge tp-resizeme" id="slide-672-layer-2" data-x="['left','left','left','left']" data-hoffset="['40','40','40','35']" data-y="['top','top','top','top']" data-voffset="['170','170','170','170']" data-width="450" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="700" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; min-width: 370px; max-width: 450px; white-space: normal;text-align:left;">
                             <?= $s->judul ?>
                         </div>

                         <!-- LAYER NR. 3 -->
                         <div class="tp-caption tp-shape tp-shapewrapper tp-line-shape tp-resizeme" id="slide-672-layer-3" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['165','165','165','165']" data-width="['3','3','3','3']" data-height="100" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="700" data-responsive_offset="on" style="z-index: 6;">
                         </div>

                         <!-- LAYER NR. 4 -->
                         <div class="tp-caption Woo-Rating tp-resizeme" id="slide-672-layer-4" data-x="['left','left','left','left']" data-hoffset="['40','40','40','35']" data-y="['top','top','top','top']" data-voffset="['286','286','286','286']" data-width="450" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="800" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 8; min-width: 370px; max-width: 450px; white-space: normal; text-align:left;">
                             <?= $s->keterangan ?>
                         </div>

                         <!-- LAYER NR. 5 -->
                         <div class="tp-caption tp-resizeme" id="slide-672-layer-5" data-x="['left','left','left','left']" data-hoffset="['407','407','407','407']" data-y="['top','top','top','top']" data-voffset="['337','337','337','337']" data-width="120" data-height="none" data-whitespace="normal" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="1100" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 10; min-width: 100px; max-width: 100px; white-space: normal; text-align:center;">
                             <!-- <img src="upload/slider/price-1.png" alt=""> -->
                         </div>
                     </li>
                 <?php $index++;
                    endforeach ?>
             </ul>
             <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
         </div>
     </div>
     <!-- END REVOLUTION SLIDER -->
 </section>
 <!-- End home section -->

 <!-- feature-section -->
 <section class="feature-section">
     <div class="container">
         <div class="feature-box">
             <div class="row">
                 <div class="col-lg-4 col-md-6">
                     <div class="feature-post">
                         <div class="icon-holder">
                             <i class="fa fa-umbrella"></i>
                         </div>
                         <div class="feature-content">
                             <h2>
                                 150.000 kelas online
                             </h2>
                             <p>Nikmati berbagai topik bar</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <div class="feature-post">
                         <div class="icon-holder color2">
                             <i class="fa fa-id-card-o"></i>
                         </div>
                         <div class="feature-content">
                             <h2>
                                 Instruksi dari pakarnya
                             </h2>
                             <p>Temukan instruktur yang tepat untuk Anda</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <div class="feature-post">
                         <div class="icon-holder color3">
                             <i class="fa fa-handshake-o"></i>
                         </div>
                         <div class="feature-content">
                             <h2>
                                 Akses seumur hidup
                             </h2>
                             <p>Belajar sesuai jadwal Anda</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- End feature section -->

 <!-- collection-section -->
 <section class="collection-section">
     <div class="container">
         <div class="title-section">
             <div class="left-part">
                 <span></span>
                 <h1>Kategori Paling Populer</h1>
             </div>
             <div class="right-part">
                 <a class="button-one" href="#">Lihat Semua Kategori</a>
             </div>
         </div>
         <div class="collection-box">
             <div class="row">
                 <div class="col-lg-6 col-md-12">
                     <div class="collection-post">
                         <div class="inner-collection">
                             <img style="width:120%; height: 422px; object-fit: cover" src="<?= asset("kategori/" . $kategori_populer[0]["gambar"]) ?>" alt="">
                             <a href="#" class="hover-post">
                                 <span class="title"><?= $kategori_populer[0]["nama"] ?></span>
                                 <span class="numb-courses"><?= sizeof($kategori_populer[0]["produk_kategori"]) ?> Kelas</span>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                     <div class="collection-post">
                         <div class="inner-collection">
                             <img style="width:120%; height: 200px; object-fit: cover" src="<?= asset("kategori/" . $kategori_populer[1]["gambar"]) ?>" alt="">
                             <a href="#" class="hover-post">
                                 <span class="title"><?= $kategori_populer[1]["nama"] ?></span>
                                 <span class="numb-courses"><?= sizeof($kategori_populer[1]["produk_kategori"]) ?> Kelas</span>
                             </a>
                         </div>
                     </div>
                     <div class="collection-post">
                         <div class="inner-collection">
                             <img style="width:120%; height: 200px; object-fit: cover" src="<?= asset("kategori/" . $kategori_populer[2]["gambar"]) ?>" alt="">
                             <a href="#" class="hover-post">
                                 <span class="title"><?= $kategori_populer[2]["nama"] ?></span>
                                 <span class="numb-courses"><?= sizeof($kategori_populer[2]["produk_kategori"]) ?> Kelas</span>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                     <div class="collection-post">
                         <div class="inner-collection">
                             <img style="width:120%; height: 200px; object-fit: cover" src="<?= asset("kategori/" . $kategori_populer[3]["gambar"]) ?>" alt="">
                             <a href="#" class="hover-post">
                                 <span class="title"><?= $kategori_populer[3]["nama"] ?></span>
                                 <span class="numb-courses"><?= sizeof($kategori_populer[3]["produk_kategori"]) ?> Kelas</span>
                             </a>
                         </div>
                     </div>
                     <div class="collection-post">
                         <div class="inner-collection">
                             <img style="width:120%; height: 200px; object-fit: cover" src="<?= asset("kategori/" . $kategori_populer[4]["gambar"]) ?>" alt="">
                             <a href="#" class="hover-post">
                                 <span class="title"><?= $kategori_populer[4]["nama"] ?></span>
                                 <span class="numb-courses"><?= sizeof($kategori_populer[4]["produk_kategori"]) ?> Kelas</span>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
 </section>
 <!-- End collection section -->

 <!-- popular-courses-section  -->
 <section class="popular-courses-section p-0">
     <div class="container">
         <div class="title-section">
             <div class="left-part">
                 <span></span>
                 <h1>Pilihan kelas terbanyak</h1>
             </div>
             <div class="right-part">
                 <a class="button-one" href="#">Lihat semua kelas</a>
             </div>
         </div>
         <div class="popular-courses-box">
             <div class="row">

                 <?php foreach ($kelas as $kel) : ?>
                     <div class="col-lg-3 col-md-6">
                         <div class="course-post">
                             <div class="course-thumbnail-holder">
                                 <a href="single-course.html">
                                     <img style="height: 200px;" src="<?= asset("gambar/" . $kel["gambar"]) ?>" alt="">
                                 </a>
                             </div>
                             <div class="course-content-holder">
                                 <div class="course-content-main">
                                     <h2 class="course-title">
                                         <a href="single-course.html"><?= $kel["nama"] ?></a>
                                     </h2>
                                     <div class="course-rating-teacher">
                                         <div class="star-rating has-ratings" title="Rated 5.00 out of 5">
                                             <span style="width:100%">
                                                 <span class="rating">0.00</span>
                                                 <span class="votes-number">0 Votes</span>
                                             </span>
                                         </div>
                                         <a href="#" class="course-loop-teacher"><?= $kel["pengajar"]->nama ?></a>
                                     </div>
                                 </div>
                                 <div class="course-content-bottom">
                                     <div class="course-students">
                                         <i class="material-icons">group</i>
                                         <span>0</span>
                                     </div>
                                     <div class="course-price">
                                         <span>Rp <?= $kel["harga_diskon"] > 0 ? ("<strike>" . Rupiah3($kel["harga"]) . "</strike> " . Rupiah3($kel["harga_diskon"])) : Rupiah3($kel["harga"]) ?></span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                 <?php endforeach ?>
             </div>
         </div>
     </div>
 </section>
 <!-- End popular-courses section -->

 <!-- events-section  -->
 <section class="events-section">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                 <div class="title-section">
                     <div class="left-part">
                         <span>Kalender</span>
                         <h1>kelas Terdekat</h1>
                     </div>
                 </div>

                 <div class="events-box">

                     <div class="events-post">
                         <div class="event-inner-content">
                             <div class="top-part">
                                 <div class="date-holder">
                                     <div class="date">
                                         <span class="date-day">22</span>
                                         <span class="date-month">Oct</span>
                                     </div>
                                 </div>
                                 <div class="content">
                                     <div class="event-meta">
                                         <span class="event-meta-piece start-time">
                                             <i class="material-icons">access_time</i> 6:00 am - 12:00 pm
                                         </span>
                                         <span class="event-meta-piece location">
                                             <i class="material-icons">location_on</i> Purwokerto, Jawa Tengah
                                         </span>
                                     </div>
                                     <h2 class="title"><a href="#">Contoh Judul kelas 1 </a></h2>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="events-post">
                         <div class="event-inner-content">
                             <div class="top-part">
                                 <div class="date-holder">
                                     <div class="date">
                                         <span class="date-day">23</span>
                                         <span class="date-month">Oct</span>
                                     </div>
                                 </div>
                                 <div class="content">
                                     <div class="event-meta">
                                         <span class="event-meta-piece start-time">
                                             <i class="material-icons">access_time</i> 6:00 am - 12:00 pm
                                         </span>
                                         <span class="event-meta-piece location">
                                             <i class="material-icons">location_on</i> Purwokerto, Jawa Tengah
                                         </span>
                                     </div>
                                     <h2 class="title"><a href="#">Contoh Judul kelas 2 </a></h2>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="events-post">
                         <div class="event-inner-content">
                             <div class="top-part">
                                 <div class="date-holder">
                                     <div class="date">
                                         <span class="date-day">24</span>
                                         <span class="date-month">Oct</span>
                                     </div>
                                 </div>
                                 <div class="content">
                                     <div class="event-meta">
                                         <span class="event-meta-piece start-time">
                                             <i class="material-icons">access_time</i> 6:00 am - 12:00 pm
                                         </span>
                                         <span class="event-meta-piece location">
                                             <i class="material-icons">location_on</i> Purwokerto, Jawa Tengah
                                         </span>
                                     </div>
                                     <h2 class="title"><a href="#">Contoh Judul kelas 3 </a></h2>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="title-section">
                     <div class="left-part">
                         <span>Tonton Video</span>
                         <h1>kelas Dimana Saja</h1>
                     </div>
                 </div>

                 <div class="video-box">
                     <div class="video-post">
                         <img src="upload/slider/slider-image-1.jpg" alt="">
                         <div class="hover-post">
                             <h2>Judul Video 1</h2>
                             <p>Deskripsi Video 1</p>
                         </div>
                         <a class="video-link iframe" href="https://vimeo.com/97447862"><span><i class="fa fa-play"></i></span></a>
                     </div>

                     <div class="row">
                         <div class="col-md-6">
                             <div class="video-post small-post">
                                 <img src="upload/slider/slider-image-1.jpg" alt="">
                                 <div class="hover-post">
                                     <h2>Judul Video 2</h2>
                                 </div>
                                 <a class="video-link iframe" href="https://vimeo.com/97447862"><span><i class="fa fa-play"></i></span></a>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="video-post small-post">
                                 <img src="upload/slider/slider-image-1.jpg" alt="">
                                 <div class="hover-post">
                                     <h2>Judul Video 3</h2>
                                 </div>
                                 <a class="video-link iframe" href="https://vimeo.com/97447862"><span><i class="fa fa-play"></i></span></a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </section>
 <!-- End events section -->

 <!-- testimonial-section 
			================================================== -->
 <section class="testimonial-section" style="background-color: white;">
     <div class="container">
         <div class="testimonial-box owl-wrapper">

             <div class="owl-carousel" data-num="1">

                 <div class="item">
                     <div class="testimonial-post">
                         <p> “Di Tambahpintar, mau kelas kapan aja tuh bisa. Kalo masih kurang jelas, bisa diulang-ulang juga videonya.”</p>
                         <div class="profile-test">
                             <div class="avatar-holder">
                                 <img style="width: 100; height: 100px;   background-position: center center; background-repeat: no-repeat;" src="upload/slider/slider-image-1.jpg" alt="">
                             </div>
                             <div class="profile-data">
                                 <h2>Rafly Firdausy Irawan</h2>
                                 <p>Programmer</p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="item">
                     <div class="testimonial-post">
                         <p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
                         <div class="profile-test">
                             <div class="avatar-holder">
                                 <img src="upload/testimonials/testimonial-avatar-3.jpg" alt="">
                             </div>
                             <div class="profile-data">
                                 <h2>Nicole Alatorre</h2>
                                 <p>Designer</p>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="item">
                     <div class="testimonial-post">
                         <p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
                         <div class="profile-test">
                             <div class="avatar-holder">
                                 <img src="upload/testimonials/testimonial-avatar-4.jpg" alt="">
                             </div>
                             <div class="profile-data">
                                 <h2>Nicole Alatorre</h2>
                                 <p>Designer</p>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
 </section>
 <!-- End testimonial section -->

 <!-- countdown-section -->
 <section class="countdown-section">
     <div class="container">
         <div class="countdown-box">
             <h1>Daftar Sebagai Pengajar</h1>
             <p>Pengajar terbaik mengajar ratusan pembelajar di <?= $app_name ?>. Kami menyediakan alat dan keterampilan untuk mengajarkan apa yang Anda sukai.</p>
             <a class="button-two" href="#">Daftar Sekarang</a>
         </div>
     </div>
 </section>
 <!-- End countdown section -->

 <section class="countdown-section" style="background-color: white;">
     <div class="">
         <div class="countdown-box">
             <h1 class="mb-5"><b>Pengurus <?= $app_name ?></b></h1>
             <div class="teachers-box">
                 <div class="row">
                     <div class="col-md-4">
                         <div class="teacher-post">
                             <a href="6. Detail Pengajar.html">
                                 <img src="<?= asset("user/upload/teachers/teacher4.jpg") ?>" alt="">
                                 <div class="hover-post">
                                     <h2>Rafli Firdausy Irawan</h2>
                                     <span>Web Developer</span>
                                 </div>
                             </a>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="teacher-post">
                             <a href="6. Detail Pengajar.html">
                                 <img src="<?= asset("user/upload/teachers/teacher4.jpg") ?>" alt="">
                                 <div class="hover-post">
                                     <h2>Rafli Firdausy Irawan</h2>
                                     <span>Web Developer</span>
                                 </div>
                             </a>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="teacher-post">
                             <a href="6. Detail Pengajar.html">
                                 <img src="<?= asset("user/upload/teachers/teacher4.jpg") ?>" alt="">
                                 <div class="hover-post">
                                     <h2>Rafli Firdausy Irawan</h2>
                                     <span>Web Developer</span>
                                 </div>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>


 <script type="text/javascript" src="<?= "assets/user/js/extensions/revolution.extension.slideanims.min.js" ?>"></script>
 <script type="text/javascript" src="<?= "assets/user/js/extensions/revolution.extension.actions.min.js" ?>"></script>
 <script type="text/javascript" src="<?= "assets/user/js/extensions/revolution.extension.layeranimation.min.js" ?>"></script>
 <script type="text/javascript" src="<?= "assets/user/js/extensions/revolution.extension.navigation.min.js" ?>"></script>
 <script type="text/javascript" src="<?= "assets/user/js/extensions/revolution.extension.parallax.min.js" ?>"></script>

 <script>
     var tpj = jQuery;
     var revapi202;
     tpj(document).ready(function() {
         if (tpj("#rev_slider_202_1").revolution == undefined) {
             revslider_showDoubleJqueryError("#rev_slider_202_1");
         } else {
             revapi202 = tpj("#rev_slider_202_1").show().revolution({
                 sliderType: "standard",
                 jsFileLocation: "js/",
                 dottedOverlay: "none",
                 delay: 5000,
                 navigation: {
                     keyboardNavigation: "off",
                     keyboard_direction: "horizontal",
                     mouseScrollNavigation: "off",
                     onHoverStop: "off",
                     arrows: {
                         enable: true,
                         style: 'gyges',
                         left: {
                             container: 'slider',
                             h_align: 'left',
                             v_align: 'center',
                             h_offset: 20,
                             v_offset: -60
                         },

                         right: {
                             container: 'slider',
                             h_align: 'right',
                             v_align: 'center',
                             h_offset: 20,
                             v_offset: -60
                         }
                     },
                     touch: {
                         touchenabled: "on",
                         swipe_threshold: 75,
                         swipe_min_touches: 50,
                         swipe_direction: "horizontal",
                         drag_block_vertical: false
                     },
                     bullets: {

                         enable: false,
                         style: 'persephone',
                         tmp: '',
                         direction: 'horizontal',
                         rtl: false,

                         container: 'slider',
                         h_align: 'center',
                         v_align: 'bottom',
                         h_offset: 0,
                         v_offset: 55,
                         space: 7,

                         hide_onleave: false,
                         hide_onmobile: false,
                         hide_under: 0,
                         hide_over: 9999,
                         hide_delay: 200,
                         hide_delay_mobile: 1200
                     }
                 },
                 responsiveLevels: [1210, 1024, 778, 480],
                 visibilityLevels: [1210, 1024, 778, 480],
                 gridwidth: [1210, 1024, 778, 480],
                 gridheight: [700, 700, 600, 600],
                 lazyType: "none",
                 parallax: {
                     type: "scroll",
                     origo: "slidercenter",
                     speed: 1000,
                     levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                     type: "scroll",
                 },
                 shadow: 0,
                 spinner: "off",
                 stopLoop: "off",
                 stopAfterLoops: -1,
                 stopAtSlide: -1,
                 shuffle: "off",
                 autoHeight: "off",
                 fullScreenAutoWidth: "off",
                 fullScreenAlignForce: "off",
                 fullScreenOffsetContainer: "",
                 fullScreenOffset: "0px",
                 disableProgressBar: "on",
                 hideThumbsOnMobile: "off",
                 hideSliderAtLimit: 0,
                 hideCaptionAtLimit: 0,
                 hideAllCaptionAtLilmit: 0,
                 debugMode: false,
                 fallbacks: {
                     simplifyAll: "off",
                     nextSlideOnWindowFocus: "off",
                     disableFocusListener: false,
                 }
             });
         }
     }); /*ready*/
 </script>