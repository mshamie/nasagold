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
        <div class="row">
            <div class="col-sm-6">
                <h5><strong>PELANGGAN</strong></h5>
                <table class="table table-bordered">
                    <tr>
                        <td valign="top">
                            NAMA :
                        </td>
                        <td valign="top">
                            <?php echo $file['FullName'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            ALAMAT :
                        </td>
                        <td valign="top">
                            <small>
                                <address>
                                    <?php echo $file['Address'] ?><br />
                                    <?php echo $file['PostalCode'] ?>
                                    <?php echo $file['City'] ?><br />
                                    <?php echo $file['StateName'] ?><br />
                                    <?php echo $file['CountryName'] ?>
                                </address>
                            </small>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            TEL / EMAIL :
                        </td>
                        <td valign="top">
                            <?php echo $file['ClientPhone'] ?> / <?php echo $file['ClientEmail'] ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-6">
                <h5><strong>DOKUMENT PENYIMPAN</strong></h5>
                <table class="table table-bordered">
                    <tr>
                        <td valign="top">
                            NO DOKUMENT :
                        </td>
                        <td valign="top">
                            <?php echo $file['savingID'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            TARIKH SIMPANAN :
                        </td>
                        <td valign="top">
                            <?php echo $file['TarikhSimpanan'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            AGENT KOD / NAMA :
                        </td>
                        <td valign="top">
                            <?php echo $file['AgentID'] ?> /  <?php echo $file['username'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            NO. TELEFON EGENT :
                        </td>
                        <td valign="top">
                            <?php echo $file['ClientPhone'] ?>
                        </td>
                    </tr>
                    <?php if($file['TarikhPengeluaran']) { ?>
                    <tr>
                        <td valign="top">
                            TARIKH PENGELUARAN :
                        </td>
                        <td valign="top">
                            <?php echo $file['TarikhPengeluaran'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="col-sm-12">
                <hr>
                <h5><strong>MAKLUMAT SIMPANAN</strong></h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Nota Simpanan 
                            </th>
                            <th class="text-center">
                                Berat
                            </th>
                            <th class="text-center">
                                Nilai Simpanan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $file['NotaSimpanan'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $this->cart->format_number($file['JumlahBerat']); ?> gram
                            </td>
                            <td class="text-center">
                                <?php echo $this->cart->format_number($file['NilaiSimpanan']); ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <?php echo anchor('simpanan/edit/' . $file['savingID'] . '/' . $file['OwnerID'], 'Kemaskini', 'class="btn btn-xs btn-warning"'); ?>
                                <?php echo anchor('simpanan/senarai_simpanan/', 'Kembali', 'class="btn btn-xs btn-success"'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php $this->load->view('includes/copyright') ?>

</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->

<?php $this->load->view('includes/footer'); ?>
