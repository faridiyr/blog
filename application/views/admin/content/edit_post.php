<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('Dashboard_Penulis') ?>"><i class="fas fa-fw fa-tachometer-alt"></i>&ensp;Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('Kelola_Post') ?>">Kelola Post</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <br>
    <?= $this->session->flashdata('notification') ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('notification_berhasil') != '') { ?>
                <div class="alert alert-success alert-dismissable">
                    <i class="glyphicon glyphicon-ok"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('notification_berhasil'); ?>
                </div>
            <?php } else if ($this->session->flashdata('notification_gagal') != '') { ?>
                <div class="alert alert-danger alert-dismissable">
                    <i class="glyphicon glyphicon-ok"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('notification_gagal'); ?>
                </div>
            <?php } ?>

            <form action="<?= site_url('Kelola_Post/edit_post/' . $post['idpost']) ?>" autocomplete="on" enctype="multipart/form-data" method="POST">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" maxlength="100" value="<?= $post['judul'] ?>" required>
                    </div>
                    <small style="color: red; padding-left: 10px">Maksimal 100 karakter</small>
                </div>
                <div class="form-group row">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="kategori" name="kategori">
                            <?php foreach ($kategori as $item) { ?>
                                <option value="<?= $item['idkategori'] ?>" <?php if ($item['idkategori'] == $post['idkategori']) {
                                                                                echo 'selected';
                                                                            } ?>><?= $item['nama'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="tgl_update" id="tgl_update" value="<?= $post['tgl_update'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isi" class="col-sm-2 col-form-label">Isi <span><small style="color: red; padding-left: 10px">* Tidak boleh kosong</small></span></label>
                    <div class="col-sm-10">
                        <textarea id="editor1" name="editor1" rows="5" type="text" required>
                            <?= $post['isi_post'] ?>
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label">File Gambar Lama</label>
                    <div class="col-sm-10">
                        <img src="<?= base_url('assets/upload/post/' . $post['file_gambar']) ?>" alt="" style="max-width: 600px;">
                        <input type="text" class="form-control-plaintext" name="file_gambar_lama" id="file_gambar_lama" value="<?= $post['file_gambar'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label">File Gambar Baru</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" name="file_gambar_baru" id="file_gambar_baru">
                    </div>
                    <small style="color: red; padding-left: 10px">Format .jpg / .jpeg / .png <br>Maks 2 MB</small>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->