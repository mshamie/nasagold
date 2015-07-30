<!-- Sidebar menu -->				
<div id="sidebar-menu">
    <?php if($this->ion_auth->in_group('admin')) { ?>
    <ul>
        <li class="<?php if($this->uri->segment(1)=="admin") { echo "active"; }?>"><a href="#fakelink"><i class="fa fa-desktop"></i><i class="fa fa-angle-double-down i-right"></i> Admin</a>
            <ul class="<?php if($this->uri->segment(1)=="admin") { echo "visible"; }?>">
                <!-- li class="<?php if($this->uri->segment(2)=="register") { echo "active"; }?>"><?php echo anchor('admin/register', '<i class="fa fa-angle-right"></i> Register Agent') ?></li -->
                <li class="<?php if($this->uri->segment(2)=="pelanggan") { echo "active"; }?>"><?php echo anchor('admin/pelanggan', '<i class="fa fa-angle-right"></i> Senarai Pelanggan') ?></li>
                <li class="<?php if($this->uri->segment(2)=="simpanan") { echo "active"; }?>"><?php echo anchor('admin/simpanan', '<i class="fa fa-angle-right"></i> Senarai Simpanan') ?></li>
                <li class="<?php if($this->uri->segment(2)=="agents") { echo "active"; }?>"><?php echo anchor('admin/agents', '<i class="fa fa-angle-right"></i> Senarai Agent') ?></li>
            </ul>
        </li>
    </ul>
    <?php } ?>
    <?php if($this->ion_auth->in_group('agent')) { ?>
    <ul>
        <li class="<?php if($this->uri->segment(1)=="admin") { echo "active"; }?>"><a href="#fakelink"><i class="fa fa-desktop"></i><i class="fa fa-angle-double-down i-right"></i> Admin</a>
            <ul class="<?php if($this->uri->segment(1)=="admin") { echo "visible"; }?>">
                <li class="<?php if($this->uri->segment(2)=="profile") { echo "active"; }?>"><?php echo anchor('admin/profile', '<i class="fa fa-angle-right"></i> Profile') ?></li>
            </ul>
        </li>
    </ul>
    <ul>
        <li class="<?php if($this->uri->segment(1)=="pelanggan") { echo "active"; }?>"><a href="#fakelink"><i class="fa fa-user"></i><i class="fa fa-angle-double-down i-right"></i> Pelanggan</a>
            <ul class="<?php if($this->uri->segment(1)=="pelanggan") { echo "visible"; }?>">
                <li class="<?php if($this->uri->segment(2)=="senarai_pelanggan") { echo "active"; }?>"><?php echo anchor('pelanggan/senarai_pelanggan', '<i class="fa fa-angle-right"></i> Pelanggan') ?></li>
                <li class="<?php if($this->uri->segment(2)=="daftar_pelanggan") { echo "active"; }?>"><?php echo anchor('pelanggan/daftar_pelanggan', '<i class="fa fa-angle-right"></i> Daftar Pelanggan') ?></li>   
            </ul>
        </li>
        <li class="<?php if($this->uri->segment(1)=="simpanan") { echo "active"; }?>"><a href="#fakelink"><i class="fa fa-bitcoin"></i><i class="fa fa-angle-double-down i-right"></i> Simpanan</a>
            <ul class="<?php if($this->uri->segment(1)=="simpanan") { echo "visible"; }?>">
                <li class="<?php if($this->uri->segment(2)=="senarai_simpanan") { echo "active"; }?>"><?php echo anchor('simpanan/senarai_simpanan', '<i class="fa fa-angle-right"></i> Senarai Simpanan') ?></li>
            </ul>
        </li>
    </ul>
    <?php } ?>
    <?php if ($this->ion_auth->logged_in()) { ?>
    <ul>
        <li><?php echo anchor('auth/logout', '<i class="fa fa-lock"></i>Logout'); ?></li>
    </ul>
    <?php } ?>
    <div class="clear"></div>
</div>