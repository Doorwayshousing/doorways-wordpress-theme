<?php
/*
Template Name: Donation Page
*/
 get_header();
    require('shared.php');
    $nonces = getNonces();
    $requestType = "payment";
    $requestId = "Invoice" . rand(0, 1000); // this'll be used as the order number
    $req = [
        "merchantId" => $merchant['ID'],
        "merchantKey" => $merchant['KEY'], // don't include the Merchant Key in the JavaScript initialization!
        "requestType" => $requestType,
        "requestId" => $requestId,
        "amount" => $request['amount'],
        "nonce" => $nonces['salt'],
        // on the other hand, include these here even if you leave them out of the JS init
        "postbackUrl" => $request['postbackUrl'], // if not specified in the JS init, defaults to the empty string
        "environment" => $request['environment'], // defaults to "cert"
        "preAuth" => $request['preAuth'] // defaults to false
    ];
    $authKey = getAuthKey(json_encode($req), $developer['KEY'], $nonces['salt'], $nonces['iv']);
    ?>

 <div class="wrapper text-center">
     <div id="customFormWrapper">
         <div id="donationHeader">
             <div class="donate-header-text"><?php the_title(); ?></div>
             <div class="donate-header-border">&nbsp;</div>
             <div class="donate-paragraph-text">
                 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                     <?php the_content(); ?>
                 <?php endwhile; endif; ?>
             </div>
             <div class="cover"></div>
         </div>
         <div id="donation-breakdown">
             <div class="breakdown-text">How will my donation help?</div>
             <div class="percentage-section">
                 <!-- <div class="percent-section-breakdown">housing</div>
                 <div class="percent-section-breakdown">food</div>
                 <div class="percent-section-breakdown">supplies</div> -->

                 <div class="huge-chartbox">
                   <div id="failureChart1" chart-type="donut" data-chart-max="100" data-chart-segments="{ &quot;0&quot;:[&quot;0&quot;,&quot;50&quot;,&quot;#19C5F5&quot;],  &quot;1&quot;:[&quot;50&quot;,&quot;50&quot;,&quot;#ecebeb&quot;] }" data-chart-text="50%" data-chart-caption="Housing" data-chart-initial-rotate="180">
                   </div>
                   <div id="failureChart2" chart-type="donut" data-chart-max="100" data-chart-segments="{ &quot;0&quot;:[&quot;0&quot;,&quot;30&quot;,&quot;#c4cb30&quot;],  &quot;1&quot;:[&quot;30&quot;,&quot;70&quot;,&quot;#ecebeb&quot;] }" data-chart-text="30%" data-chart-caption="Food" data-chart-initial-rotate="180">
                   </div>
                   <div id="failureChart3" chart-type="donut" data-chart-max="100" data-chart-segments="{ &quot;0&quot;:[&quot;0&quot;,&quot;20&quot;,&quot;#f57436&quot;],  &quot;1&quot;:[&quot;20&quot;,&quot;80&quot;,&quot;#ecebeb&quot;] }" data-chart-text="20%" data-chart-caption="Supplies" data-chart-initial-rotate="180">
                   </div>
                 </div>


             </div>
             <div class="breakdown-text-2">100% Tax-deductible gift contributes directly to the compassionate care of hundres of adults and children living with HIV/AIDS.</div>
         </div>
         <form class="form" id="myCustomForm">
             <div class="form-header">DONATE</div>
             <div class="form-group donation" id="donation-level">
                 <select class="donation-dropdown" name="donation-level">
                     <option selected disabled>Choose Donation Level</option>
                     <option value="friends">Friends - One Time Donation</option>
                     <option value="keystoneSociety">Keystone Society - $1,200 +</option>
                     <option value="keystoneLegacy">Keystone Legacy - planned legacy gift</option>
                 </select>
             </div>
             <div class="form-group donation" id="donation-amount">
                 <input type="text" class="form-control" id="donation-amount" value="" placeholder="$ USD">
             </div>
             <button class="paymentButton" id="payOnceButton">ONCE</button>
             <button class="paymentButton" id="payMonthlyButton">MONTHLY</button>
             <div class="other-payment-options"><a href="">PAY BY PERESONAL CHECK</a> <br/><a href="#">PAY BY BUSINESS CHECK</a>
             </div>
