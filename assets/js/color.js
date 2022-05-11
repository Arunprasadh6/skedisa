
var token1 = GlobalVariables['csrfToken'];
var user = GlobalVariables['manageMode'];
var baseurl = GlobalVariables['baseUrl'];
 //console.log(baseurl);
var url=(user === undefined) ? 'get_color' : 'get_color';

$.post(url,{'csrfToken':token1},function(data){
 
    var record=JSON.parse(data);
    var color=record.color_code[0]['color_code'];
    
$('.btn-primary').css({'background':color,'border-color':color});
$('#available-hours button:nth-child(1)').css('border-color',color);
$('.nav-pills a.nav-link,#steps .book-step:nth-child(1) strong:nth-child(1)').css('color',color);

$('#steps .book-step strong').css('color',color);



$('#header,.ui-widget .ui-widget-header,.ui-widget th,.modal-header').css('background',color);
$('.nav-pills li:nth-child(1) a:nth-child(1)').css({'background':color,'color':'#fff'});

$('.nav-pills li a').click(function(){
    $('.nav-pills li a').css({'background':'transparent','color':color});
 $(this).css({'background':color,'color':'#fff'});
   
});

})



$('#provider-first-name,#provider-last-name,#secretary-first-name,#secretary-last-name,#admin-first-name,#admin-last-name').keyup(function(){
  var a=$(this).val().replace((/[^a-zA-Z ]/g),''); 
  $(this).val(a);
});


$('#provider-username,#secretary-username,#admin-username').keyup(function(){
  var a=$(this).val().replace((/[^a-zA-Z0-9._]/g),''); 
  $(this).val(a);
});


$('#provider-phone-number,#secretary-phone-number,#admin-phone-number').keyup(function(){
     var a=$(this).val().replace(/[^0-9]/g,''); 
  $(this).val(a);
})



// $('#provider-phone-number').change(function(){
//      var pno=$(this).val(); 
//       if(pno.length <= 9){
//                  Notiflix.Notify.Warning('Phone Number incorrect');
//                  $('#save-provider').prop('disabled', true);
//             }else{
//                 $('#save-provider').prop('disabled', false);
//             }
     
// })


$('#provider-phone-number').keyup(function(){
     var pno=$(this).val();
     var prid=$('#provider-id').val(); 

     if(pno.length != ""){

     
      if(pno.length <= 9){
                // Notiflix.Notify.Warning('Phone Number incorrect');
                document.getElementById('pro_mno_error').style.display="none";   
                 $('#save-provider').prop('disabled', true);
            }else{
                 var url="provider_checkmno";
                
               $.post(url,
                    {'csrfToken':token1,Mobile:pno,id:prid},
                    function(data){
                        if(data==1){
                         $('#save-provider').prop('disabled', true);
                         document.getElementById('pro_mno_error').style.display="block";
                         Notiflix.Notify.Warning('Number Already Exists');
                        }else{
                     document.getElementById('pro_mno_error').style.display="none";   
                     $('#save-provider').prop('disabled', false);     
                        }
               });
               
            }
          }
          else{
               document.getElementById('pro_mno_error').style.display="none";   
               $('#save-provider').prop('disabled', false);     
          }
     
})

$('#cancel-provider').click(function(){
     $('#save-provider').prop('disabled', false);
})



// $('#secretary-phone-number').change(function(){
//      var pno=$(this).val(); 
//       if(pno.length <= 9){
//                  Notiflix.Notify.Warning('Phone Number incorrect');
//                  $('#save-secretary').prop('disabled', true);
//             }else{
//                 $('#save-secretary').prop('disabled', false);
//             }
     
// })

$('#secretary-phone-number').keyup(function(){
     var pno=$(this).val(); 
     var prid=$('#secretary-id').val(); 
     if(pno.length != ""){

     
      if(pno.length <= 9){
                // Notiflix.Notify.Warning('Phone Number incorrect');
                document.getElementById('sec_mno_error').style.display="none";   
                 $('#save-admin').prop('disabled', true);
            }else{
                 var url="secretary_checkmno";
                
               $.post(url,
                    {'csrfToken':token1,Mobile:pno,id:prid},
                    function(data){
                        if(data==1){
                         $('#save-secretary').prop('disabled', true);
                         document.getElementById('sec_mno_error').style.display="block";
                         Notiflix.Notify.Warning('Number Already Exists');
                        }else{
                     document.getElementById('sec_mno_error').style.display="none";   
                     $('#save-secretary').prop('disabled', false);     
                        }
               });
               
            }
          }
          else{
               document.getElementById('sec_mno_error').style.display="none";   
               $('#save-secretary').prop('disabled', false);     
                  }
     
})

$('#cancel-secretary').click(function(){
     $('#save-secretary').prop('disabled', false);
})

// $('#admin-phone-number').change(function(){
//      var pno=$(this).val(); 
//       if(pno.length <= 9){
//                  Notiflix.Notify.Warning('Phone Number incorrect');
//                  $('#save-admin').prop('disabled', true);
//             }else{
//                 $('#save-admin').prop('disabled', false);
//             }
     
// })


$('#admin-phone-number').keyup(function(){
     var pno=$(this).val(); 
     var prid=$('#admin-id').val(); 
     if(pno.length != ""){

     
      if(pno.length <= 9){
                // Notiflix.Notify.Warning('Phone Number incorrect');
                document.getElementById('admin_mno_error').style.display="none";   
                 $('#save-admin').prop('disabled', true);
            }else{
                 var url="admin_checkmno";
                
               $.post(url,
                    {'csrfToken':token1,Mobile:pno,id:prid},
                    function(data){
                        if(data==1){
                         $('#save-admin').prop('disabled', true);
                         document.getElementById('admin_mno_error').style.display="block";
                         Notiflix.Notify.Warning('Number Already Exists');
                        }else{
                     document.getElementById('admin_mno_error').style.display="none";   
                     $('#save-admin').prop('disabled', false);     
                        }
               });
               
            }
          }
          else{
               document.getElementById('admin_mno_error').style.display="none";   
               $('#save-admin').prop('disabled', false);     
                  }
     
})

$('#cancel-admin').click(function(){
     $('#save-admin').prop('disabled', false);
})





