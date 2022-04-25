
<?php
$email=$_POST['email'];
$senha=$_POST['senha'];
require_once 'common.php';

$rest_api_base_url = 'https://api-ecommerce-sbdii.herokuapp.com';
		
//POST - create new user
$post_endpoint = '/sessions';

$request_data = json_encode(array("userName" => $email, "userPassword" => $senha));

$response = perform_http_request('POST', $rest_api_base_url . $post_endpoint, $request_data);

if($response=="null"){
    echo 'Usuário Não encontrado';
}else{
    $a=json_decode($response,TRUE);
    echo $a['_id'];
    echo "<br>".$a['userNickname'];

}
