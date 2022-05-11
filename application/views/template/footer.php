
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


 <!-- MANAGE APPOINTMENT MODAL -->

 <div id="manage-appointment" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><?= lang('edit_appointment_title') ?></h3>
                <button class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="modal-message alert d-none"></div>

                <form>
                    <fieldset>
                        

                        <input id="appointment-id" type="hidden">

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="select-service" class="control-label">
                                        <?= lang('service') ?>
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select style="appearance:auto;" id="select-service" class="required form-control">
                                        <?php
                                        // Group services by category, only if there is at least one service
                                        // with a parent category.
                                        $has_category = FALSE;
                                        foreach ($available_services as $service)
                                        {
                                            if ($service['category_id'] != NULL)
                                            {
                                                $has_category = TRUE;
                                                break;
                                            }
                                        }

                                        if ($has_category)
                                        {
                                            $grouped_services = [];

                                            foreach ($available_services as $service)
                                            {
                                                if ($service['category_id'] != NULL)
                                                {
                                                    if ( ! isset($grouped_services[$service['category_name']]))
                                                    {
                                                        $grouped_services[$service['category_name']] = [];
                                                    }

                                                    $grouped_services[$service['category_name']][] = $service;
                                                }
                                            }

                                            // We need the uncategorized services at the end of the list so we will use
                                            // another iteration only for the uncategorized services.
                                            $grouped_services['uncategorized'] = [];
                                            foreach ($available_services as $service)
                                            {
                                                if ($service['category_id'] == NULL)
                                                {
                                                    $grouped_services['uncategorized'][] = $service;
                                                }
                                            }

                                            foreach ($grouped_services as $key => $group)
                                            {
                                                $group_label = ($key != 'uncategorized')
                                                    ? $group[0]['category_name'] : 'Uncategorized';

                                                if (count($group) > 0)
                                                {
                                                    echo '<optgroup label="' . $group_label . '">';
                                                    foreach ($group as $service)
                                                    {
                                                        echo '<option value="' . $service['id'] . '">'
                                                            . $service['name'] . '</option>';
                                                    }
                                                    echo '</optgroup>';
                                                }
                                            }
                                        }
                                        else
                                        {
                                            foreach ($available_services as $service)
                                            {
                                                echo '<option value="' . $service['id'] . '">'
                                                    . $service['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="select-provider" class="control-label">
                                        Provider Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select style="appearance:auto;" id="select-provider" class="required form-control"></select>
                                </div>

                                <div style="display:none" class="form-group">
                                    <label for="appointment-location" class="control-label">
                                        <?= lang('location') ?>
                                    </label>
                                    <input id="appointment-location" class="form-control">
                                </div>

                                <div style="display:none" class="form-group">
                                    <label for="appointment-notes" class="control-label"><?= lang('notes') ?></label>
                                    <textarea id="appointment-notes" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                               
                                    <label for="start-datetime"
                                           class="control-label"><?= lang('start_date_time') ?></label>
                                    <input id="start-datetime" class="required form-control" >
                                </div>

                                <div class="form-group" style="display:block;">
                                    <label for="end-datetime" class="control-label"><?= lang('end_date_time') ?></label>
                                    <input id="end-datetime" class="required form-control" >
                                </div>
                                <!-- <div class="col-12 col-sm-12">
                                    <label>Select Date</label>    
                                    <input id="date" class="required form-control" >
                                </div>
                                <div class="col-12 col-sm-12">
                                    <label>Select Time</label>    
                                    <select>
                                        <option>Choose Time</option></select>
                                </div> -->

                                <div style="display:none" class="form-group">
                               
                                    <label class="control-label"><?= lang('timezone') ?></label>

                                    <ul>
                                        <li>
                                            <?= lang('provider') ?>:
                                            <span class="provider-timezone">
                                                -
                                            </span>
                                        </li>
                                        <li>
                                            <?= lang('current_user') ?>:
                                            <span>
                                                <?= $timezones[$timezone] ?>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <br>

                    <fieldset>
                        <legend>
                           <h5 id="msg-mno" class="text-center">Search Mobile Number</h5>                            
                            <input id="filter-existing-customers"
                                   placeholder="<?= lang('type_to_filter_customers') ?>"
                                   style="display: none;" class="input-sm form-control">
                            <div id="existing-customers-list" style="display: none;"></div>
                        </legend>

                        <input id="customer-id" type="hidden">

                        <div class="row">
                            <div class="col-12 col-sm-6">
                            <div class="form-group">
                                    <label for="phone-number" class="control-label">
                                        Phone Number                                        
                                            <span class="text-danger">*</span>
                                        
                                    </label>
                                    <input type="text" id="phone-number"
                                         maxlength="10" placeholder="Search Phone" onkeyup="this.value=this.value.replace(/[^+0-9]/g,'')" class="form-control required ">
                                </div>
                              

                                <div class="form-group" style="display:none;">
                                    <label for="last-name" class="control-label">
                                        <?php echo "MRN Number"; ?>
                                    </label>
                                    <input id="last-name" class=" form-control lname">
                                </div>

                                <div class="form-group" style="display:none;">
                                    <label for="email" class="control-label">
                                        <?= lang('email') ?>
                                    </label>
                                    <input id="email" class="form-control email">
                                </div>
                            </div>
                            
                            <div class="col-12 col-sm-6" >
                            <div class="form-group">
                                    <label for="first-name" class="control-label">
                                       Customer Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="first-name"  onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')" class="required form-control fname">
                                    <span style="display:none" id="model-org"><?php echo $this->session->userdata('Organization'); ?></span>
                                    <input type="hidden" id="order" />
                                </div>
                               
                                <div class="form-group" style="display:none;">
                                    <label for="address" class="control-label">
                                        <?= lang('address') ?>
                                    </label>
                                    <input id="address" class="form-control">
                                </div>

                                <div class="form-group" style="display:none;">
                                    <label for="city" class="control-label">
                                        <?= lang('city') ?>
                                    </label>
                                    <input id="city" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')" class="form-control">
                                </div>

                                <div class="form-group" style="display:none;">
                                    <label for="zip-code" class="control-label">
                                        <? echo "Pincode"; ?>
                                    </label>
                                    <input id="zip-code" maxlength="6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" class="form-control">
                                </div>                               
                            </div>
                            <div class="form-group">
                                    <label for="customer-notes" class="control-label">
                                        Comments
                                    </label>
                                    <textarea id="customer-notes" rows="2" class="form-control"></textarea>
                                </div>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-ban"></i>
                    <?= lang('cancel') ?>
                </button>
                <button id="save-appointment" class="btn btn-primary">
                    <i class="fas fa-check-square mr-2"></i>
                    <?= lang('save') ?>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script>
    
$('#phone-number').on("keyup",function(){
 var mno=$('#phone-number').val();
  var url = GlobalVariables.baseUrl + '/index.php/backend_api/get_user_data';
   var token=GlobalVariables.csrfToken;
   if(mno.length >=10){
    $.post(url,{"mobile":mno,csrfToken:token},function(data){
        if(data==0){
             $('#first-name').val('');
             $('#last-name').val('');
            $('#email').val('');           
           // $('#phone-number').val('');
            $('#address').val('');
            $('#city').val('');
            $('#state').val('');
            $('#zip-code').val('');
            $('#customer-notes').val('');
            $('#timezone').val('');
            $('#customer-id').val(''); 
            $('.fname').val('');
              $('.email').val('');  
              $('.lname').val('');
           // Notiflix.Notify.Warning("No Record");
            $('#msg-mno').text('New Customer');

        }else{
           var rows = JSON.parse(data);           
              // console.log(rows[0].first_name);          
              $('#msg-mno').text('Existing Customer');
              $('.fname').val(rows[0].first_name);
              $('.email').val(rows[0].email);  
              $('.lname').val(rows[0].MRN);
             $('#first-name').val(rows[0].first_name);            
             $('#last-name').val(rows[0].MRN);
            $('#email').val(rows[0].email);           
            $('#phone-number').val(rows[0].phone_number);
            $('#address').val(rows[0].address);
            $('#city').val(rows[0].city);
            $('#state').val(rows[0].state);
            $('#zip-code').val(rows[0].zipcode);
            $('#customer-notes').val(rows[0].notes);
            $('#timezone').val(rows[0].timezone);
            $('#customer-id').val(rows[0].id);

        }
        
    })
   }

})



$('#manage-appointment').on('hidden.bs.modal', function () {
    $('#msg-mno').text('Search Mobile Number');
})


 </Script> 



<script src="<?php echo asset_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?> "></script>
<script src="<?php echo asset_url('assets/libs/metismenu/metisMenu.min.js'); ?>"></script>

<script src="<?php echo asset_url('assets/libs/node-waves/waves.min.js'); ?>"></script>

<!-- App js -->
<script src="<?php echo asset_url('assets/app.js'); ?>"></script>
<script src="<?php echo asset_url('assets/js/backend.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/polyfill.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/general_functions.js') ?>"></script>
<script src="<?php echo asset_url('assets/js/general.js') ?>"></script>

<script defer src="<?php echo asset_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script defer src="<?php echo asset_url('assets/js/dataTables.buttons.min.js'); ?>" ?></script>
<script defer src="<?php echo asset_url('assets/js/jszip.min.js') ?>"></script>
<script  defer src="<?php echo asset_url('assets/js/pdfmake.min.js') ?>"></script>
<script defer src="<?php echo asset_url('assets/js/vfs_fonts.js') ?>"></script>
<script defer src="<?php echo asset_url('assets/js/buttons.html5.min.js') ?>"></script>
<script defer src="<?php echo asset_url('assets/js/buttons.print.min.js') ?>"></script>
<script defer src="<?php echo asset_url('assets/js/dataTables.responsive.min.js') ?>"></script>

    
   
</body>



</html>