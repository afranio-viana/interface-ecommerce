
<?php
    require_once 'common.php';
    session_start();
    if(isset($_SESSION['id_user'])){
            $rest_api_base_url = 'https://api-ecommerce-sbdii.herokuapp.com/';
            $post_endpoint = 'carts/'.$_SESSION['id_user'];
            $bairro=$_POST['bairro'];
            $rua=$_POST['rua'];
            $numero=$_POST['numero'];
            $cidade=$_POST['cidade'];
            $numerocard=$_POST['numerocard'];
            $cvc=$_POST['cvc'];
            $itens=$_POST['itens'];
            $quant=$_POST['quant'];
            
            $request_data = json_encode(array("products" => $itens, "productQuantity" => $quant,"address"=>array("district"=>$bairro,
            "street"=>$rua,"number"=>$numero,"city"=>$cidade),"payment"=>array("card"=>array("number"=>$numerocard,"cvc"=>$cvc))));
            
            $response = perform_http_request('POST', $rest_api_base_url . $post_endpoint, $request_data);
            header('Location:listar_produtos.php');
    }else{
        header('Location:listar_produtos.php');
    }
?>
