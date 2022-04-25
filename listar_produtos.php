
<?php

require_once 'common.php';

$rest_api_base_url = 'https://api-ecommerce-sbdii.herokuapp.com';
		
//GET - list of products
$get_endpoint = '/products';

$response = perform_http_request('GET', $rest_api_base_url . $get_endpoint);

echo 'List Of Users' . "\n";

?>
<html>
     <head></head>
     <body>
        <table>
        <?php
        $products= json_decode($response,TRUE);
        foreach($products as $prod => $value){

            echo "<img src=".$value['productImage'].">";
          
            echo "Nome".$value['productName']."<br>";
       }
        ?></table>
    </body>
</html>
