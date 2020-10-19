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

         <div class="row">
             <form action="" class="form-inline" method="POST">
                 <div class="form-group mb-2">
                     <h4>Kategori :&emsp;</h4>
                     <select class="form-control" name="kategori" id="kategori">
                         <option value="all">All Kategori</option>
                         <?php
                            foreach ($kategori as $item) {
                                echo '<option value="' . $item['idkategori'] . '">' . $item['nama'] . '</option>';
                            }
                            ?>
                     </select>
                     &emsp;
                     <button type="button" class="btn btn-primary">Apply</button>
                 </div>
             </form>
         </div>
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
                     <div class="single-blog-post bg-img mb-80" style="background-image: url(<?php echo base_url('assets/upload/post/' . $item['file_gambar']) ?>">
                         <!-- Post Content -->
                         <div class="post-content">
                             <span class="post-date"><span><?= $dateformat_tanggal ?></span><?= $dateformat_bulan_tahun ?></span>
                             <a href="#" class="post-title"><?= $item['judul'] ?></a>
                             <p><?php
                                $isi = $item['isi_post'];
                                if (strlen($isi) >= 100) {
                                    echo textShorten($item['isi_post'], 150);
                                } else {
                                    echo $item['isi_post'];
                                }
                                ?></p>
                             <a href="#" class="read-more-btn">Read More <i class="arrow_carrot-2right"></i></a>
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