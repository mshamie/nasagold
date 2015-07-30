
</div>
<!-- END CONTENT -->

<!--
   ============================================================================
   MODAL DIALOG EXAMPLE
   You can change transition style, just view element page
   ============================================================================
-->
<!-- Modal Logout Primary -->
<div class="md-modal md-fall" id="logout-modal">
    <div class="md-content">
        <h3><strong>Logout</strong> Confirmation</h3>
        <div>
            <p class="text-center">Are you sure want to logout from this awesome system?</p>
            <p class="text-center">
                <button class="btn btn-danger md-close">Nope!</button>
                <?php echo anchor('auth/logout', 'Yes, sure', 'class="btn btn-success md-close"'); ?>
                <!-- a href="login.html" class="btn btn-success md-close">Yes, I'm sure</a -->
            </p>
        </div>
    </div>
</div><!-- End .md-modal -->

<!-- Modal Logout Alternatif -->
<div class="md-modal md-just-me" id="logout-modal-alt">
    <div class="md-content">
        <h3><strong>Logout</strong> Confirmation</h3>
        <div>
            <p class="text-center">Are you sure want to logout from this awesome system?</p>
            <p class="text-center">
                <button class="btn btn-danger md-close">Nope!</button>
                <?php echo anchor('auth/logout', 'Yes, sure', 'class="btn btn-success md-close"'); ?>
                <!-- <a href="login.html" class="btn btn-success md-close">Yeah, I'm sure</a> -->
            </p>
        </div>
    </div>
</div><!-- End .md-modal -->

<!-- Modal Task Progress -->	
<div class="md-modal md-slide-stick-top" id="task-progress">
    <div class="md-content">
        <h3><strong>Task Progress</strong> Information</h3>
        <div>
            <p>CLEANING BUGS</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80&#37; Complete</span>
                </div>
            </div>
            <p>POSTING SOME STUFF</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                    <span class="sr-only">65&#37; Complete</span>
                </div>
            </div>
            <p>BACKUP DATA FROM SERVER</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                    <span class="sr-only">95&#37; Complete</span>
                </div>
            </div>
            <p>RE-DESIGNING WEB APPLICATION</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100&#37; Complete</span>
                </div>
            </div>
            <p class="text-center">
                <button class="btn btn-danger btn-sm md-close">Close</button>
            </p>
        </div>
    </div>
</div><!-- End .md-modal -->
<!--
============================================================================
END MODAL DIALOG EXAMPLE
============================================================================
-->

<!--
MODAL OVERLAY
Always place this div at the end of the page content
-->
<div class="md-overlay"></div>



</div><!-- End div .container -->
<!-- END PAGE -->
<!--
================================================
JAVASCRIPT
================================================
-->
<!-- Basic Javascripts (Jquery and bootstrap) -->
<script src="<?php echo base_url('assets'); ?>/js/jquery.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>

<!-- VENDOR -->

<!-- Slimscroll js -->
<script src="<?php echo base_url('assets'); ?>/third/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Morris js -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url('assets'); ?>/third/morris/morris.js"></script>

<!-- Nifty modals js -->
<script src="<?php echo base_url('assets'); ?>/third/nifty-modal/js/classie.js"></script>
<script src="<?php echo base_url('assets'); ?>/third/nifty-modal/js/modalEffects.js"></script>

<!-- Sortable js -->
<script src="<?php echo base_url('assets'); ?>/third/sortable/sortable.min.js"></script>

<!-- Bootstrao selectpicker js -->
<script src="<?php echo base_url('assets'); ?>/third/select/bootstrap-select.min.js"></script>

<!-- Summernote js -->
<script src="<?php echo base_url('assets'); ?>/third/summernote/summernote.js"></script>

<!-- Magnific popup js -->
<script src="<?php echo base_url('assets'); ?>/third/magnific-popup/jquery.magnific-popup.min.js"></script> 

<!-- Bootstrap file input js -->
<script src="<?php echo base_url('assets'); ?>/third/input/bootstrap.file-input.js"></script>

<!-- Bootstrao datepicker js -->
<script src="<?php echo base_url('assets'); ?>/third/datepicker/js/bootstrap-datepicker.js"></script>

<!-- Icheck js -->
<script src="<?php echo base_url('assets'); ?>/third/icheck/icheck.min.js"></script>

<!-- Form wizard js -->
<script src="<?php echo base_url('assets'); ?>/third/wizard/jquery.snippet.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/third/wizard/jquery.easyWizard.js"></script>
<script src="<?php echo base_url('assets'); ?>/third/wizard/scripts.js"></script>

<!-- LANCENG TEMPLATE JAVASCRIPT -->
<script src="<?php echo base_url('assets'); ?>/js/lanceng.js"></script>

</body>
</html>