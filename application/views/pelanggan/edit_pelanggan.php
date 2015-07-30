<?php $this->load->view('includes/header') ?>
<?php
// Form
$FullName = array(
    'name' => 'FullName',
    'id' => 'FullName',
    'type' => 'text',
    'onchange' => 'this.value = this.value.toUpperCase()',
    'value' => $this->form_validation->set_value('FullName',$details['FullName']),
    'class' => 'form-control  text-input',
);
$ClientIC = array(
    'name' => 'ClientIC',
    'id' => 'ClientIC',
    'type' => 'text',
    'value' => $this->form_validation->set_value('ClientIC',$details['ClientIC']),
    'class' => 'form-control  text-input',
);
$Address = array(
    'name' => 'Address',
    'id' => 'Address',
    'type' => 'text',
    'onchange' => 'this.value = this.value.toUpperCase()',
    'value' => $this->form_validation->set_value('Address',$details['Address']),
    'class' => 'form-control  text-input',
);
$PostalCode = array(
    'name' => 'PostalCode',
    'id' => 'PostalCode',
    'type' => 'text',
    'value' => $this->form_validation->set_value('PostalCode',$details['PostalCode']),
    'class' => 'form-control  text-input',
);
$City = array(
    'name' => 'City',
    'id' => 'City',
    'type' => 'text',
    'onchange' => 'this.value = this.value.toUpperCase()',
    'value' => $this->form_validation->set_value('City',$details['City']),
    'class' => 'form-control  text-input',
);

$ClientPhone = array(
    'name' => 'ClientPhone',
    'id' => 'ClientPhone',
    'type' => 'text',
    'value' => $this->form_validation->set_value('ClientPhone',$details['ClientPhone']),
    'class' => 'form-control  text-input',
);
$ClientEmail = array(
    'name' => 'ClientEmail',
    'id' => 'ClientEmail',
    'type' => 'email',
    'onchange' => 'this.value = this.value.toLowerCase()',
    'value' => $this->form_validation->set_value('ClientEmail',$details['ClientEmail']),
    'class' => 'form-control  text-input',
);
$DateJoin = array(
    'name' => 'DateJoin',
    'id' => 'DateJoin',
    'type' => 'text',
    'value' => $this->form_validation->set_value('DateJoin',$details['DateJoin']),
    'class' => 'form-control text-input datepicker-input',
);
$AccountNo = array(
    'name' => 'AccountNo',
    'id' => 'AccountNo',
    'type' => 'text',
    'value' => $this->form_validation->set_value('AccountNo',$details['AccountNo']),
    'class' => 'form-control  text-input',
);

