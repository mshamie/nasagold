
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
    <?php echo form_open('simpanan/daftar_simpanan/' . $ownerid); ?>
    <div class="box-info">
        <?php echo form_hidden('OwnerID', $ownerid) ?>
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">

                    <labe>Tarikh Simpanan</labe>
                    <?php 
                    $today_date = date('Y-m-d');
                    ?>
                    <?php echo form_input($TarikhSimpanan, $today_date) ?>
                    <small class="text-danger"><i><?php echo form_error($TarikhSimpanan['name']); ?><?php echo isset($errors[$TarikhSimpanan['name']]) ? $errors[$TarikhSimpanan['name']] : ''; ?></i></small>
                </div>
            </div>
        </div>
        <div class="form-group">
            <labe>Nota simpanan</labe>
            <?php echo form_input($NotaSimpanan) ?>
            <small class="text-danger"><i><?php echo form_error($NotaSimpanan['name']); ?><?php echo isset($errors[$NotaSimpanan['name']]) ? $errors[$NotaSimpanan['name']] : ''; ?></i></small>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <labe>Jumlah Berat <small class="text-info">( Nilai dalam gram )</small></labe>
                    <?php echo form_input($JumlahBerat) ?>
                    <small class="text-danger"><i><?php echo form_error($JumlahBerat['name']); ?><?php echo isset($errors[$JumlahBerat['name']]) ? $errors[$JumlahBerat['name']] : ''; ?></i></small>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <labe>Nilai Simpanan <small class="text-info">( Nilai dalam RM )</small></labe>
                    <?php echo form_input($NilaiSimpanan) ?>
                    <small class="text-danger"><i><?php echo form_error($NilaiSimpanan['name']); ?><?php echo isset($errors[$NilaiSimpanan['name']]) ? $errors[$NilaiSimpanan['name']] : ''; ?></i></small>
                </div>
            </div>
        </div>



        <div class="form-group">
            <?php echo form_submit('submit', 'Simpan'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
    <?php $this->load->view('includes/copyright') ?>

</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->

<?php $this->load->view('includes/footer'); ?>
