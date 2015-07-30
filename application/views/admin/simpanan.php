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

            <pre>
                <?php
//            [id] => 1
//            [OwnerID] => 2
//            [NotaSimpanan] => Cicin besar gajah
//            [JumlahBerat] => 200
//            [NilaiSimpanan] => 11000.00
//            [TarikhSimpanan] => 2015-06-10
//            [TarikhPengeluaran] => 
//            [StatusSimpanan] => 1
                // print_r($simpanan);
                ?>
            </pre>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>
                            SIMPANAN
                        </th>
                        <th>
                            PENYIMPAN
                        </th>
                        <th class="text-center">
                            NILAI
                        </th>
                        <th class="text-center">
                            BERAT (gram)
                        </th>
                        <th class="text-center">
                            TARIKH SIMPAN
                        </th>
                        <th class="text-center">
                            EJEN
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($simpanan as $list): ?>
                        <tr>
                            <td>
                                <?php echo $list->NotaSimpanan ?>
                            </td>
                            <td>
                                <?php echo $list->FullName ?>
                            </td>
                            <td class="text-right">
                                <?php echo $this->cart->format_number($list->NilaiSimpanan) ?>
                            </td>
                             <td class="text-right">
                                <?php echo $this->cart->format_number($list->JumlahBerat) ?>
                            </td>
                            <td class="text-center">
                                <?php echo $list->TarikhSimpanan ?>
                            </td>
                            <td>
                                <?php echo $list->username; ?>
                            </td>
                            <td>
                                <?php echo anchor('simpanan/edit/'.$list->simpanan_id.'/'.$list->ClientID,'<i class="fa fa-edit"></i> Kemaskini','class="btn btn-sm btn-danger"'); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


            <?php // echo $this->pagination->create_links(); ?>
        </div>
    </small>

    <?php $this->load->view('includes/copyright') ?>

</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->


<?php $this->load->view('includes/footer'); ?>