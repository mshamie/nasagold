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

        <table class="table table-bordered table-responsive">
            <tr>
                <td class="text-center" colspan="4">
                    <h5>MAKLUMAT PELANGGAN</h5>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    <label>Nama :</label> 
                </td>
                <td>
                    <?php echo $details['FullName'] ?>
                </td>
                <td class="text-right">
                    <label>No. Telefon :</label> 
                </td>
                <td>
                    <?php echo $details['ClientPhone'] ?>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    <label>No. Kad Pengenalan :</label> 
                </td>
                <td>
                    <?php echo $details['ClientIC'] ?>
                </td>
                <td class="text-right">
                    <label>Alamat Email :</label> 
                </td>
                <td>
                    <?php echo $details['ClientEmail'] ?>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    <label>Alamat :</label> 
                </td>
                <td>
                    <?php
                    echo $details['Address'] . '<br>' . $details['PostalCode'] . '&nbsp;' . $details['City'] . '<br>' . $details['StateName'] . '<br>' . $details['CountryName'];
                    ?>

                </td>
                <td class="text-right">
                    <label>Akaun bank :</label> 
                </td>
                <td>
                    <?php echo $details['BankName'] ?> | <?php echo $details['AccountNo'] ?>
                </td>
            </tr>
        </table>

        <?php if (!empty($details['Pewaris'])) { ?>
            <hr>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" colspan="2">
                        <h5>MAKLUMAT PEWARIS</h5>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">
                        <label>Nama Pewaris :</label> 
                    </td>
                    <td>
                        <?php echo $details['Pewaris'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">
                        <label>No.KP Pewaris :</label> 
                    </td>
                    <td>
                        <?php echo $details['PewarisKP'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-right">
                        <label>No Telefon :</label> 
                    </td>
                    <td>
                        <?php echo $details['PewarisPhone'] ?>
                    </td>
                </tr>
            </table>

        <?php } ?>
            <hr>
        <table>
            <tr>
                <td>
                    <div class="row">
                        <?php echo anchor('pelanggan/edit/' . $details['ClientID'], '<i class="fa fa-edit"></i> Edit Pelanggan', 'class="btn btn-sm btn-danger"'); ?>&nbsp;
                        <?php echo anchor('simpanan/daftar_simpanan/' . $details['ClientID'], '<i class="fa fa-edit"></i> Daftar Simpanan', 'class="btn btn-sm btn-success"'); ?>&nbsp;
                    </div>
                </td>
            </tr>
        </table>
        <?php if (!empty($simpanan)) { ?>
            <hr>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" colspan="6"><h5>MAKLUMAT SIMPANAN</h5></th>
                </tr>
                <tr>
                    <th class="text-center">
                        Tarikh
                    </th>
                    <th class="">
                        Nota Simpanan
                    </th>
                    <th class="text-center">
                        Jumlah Berat
                    </th>
                    <th class="text-center">
                        Nilai
                    </th>
                    <th class="text-center">
                        Status
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
                </thead>
                <tbody>

                    <?php foreach ($simpanan as $list): ?>
                        <tr>
                            <td class="text-center"><?php echo $list->TarikhSimpanan ?></td>
                            <td class=""><?php echo $list->NotaSimpanan ?></td>
                            <td class="text-right"><?php echo $list->JumlahBerat ?> gram</td>
                            <td class="text-right"><?php echo $this->cart->format_number($list->NilaiSimpanan) ?></td>
                            <td class="text-center">
                                <?php
                                if ($list->StatusSimpanan == 1) {
                                    echo "Dalam Simpanan";
                                } elseif ($list->StatusSimpanan == 2) {
                                    echo "Telah dikeluarkan pada ";
                                }
                                ?>
                                <?php if (isset($list->TarikhPengeluaran)) { ?>
                                    <span class="text-danger"><?php echo $list->TarikhPengeluaran ?></span>
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
        <?php } else { ?>
            <table class="table">
                <tr>
                    <td class="text-center">
                        <?php echo anchor('simpanan/daftar_simpanan/' . $details['ClientID'], '<i class="fa  fa-plus"></i> Simpanan', 'class="btn btn-xs btn-warning"'); ?>
                    </td>
                </tr>
            </table>
        <?php } ?>
    </div>

    <?php $this->load->view('includes/copyright') ?>

</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->

<?php $this->load->view('includes/footer'); ?>