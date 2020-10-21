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

                    <div class="card mb-3" style="max-width: 800px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="
                                <?= base_url('assets/upload/avatar/'), $user->file_gambar ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <!-- <p class="card-text"> -->
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama</th>
                                                <td><?= $user->nama; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td><?= $user->email; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Kota</th>
                                                <td><?= $user->kota; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat</th>
                                                <td><?= $user->alamat; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">No Telp</th>
                                                <td><?= $user->no_telp; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- </p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- End of Main Content -->