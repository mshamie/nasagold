<?php $this->load->view('auth/header'); ?>
<div class="login-wrap">
    <div class="box-info">
        <h1><?php echo lang('reset_password_heading'); ?></h1>

        <?php if (isset($message)) { ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $message; ?>.
            </div>
        <?php } ?>
        
        <?php echo form_open('auth/reset_password/' . $code); ?>

        <p>
            <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length); ?></label> <br />
            <?php echo form_input($new_password); ?>
        </p>

        <p>
            <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
            <?php echo form_input($new_password_confirm); ?>
        </p>

        <?php echo form_input($user_id); ?>
        <?php echo form_hidden($csrf); ?>

        <p><?php echo form_submit('submit', lang('reset_password_submit_btn')); ?></p>

        <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('auth/footer'); ?>