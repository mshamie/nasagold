<?php $this->load->view('auth/header'); ?>
<div class="login-wrap">
    <div class="box-info">
        <h2 class="text-center"><?php echo lang('forgot_password_heading'); ?></h2>
        <p><small><?php echo sprintf(lang('forgot_password_subheading'), $identity_label); ?></small></p>

        <?php if(isset($message)) { ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $message; ?>.
        </div>
        <?php } ?>

        <?php echo form_open("auth/forgot_password"); ?>

        <div class="form-group login-input">
            <i class="fa fa-inbox overlay"></i>
            <?php echo form_input($email); ?>
        </div>
        <button name="submit"  class="btn btn-success btn-block"><i class="fa fa-lock"></i> Reset Password</button>
        <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('auth/footer'); ?>