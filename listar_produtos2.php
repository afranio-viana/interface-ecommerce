<html>
     <head></head>
     <body>
          <?php
               $url=file_get_contents("https://api-ecommerce-sbdii.herokuapp.com/products");
               $products= json_decode($url,TRUE);
               foreach($products as $prod => $value){
          ?>
          <?php
          echo "<img src=".$value['productImage'].">";
          
                    echo "Nome".$value['productName']."<br>";
               }

          ?>
     </body>
</html>
