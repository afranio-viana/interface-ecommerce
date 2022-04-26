
<?php
    require_once 'common.php';
    session_start();
    if(isset($_SESSION['id_user'])){
            $rest_api_base_url = 'https://api-ecommerce-sbdii.herokuapp.com/';
            $post_endpoint = 'products/'.$_SESSION['id_user'];
            $nome=$_POST['nome'];
            $descricao=$_POST['descricao'];
            $preco=$_POST['preco'];
            $imagem=$_POST['image'];
            
            $request_data = json_encode(array("productName"=>$nome,"productDescription"=>$descricao,
        "productPrice"=>$preco,"productImage"=>$imagem));
            $response = perform_http_request('POSTT', $rest_api_base_url . $post_endpoint, $request_data);
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
                        window.location.href = "listar_produtos.php";
                        </script>
                    </body>
                </html>
            <?php
            }else{
                header('Location:listar_produtos.php');
            }

    }else{
        header('Location:listar_produtos.php');
    }
?>
