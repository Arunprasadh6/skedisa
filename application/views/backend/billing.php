<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<script src="<?= asset_url('assets/js/backend_services_helper.js') ?>"></script>
<script src="<? // asset_url('assets/js/backend_categories_helper.js') ?>"></script>
<script src="<?= asset_url('assets/js/backend_services.js') ?>"></script>
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

$(function() {
    BackendServices.initialize(true);
});
</script>

<div class="container-fluid backend-page" id="services-page">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="#services" data-toggle="tab">
                Billing
            </a>
        </li>

    </ul>

    <div class="tab-content">

        <!-- SERVICES TAB -->

        <div class="tab-pane active" id="services">
            <div class="row">
                <div id="filter-services" class="filter-records col col-12 col-md-5">

                    <h3>Details</h3>
                    <div class="payment_frm">
                        <!-- Payment form -->
                        <form action="<?php echo base_url('Stripe/send_subscription'); ?>" method="POST"
                            id="paymentFrm">
                            <div class="form-group">
                                <select name="subscr_plan" class="form-control" id="subscr_plan">
                                    <option value="">Select Plan</option>
                                    <option value="1">Weekly [ ₹3 ]</option>
                                    <option value="2">Monthly [ ₹90 ]</option>
                                    <option value="3">Yearly [ ₹720 ]</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>NAME</label>
                                <input type="hidden" id="sub-token"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>"
                                    name="<?php echo $this->security->get_csrf_token_name(); ?>" />
                                <input class="form-control" type="text" name="name" value="" id="uname" class="field"
                                    placeholder="Enter name" >
                            </div>
                            <div class="form-group">
                                <label>EMAIL</label>
                                <input class="form-control" type="email" name="email" value="" id="email" class="field"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>CARD NUMBER</label>
                                <div id="card_number" class="field form-control"></div>
                            </div>
                            <div class="form-group">
                                <div class="row" style="margin-left:0px;">
                                    <div class="left">
                                        <div class="form-group">
                                            <label>EXPIRY DATE</label>
                                            <div id="card_expiry" class="field form-control"></div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="form-group">
                                            <label>CVC CODE</label>
                                            <div id="card_cvc" class="field form-control"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button id="save-billing" class="btn btn-primary" id="payBtn">Pay Subscrption Fee
                                </button>
                            </div>


                        </form>
                    </div>


                </div>

                <div class="record-details column col-12 col-md-5">


                    <h3>Reports</h3>
                    <span id="service-org" style="display:none">
                        <? echo $this->session->userdata('Organization'); ?>
                    </span>
                    <div class="form-message alert" style="display:none;"></div>

                    <table id="example" class="display wrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Created</th>
                                <th>Cancel At</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Amount</th>
                                <th>Plan Status</th>
                                <th>Currency</th>
                                <th>Interval</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(!empty($response)){
                            foreach($response as $row){
                            $data=json_decode($row['Response']);
                            ?>
                            <tr>
                                <td><?php echo $data->id; ?></td>
                                <td><?php echo date('Y-m-d',$data->created); ?></td>
                                <td><?php echo date('Y-m-d',$data->cancel_at); ?></td>
                                <td><?php echo date('Y-m-d',$data->current_period_start); ?></td>
                                <td><?php echo date('Y-m-d',$data->current_period_end); ?></td>
                                <td><?php echo $data->plan->amount; ?></td>
                                <td><?php echo ($data->plan->active==1) ? '<span  style="cursor:pointer" class="badge badge-success">active</span>':'<span  style="cursor:pointer" class=" badge badge-danger">inactive</span>'; ?>
                                </td>
                                <td><?php echo $data->plan->currency; ?></td>
                                <td><?php echo $data->plan->interval; ?></td>
                            </tr>
                            <?php  } }?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>

<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe(
    '<?php echo 'pk_test_51JVG8oSAowgPbh4CKmtGPaJBtKLD8Niq0C5h70xZjrS7ii0JjANFMzRQZL86YTwVR0YwL6nUblpOqKOmr0R070rM00wjj6RrwP'; ?>'
);

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>' + event.error.message + '</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            resultContainer.innerHTML = '<p>' + result.error.message + '</p>';
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}
</script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]

    });
});
</script>