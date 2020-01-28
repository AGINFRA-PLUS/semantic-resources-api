<?php

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'http://st-vocbench1.d4science.org/semanticturkey/it.uniroma2.art.semanticturkey/st-core-services/Auth/login?email=itadmin@agroknow.com&password=admin');
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



curl_setopt_array($curl, array(
  CURLOPT_URL => "http://st-vocbench1.d4science.org/semanticturkey/it.uniroma2.art.semanticturkey/st-core-services/Projects/listProjects?consumer=SYSTEM&userDependent=true&=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: 16b9084c-208c-4686-9cbc-897f9e4253e9",
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
