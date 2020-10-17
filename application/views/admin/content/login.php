<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <?= $this->session->flashdata('notification') ?>
                                <form class="user" method="POST" action="<?= base_url('Auth/login') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="level" id="level">
                                            <option value="penulis">Penulis</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <br>
                                    <button type="submit" href="<?= site_url('Auth/login') ?>" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= site_url('Auth/registration'); ?>">Create an Account!</a>
                                </div>
                                <br>
                                <div class="text-center">
                                    <a class="btn btn-info" href="<?= site_url('Home'); ?>"><i class="fas fa-home"></i>&emsp;Back to Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>