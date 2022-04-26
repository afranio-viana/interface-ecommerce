
<?php
    require_once 'common.php';
    session_start();
    if(isset($_SESSION['id_user'])){
            $rest_api_base_url = 'https://api-ecommerce-sbdii.herokuapp.com/';
            $id_produto=base64_decode($_GET['id_produto']);
            $post_endpoint = 'products/'.$_SESSION['id_user'].'/'.$id_produto;
            $response = perform_http_request('DELET', $rest_api_base_url . $post_endpoint);
            $a=json_decode($response,TRUE);
            //var_dump($response);
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
