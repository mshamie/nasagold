<?php $this->load->view('auth/header'); ?>
<div class="login-wrap">
    <div class="box-info">
        <h2 class="text-center"><strong>Login</strong> form</h2>
        
        <?php if(isset($message)) { ?>
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $message; ?>.
        </div>
        <?php } ?>
        
        <?php echo form_open("auth/login"); ?>
        <div class="form-group login-input">
            <i class="fa fa-sign-in overlay"></i>
            <?php echo form_input($identity); ?>
        </div>
        <div class="form-group login-input">
            <i class="fa fa-key overlay"></i>
            <?php echo form_input($password); ?>
        </div>
        <div class="checkbox">
            <label>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?> Remember me
            </label>
        </div>

        <div class="row">
            <div class="col-sm-6">                                    
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-unlock"></i> Login</button>
            </div>
            <div class="col-sm-6">
                <?php echo anchor('auth/forgot_password', '<i class="fa fa-rocket"></i> Forgot password?', 'class="btn btn-default btn-block"'); ?>
            </div>
        </div>
        <p><?php echo anchor('register', '<i class="fa fa-user"></i> Register Agent', 'class="btn btn-default btn-block"' ); ?></p>
        <?php echo form_close(); ?>

    </div>
</div>
<?php $this->load->view('auth/footer'); ?>