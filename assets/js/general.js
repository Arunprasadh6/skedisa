     $('#organization-type').on('keyup', function() {

         var a = $(this).val().replace(/^\s+/g, '');
         $(this).val(a);
     })

     $('#add-organization').click(function() {


         var organization = $('#organization-type').val();
         var status = 1;
         var token = $('#csrf').val();
         var country = $('#org-country').val();

         if (organization.length == 0 && status.length == '') {
             Notiflix.Notify.Warning('Field are required');
         } else if (organization.length == 0) {
             Notiflix.Notify.Warning('Organization are required');

         }else if (country.length == '') {
            Notiflix.Notify.Warning('Country are required');
        } 
         else if (status.length == '') {
             Notiflix.Notify.Warning('Status are required');

         } else {
             $.post("insert_organization", {
                 csrfToken: token,
                 organ: organization,
                 Status: status,
                 Country:country
             }, function(data) {
                 if (data == "SUCCESS") {
                     $('#organization-type').val("");
                     getorg();
                     Notiflix.Notify.Success('Organization Added Successfully');
                 }
             });
         }

     });


     //Organization pop show code






     $('#img-upload').change(function() {
         var formdata = new FormData();
         var file = this.files[0];
         var tok = $('#tok').val();
         formdata.append("files", file)
         formdata.append("csrfToken", tok)
         var type = file.type;
         if (type == "image/jpg" || type == "image/png" || type == "image/jpeg") {

             $.ajax({
                 url: 'upload_image',
                 type: 'post',
                 data: formdata,
                 contentType: false,
                 processData: false,
                 success: function(data) {
                     if (data) {
                         Notiflix.Notify.Success(data);
                         //console.log(data)
                         window.location.reload();
                     } else {
                         Notiflix.Notify.Warning(data);
                     }
                 },
             });




             //   $.post("upload_image",{data:formdata},function(data){
             //      console.log(data); 
             //   });
         } else {
             Notiflix.Notify.Warning('Support Only PNG,JPEG Images');
         }

     });



     $('#img-profile').change(function() {
        var formdata = new FormData();
        var file = this.files[0];
        var tok = $('#tok').val();
        formdata.append("files", file)
        formdata.append("csrfToken", tok)
        var type = file.type;
        if (type == "image/jpg" || type == "image/png" || type == "image/jpeg") {

            $.ajax({
                url: 'upload_image',
                type: 'post',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        Notiflix.Notify.Success(data);
                        //console.log(data)
                        window.location.reload();
                    } else {
                        Notiflix.Notify.Warning(data);
                    }
                },
            });




            //   $.post("upload_image",{data:formdata},function(data){
            //      console.log(data); 
            //   });
        } else {
            Notiflix.Notify.Warning('Support Only PNG,JPEG Images');
        }

    });





     function validate_register() {
         var fname = document.getElementById('fname').value;
         var lname = document.getElementById('lname').value;
         var email = document.getElementById('mail').value;
         var passwd = document.getElementById('passwd').value;
         var mno = document.getElementById('mobile').value;
         var org = document.getElementById('organization').value;
         if (fname == "" && lname == "" && email == "" && passwd == "" && mno == "" && org == "") {
             Notiflix.Notify.Warning('All fields are Required');
             event.preventDefault();
         } else if (fname == "") {
             Notiflix.Notify.Warning('Fname field are Required');
             event.preventDefault();
         } else if (lname == "") {
             Notiflix.Notify.Warning('Lname field are Required');
             event.preventDefault();
         } else if (email == "") {
             Notiflix.Notify.Warning('Email field are Required');
             event.preventDefault();
         } else if (passwd == "") {
             Notiflix.Notify.Warning('Password field are Required');
             event.preventDefault();
         } else if (mno == "") {
             Notiflix.Notify.Warning('Mobile field are Required');
             event.preventDefault();
         } else if (org == "") {
             Notiflix.Notify.Warning('Organization field are Required');
             event.preventDefault();
         }

     }

     //          function check_register_email(e,tok){
     //     var email=e.value;
     //     var ide=document.getElementById('mail-error');
     //     var token=document.getElementById('sub-token').value;

     //           $.post("index.php/customers/check_email",{
     //              email:email,'csrfToken':token
     //          },function(data){
     //              document.getElementById('log_token').value=tok;
     //              if(data=="1"){
     //                   document.getElementById('subreg').disabled=true;
     //                  ide.style.display="block";
     //                  ide.innerHTML="Email is Already Available";
     //              }else{
     //                  document.getElementById('subreg').disabled=false;
     //                   ide.style.display="none";
     //              }
     //          });
     // }

     function checkletter(e) {
         e.value = e.value.replace(/[^A-Za-z]/g, '');
     }

  


     function validate_pwd(e) {
         var pwd = e.value;
         var error = document.getElementById('pass');
         var btn = document.getElementById('subreg');
         if (pwd.length < 8) {
             error.style.display = "block";
             error.innerHTML = "Password Minimum 8 Characters";
             btn.disabled = true;
         } else if (pwd.length >= 8) {
             error.style.display = "none";
             btn.disabled = false;
         }
     }