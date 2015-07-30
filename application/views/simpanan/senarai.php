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
                <th>NAMA PENYIMPAN</th>
                <th>MAKLUMAT SIMPANAN</th>
                <th class="text-center">TARIKH SIMPANAN</th>
                <th class="text-center">JUMLAH BERAT</th>
                <th class="text-center">JUMLAH SIMPANAN</th>
                <th>&nbsp;</th>
                </thead>
                <tbody>
                    <?php foreach ($simpanan as $list): ?>
                        <tr>
                            <td class="text-center"><?php echo $list->DateJoin; ?></td>
                            <td><?php echo $list->FullName; ?></td>
                            <td><?php echo $list->NotaSimpanan; ?></td>
                            <td class="text-center"><?php echo $list->TarikhSimpanan; ?></td>
                            <td class="text-center"><?php echo $list->JumlahBerat; ?> gram</td>
                            <td class="text-right">
                                <?php echo $this->cart->format_number($list->NilaiSimpanan); ?> 

                                <?php if ($list->StatusSimpanan == 2) { ?> 
                                    <?php echo '<br> ( Buat pengeluaran semula )'; ?>
                                <?php } ?>

                            </td>
                            <td class="text-center">
                                <?php echo anchor('simpanan/view_simpanan/' . $list->id . '/' . $list->OwnerID, 'View', 'class="btn btn-xs btn-success"'); ?>
                                <?php echo anchor('simpanan/edit/' . $list->id . '/' . $list->OwnerID, 'Edit', 'class="btn btn-xs btn-warning"'); ?>
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