// Pewaris jika ada
$Pewaris = array(
    'name' => 'Pewaris',
    'id' => 'Pewaris',
    'type' => 'text',
    'onchange' => 'this.value = this.value.toUpperCase()',
    'value' => $this->form_validation->set_value('Pewaris',$details['Pewaris']),
    'class' => 'form-control  text-input',
);
$PewarisKP = array(
    'name' => 'PewarisKP',
    'id' => 'PewarisKP',
    'type' => 'text',
    'onchange' => 'this.value = this.value.toUpperCase()',
    'value' => $this->form_validation->set_value('PewarisKP',$details['PewarisKP']),
    'class' => 'form-control  text-input',
);
$PewarisPhone = array(
    'name' => 'PewarisPhone',
    'id' => 'PewarisPhone',
    'type' => 'text',
    'value' => $this->form_validation->set_value('PewarisPhone',$details['PewarisPhone']),
    'class' => 'form-control  text-input',
);
?>

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
        <div class="col-lg-12">
            <?php $attribute = "class='form-horizontal' role='form'" ?>
            <?php echo form_open('pelanggan/update_pelanggan', $attribute); ?>
            <?php echo form_hidden('client_id', set_value('client_id', $details['ClientID']) ) ?>
            <div class="form-group">
                <label for="PELANGGAN" class="col-sm-6 control-label"><h5>MAKLUMAT PELANGGAN</h5></label>
                <div class="col-sm-8">
                </div>
            </div>

            <div class="form-group">
                <label for="DateJoin" class="col-sm-2 control-label">Tarikh Menaftar</label>
                <div class="col-sm-2">
                    <?php echo form_input($DateJoin) ?>
                </div>
            </div>

            <div class="form-group">
                <label for="FullName" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-8">
                    <?php echo form_input($FullName) ?>
                    <small class="text-danger"><i><?php echo form_error($FullName['name']); ?><?php echo isset($errors[$FullName['name']]) ? $errors[$FullName['name']] : ''; ?></i></small>
                </div>
            </div>

            <div class="form-group">
                <?php echo form_label('No. Kad Pengenalan', $ClientIC['id'], array('class' => 'col-sm-2 control-label')) ?>
                <div class="col-sm-3">
                    <?php echo form_input($ClientIC) ?>
                    <small class="text-danger"><i><?php echo form_error($ClientIC['name']); ?><?php echo isset($errors[$ClientIC['name']]) ? $errors[$ClientIC['name']] : ''; ?></i></small>
                </div>
            </div>
            <div class="form-group">
                <label for="Address" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-8">
                    <?php echo form_input($Address) ?>
                    <small class="text-danger"><i><?php echo form_error($Address['name']); ?><?php echo isset($errors[$Address['name']]) ? $errors[$Address['name']] : ''; ?></i></small>
                </div>
            </div>
            <div class="form-group">
                <label for="PostalCode" class="col-sm-2 control-label">Poskod</label>
                <div class="col-sm-2">
                    <?php echo form_input($PostalCode) ?>
                    <small class="text-danger"><i><?php echo form_error($PostalCode['name']); ?><?php echo isset($errors[$PostalCode['name']]) ? $errors[$PostalCode['name']] : ''; ?></i></small>
                </div>

                <label for="City" class="col-sm-2 control-label">Bandar</label>
                <div class="col-sm-3">
                    <?php echo form_input($City) ?>
                    <small class="text-danger"><i><?php echo form_error($City['name']); ?><?php echo isset($errors[$City['name']]) ? $errors[$City['name']] : ''; ?></i></small>
                </div>
            </div>
            <div class="form-group">
                <label for="RegionID" class="col-sm-2 control-label">Negeri</label>
                <div class="col-sm-3">
                    <?php echo form_dropdown('RegionID', $state, set_value('RegionID', $details['state_id'] ), 'class="form-control"'); ?>
                    <?php echo form_error('RegionID', '<small class="text-danger"><i>', '</i></small>'); ?>
                </div>

                <label for="CountryID" class="col-sm-1 control-label">Negara</label>
                <div class="col-sm-3">
                    <?php echo form_dropdown('CountryID', $country, set_value('CountryID', $details['country_id'] ), 'class="form-control"'); ?>
                    <?php echo form_error('CountryID', '<small class="text-danger"><i>', '</i></small>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="ClientPhone" class="col-sm-2 control-label">No Telefon</label>
                <div class="col-sm-2">
                    <?php echo form_input($ClientPhone) ?>
                    <small class="text-danger"><i><?php echo form_error($ClientPhone['name']); ?><?php echo isset($errors[$ClientPhone['name']]) ? $errors[$ClientPhone['name']] : ''; ?></i></small>
                </div>

                <label for="ClientEmail" class="col-sm-2 control-label">Alamat Email <small class="text-danger"><i>Jika ada</i></small></label>
                <div class="col-sm-2">
                    <?php echo form_input($ClientEmail) ?> 
                    <small class="text-danger"><i><?php echo form_error($ClientEmail['name']); ?><?php echo isset($errors[$ClientEmail['name']]) ? $errors[$ClientEmail['name']] : ''; ?></i></small>
                </div>
            </div>
            <div class="form-group">
                <label for="BankID" class="col-sm-2 control-label">Bank</label>
                <div class="col-sm-2">
                    <?php echo form_dropdown('BankID', $bank, set_value('BankID',$details['bank_id']), array('class' => 'form-control')); ?>
                    <?php echo form_error('BankID', '<small class="text-danger"><i>', '</i></small>'); ?>
                </div>
                <label for="AccountNo" class="col-sm-2 control-label">No Akaun</label>
                <div class="col-sm-3">
                    <?php echo form_input($AccountNo) ?>
                    <small class="text-danger"><i><?php echo form_error($AccountNo['name']); ?><?php echo isset($errors[$AccountNo['name']]) ? $errors[$AccountNo['name']] : ''; ?></i></small>
                </div>
            </div>
            <hr>
            <div class="form-group">

                <label for="PEWARIS" class="col-sm-6 control-label"><h5>MAKLUMAT PEWARIS</h5></label>
                <div class="col-sm-8">
                </div>
            </div>
            <div class="form-group">
                <label for="Pewaris" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-8">
                    <?php echo form_input($Pewaris) ?>
                    <small class="text-danger"><i><?php echo form_error($Pewaris['name']); ?><?php echo isset($errors[$Pewaris['name']]) ? $errors[$Pewaris['name']] : ''; ?></i></small>
                </div>
            </div>
            <div class="form-group">
                <label for="PewarisKP" class="col-sm-2 control-label">No. Kad Pengenalan </label>
                <div class="col-sm-2">
                    <?php echo form_input($PewarisKP) ?>
                    <small class="text-danger"><i><?php echo form_error($PewarisKP['name']); ?><?php echo isset($errors[$PewarisKP['name']]) ? $errors[$PewarisKP['name']] : ''; ?></i></small>
                </div>
                <label for="PewarisPhone" class="col-sm-2 control-label">No. Telefon</label>
                <div class="col-sm-2">
                    <?php echo form_input($PewarisPhone) ?>
                    <small class="text-danger"><i><?php echo form_error($PewarisPhone['name']); ?><?php echo isset($errors[$PewarisPhone['name']]) ? $errors[$PewarisPhone['name']] : ''; ?></i></small>
                </div>
            </div>


            <div class="form-group">
                <label for="last_name" class="col-sm-2 control-label">&nbsp;</label>
                <div class="col-sm-8">
                    <?php echo form_submit('submit', 'Simapan', 'class="btn btn-success"'); ?>
                </div>
            </div>
            <?php echo form_close() ?>

        </div>
    </div>
    <?php $this->load->view('includes/copyright') ?>

</div>

<?php $this->load->view('includes/footer'); ?>