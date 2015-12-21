<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">

    <title>Driver Registration - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body{ 
    margin-top:40px; 
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'http://bootsnipp.com');
        });
    </script>
</head>
<body>
  <div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Personal Info</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>User Info</p>
        </div>

    </div>
</div>
<form role="form" name="singup" action="<?php echo base_url();?>login/create_member" method="post" accept-charset="utf-8">
    <div class="row setup-content" id="step-1">
    
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3></h3>
                                <!-- Select Basic -->
                <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="first_name">First Name</label>  
                <div class="col-md-5">
                <input id="first_name" name="first_name" type="text" rquired="requried" placeholder="First Name" value="<?php echo set_value('first_name'); ?>" class="form-control input-md">
                </div>
              </div>
              <br>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="service_architecture">Last Name</label>  
                <div class="col-md-5">
                <input id="last_name" name="last_name" type="text" rquired="requried" placeholder="Last name" value="<?php echo set_value('last_name'); ?>" class="form-control input-md">
                </div>
              </div>
              <br>
              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="emailid">Email Address</label>  
                <div class="col-md-5">
                <input id="emailid" name="emailid" type="text" rquired="requried" placeholder="Email Address" value="<?php echo set_value('emailid'); ?>" class="form-control input-md">
                </div>
              </div>
              <br>
              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="phoneno">Mobile Number</label>
                <div class="col-md-4">                     
                 <input id="phoneno" name="phoneno" type="text" rquired="requried" placeholder="Mobile Number where you can receive SMS"  value="<?php echo set_value('phoneno'); ?>" class="form-control input-md">
                </div>
              </div>
              <br>
                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                          </div>
                      </div>
              </div> <!-- End of Tabe 1 -->

    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3></h3>
                
                <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-5">
  <input id="username" name="username" type="text" rquired="requried" placeholder="username" value="<?php echo set_value('username')?>" class="form-control input-md">
  </div>
</div>
<br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>  
  <div class="col-md-5">
  <input id="password" name="password" type="password" rquired="requried" placeholder="password" value="<?php echo set_value('password'); ?>" class="form-control input-md">
  </div>
</div>
<br>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password2">Confirm Password</label>  
  <div class="col-md-5">
  <input id="password2" name="password2" type="password" rquired="requried" placeholder="Confirm password" value="<?php echo set_value('password2'); ?>" class="form-control input-md">
  </div>
</div>
<br>
                 <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>

            </div>
        </div>
    </div>

      <?php if(validation_errors()) { ?>
      <div class="alert alert-danger">
      <?php echo validation_errors(); ?>
      </div>
      <?php } ?>

                             
</form>
</div> <!-- Container -->
  <script type="text/javascript">

$( "first_name" )
  .keyup(function() {
    var value = $( this ).val();
    $( "pfirst_name" ).text( value );
  }).keyup();



  $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
    
    
    //custom code by @naresh for file input sep
    
        var fileInput = document.getElementById('sep_json');
      var fileDisplayArea = document.getElementById('sep_jsondisplay');
      var fileInput1 = document.getElementById('action_json');
      var fileDisplayArea1 = document.getElementById('action_jsondisplay');
        

          fileInput.addEventListener('change', function(e) {
      var file = fileInput.files[0];
      var textType = /text.*/;

      if (file.type.match(textType)) {
        var reader = new FileReader();

        reader.onload = function(e) {
          var res= reader.result;
          function isJSON (something) {
    if (typeof something != 'string')
        something = JSON.stringify(something);

    try {
        JSON.parse(something);
        return true;
    } catch (e) {
        return false;
    }
}
          if(isJSON(res)){
          fileDisplayArea.innerText = JSON.stringify(res);
          }else{
            fileDisplayArea.innerText = "File content is not JSON"
          }
        }

        reader.readAsText(file);  
      } else {
        fileDisplayArea.innerText = "File not supported!"
      }
    });
    fileInput1.addEventListener('change', function(e) {
        var file = fileInput1.files[0];
      var textType = /text.*/;

      if (file.type.match(textType)) {
        var reader = new FileReader();

        reader.onload = function(e) {
          var res= reader.result;
          function isJSON (something) {
    if (typeof something != 'string')
        something = JSON.stringify(something);

    try {
        JSON.parse(something);
        return true;
    } catch (e) {
        return false;
    }
}
          if(isJSON(res)){
          fileDisplayArea1.innerText = JSON.stringify(res);
          }else{
            fileDisplayArea1.innerText = "File content is not JSON"
          }
        }

        reader.readAsText(file);  
      } else {
        fileDisplayArea1.innerText = "File not supported!"
      }
    });
    
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="action_id">Action Id</label> <div class="col-md-5"> <input id="action_id" name="action_id" type="text" placeholder="" class="form-control input-md"> </div></div><br><br><!-- Text input--><div class="form-group"> <label class="col-md-4 control-label" for="action_name">Action Name</label> <div class="col-md-5"> <input id="action_name" name="action_name" type="text" placeholder="" class="form-control input-md"> </div></div><br><br><!-- File Button --> <div class="form-group"> <label class="col-md-4 control-label" for="action_json">Action JSON File</label> <div class="col-md-4"> <input id="action_json" name="action_json" class="input-file" type="file"> </div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    
    
    
    
});
  </script>
</body>
</html>
