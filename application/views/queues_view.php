<script>


	function create(){

      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      //$('#modal_form #datetimepickerstart').val(start); 
      //$('#modal_form #datetimepickerend').val(end); 
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Create a New Appointment'); // Set Title to Bootstrap modal title
    }
	
	function createPaymentForm(ui){
     // save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      //$('#modal_form #datetimepickerstart').val(start); 
      //$('#modal_form #datetimepickerend').val(end); 
      $('#modal_payment_form').modal('show'); // show bootstrap modal
	  $('#pf_customer_name').val(document.getElementById(ui+"_titleId").value);
      $('.modal-title').text('Payment Form'); // Set Title to Bootstrap modal title
    }
	function paymentSave()
	{
		showMessages(400);
		
		
	}

    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('appointments/add')?>";
      }
      else
      {
        url = "<?php echo site_url('appointments/update')?>";
      }
      
      var form_data = {
        title: $('#customer_name').val(),
        start: $('#start_time').val(),
        end: $('#end_time').val()
        };

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
              {
                   //if success close modal and reload ajax table
                //alert("success " + data.status);
                if (data.status = 'TRUE'){
                    $('#alert-msg').html('<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
                }else if (data.status = 'NO'){
                    $('#alert-msg').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
                }else if (data.status = 'FALSE'){
                    $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
                }    
                   $('#modal_form').modal('hide');
                   window.location.reload();

              },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	 alert("success " + data.status);
                    alert('Error get data from ajax');

                }
        });
    }
</script>


<div class="container" style="width: 1095px !important;">
        <button class="btn btn-success" onclick="create()"><i class="glyphicon glyphicon-plus"></i> + Appointment</button>
<span style="float:right;">
	<button class="btn btn-alert" id="prev"><i class="glyphicon glyphicon-plus"></i> << Previous Day </button>
	<button class="btn btn-alert" id="next"><i class="glyphicon glyphicon-plus"></i> Next Day >></button>
</span>
        <p>
