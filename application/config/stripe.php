<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
/* 
| ------------------------------------------------------------------- 
|  Stripe API Configuration 
| ------------------------------------------------------------------- 
| 
| You will get the API keys from Developers panel of the Stripe account 
| Login to Stripe account (https://dashboard.stripe.com/) 
| and navigate to the Developers >> API keys page 
| 
|  stripe_api_key            string   Your Stripe API Secret key. 
|  stripe_publishable_key    string   Your Stripe API Publishable key. 
|  stripe_currency           string   Currency code. 
*/ 
$config['stripe_api_key']         = 'sk_test_51JVG8oSAowgPbh4C31pcmHTNwIm74oDsWBfQXOWpKwK7RGnWngUzj2kYNIWIPpqr1mS4BllDmipRCast6pBxDEbW00zzmGTZZC'; 
$config['stripe_publishable_key'] = 'pk_test_51JVG8oSAowgPbh4CKmtGPaJBtKLD8Niq0C5h70xZjrS7ii0JjANFMzRQZL86YTwVR0YwL6nUblpOqKOmr0R070rM00wjj6RrwP'; 
$config['stripe_currency']        = 'usd';

?>