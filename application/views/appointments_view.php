<script>
var save_method; //for save method string
var cal;
var json_events;





$(document).ready(function() {

/*
$.ajax({
   url: '<?php echo base_url()?>appointments/getEventList',
   type: 'POST',
   data: 'type=fetch',
   async: false,
   success: function(response){

     json_events = response;
   },
   error: function (jqXHR, textStatus, errorThrown){
    //alert("failure");

                        noty({
                         text: 'Error cccured during the call to appointments/getEventList',
                         layout: 'top',
                         animateOpen: ['opacity','show'],
                         type: 'error'
                      });

   }
});

*/

$(function() { // document ready
  
    $('#calendar').fullCalendar({
    header: {
      left: 'prev,next',
      center: 'title',
      right: 'today,month,agendaWeek,agendaDay'
    },
	allDay :false,
    editable: true,
    droppable : true,
    eventLimit: 5, // allow "more" link when too many events
    eventLimitText : "More...   ",
    //events: '<?php echo base_url()?>appointments/getEventList',
   
   events : {
	url: '<?php echo base_url()?>appointments/getEventList',
   type: 'POST',
   data: 'type=fetch',
   async: false,
   success: function(response){

     json_events = response;
	 console.log(json_events);
   },
   error: function (jqXHR, textStatus, errorThrown){
    //alert("failure");

                        noty({
                         text: 'Error cccured during the call to appointments/getEventList',
                         layout: 'top',
                         animateOpen: ['opacity','show'],
                         type: 'error'
                      });

   }
},

	


    /******* Section for Appointment Creation *********/
     selectable: true,
     selectHelper: true,

    select: function(start, end, allDay) {


     //var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
     //var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
     //var today = $.fullCalendar.formatDate(new Date(),"yyyyMMdd");
    // if(check >= today)
    //{
   // }
   // else
  //  {
     save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form #datetimepickerstart').val(start); 
      $('#modal_form #datetimepickerend').val(end); 
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Create a New Appointment'); // Set Title to Bootstrap modal title
   // }

     }, 

     //End Event Create

//Section for Appointment Edits 

eventClick: function(calEvent, jsEvent, view) {

      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
      
     //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('appointments/getEventbyId')?>/" + calEvent.id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.appointment_id);
            $('[name="customer_name"]').val(data.user_id);
            $('[name="start_time"]').val(data.start_time);
            $('[name="end_time"]').val(data.end_time);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Appointment'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {

            //alert('Error get data from ajax');
          noty({
             text: 'Error cccured during the call to appointments/getEventbyId '+ calEvent.id,
             layout: 'top',
             animateOpen: ['opacity','show'],
             type: 'error'
          });
        }
    });
},

   eventResize: function(event) {

        
        $.ajax({
        url : "<?php echo site_url('appointments/getEventbyId')?>/" + event.id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {

        		
            $('[name="id"]').val(data.id);
            $('[name="customer_name"]').val(data.title);
            $('[name="start_time"]').val(data.start);
            $('[name="end_time"]').val(data.end);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Appointment'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {

            noty({
             text: 'Error cccured during the call to appointments/getEventbyId',
             layout: 'top',
             animateOpen: ['opacity','show'],
             type: 'error'
          });

            //alert('Error get data from ajax');
        }
    });
  },

     //eventDrop: function( event, delta, revertFunc, jsEvent, ui, view ){
      eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
       
       alert(
            event.title + " was moved " +
            dayDelta + " days and " +
            minuteDelta + " minutes."
        );

        if (allDay) {
            alert("Event is now all-day");
        }else{
            alert("Event has a time-of-day");
        }

        if (!confirm("Are you sure about this change?")) {
            revertFunc();
        }
/*

        var form_data = {
        title: $('#customer_name').val(),
        start: event.start,
        end: event.end,
        id: event.id
        };
*/

        $('[name="id"]').val(event.id);
        $('[name="customer_name"]').val(event.title);
        $('[name="start_time"]').val(event.start);
        $('[name="end_time"]').val(event.end);

            
         $.ajax({
         url: "<?php echo site_url('appointments/update')?>",
         data: form_data,
         type: "POST",
             success: function(json) {
              alert("Updated Successfully");
             },

            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');

            }
         });
   },        

   
  

  });//#calendar
 

});//End Calendar 

});


$(document).ready(function(){
  
  $('#form')[0].reset();
  $('#datetimepickerstart').datetimepicker({

  allowTimes:[
  '08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00',
  '15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00',
  ],
	minDate : 0 , // today
  minTime : 0 ,
	formatDate:'d/m/Y',
	formatTime:'H:i',
	onSelectDate:function(ct,$i){

  $('#datetimepickerend').datetimepicker(
  {
	  minDate: ct.dateFormat('Y/m/d'),
	  startDate : ct.dateFormat('Y/m/d'),
	  maxDate: ct.dateFormat('Y/m/d')
  });

}
,
onSelectTime:function(ct,$i){


  $('#datetimepickerend').datetimepicker({
	  minTime: getTime(ct.dateFormat('H:i'))
	
  });

}

  });
  
  

  $('#datetimepickerend').datetimepicker(
  {
 
 allowTimes:[
  '08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00',
 '15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00']
 
 
  }
  );
  

});

function getTime(value){     
 console.log(value);
 var updateTime;
   var time=value.split(":");
  
   if(parseInt(time[1])==30)
   {
	  
	   updateTime=(parseInt(time[0])+1)+":00";
   }
   else{
	   updateTime=parseInt(time[0])+":30";
	   
   }
   return updateTime;

}
  
  function updateTime(value){     
  console.log(value);
    $('#datetimepickerend').datetimepicker("option","minTime", value);

}

