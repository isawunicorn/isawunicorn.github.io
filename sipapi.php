<?php
// Your code here!


$user = '046130';
$phone = $_POST["tel"];
$reverse = '0';
$antiaon = '0';
$sipnumber = '201';
$secret = '0.xwqrz562r2i';

$hashString = join('+', array($antiaon, $phone, $reverse, $sipnumber, $user, $secret));
$hash = md5($hashString);

$url = 'https://sipuni.com/api/callback/call_number';
$query = http_build_query(array(
    'antiaon' => $antiaon,
    'phone' => $phone,
    'reverse' => $reverse,
    'sipnumber' => $sipnumber,
    'user' => $user,
    'hash' => $hash
));

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
echo $output;

?>