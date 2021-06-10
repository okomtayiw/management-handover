<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
           
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0"><?php echo $judul;?></h3>
                        </div>
                        <div class="card-body">
                            
                            <form class="form-user" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST" action="<?php echo base_url('auth');?>">
                            <?= $this->session->flashdata('message');?>
                                <div class="form-group">
                                    <label for="uname1">Email</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="email" value="<?= set_value('email');?>">
                                    <small class="text-dangers"><?php echo form_error('email'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" name="pwd" autocomplete="new-password">
                                    <small class="text-dangers"><?php echo form_error('pwd'); ?></small>
                                </div>
                                <div>
                                    <!-- <label class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description small text-dark">Remember me on this computer</span>
                                    </label> -->
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                                <p><a href="<?php echo base_url('auth/registration');?>"> Register</a></p>
                                <p><a href="<?php echo base_url('auth/forgotPassword');?>"> Forgot Password</a></p>
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->
