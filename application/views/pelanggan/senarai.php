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
    <small>
        <div class="box-info">

            <table class="table table-bordered table-hover table-striped">
                <thead>
                <th class="text-center">BERDAFTAR</th>
                <th>NAMA PENUH</th>
                <th>ALAMAT</th>
                <th class="text-center">REKOD SIMPANAN</th>
                <th>&nbsp;</th>
                </thead>
                <tbody>
                    <?php foreach ($clients as $list): ?>
                        <tr>
                            <td class="text-center"><?php echo $list->DateJoin; ?></td>
                            <td><?php echo $list->FullName; ?></td>
                            <td>
                                <address>
                                    <?php echo $list->City; ?><br>
                                    <?php echo $list->StateName; ?><br>
                                    <?php echo $list->CountryName; ?>
                                </address>
                            </td>
                            <td class="text-right">
                                <span class="text-info"><?php echo $this->cart->format_number($list->NilaiSimpanan); ?> / <?php echo $this->cart->format_number($list->JumlahBerat).' gram'; ?></span>
                            </td>
                            <td class="text-center">
                                <?php echo anchor('pelanggan/edit/' . $list->ClientID, '<i class="fa fa-check-square"></i> Kemaskini', 'class="btn btn-xs btn-success"'); ?>&nbsp;
                                <?php echo anchor('pelanggan/profile_pelanggan/' . $list->ClientID, '<i class="fa fa-check-square"></i> Profile', 'class="btn btn-xs btn-info"'); ?>&nbsp;
                                <?php echo anchor('simpanan/daftar_simpanan/' . $list->ClientID, '<i class="fa  fa-plus"></i> Simpanan', 'class="btn btn-xs btn-warning"'); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php echo $this->pagination->create_links(); ?>
        </div>
    </small>

    <?php $this->load->view('includes/copyright') ?>

</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->


<?php $this->load->view('includes/footer'); ?>