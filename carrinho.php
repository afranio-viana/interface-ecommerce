
<?php
require_once 'common.php';
session_start();
if(isset($_SESSION['id_user'])){
        $rest_api_base_url = 'https://api-ecommerce-sbdii.herokuapp.com/';     
        //GET - list of products
        $itens=$_POST['cart'];
        $quant=$_POST['quant'];
        $quantidade=0;
        $new_quant[0]=0;
        $a=0;
        if(count($itens)>0){
            foreach($quant as $qua){
                if($qua!=0){
                    $quantidade+=1;
                    $new_quant[$a]=$qua;
                    $a+=1;
                }
            }
            if(count($itens)!=$quantidade){
                header('Location:listar_produtos.php');
            }else{
                ?>
            <html>
                <head></head>
                <body>
                <a href="logout.php">Logout</a> 
                    <div id="container">
                        <div id="cart">
                            <div id="form">    
                                <form method="post" action="cart.php">
                <?php
                $a=0;
                $valor=0;
                echo "Detalhes da compra:<br>";
                    foreach($itens as $it){
                        $get_endpoint = "products/".$it;
                        $response = perform_http_request('GET', $rest_api_base_url . $get_endpoint);
                        $resp=json_decode($response,TRUE);
                        echo "Nome: ".$resp['productName']." ";
                        echo "Preço: ".$resp['productPrice']." ";
                        echo "Quantidade: ".$new_quant[$a]."<br>";
                        $valor+=($new_quant[$a]*$resp['productPrice']);
                        echo '<input type="text" value='.$it.' name="itens[]" style="height:0;width:0;visibility: hidden;padding:0;margin:0;float:right;">';
                        echo '<input type="text" value='.$new_quant[$a].' name="quant[]" style="height:0;width:0;visibility: hidden;padding:0;margin:0;float:right;">';
                        $a+=1;
                        
                    }
                    echo "Valor Total: ".$valor;
                   
                ?>
                <br>Enderço:<br>
                
                Bairro:<input type="text" name="bairro" placeholder="Colônia" required><br>
                Rua: <input type="text" name="rua" placeholder="Voluntário da Pátria" required><br>
                Número: <input type="text" name="numero" placeholder="765" required><br>
                Cidade: <input type="text" name="cidade" placeholder="Itacoatiara" required><br>
                <br>Pagamento (Apenas Cartão)<br>
                Número: <input type="text" name="numerocard" placeholder="555444222" minlength="9" maxlength="9" required><br>
                CVC: <input type="text" name="cvc" placeholder="123"minlength="3" maxlength="3" required><br>
                <input type="submit" value="Comprar">
                                </form>
                            </div>
                        </div>
                    </div>
                </body>
            </html>
            <?php
            }

        }else{
            header('Location:listar_produtos.php');
        }
    }else{
        header('Location:index.html');
    }
?>