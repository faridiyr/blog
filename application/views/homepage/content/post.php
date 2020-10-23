 <!-- ***** Breadcrumb Area Start ***** -->
 <div class="breadcrumb-area">
     <div class="container h-100">
         <div class="row h-100 align-items-end">
             <div class="col-12">
                 <div class="breadcumb--con">
                     <h2 class="title"><?= $title ?></h2>
                     <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                             <li class="breadcrumb-item"><a href="<?= site_url('Home') ?>"><i class="fa fa-home"></i> Home</a></li>
                             <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                         </ol>
                     </nav>
                 </div>
             </div>
         </div>


     </div>

     <!-- Background Curve -->
     <div class="breadcrumb-bg-curve">
         <img src="<?= base_url('assets/homepage/') ?>img/core-img/curve-5.png" alt="">
     </div>
 </div>
 <!-- ***** Breadcrumb Area End ***** -->

 <!-- ***** Blog Area Start ***** -->
 <div class="uza-blog-area section-padding-80">
     <div class="container">

         <div class="container" style="text-align: -webkit-center">
             <div class="accordion" id="accordionExample" style="max-width: 400px; text-align:center">
                 <div class="card">
                     <div class="card-header" id="headingThree">
                         <h2 class="mb-0">
                             <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapseThree">
                                 Kategori
                             </button>
                         </h2>
                     </div>
                     <div id="collapse" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                         <div class="card-body">
                             <ul class="list-group">
                                 <a href="<?= site_url('Post') ?>">
                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                         All
                                         <span class="badge badge-primary badge-pill"><?= $total_post ?></span>
                                     </li>
                                 </a>
                                 <?php foreach ($kategori as $item) { ?>
                                     <a href="<?= site_url('Post/by_kategori/' . $item['idkategori']) ?>">
                                         <li class="list-group-item d-flex justify-content-between align-items-center">
                                             <?= $item['nama'] ?>
                                             <span class="badge badge-primary badge-pill"></span>
                                         </li>
                                     </a>
                                     <!-- </form> -->
                                 <?php } ?>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <br>
         <br>
         <br>
         <br>
         <div class="row">
             <?php
                foreach ($post as $item) {
                    $date = $item['tgl_update'];
                    $dateformat_tanggal = date("d", strtotime($date));
                    $dateformat_bulan_tahun = date("M Y", strtotime($date));

                ?>
                 <!-- Single Blog Post -->
                 <div class="col-12 col-lg-4">
                     <div class="single-blog-post bg-img mb-80" style="background-image: url(<?php echo base_url('assets/upload/post/' . $item['gambar_post']) ?>">
                         <!-- Post Content -->
                         <div class="post-content">
                             <span class="post-date"><span><?= $dateformat_tanggal ?></span><?= $dateformat_bulan_tahun ?></span>
                             <a href="<?= site_url('Post/detail_post/' . $item['idpost']) ?>" class="post-title"><?= $item['judul'] ?></a>
                             <h6>by&ensp;<span style="color: blue; font-family:Arial, Helvetica, sans-serif"><?= $item['nama'] ?></span></h6>
                             <p><?php
                                $isi = $item['isi_post'];
                                if (strlen($isi) >= 100) {
                                    echo textShorten($item['isi_post'], 150);
                                } else {
                                    echo $item['isi_post'];
                                }
                                ?></p>
                             <a href="<?= site_url('Post/detail_post/' . $item['idpost']) ?>" class="read-more-btn">Read More <i class="arrow_carrot-2right"></i></a>
                         </div>
                     </div>
                 </div>
             <?php
                }
                ?>

         </div>

         <!-- <div class="row">
             <div class="col-12 text-center">
                 <a href="#" class="btn uza-btn btn-3">Load More</a>
             </div>
         </div> -->

     </div>
 </div>
 <!-- ***** Blog Area End ***** -->