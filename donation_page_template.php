<?php
/*
Template Name: Donation Page
*/
 get_header();


    //
    // require('../shared/shared.php');
    //  $nonces = getNonces();
    //  $requestType = "payment";
    //  $requestId = "Invoice" . rand(0, 1000); // this'll be used as the order number
    //  $req = [
    //      "merchantId" => $merchant['ID'],
    //      "merchantKey" => $merchant['KEY'], // don't include the Merchant Key in the JavaScript initialization!
    //      "requestType" => $requestType,
    //      "requestId" => $requestId,
    //      "amount" => $request['amount'],
    //      "nonce" => $nonces['salt'],
    //      // on the other hand, include these here even if you leave them out of the JS init
    //      "postbackUrl" => $request['postbackUrl'], // if not specified in the JS init, defaults to the empty string
    //      "environment" => $request['environment'], // defaults to "cert"
    //      "preAuth" => $request['preAuth'] // defaults to false
    //  ];
    //  $authKey = getAuthKey(json_encode($req), $developer['KEY'], $nonces['salt'], $nonces['iv']);
 ?>

 <div class="wrapper text-center">
     <div id="customFormWrapper">
         <form class="form" id="myCustomForm">
             <div class="form-group billing" id="name-group">
                 <label class="control-label">Name</label>
                 <input type="text" class="form-control" id="billing_name" value="" placeholder="">
                 <span class="help-block"></span>
             </div>
             <div class="form-group billing" id="address-group">
                 <label class="control-label">Street Address</label>
                 <input type="text" class="form-control" id="billing_street" value="" placeholder="">
                 <span class="help-block"></span>
             </div>
             <div class="form-group billing" id="city-group">
                 <label class="control-label">City</label>
                 <input type="text" class="form-control" id="billing_city" value="" placeholder="">
                 <span class="help-block"></span>
             </div>
             <div class="form-group billing" id="state-group">
                 <label class="control-label">State</label>
                 <input type="text" class="form-control" id="billing_state" value="" placeholder="">
                 <span class="help-block"></span>
             </div>
             <div class="form-group billing" id="zip-group">
                 <label class="control-label">Zip</label>
                 <input type="text" class="form-control" id="billing_zip" value="" placeholder="">
                 <span class="help-block"></span>
             </div>
             <div class="form-group cc" id="cc-group">
                 <label class="control-label">Credit Card Number</label>
                 <input type="text" class="form-control" id="cc_number" value="" placeholder="">
                 <span class="help-block"></span>
             </div>
             <div class="form-group cc" id="exp-group">
                 <label class="control-label">Expiration Date</label>
                 <input type="text" class="form-control" id="cc_expiration" value="" placeholder="">
                 <span class="help-block"></span>
             </div>
             <div class="form-group cc" id="cvv-group">
                 <label class="control-label">CVV</label>
                 <input type="text" class="form-control" id="cc_cvv" value="" placeholder="">
                 <span class="help-block"></span>
             </div>

             <button class="btn btn-primary" id="paymentButton">Pay Now</button>
         </form>
         <br />
         <h5>Results:</h5>
         <p style="width:100%"><pre><code id="paymentResponse">The response will appear here as JSON, and in your browser console as a JavaScript object.</code></pre></p>
     </div>
     <div id="paymentResponse" class="alert alert-success" role="alert"></div>
 </div>
 <br /><br />

 <?php get_footer(); ?>
