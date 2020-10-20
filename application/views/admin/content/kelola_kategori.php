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

            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah-kategori">
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
                            <th>ID Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($kategori as $item) {
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $item['nama'] ?></td>
                                <td><?= $item['idkategori'] ?></td>
                                <td>

                                    <!-- Tombol Edit -->
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-kategori<?= $item['idkategori'] ?>">
                                        <span btn-icon-left>
                                            <i class="fa fa-edit"></i>
                                        </span>
                                        Edit</button>

                                    <!-- Tombol Hapus -->
                                    <button onclick="delete_repositori_ajax(<?= $item['idkategori'] ?>)" type="submit" class="btn btn-danger btn-sm">
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

<!--Modal dialog box for edit kategori-->
<?php foreach ($kategori as $item) { ?>
    <div class="modal modal-primary fade" id="modal-edit-kategori<?= $item['idkategori']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kategori</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" enctype="multipart/form-data" action="<?= site_url('Kelola_Kategori/edit_kategori'); ?>" method="POST">
                        <input hidden type="text" class="form-control" id="idkategori" name="idkategori" value="<?= $item['idkategori'] ?>" required>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Kategori :</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $item['nama'] ?>" required>
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

<!--Modal dialog box for tambah kategori-->
<div class="modal modal-primary fade" id="modal-tambah-kategori">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" enctype="multipart/form-data" action="<?= site_url('Kelola_Kategori/tambah_kategori'); ?>" method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama Kategori :</label>
                        <input type="text" class="form-control" id="nama" name="nama" maxlength="100" required>
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