<head>

<link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.css') ?>">
</head>
<style>
.payment_frm {
    width: 100%;
    background-color: #ebe0e8;
    margin-top: 15%;
    padding: 25px;
    border-radius: 17px;
}
</style>
   
    
        <!-- Display errors returned by createToken -->
        <div class="card-errors"></div>
		<?php  $user=json_decode($data,true); ?>

        <div class="container">
            <div class="row">

                <div class="col-md-3"></div>
                   <div class=" col-md-6">
                   <div class="payment_frm">
                      <!-- Payment form -->
                            <form action="<?php echo base_url('Stripe/send_stripe_payment') ?>" method="POST" id="paymentFrm">
                                <div class="form-group">
                                    <label>NAME</label>
                                    <input  type="hidden" id="sub-token" value="<?php echo $this->security->get_csrf_hash(); ?>" name="<?php echo $this->security->get_csrf_token_name(); ?>" />
                                    <input class="form-control" type="text" name="name" value="<?php  echo $user['customer']['first_name'];  ?>"  id="name" class="field" placeholder="Enter name" required="" autofocus="">
                                </div>
                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input class="form-control" type="email" name="email" value="<?php echo $user['customer']['email']; ?>" id="email" class="field" placeholder="Enter email" required="">
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
                               
                                <input type="hidden" name="appoint_data" value='<?php print_r($data); ?>' />
                                
                                <button type="submit" style="background-color:#1565c0;" class="btn btn-success" id="payBtn">Submit Payment</button>
                            </form>
                    </div>

                   </div>
                   
                <div class="col-md-3"></div>
            </div>
        </div>

  


<script src="https://js.stripe.com/v3/"></script>
<script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo 'pk_test_51JVG8oSAowgPbh4CKmtGPaJBtKLD8Niq0C5h70xZjrS7ii0JjANFMzRQZL86YTwVR0YwL6nUblpOqKOmr0R070rM00wjj6RrwP'; ?>');

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
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
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
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
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