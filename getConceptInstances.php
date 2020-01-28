<?php


//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

//print_r($_POST);

$Url = $_POST[Url];

$Project =$_POST[Project];



$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'http://st-vocbench1.d4science.org:80/semanticturkey/it.uniroma2.art.semanticturkey/st-core-services/Auth/login?email=itadmin@agroknow.com&password=admin');
curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/32.0.1700.107 Chrome/32.0.1700.107 Safari/537.36');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_COOKIESESSION, true);
curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name');  //could be empty, but cause problems on some hosts
curl_setopt($curl, CURLOPT_COOKIEFILE, '/var/www/ip4.x/file/tmp');  //could be empty, but cause problems on some hosts
$answer = curl_exec($curl);
if (curl_error($curl)) {
    echo curl_error($curl);
}


$urlencode = rawurlencode($Url);


$curlLink =  "https://st-vocbench1.d4science.org/semanticturkey/it.uniroma2.art.semanticturkey/st-core-services/Classes/getInstances?cls=%3C".$urlencode."%3E&ctx_project=".$Project."&=" ;

//echo $curlLink;

curl_setopt_array($curl, array(
  CURLOPT_URL => $curlLink,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: 1bc81eec-2ea8-45d2-9318-c5d54dceae1a",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>