</div>
			<div class="row-fluid sortable"  id="contentDiv">
				<div class="box span12">
					<div class="box-header" data-original-title>
					  <h2><i class="halflings-icon calendar"></i><span class="break"></span>Appointment Queue for <b><? echo $appntForDate ?></b></h2>
						<input type="hidden" name="appntHiddenDate" id="appntHiddenDate" value=<? echo $appntForDate ?> />
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
									  <th>Appointments</th>
									  <th>Checked In</th>
									  <th>In Service</th>
									  <th>Payment Due</th>
									  <th>Complete</th>
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									<td width="20%">
									<?php
									 /* fetch object array */
										
									   foreach ($appointments as $row)
									   {
									?>
										<div class="draggableBtn" id="<? echo $row['id'] ?>"><div class="external-event badge badge-info" ><? echo $row['title'].' ('.$row['startTime'].' - '.$row['endTime'].')'?></div>
										<input type="hidden" value=<? echo $row['title'] ?> id="<? echo $row['id'] ?>_titleId">
										</div>
									<?php	
  									    }
									?>
									</td>
									<td class="center" id="checkedInDiv" width="20%">
									
									<?php  foreach ($checkedin as $row) {  ?>
										<div class="draggableBtn" id="<? echo $row['id'] ?>"><div class="external-event badge badge-info"> <? echo $row['title'].' ('.$row['startTime'].' - '.$row['endTime'].')'?></div>
										<input type="hidden" value=<? echo $row['title'] ?> id="<? echo $row['id'] ?>_titleId">
										</div>
									<?php  } ?>									
									</td>
									<td class="center" id="inServiceDiv" width="20%">
									<?php  foreach ($inservice as $row) {  ?>
										<div class="draggableBtn" id="<? echo $row['id'] ?>"><div class="external-event badge badge-info"> <? echo $row['title'].' ('.$row['startTime'].' - '.$row['endTime'].')'?></div>
										<input type="hidden" value=<? echo $row['title'] ?> id="<? echo $row['id'] ?>_titleId">
										</div>
									<?php  } ?>
									</td>
									<td class="center" id="paymentDueDiv" width="20%">
									<?php  foreach ($paymentdue as $row) {  ?>
										<div class="draggableBtn" id="<? echo $row['id'] ?>"><div class="external-event badge badge-info"> <? echo $row['title'].' ('.$row['startTime'].' - '.$row['endTime'].')'?></div>
										<input type="hidden" value=<? echo $row['title'] ?> id="<? echo $row['id'] ?>_titleId">
										</div>
									<?php  } ?>
									</td>
									<td class="center" id="doneDiv" width="20%">
									<?php  foreach ($complete as $row) {  ?>
										<div class="draggableBtn" id="<? echo $row['id'] ?>">
											<div class="external-event badge badge-info"> <? echo $row['title'].' ('.$row['startTime'].' - '.$row['endTime'].')'?></div>
											<input type="hidden" value=<? echo $row['title'] ?> id="<? echo $row['id'] ?>_titleId">
										</div>
									<?php  } ?>
									</td>
								</tr>
							  </tbody>
						 </table>  
					</div>
				</div>
				
				
			</div><!--/row-->
		

	</div><!--/.fluid-container-->

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h3 class="modal-title">Create a New Appointment Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>

          <div class="form-body">
          
          <!--  <div class="form-group">
              <label class="control-label ">Customer Name</label>
              <div class="controls">
              <input type="text" class="span5 typeahead" id="typeahead"  data-provide="typeahead"
               data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California",
               "Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois",
               "Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts",
               "Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire",
               "New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon"
               ,"Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont"
               ,"Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
             
              </div> -->
             
              <div class="form-group">
              <label class="control-label ">Customer Name</label>
              <div class="controls">
                <input type="text" class="input" id="customer_name" name="customer_name" />
                <span class="help-block"></span>
              </div> 
            </div>

           <div class="form-group">
              <label class="control-label ">Start Time</label>
              <div class="controls">
                <input type="text" class="input"  id="datetimepickerstart" name="start_time" />
                <span class="help-block"></span>
              </div>
            </div>

             <div class="control-group">
                <label class="control-label" >End Time</label>
                <div class="controls">
                <input type="text" class="input"  id="datetimepickerend" name="end_time" />
                <span class="help-block"></span>
              </div>
              </div>   
           </div> <!-- //asdasda -->
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
        <div id="alert-msg"></div>
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  

<div class="modal fade" id="modal_payment_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h3 class="modal-title">Create a New Appointment Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>

          <div class="form-body">
          
                    
			<div class="form-group">
				<label class="control-label ">Customer Name</label>
				<div class="controls">
					<input type="text" class="input" id="pf_customer_name" name="pf_customer_name" disabled/>
					<span class="help-block"></span>
				</div> 
            </div>
			
			<div class="form-group">
				<label class="control-label">Payment Type</label>
				<div class="controls">
					<input type="radio" id="pf_paymentType" name="pf_paymentType" value="creditordebit" style="margin-left: 0 !important;" />Credit/Debit Card
					<input type="radio" id="pf_paymentType" name="pf_paymentType" value="cash" style="margin-left: 0 !important;" />Cash
				</div> 
            </div>

           </div> <!-- //asdasda -->
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave"  class="btn btn-primary" onclick="paymentSave()" data-dismiss="modal">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
        <div id="alert-msg"></div>
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
<script>
$(document).ready(function(){
  
  $('#form')[0].reset();
  $('#datetimepickerstart').datetimepicker({

  allowTimes:[
  '08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','1$:30','15:00',
  '15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00'],
  minDate : 0 , // today
  minTime : 0 ,
  onSelectDate : function(){

  }

  });

  $('#datetimepickerend').datetimepicker({
  allowTimes:[
  '08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','1$:30','15:00',
  '15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00']    
  });

});
</script>

	<script>
	
	
	$('.draggableBtn').draggable({
         helper:"clone",
        containment:"checkedInDiv"
    });
	

