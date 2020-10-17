<!-- ***** Welcome Area Start ***** -->
<section class="welcome-area">
    <div class="welcome-slides owl-carousel">

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide">
            <!-- Background Curve -->
            <div class="background-curve">
                <img src="<?php echo base_url('assets/homepage/') ?>img/core-img/curve-1.png" alt="">
            </div>

            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-text">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Uza makes your <br> biz <span>greater</span></h2>
                                <h5 data-animation="fadeInUp" data-delay="400ms">We love to create "cool" things on Digital Platforms</h5>
                                <a href="#" class="btn uza-btn btn-2" data-animation="fadeInUp" data-delay="700ms">Start Exploring</a>
                            </div>
                        </div>
                        <!-- Welcome Thumbnail -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-thumbnail">
                                <img src="<?php echo base_url('assets/homepage/') ?>img/bg-img/1.png" alt="" data-animation="slideInRight" data-delay="400ms">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide">
            <!-- Background Curve -->
            <div class="background-curve">
                <img src="<?php echo base_url('assets/homepage/') ?>img/core-img/curve-1.png" alt="">
            </div>

            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-text">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Uza makes your <br> biz <span>greater</span></h2>
                                <h5 data-animation="fadeInUp" data-delay="400ms">We love to create "cool" things on Digital Platforms</h5>
                                <a href="#" class="btn uza-btn btn-2" data-animation="fadeInUp" data-delay="700ms">Start Exploring</a>
                            </div>
                        </div>
                        <!-- Welcome Thumbnail -->
                        <div class="col-12 col-md-6">
                            <div class="welcome-thumbnail">
                                <img src="<?php echo base_url('assets/homepage/') ?>img/bg-img/1.png" alt="" data-animation="slideInRight" data-delay="400ms">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ***** Welcome Area End ***** -->

<!-- ***** Blog Area Start ***** -->
<section class="uza-blog-area">
    <!-- Background Curve -->
    <div class="blog-bg-curve">
        <img src="<?php echo base_url('assets/homepage/') ?>img/core-img/curve-4.png" alt="">
    </div>

    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Our Latest Blogs</h2>
                </div>
            </div>
        </div>

        <div class="row">

            <?php
            foreach ($recent_post as $item) {
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

        <div class="row">
            <div class="col-12 text-center">
                <a href="<?php echo site_url('Post'); ?>" class="btn uza-btn btn-3">See All</a>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Area End ***** -->