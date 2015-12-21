<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax CRUD with Bootstrap modals and Datatables</title>
    <link href="http://livedemo.mbahcoding.com/appdemo/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://livedemo.mbahcoding.com/appdemo/assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
  <!--  <div class="container"> -->
    <div class="row-fluid sortable">        
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h3><i class="halflings-icon user"></i><span class="break"></span>Audit Logs</h3>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
        <table id="table" class="table table-striped table-bordered bootstrap-datatable datatable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Timestamp</th>
                    <th>Salon ID</th>
                    <th>ActorID</th>
                    <th>Module</th>
                    <th>TransType</th>
                    <th>Description</th>
                    <th>OldValue</th>
                    <th>NewValue</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        </div>
        </div>
 <!--   </div> -->
 
 <script src="http://livedemo.mbahcoding.com/appdemo/assets/jquery/jquery-2.1.4.min.js"></script>
 <script src="http://livedemo.mbahcoding.com/appdemo/assets/bootstrap/js/bootstrap.min.js"></script>
 <script src="http://livedemo.mbahcoding.com/appdemo/assets/datatables/js/jquery.dataTables.min.js"></script>
 <script src="http://livedemo.mbahcoding.com/appdemo/assets/datatables/js/dataTables.bootstrap.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
 
<script type="text/javascript">
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('auditdb/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
 
});
 

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}
 
</script>
</body>
</html>