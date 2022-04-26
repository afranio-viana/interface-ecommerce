<?php
require_once 'common.php';
session_start();
if(isset($_SESSION['id_user'])){
        $rest_api_base_url = 'https://api-ecommerce-sbdii.herokuapp.com/';     
        //GET - list of products
        $id_produto=base64_decode($_GET['id_produto']);
                ?>
            <html>
                <head></head>
                <body>
                <a href="logout.php">Logout</a> 
                    <div id="container">
                        <div id="cart">
                            <div id="form">    
                                <form method="post" action="update.php">
                <?php
                        $get_endpoint = "products/".$id_produto;
                        $response = perform_http_request('GET', $rest_api_base_url . $get_endpoint);
                        $resp=json_decode($response,TRUE);
                        echo "Detalhes do produto que vai ser atualizado:";
                        echo "<br>Nome: <input type='text' value=".$resp['productName']." name='nome' required>";
                        echo '<br>Descrição:<br><textarea rows="5" cols="20" name="descricao" required>'.$resp['productDescription'].'</textarea>';
                        echo "<br>Preço: <input type='text' value=".$resp['productPrice']." name='preco' required>";
                        echo "<br>Imagem: <input type='text'value=".$resp['productImage']." name='image' required>";
                        echo '<input type="text" value='.$resp['_id'].' name="id_produto" style="height:0;width:0;visibility: hidden;padding:0;margin:0;float:right;">';
                ?>
                <br>
                    <input type="submit" value="Atualizar">
                                </form>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
            <?php

    }else{
        header('Location:index.html');
    }
?>