
<?php
$email=$_POST['email'];
$senha=$_POST['senha'];
$nome=$_POST['nome'];
require_once 'common.php';

$rest_api_base_url = 'https://api-ecommerce-sbdii.herokuapp.com/';
		
//POST - create new user
$post_endpoint = 'users';

$request_data = json_encode(array("userName" => $email, "userPassword" => $senha,"userNickname"=>$nome));

$response = perform_http_request('POST', $rest_api_base_url . $post_endpoint, $request_data);
$a=json_decode($response,TRUE);
if(isset($a['message'])){
    ?>
                <html>
                    <head></head>
                    <body>
                        <script>
                            function newPopup(){
                                varWindow = window.open ('popup_erro.html','pagina',"width=250 height=150 left=");
                            }
                            javascript:newPopup();
                        window.location.href = "index.html";
                        </script>
                    </body>
                </html>
            <?php
}else{
    header('Location: index.html');
    

}
