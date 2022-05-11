<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel='stylesheet' href='https://rawgit.com/guillaumepotier/Parsley.js/2.7.2/src/parsley.css'>

<style>
.form-section {
    padding-left: 15px;
    border-left: 2px solid #FF851B;
    display: none;
  }
  .form-section.current {
    display: inherit;
  }
  .btn-info, .btn-default {
    margin-top: 10px;
  }
  html.codepen body {
    margin: 1em;
  }
  input[type="radio"] {
  display: none;
}
label {
  display: inline-block;
  background-color: #f1f1f1;
  padding: 5px 11px;
  font-family: Arial;
  font-size: 16px;
  cursor: pointer;
  border-radius:9px;
}
input[type="radio"]:checked+label {
  background-color: #31b0d5;
}
  
    </style>
    <script>
       function checkorg(e){
	     var y=document.getElementById('r1');
	     var n=document.getElementById('r2');
	     if(y.checked==true){
	         $('#org-empty').css('display','none');
           $('#org-full').css('display','block');
           $("#yorg").prop('required',true);
           $("#norg").prop('required',false);
	     }else if(n.checked==true){
	         $('#org-full').css('display','none');
           $('#org-empty').css('display','block');
           $("#norg").prop('required',true);
           $("#yorg").prop('required',false);
	     }else{
	        // $('#govt').css('display','block');
	     }
	      
	 }
    </script>
  
