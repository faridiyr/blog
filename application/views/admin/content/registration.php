<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('Auth/registration') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name" id="name" placeholder="Name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="email" id="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="address" id="address" placeholder="Address" value="<?= set_value('address'); ?>">
                                <?= form_error('address', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="city" id="city" placeholder="City" value="<?= set_value('city'); ?>">
                                <?= form_error('city', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="phone" id="phone" placeholder="Phone" value="<?= set_value('phone'); ?>">
                                <?= form_error('phone', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password1" id="password1" placeholder="Password">
                                <?= form_error('password1', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password2" id="password2" placeholder="Repeat Password">
                                <?= form_error('password2', '<small class="text-danger" style="padding: 20px;">', '</small>') ?>
                            </div>
                            <br>
                            <button type="submit" href="<?= site_url('Auth') ?>" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= site_url('Auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>