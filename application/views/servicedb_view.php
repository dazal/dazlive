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
    <link href="<?php echo base_url() ?>public/css/jquery.noty.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/css/noty_theme_default.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
  <!--  <div class="container"> -->
        <button class="btn btn-success" onclick="add_service()"><i class="glyphicon glyphicon-plus"></i>Service</button>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
    <div class="row-fluid sortable">        
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h3><i class="halflings-icon user"></i><span class="break"></span>Services</h3>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
        <table id="table" class="table table-striped table-bordered bootstrap-datatable datatable" cellspacing="0" width="100%">
        
            <thead>
                <tr>
                    <th>Brand Id</th>
                    <th>Service Id</th>
                    <th>Service Name</th>
                    <th>Type</th>
                    <th>Exact Price</th>
                    <th>Duration (Mins)</th>
                    <th style="width:125px;">Action</th>
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
 <script src="<?php echo base_url() ?>public/js/jquery.noty.js"></script>
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
            "url": "<?php echo site_url('servicedb/ajax_list')?>",
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
 
    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
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
 
 
 
function add_service()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Service'); // Set Title to Bootstrap modal title
}
 
function edit_service(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    
    
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('servicedb/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="brand_id"]').val(data.brand_id);
            $('[name="service_id"]').val(data.service_id);
            $('[name="name"]').val(data.name);
            $('[name="type"]').val(data.type);
            $('[name="exact_price"]').val(data.exact_price);
            $('[name="min_price"]').val(data.min_rate);
            $('[name="max_price"]').val(data.max_rate);
            $('[name="duration"]').val(data.duration);

            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Service'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {   

            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('servicedb/ajax_add')?>";
    } else {
        url = "<?php echo site_url('servicedb/ajax_update')?>";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');

            noty({
               text: 'Add/Update performed on Services is successfully !',
               layout: 'top',
               animateOpen: ['opacity','show'],
               type: 'success'
            });


                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
            

 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {

            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
 
        }
    });
}
 
function delete_service(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('servicedb/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}
 
</script>
 
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Service Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="service_id"/>
                    <div class="form-body">
                       <!--  <div class="form-group">
                            <label class="control-label col-md-3">Brand Id</label>
                            <div class="col-md-9">
                                <input name="brand_id" placeholder="Brand Id" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label col-md-3">Service Name</label>
                            <div class="col-md-9">
                                <input name="name" placeholder="Service Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Type</label>
                            <div class="col-md-9">
                                <select name="type" class="form-control">
                                    <option value="">--Select Service Type--</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="K">Kid</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Min Price</label>
                            <div class="col-md-9">
                                <input  name="min_price" placeholder="Minimum Price" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Max Price</label>
                            <div class="col-md-9">
                                <input  name="max_price" placeholder="Maximum Price" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Exact Price</label>
                            <div class="col-md-9">
                                <input  name="exact_price" placeholder="Exact Price" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Duration</label>
                            <div class="col-md-9">
                                <input name="duration" placeholder="Duration in minutes" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</body>
</html>