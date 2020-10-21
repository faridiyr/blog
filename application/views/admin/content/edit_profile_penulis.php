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

     <!-- Basic Card Example -->
     <div class="card shadow mb-4" style="max-width: 800px;">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
         </div>
         <div class="card-body">
             <form action="<?= site_url('Kelola_Profile_Penulis/edit_profile') ?>" method="POST">
                 <div class="form-group row">
                     <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="name" name="name" value="<?= $user->nama ?>">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="staticEmail" class="col-sm-2 col-form-label">Email:</label>
                     <div class="col-sm-10">
                         <input type="email" readonly class="form-control-plaintext" id="email" name="email" value="<?= $user->email ?>">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="nama" class="col-sm-2 col-form-label">Alamat:</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="address" name="address" value="<?= $user->alamat ?>">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="nama" class="col-sm-2 col-form-label">Kota:</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="city" name="city" value="<?= $user->kota ?>">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="nama" class="col-sm-2 col-form-label">No Telepon:</label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control" id="phone" name="phone" value="<?= $user->no_telp ?>">
                     </div>
                 </div>
                 <button type="submit" href="<?= site_url('Kelola_Profile_Penulis/edit_profile') ?>" class="btn btn-primary">
                     Simpan
                 </button>
             </form>
         </div>
     </div>
     <br>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->