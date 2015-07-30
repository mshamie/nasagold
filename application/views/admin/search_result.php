
<?php $this->load->view('includes/header') ?>

<!-- ============================================================== -->
<!-- START YOUR CONTENT HERE -->
<!-- ============================================================== -->
<div class="body content rows scroll-y">

    <!-- Page header -->
    <div class="page-heading animated fadeInUp">
        <h1><?php echo $page ?></h1>
    </div>
    <!-- End page header -->
    <div class="box-info">
        <!-- Search form -->
        <?php echo form_open('admin/search'); ?>
        <!-- Text input -->
        <div class="form-group">
            <input name="search" type="text" class="form-control" id="input-text" placeholder="Sila masukkan nama atau no kad pengenalan pelanggan anda..">
        </div>
        <?php echo form_close() ?>
        <!-- End search form -->

        <ul class="media-list search-result">
            <?php if (isset($search)) { ?>
                <?php foreach ($search as $list): ?>
                    <li class="media">
                        <a class="pull-left" href="#fakelink">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <?php echo anchor('pelanggan/profile_pelanggan/'.$list->ClientID, $list->FullName) ?>
                            </h4>
                           <i class="fa fa-barcode"></i> NO. K/P : <a href="#fakelink"><?php echo $list->ClientIC ?></a> &nbsp;<i class="fa fa-phone"></i> Tel : <?php echo $list->ClientPhone; ?>
                            <p><i class="fa fa-home"></i> Alamat : <?php echo $list->Address ?>,<?php echo $list->PostalCode ?> <?php echo $list->City ?>, <?php echo $list->StateName ?>, <?php echo $list->CountryName ?></p>
                            Tsrikh Daftar : <i><a href="#fakelink"><?php echo $list->DateJoin ?></a></i>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php } ?>
        </ul>
    </div>
    <?php $this->load->view('includes/copyright') ?>

</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->

<?php $this->load->view('includes/footer'); ?>
