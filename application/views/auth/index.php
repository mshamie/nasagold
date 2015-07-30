
<?php $this->load->view('includes/header') ?>

<!-- ============================================================== -->
<!-- START YOUR CONTENT HERE -->
<!-- ============================================================== -->
<div class="body content rows scroll-y">
    <div class="row">
        <div class="col-lg-12">
            <!-- Page header -->
            <div class="page-heading animated fadeInDownBig">
                <h1><?php echo lang('index_heading'); ?></h1>
            </div>
            <!-- End page header -->

            <div class="box-info default">

                <h2><?php echo lang('index_subheading'); ?></h2>

                <div id="infoMessage"><?php echo $message; ?></div>

                <div class="table-responsive">
                    <table data-sortable class="table">
                        <thead>
                            <tr>
                                <th><?php echo lang('index_fname_th'); ?></th>
                                <th><?php echo lang('index_lname_th'); ?></th>
                                <th><?php echo lang('index_email_th'); ?></th>
                                <th><?php echo lang('index_groups_th'); ?></th>
                                <th><?php echo lang('index_status_th'); ?></th>
                                <th><?php echo lang('index_action_th'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <?php foreach ($user->groups as $group): ?>
                                            <?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?>
                                        <?php endforeach ?>
                                    </td>
                                    <td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
                                    <td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <hr>
                    <?php echo anchor('auth/create_user', lang('index_create_user_link'), 'class="btn btn-success"') ?> <?php // echo anchor('auth/create_group', lang('index_create_group_link'))  ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->


<?php $this->load->view('includes/footer'); ?>