function createDroppable() {
    $('#checkedInDiv').droppable({
        drop: function (event, ui) {
		ui.draggable.detach().appendTo($(this));
		updateQueueService(ui,100);
    showMessages(100);
        }
    });
	$('#inServiceDiv').droppable({
        drop: function(event, ui) { // this function is called when something is dropped
            ui.draggable.detach().appendTo($(this));
			updateQueueService(ui,200);
      showMessages(200);
        }
    });
	$('#paymentDueDiv').droppable({
		drop: function(event, ui) { // this function is called when something is dropped
		ui.draggable.detach().appendTo($(this));
		updateQueueService(ui,300);
    showMessages(300);
		}
    });
	
    $('#doneDiv').droppable({
        drop: function(event, ui) { // this function is called when something is dropped
		createPaymentForm(ui.draggable.attr('id'));
		ui.draggable.detach().appendTo($(this));
		updateQueueService(ui,400);
		
        }
    });	
}   

function updateQueueService(ui, qstatus) {
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('queues/updateAppointments/')?>",
		dataType: "text",
		data:{appointmentId:ui.draggable.attr('id'),status:qstatus},
		success: function (data) {
			createDroppable();
		},
		error: function(jqXHR, textStatus, errorThrown){
		    alert(jqXHR.responseText);
            alert(textStatus);    
            alert(errorThrown);
            alert('Error get data from ajax');
			alert('data'+jqXHR.status);
		}	
	});
}

$('#next').click(function() {
	a = $('#appntHiddenDate').val();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('queues/moveNextDay')?>",
		dataType: "text",
		data:{selDate:a},
		success: function (response) {
		     $('#contentDiv').html($('<div />').html(response).find('#contentDiv').html());
		     if($('#isToday').val() == 1) {
			/* Re-initialize the droppable widget: */
				createDroppable();
				$('.draggableBtn').draggable({ revert: true });
		     }
		},
		error: function(jqXHR, textStatus, errorThrown){
		    alert(jqXHR.responseText);
            alert(textStatus);    
            alert(errorThrown);
            alert('Error get data from ajax');
			alert('data'+jqXHR.status);
		}	
	});
});

$('#prev').click(function() {
	a = $('#appntHiddenDate').val();
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('queues/movePrevDay')?>",
		dataType: "text",
		data:{selDate:a},
		success: function (response) {
		     $('#contentDiv').html($('<div />').html(response).find('#contentDiv').html());
		     if($('#isToday').val() == 1) {
			
                        /* Re-initialize the droppable widget: */
                    	createDroppable();
			$('.draggableBtn').draggable({ revert: true });
		     }
		},
		error: function(jqXHR, textStatus, errorThrown){
		    alert(jqXHR.responseText);
            alert(textStatus);    
            alert(errorThrown);
            alert('Error get data from ajax');
			alert('data'+jqXHR.status);
		}	
	});
});

	createDroppable();

  function showMessages(status){
  //alert(status);

      if(status == 100){
           noty({
               text: 'Customer moved to Check-In Q successfully !',
               layout: 'top',
               animateOpen: ['opacity','show'],
               type: 'success'
            });
      }
      if(status == 200){
           noty({
               text: 'Customer moved to Service Q successfully !',
               layout: 'top',
               animateOpen: ['opacity','show'],
               type: 'success'
            });
      }
        if(status == 300){
           noty({
               text: 'Customer moved to Payment Q successfully !',
               layout: 'top',
               animateOpen: ['opacity','show'],
               type: 'success'
            });
      }
        if(status == 400){
           noty({
               text: 'All services done !!!',
               layout: 'top',
               animateOpen: ['opacity','show'],
               type: 'success'
            });
      }
  }
</script>