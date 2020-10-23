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
                                    <h5>by <?= $post->nama ?></h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <img class="mb-50" src="<?= base_url('assets/upload/post/' . $post->gambar_post) ?>" alt="" style="width: 1200px; height: 600px">
                            </div>
                            <div class="col-12 col-lg-10">
                                <p>
                                    <?= $post->isi_post ?>
                                </p>

                                <!-- Post Catagories & Post Share -->
                                <div class="d-flex align-items-center justify-content-between">
                                    <!-- Post Catagories -->
                                    <div class="post-catagories">
                                        <ul class="d-flex flex-wrap align-items-center">
                                            <li><a href="<?= site_url('Post/by_kategori/' . $post->idkategori) ?>"><?= $post->nama_kategori ?></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Comments Area -->
                                <div class="comment_area mb-50 clearfix">
                                    <h5 class="title"><?= $total_comment ?>&ensp;Comments</h5>
                                    <ol>
                                        <?php foreach ($comment as $item) {
                                            $date = $item['tgl_update'];
                                            $date_format = date("d M Y H:i", strtotime($date));
                                        ?>
                                            <!-- Single Comment Area -->
                                            <li class="single_comment_area">
                                                <!-- Comment Content -->
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <div class="comment-content d-flex">
                                                                <!-- Comment Author -->
                                                                <div class="comment-author">
                                                                    <img src="<?= base_url('assets/upload/avatar/' . $item['gambar']) ?>" alt="author">
                                                                </div>
                                                                <!-- Comment Meta -->
                                                                <div class="comment-meta">
                                                                    <a href="#" class="post-date"><?= $date_format ?></a>
                                                                    <h5><?= $item['nama'] ?></h5>
                                                                    <p>
                                                                        <?= $item['isi'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <?php if ($this->session->userdata('id') == $post->idpenulis) { ?>
                                                                <button data-toggle="modal" data-target="#modal-delete-komentar<?= $item['idkomentar'] ?>" class="btn btn-danger btn-sm">
                                                                    <span btn-icon-left>
                                                                        <i class="fa fa-trash"></i>
                                                                    </span>
                                                                    &ensp;Delete</button>
                                                            <?php } ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ol>
                                </div>

                                <!-- Leave A Reply -->
                                <div class="uza-contact-form">
                                    <h2 class="mb-4">Leave A Comment</h2>

                                    <?php if ($this->session->userdata('level') == null) { ?>
                                        <div class="container">
                                            <div class="alert alert-danger" role="alert">
                                                Please login to leave a comment !
                                            </div>
                                        </div>
                                    <?php  } elseif ($this->session->userdata('level') == 'admin') { ?>
                                        <div class="container">
                                            <div class="alert alert-danger" role="alert">
                                                <strong>Are you Admin?</strong> Admin cannot leave a comment !
                                            </div>
                                        </div>
                                    <?php } elseif ($this->session->userdata('level') == 'penulis') { ?>

                                        <?php if ($this->session->flashdata('notification_berhasil') != '') { ?>
                                            <div class="container">
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <?php echo $this->session->flashdata('notification_berhasil'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } elseif ($this->session->flashdata('notification_gagal') != '') { ?>
                                            <div class="container">
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <?php echo $this->session->flashdata('notification_gagal'); ?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <!-- Form -->
                                        <form action="<?= site_url('Post/post_comment') ?>" autocomplete="on" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input hidden type="text" class="form-control" name="idpost" id="idpost" value="<?= $post->idpost ?>">
                                                    <textarea name="message" class="form-control mb-30" placeholder="Comment"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" name="post_comment" class="btn uza-btn btn-3 mt-15">Post Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Blog Details Area End ***** -->

<!-- modal delete komentar -->
<?php foreach ($comment as $item) { ?>
    <div class="modal modal-primary fade" id="modal-delete-komentar<?= $item['idkomentar']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this comment ?
                    <form role="form" action="<?= site_url('Post/delete_komentar') ?>" method="POST">
                        <div class="form-group">
                            <input hidden type="text" name="idkomentar" id="idkomentar" value="<?= $item['idkomentar'] ?>">
                            <input hidden type="text" name="idpost" id="idpost" value="<?= $item['idpost'] ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- <script type="text/javascript">
    function delete_repositori_ajax(idkomentar) {
        if (confirm("Anda yakin ingin menghapus data ini ?")) {
            ;
            $.ajax({
                url: 'Post/delete_komentar',
                type: 'POST',
                data: {
                    idkomentar: idkomentar
                },
                success: function() {
                    alert('Delete data berhasil');
                    location.reload();
                },
                error: function() {
                    alert('Delete data gagal');
                }
            });
        }
    }
</script> -->