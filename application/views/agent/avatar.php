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


        <div class="col-sm-12">
            <div class="box-info full">
                <?php echo form_open_multipart('admin/upload_image'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <br>
                        <center>
                            <a href="#">
                                <?php if (isset($old_avatar)) { ?>
                                <img class="thumbnail" width="220px;" id="ProductImage" name="image_product" src="<?php echo base_url('images/avatar/' . $old_avatar); ?>">
                                <?php } else { ?>
                                    <img class="thumbnail" width="220px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgdmlld0JveD0iMCAwIDE3MSAxODAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MTgwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTRlMGY5ZjA1YWEgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNGUwZjlmMDVhYSI+PHJlY3Qgd2lkdGg9IjE3MSIgaGVpZ2h0PSIxODAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI1OS41NDY4NzUiIHk9Ijk0LjUiPjE3MXgxODA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" id="ProductImage" name="image_product" title="Image preview">
                                <?php } ?>
                            </a>
                        </center>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <br>
                            <br>
                            <input name="userfile" type="file"class="btn btn-success" onchange="readImage(this);" title="<i class='fa fa-camera'></i> Pilih Gambar" />
                            <small class="help-block">Image should not exceed 1200 x 1200.( jpg, gif, jpeg )</small>
                            <?php echo form_submit('submit', 'Submit'); ?>
                        </div>
                        <?php if (isset($error)) { ?>
                            <div class="form-group">
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $error; ?>.
                                </div>  
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div><!-- End div .row -->

    <?php $this->load->view('includes/copyright') ?>

</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->

<?php $this->load->view('includes/footer'); ?>
