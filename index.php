<!DOCTYPE html>

<head>

	<meta content='width=device-width, initial-scale=1' name='viewport'/>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>

	<!-- Add jQuery library -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- Add fancyBox -->
	
	<script type="text/javascript" src="main.js"></script>

	
	<?php


##########################################
function ta($t)
##########################################
{
echo '<br /><textarea rows=8 cols=70 id="txtall" name="txtall">'. htmlspecialchars($t,ENT_QUOTES) .'</textarea><br />';	
}
  
##########################################
function ms($name)
##########################################

{ 
 
echo "<pre>"; 
print_r($name); 
echo "</pre>"; 

}   
 


$dev = $_GET['dev']; //hn($_GET['dev']); 

if ($dev == 1) {  
error_reporting(E_ALL | E_STRICT) ;
ini_set('display_errors', 'On');
}  


$client_id = 'mg5npmmkoHRNYdpLc2tIfFHy';
$client_secret = 'WSnug4sEkUsNLAqNUHLljzvQHhQN0PyD';
$project_key = 'buttonbuy';



function makeRequest($url, $context) {
    $fp = fopen($url, 'rb', false, $context);
    if (!$fp) {
        throw new Exception("Problem with $url");
    }
    // get the response and decode
    $response = stream_get_contents($fp);
    if ($response === false) {
        throw new Exception("Problem reading data from $url");
    }
    $result = json_decode($response, true);
    // close the response
    fclose($fp);
    return $result;
}



// Request AccessToken
$authUrl = "https://$client_id:$client_secret@auth.sphere.io/oauth/token";
$data = array("grant_type" => "client_credentials", "scope" => "manage_project:$project_key");
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context = stream_context_create($options);
$authResult = makeRequest($authUrl, $context);
$access_token = $authResult["access_token"];















// Fetch products
$productUrl = "https://api.sphere.io/$project_key/product-projections";
$options = array(
    'http' => array(
        'header'  => "Authorization: Bearer $access_token",
        'method'  => 'GET'
    ),
);
$c = stream_context_create($options);
$result = makeRequest($productUrl, $c); // array

$jsoncontentitemapi = file_get_contents($productUrl, false, $c);

$jsondecodeditemapi = json_decode($jsoncontentitemapi); 


$new_array = json_decode($jsondecodeditemapi);
 


echo 'Total: ' . $jsondecodeditemapi->total . '<br>';


foreach($jsondecodeditemapi->results as $itemapidata) 
							{
echo $itemapidata[masterVariant][images][0][url];								
//$itemapidataid[$category][] = $itemapidata->id;	
//ms($itemapidata);

							}




	?>


</head>
<body>
	<div class="container"> 
	<div class="product">
			<img src="image_1.jpg" class="active"/>
			<img src="image_2.jpg"/>
			<img src="image_3.jpg"/>
			<img src="image_4.jpg"/>
			<img src="image_5.jpg"/>
			<img src="image_6.jpg"/>
			<img src="image_7.jpg"/>
			<img src="image_8.jpg"/>
			<img src="image_9.jpg"/>
			<img src="image_10.jpg"/>
			<img src="image_11.jpg"/>
	</div>
	<div class="timer">
		<img src="timer_small.gif" />
	</div>

	</div>

</body>