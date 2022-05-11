<script src="<?= asset_url('assets/js/backend_services_helper.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_categories_helper.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_services.js') ?>"></script>
<style>
    #footer{
        display:none;
    }
</style>
<script>
    var GlobalVariables = {
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
        baseUrl: <?= json_encode($base_url) ?>,
        dateFormat: <?= json_encode($date_format) ?>,
        timeFormat: <?= json_encode($time_format) ?>,
        services: <?= json_encode($services) ?>,
        categories: <?= json_encode($categories) ?>,
        timezones: <?= json_encode($timezones) ?>,
        user: {
            id: <?= $user_id ?>,
            email: <?= json_encode($user_email) ?>,
            timezone: <?= json_encode($timezone) ?>,
            role_slug: <?= json_encode($role_slug) ?>,
            privileges: <?= json_encode($privileges) ?>
        }
    };

    $(function () {
        BackendServices.initialize(true);
    });
</script>

<div class="container-fluid backend-page" id="services-page">
   

    <div class="tab-content">

        <!-- SERVICES TAB -->

        <div class="tab-pane active" id="services">
            <div class="row">
                <div id="filter-services" class="filter-records col col-12 col-md-5">
              

                    <h3>Add Organization</h3>
                    <div class="data">
                        
              <form id="organization-form">
                   <div class="form-group">
                       <input type="text" name="organization" class="form-control" id="organization-type" placeholder="Enter Your Organization" />
                       <input type="hidden" id="csrf" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                   </div>
                   <div class="form-group">
                       <select class="form-control" id="org-country">
                           <option value="">Select Country</option>
                           <option value="IN">IN</option>
                           <option value="US">US</option>
                       </select>
                   </div>
                   <div class="form-group">
                        <input type="text" name="organization-cc" class="form-control" id="organization-cc" placeholder="Organization Credit card" /> 
                   </div>
                   <div class="form-group">
                        <input type="text" name="organization-cvv" class="form-control" id="organization-cvv" placeholder="Organization CVV" /> 
                   </div>
                   <div class="form-group">
                        <input type="text" name="organization-exp" class="form-control" id="organization-exp" placeholder="Organization Expiry date" /> 
                   </div>
                   <div class="form-group">
                       <button type="button" class="btn btn-primary" required id="add-organization">Create Organization</button>
                   </div>
               </form>
                        
                    </div>
                </div>

                <div class="record-details column col-12 col-md-5">                 

                    
                    <span id="service-org" style="display:none"><?php echo $this->session->userdata('Organization'); ?></span>
                    <div class="form-message alert" style="display:none;"></div>

                    <input type="hidden" id="service-id">
                <input type="hidden" id="csrf-token" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                   <table  class="table table-responsive">
                       <tr>
                           <th>Organization Name</th>
                           <th>Status</th>
                           <th>Delete</th>
                       </tr>
                       <tbody id="data-table">
                           
                       </tbody>
                   </table>
                </div>
            </div>
        </div>

        <!-- CATEGORIES TAB -->


    </div>
</div>
<script>
    
 var token=$('#csrf').val();
function getorg(){
   $.post("getorgan",{csrfToken:token},function(data){
          var rows=JSON.parse(data);
        
          var tbl = $("#data-table");
          tbl.html("");
          //<td><a onclick='edit("+rows[i].organization_id+")' class='btn btn-danger'  href='javascript:void(0)'>Edit</a></td>
          for(var i=0;i<rows.length;i++){
              var con=(rows[i].Status=='1') ? "badge-success" : "badge-danger";
              var st=(rows[i].Status=='1') ? "active" : "inactive";
              tbl.append
 ("<tr><td>"+rows[i].organization_name+"</td><td><span onclick='update("+rows[i].organization_id+","+rows[i].Status+")'  style='cursor:pointer' class=' badge "+con+"'>"+st+"</span><td><a onclick='del("+rows[i].organization_id+")' class='btn btn-danger'  href='javascript:void(0)'>Delete</a></td></tr>");
          }
          
       }); 
} 

window.reload=getorg();
       
       
    function del(id){
      var con=confirm("Are you sure want to delete..?");
      if(con==true){
          var token=$('#csrf').val();
          $.post('del_organ',{ csrfToken:token,Id:id},function(data){
         Notiflix.Notify.Success('Organization Deleted Successfully');
         getorg();
       });
      }else{
          
      }
      
  }   
  
  function update(id,status){
       var token=$('#csrf').val();
        $.post('update_organ',{ csrfToken:token,Id:id,status:status},function(data){
         Notiflix.Notify.Success('Status Changed Successfully');
         getorg();
       });
  }
  
  
</script>
