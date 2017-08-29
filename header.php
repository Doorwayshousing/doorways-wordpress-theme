<?php
    require('shared.php');
    $nonces = getNonces();
    $requestType = "payment";
    $requestId = "Donation#" . rand(0, 1000); // this'll be used as the order number
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
<meta name="description" content="Doorways is the only organization in the Saint Louis area whose sole mission is to provide affordable, secure housing and related services for people living with HIV/AIDS. This mission is based on research that demonstrates that stable housing is the primary requisite for the most effective and compassionate treatment, management and prevention of HIV/AIDS.">
<meta name="keywords" content="Housing, AIDS, HIV, awareness, donate, st. louis, saint louis, missouri">
<meta property='og:image' content='http://doorwayshousing.org/fbpreview.png'/>
<title>Doorways Housing <?php wp_title($sep = '&raquo;', $seplocation = '$right'); ?></title>
<link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Yellowtail" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
    var apiKey = "<?php echo $developer['ID']; ?>";
    var environment = "<?php echo $request['environment']; ?>";
    var postbackUrl = "<?php echo $request['postbackUrl']; ?>";
    var merchantId = "<?php echo $merchant['ID']; ?>";
    var authKey = "<?php echo $authKey; ?>";
    var nonce = "<?php echo $nonces['salt']; ?>";
    var requestType = "<?php echo $requestType; ?>";
    var requestId = "<?php echo $requestId; ?>";
    var amount = "<?php echo $request['amount']; ?>";
</script>
<script type="text/javascript" src="https://www.sagepayments.net/pay/1.0.0/js/pay.min.js"></script>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/css/custom.min.css">
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/dist/js/custom.min.js"></script>

<? wp_head(); ?>
</head>

<body>
    <?php echo do_shortcode( "[hmenu id=1]" ); ?>
    <div class="sub-header">
        <a href="<?php echo home_url('/'); ?>">
            <span class="logo">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/doorwaysLogo.png" alt="" />
            </span>
        </a>
        <div class="info-container">
            <div class="contact">
                <ul>
                    <li class="icon-container">
                        <i class="fa fa-phone"></i>
                    </li>
                    <li>(314) 535-1919</li>
                </ul>
            </div>
            <div class="address">
                <ul>
                    <li class="icon-container">
                        <i class="fa fa-map-marker"></i>
                    </li>
                    <li>
                        <div>4385 Maryland Avenue</div>
                        <div>Saint Louis, MO 63108</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
