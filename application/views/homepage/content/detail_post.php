<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title">Blog Single</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url('Home') ?>"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= site_url('Post') ?>">Post</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $post->judul ?></li>
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

<!-- ***** Blog Details Area Start ***** -->
<section class="blog-details-area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-details-content">
                    <!-- Post Details Text -->
                    <div class="post-details-text">

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <div class="post-content text-center mb-50">
                                    <?php
                                    $date = $post->tgl_update;
                                    $dateformat_tanggal = date("d", strtotime($date));
                                    $dateformat_bulan_tahun = date("M Y", strtotime($date));
                                    ?>
                                    <div class="post-date"><span><?= $dateformat_tanggal ?></span>&ensp;<?= $dateformat_bulan_tahun ?></div>
                                    <h2><?= $post->judul ?></h2>
                                </div>
                            </div>
                            <div class="col-12">
                                <img class="mb-50" src="<?= base_url('assets/upload/post/' . $post->gambar_post) ?>" alt="" style="width: 1200px; height: 600px">
                            </div>
                            <div class="col-12 col-lg-10">
                                <p>
                                    <?= $post->isi_post ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Details Area End ***** -->