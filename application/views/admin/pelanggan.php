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

<!--            <pre>
                <?php
//                [ClientID] => 8
//                [AgentID] => 2
//                [FullName] => asdasdasd
//                [ClientIC] => 
//                [Address] => Lot pr 255, Kg Parit Bulat
//                [PostalCode] => 16060
//                [City] => KOTA BHARU
//                [RegionID] => 3
//                [CountryID] => 3
//                [DateJoin] => 2015-06-24
//                [ClientPhone] => 
//                [ClientEmail] => 
//                [Pewaris] => 
//                [PewarisPhone] => 
//                [PewarisKP] => 
//                [BankID] => 3
//                [AccountNo] => 234234
//                [ClientStatus] => 1
                ?>
            </pre>-->
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            NAMA
                        </th>
                        <th>
                            NO. K/P
                        </th>
                        <th>
                            EJEN
                        </th>
                        <th>
                            TARIKH JOIN
                        </th>
                        <th>
                            TEL
                        </th>
                        <th>
                            Jumlah Berat
                        </th>
                        <th>
                            Nilai Simpan
                        </th>
                        <th>
                            AKAUN BANK
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pelanggan as $list): ?>
                        <tr>
                            <td>
                                <?php echo $list->FullName ?>
                            </td>
                            <td>
                                <?php echo $list->ClientIC ?>
                            </td>
                            <td>
                                <?php echo $list->username ?>
                            </td>
                            <td>
                                <?php echo $list->DateJoin ?>
                            </td>
                            <td>
                                <?php echo $list->ClientPhone ?>
                            </td>
                            <td class="text-right">
                                <?php echo $this->cart->format_number($list->berat) ?>
                            </td>
                            <td class="text-right">
                                <?php echo $this->cart->format_number($list->simpanan) ?>
                            </td>
                            <td>
                                <?php echo $list->BankName . ' - ' . $list->AccountNo ?>
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