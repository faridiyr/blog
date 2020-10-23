<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('Dashboard_Admin') ?>"><i class="fas fa-fw fa-tachometer-alt"></i>&ensp;Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <br>
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

            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah-penulis">
                <span btn-icon-left>
                    <i class="fa fa-plus"></i> Tambah Data
                </span>
            </button>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>No Telepon</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($penulis as $item) {
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $item['nama'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['alamat'] ?></td>
                                <td><?= $item['kota'] ?></td>
                                <td><?= $item['no_telp'] ?></td>
                                <td>
                                    <img src="<?= base_url('assets/upload/avatar/' . $item['file_gambar']) ?>" alt="" style="max-width: 300px;">
                                </td>
                                <td>

                                    <!-- Tombol Edit -->
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-kategori<?= $item['idpenulis'] ?>">
                                        <span btn-icon-left>
                                            <i class="fa fa-edit"></i>
                                        </span>
                                        Edit</button>

                                    <!-- Tombol Reset Password -->
                                    <button onclick="reset_repositori_ajax(<?= $item['idpenulis'] ?>)" type="submit" class="btn btn-warning btn-sm">
                                        <span btn-icon-left>
                                            <i class="fa fa-key"></i>
                                        </span>
                                        Reset</button>

                                    <!-- Tombol Hapus -->
                                    <button onclick="delete_repositori_ajax(<?= $item['idpenulis'] ?>)" type="submit" class="btn btn-danger btn-sm">
                                        <span btn-icon-left>
                                            <i class="fa fa-trash"></i>
                                        </span>
                                        Hapus</button>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!--Modal dialog box for edit penulis-->
<?php foreach ($penulis as $item) { ?>
    <div class="modal modal-primary fade" id="modal-edit-kategori<?= $item['idpenulis']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Penulis</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" enctype="multipart/form-data" action="<?= site_url('Kelola_Kategori/edit_penulis'); ?>" method="POST">
                        <input hidden type="text" class="form-control" id="idpenulis" name="idpenulis" value="<?= $item['idpenulis'] ?>" required>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Penulis :</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $item['nama'] ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" value="1" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!--Modal dialog box for tambah penulis-->
<div class="modal modal-primary fade" id="modal-tambah-penulis">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Penulis</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" enctype="multipart/form-data" action="<?= site_url('Kelola_Penulis/tambah_penulis'); ?>" method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama :</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= set_value('email'); ?>" minlength="4" maxlength="50" required>
                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="staticEmail" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" required>
                        <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Alamat:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= set_value('alamat'); ?>" minlength="4" maxlength="100" required>
                        <?= form_error('address', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Kota:</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?= set_value('city'); ?>" minlength="4" maxlength="100" required>
                        <?= form_error('city', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">No Telepon:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone'); ?>" required>
                        <?= form_error('phone', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Password Default:</label>
                        <input type="text" readonly class="form-control-plaintext" id="password" name="password" value="penulis">
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Gambar Default:</label>
                        <input type="text" readonly class="form-control-plaintext" id="file_gambar" name="file_gambar" value="default_penulis.png">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" value="1" name="tambah" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function delete_repositori_ajax(idkategori) {
        if (confirm("Anda yakin ingin menghapus data ini ?")) {
            ;
            $.ajax({
                url: 'Kelola_Kategori/delete_kategori',
                type: 'POST',
                data: {
                    idkategori: idkategori
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
</script>