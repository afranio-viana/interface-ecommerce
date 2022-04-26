
<?php
    require_once 'common.php';
    session_start();
    if(isset($_SESSION['id_user'])){
?>
            <html>
                <head></head>
                <body>
                <a href="logout.php">Logout</a> 
                    <div id="container">
                        <div id="cart">
                            <div id="form">    
                                <form method="post" action="create.php">
                <br>Criar Produto:<br>
                
                Nome:<input type="text" name="nome" placeholder="Insira o nome" required><br>
                Descrição:<br> <textarea rows="5" cols="20" name="descricao" required></textarea><br>
                Preço: <input type="text" name="preco" placeholder="7.8" required><br>
                Imagem: <input type="text" name="image" placeholder="http://essaimagem.com" required><br>
                <input type="submit" value="Cadastrar">
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