function create(){

      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      //$('#modal_form #datetimepickerstart').val(start); 
      //$('#modal_form #datetimepickerend').val(end); 
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Create a New Appointment'); // Set Title to Bootstrap modal title
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

                if (data.status = 'TRUE'){

                    $('#alert-msg').html('<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
					
					
                }else if (data.status = 'NO'){
                    $('#alert-msg').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
                }else{
                    $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
                }    
                   $('#modal_form').modal('hide');

                    noty({
                         text: 'Appointment added successfully for customer ' + $('#customer_name').val(),
                         layout: 'top',
                         animateOpen: ['opacity','show'],
                         type: 'success'
                      });

                   window.location.reload();

              },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    //alert(jqXHR.responseText);
                    //alert(textStatus);    
                    //alert(errorThrown);
                    //alert('Error get data from ajax');
                    //alert('data'+jqXHR.status);
                    //alert('Error get data from ajax');

                  noty({
                   text: jqXHR.responseText,
                   layout: 'top',
                   animateOpen: ['opacity','show'],
                   type: 'error'
                });

                }
        });
    }



$(document).ready(function () {
    $("#name").keyup(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>autosearch/get_users",
            data: {
                keyword: $("#name").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownName').empty();
                    $('#country').attr("data-toggle", "dropdown");
                    $('#DropdownName').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#country').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownName').append('<li role="presentation" >' + value['name'] + '</li>');
                });
            }
        });
    });
    $('ul.txtname').on('click', 'li a', function () {
        $('#name').val($(this).text());
    });
});



/*

  $("#name").autocomplete({
    minLength : 3,
    source: function(req, add){
    $.ajax({
      url: '<?php echo base_url()?>autosearch/get_users', //Controller where search is performed
      dataType: 'json',
      type: 'POST',
      data: req,
      success: function(data){
        if(data.response =='true'){
           add(data.message);
        }
      }
      error: function (jqXHR, textStatus, errorThrown){
          alert("failure");
      }      
    });
  }
  });
*/


$( "#autocomplete" ).autocomplete({
  source: [ "hello", "world" ]
});


$('#typeahead').typeahead({
    source: function (query, process) {
        return $.ajax({
            url: "<?php echo base_url()?>/dbutil/get_phone",
            type: 'post',
            data: { query: query },
            dataType: 'json',
            success: function (result) {
              alert("typeahead " +result);
               // var resultList = result.map(function (item) {
               //     var aItem = { id: item.Id, name: item.Name };
               //     return JSON.stringify(aItem);
               // });

                return process(result);

            }
        });
    },

matcher: function (obj) {
        var item = JSON.parse(obj);
        return ~item.name.toLowerCase().indexOf(this.query.toLowerCase())
    },

    sorter: function (items) {          
       var beginswith = [], caseSensitive = [], caseInsensitive = [], item;
        while (aItem = items.shift()) {
            var item = JSON.parse(aItem);
            if (!item.name.toLowerCase().indexOf(this.query.toLowerCase())) beginswith.push(JSON.stringify(item));
            else if (~item.name.indexOf(this.query)) caseSensitive.push(JSON.stringify(item));
            else caseInsensitive.push(JSON.stringify(item));
        }

        return beginswith.concat(caseSensitive, caseInsensitive)

    },


    highlighter: function (obj) {
        var item = JSON.parse(obj);
        var query = this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, '\\$&')
        return item.name.replace(new RegExp('(' + query + ')', 'ig'), function ($1, match) {
            return '<strong>' + match + '</strong>'
        })
    },

    updater: function (obj) {
        var item = JSON.parse(obj);
        $('#IdControl').attr('value', item.id);
        return item.name;
    }
});



function showMessages(status){
  //alert(status);

      if(status == 100){
           noty({
               text: 'Customer moved to Check-In Q successfully !',
               layout: 'bottom',
               animateOpen: ['opacity','show'],
               type: 'success'
            });
      }
      if(status == 200){
           noty({
               text: 'Customer moved to Service Q successfully !',
               layout: 'bottom',
               animateOpen: ['opacity','show'],
               type: 'success'
            });
      }
        if(status == 300){
           noty({
               text: 'Customer moved to Payment Q successfully !',
               layout: 'bottom',
               animateOpen: ['opacity','show'],
               type: 'success'
            });
      }
        if(status == 400){
           noty({
               text: 'All services done !!!',
               layout: 'bottom',
               animateOpen: ['opacity','show'],
               type: 'success'
            });
      }
  }
     
</script>


<!-- start: Calendar Display  DO NOT CHANGE THIS CODE EVER-->



<!-- end: Calendar Display -->
<div class="container">
        <button class="btn btn-success" onclick="create()"><i class="glyphicon glyphicon-plus"></i>+Appointment</button>
        <p>
</div>
      <div class="row-fluid sortable">
        <div class="box span12">
          <div class="box-header" data-original-title>
            <h2><i class="halflings-icon calendar"></i><span class="break"></span>Calendar</h2>
          </div>
          <div class="box-content">

            <div id="calendar" class="span15"></div>

            <div class="clearfix"></div>
          </div>
        </div>
      </div><!--/row-->
    

  </div><!--/.fluid-container-->

  
 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h3 class="modal-title">Create a New Appointment</h3>
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
              <label class="control-label ">Appointment Type</label>
              <div class="controls">
                    <select name="app_type" class="form-control" class="select">
                                    <option value="">--Select Type--</option>
                                    <option value="1">App</option>
                                    <option value="2">Walk-In</option>
                    </select>
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