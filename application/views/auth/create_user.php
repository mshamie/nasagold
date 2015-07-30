
<?php $this->load->view('auth/header'); ?>
<div class="login-wrap">

    <div class="box-info">

        <p><?php echo lang('create_user_subheading'); ?></p>

        <?php if(isset($message)) { ?>
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo $message; ?>.
        </div>
        <?php } ?>

        <?php $attribute = "role='form'" ?>
        <?php echo form_open('auth/create_user', $attribute); ?>


        <div class="form-group login-input">
            <i class="fa fa-user overlay"></i>
            <?php echo form_input($first_name); ?>
        </div>

        <div class="form-group login-input">
            <i class="fa fa-user-md overlay"></i>
                <?php echo form_input($last_name); ?>
        </div>

<!--        <div class="form-group login-input">
            <i class="fa fa-bitbucket overlay"></i>
                <?php echo form_input($company); ?>
        </div>-->

        <div class="form-group login-input">
            <i class="fa fa-subscript overlay"></i>
                <?php echo form_input($email); ?>
        </div>

<!--        <div class="form-group login-input">
            <i class="fa fa-phone overlay"></i>
                <?php echo form_input($phone); ?>
        </div>-->

        <div class="form-group login-input">
            <i class="fa fa-key overlay"></i>
                <?php echo form_input($password); ?>
        </div>

        <div class="form-group login-input">
            <i class="fa fa-unlock overlay"></i>
                <?php echo form_input($password_confirm); ?>
        </div>

        <div class="form-group">
            <label for="first_name" class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-8">
                <?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-success"'); ?>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>


<?php $this->load->view('auth/footer'); ?>