<form class="demo-form" id="create-profile" method="post" action="admin_register">
   
        <div class="container">
            <div class="row">

                <div class="col-md-offset-3 col-md-6">
                  

                    <div class="form-section">
                        <h3>Basic information</h3>
                               
                        <div class="form-group has-feedback">
                            <div class="input-group">        
                              <span class="input-group-addon">@</span>
                              <input type="email" class="form-control " placeholder="Email" name="email" id="email" >
                              <input type="hidden" id="sub-token" value="<?php echo $this->security->get_csrf_hash(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" />

                            </div>
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                          </div>
                        <div class="form-group has-feedback">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
                              <input type="text" class="form-control has-feedback-right" placeholder="First Name" name="firstname" id="firstname" required="required">
                            </div>
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                          </div>
                          <div class="form-group has-feedback">
                            <div class="input-group">        
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control has-feedback-right" placeholder="Last Name" name="lastname" id="lastname" required="required">
                            </div>
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                        </div>	
                        <div class="form-group has-feedback">
                            <div class="input-group">        
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control has-feedback-right" placeholder="Phone Number" name="phoneno" id="phoneno" required="required">
                            </div>
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                        </div>	
                        <div class="form-group has-feedback">
                            <div class="input-group">        
                              <span class="input-group-addon"></span>
                              <select class="form-control" id="org-country" name="country">
                                <option value="">Select Country</option>
                                <option value="IN">IN</option>
                                <option value="US">US</option>
                            </select>                            </div>
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                        </div>
                        
                        <div class="form-group" id="rdio">
                          <span>Already Have an Organization..?</span>
                             <input onchange="checkorg(this)" id="r1" type="radio"  name="sel-org" value="1" >
                              <label class="btn" for="r1">Yes</label>
                              <input onchange="checkorg(this)" id="r2" type="radio" name="sel-org" value="0" >    
                              <label class="btn" for="r2">No</label>                              
                             
                        </div>

                        <div style="display:none"  class="form-group has-feedback" id="org-empty">
                            <div class="input-group">        
                              <span class="input-group-addon"></span>
                              <input type="text" id="norg" name="organization-empty" class="form-control has-feedback-right" id="organization-type" placeholder="Enter Your Organization" >                        
                                </div>                           
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                        </div>
                        
                        <div style="display:none" class="form-group has-feedback" id="org-full">
                            <div class="input-group">        
                              <span class="input-group-addon"></span>
                              <select id="yorg" name="organization-full" class="form-control has-feedback-right">
                                  <option>Select Organization</option>
                                  <?php 
                                  foreach($result as $row){
                                  ?>
                                  <option value="<?php echo $row['organization_id']; ?>"><?php echo $row['organization_name']; ?></option>
                                  <?php } ?>
                              </select>
                              
                                </div>                           
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                        </div>
                       
                  
                       

                    </div>
                  
               
                    <div class="form-section">
                        <h3>Pricing info</h3>
                        <div class="form-group has-feedback">
                            <div class="input-group">        
                              <span class="input-group-addon"></span>
                              <select class="form-control" id="org-country">
                                <option value="">Select Package</option>
                                <option value="Monthly package">Monthly package</option>
                                <option value="quarterly package">quarterly package</option>
                                <option value="yearly package">yearly package</option>
                            </select>                            </div>
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                        </div>	
                        <div class="form-group has-feedback">
                            <div class="input-group">        
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control has-feedback-right" placeholder="Credit card" name="creditcard" id="creditcard" required="required">
                            </div>
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                        </div>	
                        <div class="form-group has-feedback">
                            <div class="input-group">        
                              <span class="input-group-addon"></span>
                              <input type="text" maxlength="3" class="form-control has-feedback-right" placeholder="CVV" name="cvv" id="cvv" required="required">
                            </div>
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                        </div>	
                        <div class="form-group has-feedback">
                            <div class="input-group">        
                              <span class="input-group-addon"></span>
                              <input type="text" class="form-control has-feedback-right" placeholder="Expiry date" name="expirydate" id="expirydate" required="required">
                            </div>
                            <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                        </div>	
                   

                  </div>
                  <div class="form-section">
                    <h3>Admin info</h3>
                    <div class="form-group has-feedback">
                        <div class="input-group">        
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control has-feedback-right" placeholder="Username" name="admin-username" id="admin-username" required="required">
                        </div>
                        <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                    </div>	
                    <div class="form-group has-feedback">
                        <div class="input-group">        
                          <span class="input-group-addon"></span>
                          <input type="password" class="form-control has-feedback-right" placeholder="Password" name="admin-password" id="admin-password" required="required">
                        </div>
                        <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                    </div>	
                    <div class="form-group has-feedback">
                        <div class="input-group">        
                          <span class="input-group-addon"></span>
                          <input type="password" class="form-control has-feedback-right" placeholder="Password" name="admin-cpassword" id="admin-cpassword" required="required">
                        </div>
                        <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                    </div>	
                   
                   
                </div>

                <div class="form-section">
                    <h3>User info</h3>
                    <div class="form-group has-feedback">
                        <div class="input-group">        
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control " placeholder="Address" name="address" id="address">
                        </div>
                        <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                    </div>	
                    <div class="form-group has-feedback">
                        <div class="input-group">        
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" placeholder="City" name="city" id="city" >
                        </div>
                        <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                    </div>	
                    <div class="form-group has-feedback">
                        <div class="input-group">        
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control" placeholder="State" name="state" id="state" >
                        </div>
                        <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                    </div>	
                    <div class="form-group has-feedback">
                        <div class="input-group">        
                          <span class="input-group-addon"></span>
                          <input type="text" class="form-control " placeholder="Pincode" name="pincode" id="pincode" >
                        </div>
                        <span aria-hidden="true" class="glyphicon form-control-feedback right"> </span>
                    </div>	
                   
                   
                </div>
                 
                </div>
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-navigation">
                        <button type="button" class="previous btn btn-info pull-left">&lt; Previous</button>
                        <button type="button" class="next btn btn-info pull-right">Next &gt;</button>
                        <input class="btn btn-default pull-right" type="submit" name="submit">
                        <span class="clearfix"></span>
                      </div>
                </div>
            </div>
        </div>
     
   
  
  </form>
  <script src='https://code.jquery.com/jquery-2.1.3.js'></script>
  <script src='https://rawgit.com/guillaumepotier/Parsley.js/2.7.2/dist/parsley.js'></script>
  <script>
  $(function() {
  var parsleyOptions = {
    successClass: "has-success",
    errorClass: "has-error",    
    errorsMessagesDisabled: true,
    classHandler: function(_el) {
      return _el.$element.closest(".form-group");
    },
   
  };
  $("#create-profile").parsley(parsleyOptions);

  window.Parsley.on("form:error", function(formInstance) {
    $(".popover").hide();
    $(":focus").parsley().validate();
  });

  window.Parsley.on("field:validated", function(fieldInstance) {
    var element = fieldInstance.$element;

    var feedback = element
      .closest(".form-group")
      .find(".form-control-feedback");
    
    $(".popover").hide();

    if (fieldInstance.isValid()) {
      feedback.removeClass("glyphicon-remove");
      feedback.addClass("glyphicon-ok");
    } else {
      feedback.removeClass("glyphicon-ok");
      feedback.addClass("glyphicon-remove");      

      element
        .popover({
          trigger: "manual",
          container: "body",
          placement: "bottom",
          content: function() {
            return fieldInstance.getErrorsMessages().join(";");
          }
        })
        .popover("show");
    }
  });

  var $sections = $(".form-section");

  function navigateTo(index) {
    // Mark the current section with the class 'current'
    $sections.removeClass("current").eq(index).addClass("current");
    // Show only the navigation buttons that make sense for the current section:
    $(".form-navigation .previous").toggle(index > 0);
    var atTheEnd = index >= $sections.length - 1;
    $(".form-navigation .next").toggle(!atTheEnd);
    $(".form-navigation [type=submit]").toggle(atTheEnd);
  }

  function curIndex() {
    // Return the current index by looking at which section has the class 'current'
    return $sections.index($sections.filter(".current"));
  }

  // Previous button is easy, just go back
  $(".form-navigation .previous").click(function() {
	$(".popover").hide(); 	
    navigateTo(curIndex() - 1);
  });

  // Next button goes forward iff current block validates
  $(".form-navigation .next").click(function() {  
    if ($(".demo-form").parsley().validate({ group: "block-" + curIndex() })) {
		$(".popover").hide(); 	
		navigateTo(curIndex() + 1);
	 }
  });

  // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
  $sections.each(function(index, section) {
    $(section).find(":input").attr("data-parsley-group", "block-" + index);
  });
  navigateTo(0); // Start at the beginning
});

    </script>