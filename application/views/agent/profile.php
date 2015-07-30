<?php $this->load->view('includes/header') ?>

<!-- ============================================================== -->
<!-- START YOUR CONTENT HERE -->
<!-- ============================================================== -->
<div class="body content rows scroll-y">

    <!-- Page header -->
    <div class="page-heading animated fadeInDownBig">
        <h1><?php echo $page ?></h1>
    </div>
    <!-- End page header -->

    <div class="row">

        <div class="col-sm-10">
            <div class="box-info full">
                <!-- Nav tab -->
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#about" data-toggle="tab"><i class="fa fa-user"></i> About</a></li>
                    <li><a href="#edit-profile" data-toggle="tab"><i class="fa fa-pencil"></i> Edit</a></li>
                </ul>
                <!-- End nav tab -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Tab about -->
                    <div class="tab-pane active animated fadeInRight" id="about">
                        <div class="user-profile-content">
                            <div id="infoMessage"><?php echo $message; ?></div>
                            <h5><strong>PROFILE</strong><?php if ($this->ion_auth->in_group('user')) { ?><small class="text-danger">Menuggun pengesahan ejen</small><?php } ?></h5>
                            <div class="row">
                                
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <a href="<?php echo base_url('index.php/admin/avatar'); ?>">
                                            <?php if (isset($profile['UserAvatar'])) { ?>
                                                <img class="thumbnail" width="120px" src="<?php echo base_url('images/avatar/' . $profile['UserAvatar']); ?>">
                                            <?php } else { ?>
                                                <img class="thumbnail" width="120px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRlMGY5ZjA1YWEgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGUwZjlmMDVhYSI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OS41NDY4NzUiIHk9Ijk0LjUiPjE3MXgxODA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" id="ProductImage" name="image_product" title="Ypur preview">
                                            <?php } ?>
                                        </a>
                                    </div>
                                </div> 
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <br>
                                        CODE AJEN : <?php echo $profile['UserID'] ?><br>
                                        NAMA : <?php echo $profile['username'] ?><br>
                                        NO. K/P : <?php echo $profile['UserIC'] ?><br>
                                    </div>
                                </div>
                                                                   
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5><strong>ALAMAT</strong></h5>
                                    <address>
                                        <?php echo $profile['UserAddress'] ?><br>
                                        <?php echo $profile['UserPostalCode'] ?> <?php echo $profile['UserCity'] ?><br>
                                        <?php echo $profile['StateName'] ?><br>
                                        <?php echo $profile['CountryName'] ?><br>
                                        Email : <a href="mailto:#"><?php echo $profile['email'] ?></a><br>
                                        Phone : <a href=""><?php echo $profile['UserPhone'] ?></a>
                                    </address>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div><!-- End div .row -->
                        </div><!-- End div .user-profile-content -->
                    </div><!-- End div .tab-pane -->
                    <!-- End Tab about -->


                    <!-- Tab edit profile -->
                    <div class="tab-pane animated fadeInRight" id="edit-profile">
                        <div class="user-profile-content">
                            <?php $attribute = "class='form-horizontal' role='form'" ?>
                            <?php echo form_open('admin/profile', $attribute); ?>
                            <div class="row">
                                <!--
                                <div class="col-sm-5 col-md-3">
                                    <center>
                                        <a href="#" class="">
                                            <img width="120px" height="150px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRlMGY5ZjA1YWEgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGUwZjlmMDVhYSI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OS41NDY4NzUiIHk9Ijk0LjUiPjE3MXgxODA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" id="ProductImage" name="image_product" title="Ypur preview">
                                        </a>
                                    </center>
                                </div>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <br>
                                        <input name="userfile" type="file"class="btn btn-success" onchange="readImage(this);" title="<i class='fa fa-camera'></i> Image" />
                                        <small class="help-block">Image should not exceed 1700 x 1700.( jpg, gif, jpeg )</small>
                                    </div>
                                </div>
                                -->
                            </div>
                            <div class="form-group">
                                <label for="UserAddress" class="col-sm-2 control-label">NAMA</label>
                                <div class="col-sm-6">
                                    <?php echo form_input($UserName, set_value('UserName', $profile['username'])); ?>
                                    <?php echo form_error('UserName', '<small class="text-danger"><i>', '</i></small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="UserAddress" class="col-sm-2 control-label">No. Kad Pengenalan</label>
                                <div class="col-sm-2">
                                    <?php echo form_input($UserIC, set_value('UserIC', $profile['UserIC'])); ?>
                                    <?php echo form_error('UserIC', '<small class="text-danger"><i>', '</i></small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="UserAddress" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-6">
                                    <?php echo form_input($UserAddress, set_value('UserAddress', $profile['UserAddress'])); ?>
                                    <?php echo form_error('UserAddress', '<small class="text-danger"><i>', '</i></small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="PostalCode" class="col-sm-2 control-label">Poskod</label>
                                <div class="col-sm-2">
                                    <?php echo form_input($UserPostalCode, set_value('UserPostalCode', $profile['UserPostalCode'])) ?>
                                    <small class="text-danger"><i><?php echo form_error($UserPostalCode['name']); ?><?php echo isset($errors[$UserPostalCode['name']]) ? $errors[$UserPostalCode['name']] : ''; ?></i></small>
                                </div>

                                <label for="City" class="col-sm-1 control-label">Bandar</label>
                                <div class="col-sm-3">
                                    <?php echo form_input($UserCity, set_value('UserPostalCode', $profile['UserCity'])) ?>
                                    <small class="text-danger"><i><?php echo form_error($UserCity['name']); ?><?php echo isset($errors[$UserCity['name']]) ? $errors[$UserCity['name']] : ''; ?></i></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="RegionID" class="col-sm-2 control-label">Negeri</label>
                                <div class="col-sm-2">
                                    <?php echo form_dropdown('RegionID', $state, set_value('RegionID', $profile['UserRegionID']), 'class="form-control"'); ?>
                                    <?php echo form_error('RegionID', '<small class="text-danger"><i>', '</i></small>'); ?>
                                </div>

                                <label for="CountryID" class="col-sm-1 control-label">Negara</label>
                                <div class="col-sm-2">
                                    <?php echo form_dropdown('CountryID', $country, set_value('CountryID', $profile['UserCountryID']), 'class="form-control"'); ?>
                                    <?php echo form_error('CountryID', '<small class="text-danger"><i>', '</i></small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="RegionID" class="col-sm-2 control-label">No Telefon</label>
                                <div class="col-sm-2">
                                    <?php echo form_input($UserPhone, set_value('UserPhone', $profile['UserPhone'])) ?>
                                    <small class="text-danger"><i><?php echo form_error($UserPhone['name']); ?><?php echo isset($errors[$UserPhone['name']]) ? $errors[$UserPhone['name']] : ''; ?></i></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="RegionID" class="col-sm-2 control-label">&nbsp;</label>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>

                            <?php echo form_close(); ?>
                        </div><!-- End div .user-profile-content -->
                    </div><!-- End div .tab-pane -->
                    <!-- End Tab Edit profile -->

                </div><!-- End div .tab-content -->
            </div><!-- End div .box-info -->
        </div><!-- End div .col-sm-8 -->
    </div><!-- End div .row -->

    <?php $this->load->view('includes/copyright') ?>

</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->

<?php $this->load->view('includes/footer'); ?>