<br/><br/><br/>
<div id="payment-form">
         <div class="form-group donation" id="donation-amount">
             <label class="control-label">Your Donation:</label>
             <input type="text" class="form-donation-control amount" id="donation-amount" value="" placeholder="">
             <span class="help-block"></span>
             <div class="form-group" id="donation-type">
                 <input type="radio" name="Once" value="Once" checked> Once<br>
                 <input type="radio" name="Monthly" value="Monthly"> Monthly<br>
             </div>
         </div>
        <div class="donate-heading">Your Information
            <div class="donate-sub-heading">Name
                <div class="donate-name-section">
                    <div class="form-group name" id="firstname-group">
                        <label class="control-label">First Name</label>
                        <input type="text" class="form-donation-control" id="first-name" value="" placeholder="">
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group name" id="lastname-group">
                        <label class="control-label">Last Name</label>
                       <input type="text" class="form-donation-control" id="last-name" value="" placeholder="">
                       <span class="help-block"></span>
                   </div>
                   <div class="form-group name" id="suffix-group">
                       <label class="control-label">Suffix</label>
                      <input type="text" class="form-donation-control" id="suffix-name" value="" placeholder="">
                      <span class="help-block"></span>
                  </div>
                  <div class="form-group" id="anonymous">
                      <input type="radio" name="anonymous" value="anonymous" checked>Make donation anonymous</input>
                  </div>
            </div>
          </div>
      </div>
          <div class="donate-heading">Your Payment Details
              <div class="donate-sub-heading">Name on Card
                  <div class="donate-payment-section">
                      <div class="form-group billing" id="card-name">
                          <label class="control-label">First Name</label>
                          <input type="text" class="form-donation-control" id="billing_firstname" value="" placeholder="">
                          <span class="help-block"></span>
                      </div>
                      <div class="form-group billing" id="card-name">
                          <label class="control-label">Last Name</label>
                          <input type="text" class="form-donation-control" id="billing_lastname" value="" placeholder="">
                          <span class="help-block"></span>
                      </div>
                </div>
              </div>
              <div class="donate-sub-heading">Credit Card Information
                  <div class="donate-payment-section">
                      <div class="form-group cc" id="cc-group">
                          <label class="control-label">Credit Card Number</label>
                          <input type="text" class="form-donation-control" id="cc_number" value="" placeholder="">
                          <span class="help-block"></span>
                      </div>
                      <div class="form-group cc" id="exp-group">
                          <label class="control-label">Expiration Date</label>
                          <input type="text" class="form-donation-control" id="cc_expiration" value="" placeholder="">
                          <span class="help-block"></span>
                      </div>
                      <div class="form-group cc" id="cvv-group">
                          <label class="control-label">CVV</label>
                          <input type="text" class="form-donation-control" id="cc_cvv" value="" placeholder="">
                          <span class="help-block"></span>
                      </div>
                  </div>
              </div>
              <div class="donate-sub-heading">Billing Address
                  <div class="donate-payment-section">
                     <div class="form-group billing" id="address-group">
                         <label class="control-label">Street Address</label>
                         <input type="text" class="form-donation-control" id="billing_street" value="" placeholder="">
                         <span class="help-block"></span>
                     </div>
                     <div class="form-group billing" id="city-group">
                         <label class="control-label">City</label>
                         <input type="text" class="form-donation-control" id="billing_city" value="" placeholder="">
                         <span class="help-block"></span>
                     </div>
                     <div class="form-group billing" id="state-group">
                         <label class="control-label">State</label>
                         <input type="text" class="form-donation-control" id="billing_state" value="" placeholder="">
                         <span class="help-block"></span>
                     </div>
                     <div class="form-group billing" id="zip-group">
                         <label class="control-label">Zip</label>
                         <input type="text" class="form-donation-control" id="billing_zip" value="" placeholder="">
                         <span class="help-block"></span>
                     </div>
                 </div>
             </div>
         </div>



             <button class="btn btn-primary" id="paymentButton">Pay Now</button>
         </div>
     </div>
         </form>
         <!-- <br />
         <h5>Results:</h5>
         <p style="width:100%"><pre><code id="paymentResponse">The response will appear here as JSON, and in your browser console as a JavaScript object.</code></pre></p>
     </div>
     <div id="paymentResponse" class="alert alert-success" role="alert"></div>
 </div>

 <br /><br /> -->

 <?php get_footer(); ?>
