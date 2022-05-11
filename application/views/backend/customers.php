<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.min.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_customers_helper.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_customers.js') ?>"></script>
<script>
    var GlobalVariables = {
        csrfToken: <?= json_encode($this->security->get_csrf_hash()) ?>,
        availableProviders: <?= json_encode($available_providers) ?>,
        availableServices: <?= json_encode($available_services) ?>,
        secretaryProviders: <?= json_encode($secretary_providers) ?>,
        dateFormat: <?= json_encode($date_format) ?>,
        timeFormat: <?= json_encode($time_format) ?>,
        baseUrl: <?= json_encode($base_url) ?>,
        customers: <?= json_encode($customers) ?>,
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
        BackendCustomers.initialize(true);
    });
</script>

<div class="container-fluid backend-page" id="customers-page">
    <div class="row" id="customers">
        <div id="filter-customers" class="filter-records col col-12 col-md-5">
            <form class="mb-4">
                <div class="input-group">
                    <input type="text" class="key form-control">

                    <div class="input-group-addon">
                        <div>
                            <button class="filter btn btn-outline-secondary" type="submit"
                                    data-tippy-content="<?= lang('filter') ?>">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="clear btn btn-outline-secondary" type="button"
                                    data-tippy-content="<?= lang('clear') ?>">
                                <i class="fas fa-redo-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <h3><? echo "Patients";?></h3>
            <div class="results"></div>
        </div>

        <div class="record-details col-12 col-md-7">
            <div class="btn-toolbar mb-4">
            <?php if($this->session->userdata('Organization')==1){?>  
                <div id="add-edit-delete-group" class="btn-group">
                    <?php if ($privileges[PRIV_CUSTOMERS]['add'] === TRUE): ?>
                        <button id="add-customer" class="btn btn-primary">
                            <i class="fas fa-plus-square mr-2"></i>
                            <?= lang('add') ?>
                        </button>
                    <?php endif ?>

                    <?php if ($privileges[PRIV_CUSTOMERS]['edit'] === TRUE): ?>
                        <button id="edit-customer" class="btn btn-outline-secondary" disabled="disabled">
                            <i class="fas fa-edit mr-2"></i>
                            <?= lang('edit') ?>
                        </button>
                    <?php endif ?>

                    <?php if ($privileges[PRIV_CUSTOMERS]['delete'] === TRUE): ?>
                        <!-- <button id="delete-customer" class="btn btn-outline-secondary" disabled="disabled">
                            <i class="fas fa-trash-alt mr-2"></i>
                            <? //lang('delete') ?>
                        </button> -->
                    <?php endif ?>
                </div>
                <?php } ?>  

                <div id="save-cancel-group" class="btn-group" style="display:none;">
                    <button id="save-customer" class="btn btn-primary">
                        <i class="fas fa-check-square mr-2"></i>
                        <?= lang('save') ?>
                    </button>
                    <button id="cancel-customer" class="btn btn-outline-secondary">
                        <i class="fas fa-ban mr-2"></i>
                        <?= lang('cancel') ?>
                    </button>
                </div>
            </div>

            <input id="customer-id" type="hidden">

            <div class="row">
                <div class="col-12 col-md-6" style="margin-left: 0;">
                    <h3><?= lang('details') ?></h3>

                    <div id="form-message" class="alert" style="display:none;"></div>
                    
                      <div class="form-group" style="display:none;">
                        <label class="control-label" for="last-name">
                            <? echo "MRN Number"; ?>
                          
                        </label>
                        <input id="last-name" onkeyup="this.value=this.value.replace((/[^a-zA-Z0-9]/g),'')" maxlength="10" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="first-name">
                            <?php echo "Name"; ?>
                            <span class="text-danger">*</span>
                        </label>
                        <input maxlength="20" id="first-name" class="form-control required">
                        <span style="display:none" id="provider-organization"><? echo $this->session->userdata('Organization'); ?></span>
                    </div>

                  

                    <div class="form-group">
                        <label class="control-label" for="email">
                            <?= lang('email') ?>
                        </label>
                        <input id="email" maxlength="50" class="form-control ">
                    </div>
                    
                     <div class="form-group" style="display:none;">
                        <label class="control-label" for="passwd">
                           Password
                             <span class="text-danger">*</span>
                        </label>
                        <input type="password" id="customer-password" value="admin@123" class="form-control "
                                               maxlength="512" autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="phone-number">
                            <?= lang('phone_number') ?>
                            <?= $require_phone_number === '1' ? '<span class="text-danger">*</span>' : ''; ?></label>
                        <input id="phone-number" maxlength="10" class="form-control
                            <?= $require_phone_number === '1' ? 'required' : '' ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="address">
                            <?= lang('address') ?>
                        </label>
                        <input id="address" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="city">
                            <?= lang('city') ?>

                        </label>
                        <input id="city" onkeyup="this.value=this.value.replace(/[^a-z A-Z]/g,'')" maxlength="20" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="zip-code">
                            <?php echo "Pincode"; ?>
                        </label>
                        <input id="zip-code" onkeyup="this.value=this.value.replace(/[^0-9]/g,'')" maxlength="6" class="form-control">
                    </div>

                    <div style="display:none" class="form-group">
                        <label for="language">
                            <?= lang('language') ?>
                            
                        </label>
                        <select id="language" class="form-control "></select>
                    </div>

                    <div style="display:none" class="form-group">
                        <label for="timezone">
                            <?= lang('timezone') ?>
                        </label>
                        <?= render_timezone_dropdown('id="timezone" class="form-control "') ?>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="notes">
                            <?= lang('notes') ?>

                        </label>
                        <textarea id="notes" rows="4" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <h3><?= lang('appointments') ?></h3>
                    <div id="customer-appointments" class="card bg-light border-light"></div>
                    <div id="appointment-details" class="card bg-light border-light d-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
