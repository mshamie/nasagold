<?php
$NotaSimpanan = array(
    'name' => 'NotaSimpanan',
    'id' => 'NotaSimpanan',
    'type' => 'text',
    'onchange' => 'this.value = this.value.toUpperCase()',
    'class' => 'form-control  text-input',
    'value' => set_value('NotaSimpanan', $simpanan['NotaSimpanan'])
);
$JumlahBerat = array(
    'name' => 'JumlahBerat',
    'id' => 'JumlahBerat',
    'type' => 'text',
    'onchange' => 'this.value = this.value.toUpperCase()',
    'class' => 'form-control  text-input text-center',
    'value' => set_value('JumlahBerat', $simpanan['JumlahBerat'])
);
$NilaiSimpanan = array(
    'name' => 'NilaiSimpanan',
    'id' => 'NilaiSimpanan',
    'type' => 'text',
    'onchange' => 'this.value = this.value.toUpperCase()',
    'class' => 'form-control  text-input text-center',
    'value' => set_value('NilaiSimpanan', $simpanan['NilaiSimpanan'])
);
$TarikhSimpanan = array(
    'name' => 'TarikhSimpanan',
    'id' => 'TarikhSimpanan',
    'type' => 'text',
    'onchange' => 'this.value = this.value.toUpperCase()',
    'class' => 'form-control datepicker-input',
    'value' => set_value('TarikhSimpanan', $simpanan['TarikhSimpanan'])
);
?>
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
    <?php echo form_open('simpanan/update_simpanan'); ?>
    <?php echo form_hidden('simpanan_id', set_value('simpanan_id',$simpanan['savingID'])) ?>
    <?php echo form_hidden('owner_id', set_value('owner_id',$simpanan['OwnerID'])) ?>
    <div class="box-info">
        <div class="row">
            <div class="col-sm-2">
                <div class="form-group">
                    <labe>Tarikh Simpanan</labe>
                    <?php echo form_input($TarikhSimpanan) ?>
                    <small class="text-danger"><i><?php echo form_error($TarikhSimpanan['name']); ?><?php echo isset($errors[$TarikhSimpanan['name']]) ? $errors[$TarikhSimpanan['name']] : ''; ?></i></small>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="form-group">
                    <labe>Nota simpanan</labe>
                    <?php echo form_input($NotaSimpanan) ?>
                    <small class="text-danger"><i><?php echo form_error($NotaSimpanan['name']); ?><?php echo isset($errors[$NotaSimpanan['name']]) ? $errors[$NotaSimpanan['name']] : ''; ?></i></small>
                </div>
            </div>
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
            <?php echo form_submit('submit', 'Simpan','class="btn btn-success"'); ?>
        </div>
    </div>
    <?php echo form_close(); ?>
    <?php $this->load->view('includes/copyright') ?>

</div>
<!-- ============================================================== -->
<!-- END YOUR CONTENT HERE -->
<!-- ============================================================== -->

<?php $this->load->view('includes/footer'); ?>
