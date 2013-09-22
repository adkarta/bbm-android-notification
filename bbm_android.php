<?php

// Email of the person you want to notify:w
$to = "";
$c = curl_init("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D'https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdeveloper%3Fid%3DBlackBerry%2BLimited'%20AND%20xpath%3D'%2F%2Fdiv%5B%40class%3D%22card-list%22%5D%2Fdiv'&format=json&diagnostics=true&callback=");
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
//curl_setopt(... other options you want...)

$html = curl_exec($c);

if (curl_error($c))
    die(curl_error($c));

$result = json_decode($html);
$count = json_decode($result->{"query"}->{"count"});
if ($count == "3") {
    echo "masih tiga";
} else {
  mail($to, "BBM Android is READY!", "BBM for Android is ready for download.");
}

// Get the status code
$status = curl_getinfo($c, CURLINFO_HTTP_CODE);

curl_close($c);
?>
