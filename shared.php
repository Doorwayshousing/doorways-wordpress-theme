<?php
    // this is a shared test account; don't hesitate to ask us for one of your own!
    $merchant = [
        "ID" => "999999999997",
        "KEY" => "K3QD6YWyhfD"
    ];

    // sign up at https://developer.sagepayments.com/ to get your own dev creds
    $developer = [
        "ID" => "ZA8uO5MvlEBxd8bGuhA6qCXPJ6FwD7VH",
        "KEY" => "fr1ZF941RpXRsvrh"
    ];

    $request = [
        "postbackUrl" => "http://requestb.in/1eluhdk1", // https://requestb.in is great for playing with this
        "environment" => "cert",
        "amount" => "1.00", // use 5.00 to simulate a decline
        "preAuth" => "false"
    ];

    function getAuthKey($toBeHashed, $password, $salt, $iv){
        $encryptHash = hash_pbkdf2("sha1", $password, $salt, 1500, 32, true);
        $encrypted = openssl_encrypt($toBeHashed, "aes-256-cbc", $encryptHash, 0, $iv);
        return $encrypted;
    }

    function getNonces(){
        $iv = openssl_random_pseudo_bytes(16);
        $salt = base64_encode(bin2hex($iv));
        return [
            "iv" => $iv,
            "salt" => $salt
        ];
    }
?>
