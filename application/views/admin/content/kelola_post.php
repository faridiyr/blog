<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <br>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('Dashboard_Penulis') ?>"><i class="fas fa-fw fa-tachometer-alt"></i>&ensp;Dashboard</a></li>
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

            <a href="<?= site_url('Kelola_Post/tambah_post') ?>">
                <button type="button" class="btn btn-primary btn-sm">
                    <span btn-icon-left>
                        <i class="fa fa-plus"></i> Tambah Data
                    </span>
                </button>
            </a>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Isi</th>
                            <th>Tanggal Insert</th>
                            <th>Tanggal Update</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($post as $item) {
                            $date_insert = $item['tgl_insert'];
                            $date_update = $item['tgl_update'];
                            $date_format_insert = date("d M Y", strtotime($date_insert));
                            $date_format_update = date("d M Y", strtotime($date_update));
                            $no++;
                        ?>
                            <tr>
                                <td style="width: 50px;"><?= $no ?></td>
                                <td style="width: 200px;"><?= $item['judul'] ?></td>
                                <td style="width: 100px;"><?= $item['namakategori'] ?></td>
                                <td style="width: 800px;"><?= $item['isi_post'] ?></td>
                                <td style="width: 100px;"><?= $date_format_insert ?></td>
                                <td style="width: 100px;"><?= $date_format_update ?></td>
                                <td style="width: 200px;">
                                    <img src="<?= base_url('assets/upload/post/' . $item['gambar_post']) ?>" alt="" style="max-height: 100px; max-width:200px">

                                </td>
                                <td style="width: 200px;">
                                    <!-- Tombol Edit -->
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-kategori<?= $item['idpost'] ?>">
                                        <span btn-icon-left>
                                            <i class="fa fa-edit"></i>
                                        </span>
                                        Edit</button>

                                    <!-- Tombol Hapus -->
                                    <button onclick="delete_repositori_ajax(<?= $item['idpost'] ?>)" type="submit" class="btn btn-danger btn-sm">
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

<script type="text/javascript">
    function delete_repositori_ajax(idpost) {
        if (confirm("Anda yakin ingin menghapus data ini ?")) {
            ;
            $.ajax({
                url: 'Kelola_Post/delete_post',
                type: 'POST',
                data: {
                    idpost: idpost
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