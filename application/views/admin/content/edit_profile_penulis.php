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