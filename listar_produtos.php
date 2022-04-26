
<?php

    require_once 'common.php';
    session_start();
    if(isset($_SESSION['id_user'])){
        $rest_api_base_url = 'https://api-ecommerce-sbdii.herokuapp.com';     
    //GET - list of products
        $get_endpoint = '/products';
        $response = perform_http_request('GET', $rest_api_base_url . $get_endpoint);

?>
        <html>
            <head></head>
            <body>
            <a href="logout.php">Logout</a> 
                <div id="container">
                    <div id="form">
                        <?php
                            $products= json_decode($response,TRUE);
                            foreach($products as $prod => $value){
                                echo "<form method='post' action='carrinho.php'>";
                                    echo "<input type='checkbox' value=".$value['_id']." name='cart[]'>";
                                    echo "<img src=".$value['productImage']." style='width:200px'><br>";
                                    echo "Nome: ".$value['productName'];
                                    echo'<input type="number" name="quant[]" min="1" max="100">';
                                    echo "<br><a href=''>Atualizar</a>";
                                    echo "<a href=''>Deletar</a></br>";
                                
                            }
                                    echo"<input type='submit' value='Adcionar ao carrinho'>";
                                echo "</fomr>";
                        ?>
                    </div>
                </div>
            </body>
        </html>
<?php
    }else{
        header('Location:index.html');
    }
?>