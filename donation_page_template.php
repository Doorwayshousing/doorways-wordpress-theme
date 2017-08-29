<?php
/*
Template Name: Donation Page Template
*/
 get_header();

?>

<div class="wrapper text-center">
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
            <div class="huge-chartbox">
                <div id="Chart1" chart-type="donut" data-chart-max="100" data-chart-segments='{"0":["0","33","#19C5F5"], "1":["33","67","#ecebeb"]}' data-chart-text="" data-chart-caption="Hope"></div>
                <div id="Chart2" chart-type="donut" data-chart-max="100" data-chart-segments='{"0":["0","33","#19C5F5"], "1":["33","66","#c4cb30"], "2":["66","34","#ecebeb"]}' data-chart-text="" data-chart-caption="Housing"></div>
                <div id="Chart3" chart-type="donut" data-chart-max="100" data-chart-segments='{"0":["0","33","#19C5F5"], "1":["33","66","#c4cb30"], "2":["66","34","#f57436"]}' data-chart-text="" data-chart-caption="Healthcare"></div>
            </div>
        </div>
        <div class="breakdown-text-2">Your 100% tax-deductible gift contributes directly to the compassionate care of hundreds of adults and children living with HIV/AIDS.</div>
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
            <button class="btn btn-primary" id="paymentButton">Donate</button>
        </div>
    </form>
    <br/>
    <h5>Results:</h5>
    <p style="width:100%"><pre><code id="paymentResponse">The response will appear here as JSON, and in your browser console as a JavaScript object.</code></pre></p>
    <div id="paymentResponse" class="alert alert-success" role="alert"></div>
</div>
<br/><br/>
<?php get_footer(); ?>
