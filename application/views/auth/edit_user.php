<?php $this->load->view('includes/header') ?>

<!-- ============================================================== -->
<!-- START YOUR CONTENT HERE -->
<!-- ============================================================== -->
<div class="body content rows scroll-y">

    <div class="page-heading animated fadeInDownBig">
        <h1><?php echo lang('edit_user_heading'); ?></h1>
    </div>

    
    <div class="box-info default">
        <p><?php echo lang('edit_user_subheading'); ?></p>

        <div id="infoMessage"><?php echo $message; ?></div>
        <div id="horizontal-form" class="collapse in">

            <?php $attribute = "class='form-horizontal' role='form'" ?>
            <?php echo form_open(uri_string(), $attribute); ?>

            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-8">
                    <?php echo form_input($first_name); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-8">
                    <?php echo form_input($last_name); ?>
                </div>
            </div>

<!--            <div class="form-group">
                <label for="company" class="col-sm-2 control-label">Company</label>
                <div class="col-sm-8">
                    <?php echo form_input($company); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="telephone" class="col-sm-2 control-label">Telephone</label>
                <div class="col-sm-8">
                    <?php echo form_input($phone); ?>
                </div>
            </div>-->

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                    <?php echo form_input($password); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Confirm Password <small class="text-danger"><br><i>If change</i></small></label>
                <div class="col-sm-8">
                    <?php echo form_input($password_confirm); ?>
                </div>
            </div>

            <?php if ($this->ion_auth->is_admin()): ?>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <h5><?php echo lang('edit_user_groups_heading'); ?></h5>
                        <div class="checkbox">
                            <?php foreach ($groups as $group): ?>
                                <label class="checkbox">
                                    <?php
                                    $gID = $group['id'];
                                    $checked = null;
                                    $item = null;
                                    foreach ($currentGroups as $grp) {
                                        if ($gID == $grp->id) {
                                            $checked = ' checked="checked"';
                                            break;
                                        }
                                    }
                                    ?>
                                    <input type="radio" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                                    <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                </label>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

            <?php endif ?>

            <?php echo form_hidden('id', $user->id); ?>
            <?php echo form_hidden($csrf); ?>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <p><?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-success"'); ?></p>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->


<?php $this->load->view('includes/footer'); ?>