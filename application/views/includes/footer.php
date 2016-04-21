
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer role="contentinfo">
    <div class="clearfix">
        <ul class="list-unstyled list-inline">
            <li><?php echo $name; ?> &copy; 2016</li>
            <button class="pull-right btn btn-inverse-alt btn-xs hidden-print" id="back-to-top"><i class="fa fa-arrow-up"></i></button>
        </ul>
    </div>
</footer>

</div> <!-- page-container -->

<!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>!window.jQuery && document.write(unescape('%3Cscript src="assets/js/jquery-1.10.2.min.js"%3E%3C/script%3E'))</script>
<script type="text/javascript">!window.jQuery.ui && document.write(unescape('%3Cscript src="assets/js/jqueryui-1.10.3.min.js'))</script>
-->


<script type='text/javascript' src='<?php echo base_url('assets/js/jquery-1.10.2.min.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/js/jqueryui-1.10.3.min.js')?>'></script> 

<script type='text/javascript' src='<?php echo base_url('assets/js/bootstrap.min.js')?>'></script> 

<script type='text/javascript' src='<?php echo base_url('assets/js/enquire.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/js/jquery.cookie.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/js/jquery.nicescroll.min.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/plugins/codeprettifier/prettify.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/plugins/easypiechart/jquery.easypiechart.min.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/plugins/sparklines/jquery.sparklines.min.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/plugins/form-toggle/toggle.min.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/demo/demo-datatables.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/js/placeholdr.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/js/application.js')?>'></script> 
<script type='text/javascript' src='<?php echo base_url('assets/demo/demo.js')?>'></script> 
<script src='<?php echo base_url('assets/plugins/bootstrap-fileinput/js/fileinput.min.js'); ?>' type='text/javascript'></script>
<script src='<?php echo base_url('assets/plugins/bootstrap-fileinput/js/fileinput_locale_pt-BR.js'); ?>' type='text/javascript'></script>
<script type="text/javascript">
    
    $(document).ready(function () {
        $('input:file[name="file[]"]').fileinput({
            language: 'pt-BR',
            showUpload: false,
            allowedFileExtensions: ['zip'],
            browseClass: "btn btn-primary",
            allowedPreviewTypes: null,
            showRemove:true,
            previewFileIconSettings: {
                'zip': '<i class="fa fa-book text-muted"></i>',
    }
        });
    });

</script>
<script type='text/javascript' src='<?php echo base_url('assets/js/progressbar/script.js')?>'></script> 


</body>
</html>

