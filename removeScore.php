<?php

    echo '<h1> REMOVE A ITEM FROM THE DATABASE. </h1>';

    require_once('appVars.php');

    $host = '127.0.0.1';

    $db = 'adminapp';

    $user = 'root';

    $pass = '';
    
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    
    $pdo = new PDO ($dsn, $user, $pass);

    $sql = "SELECT * FROM item WHERE sku = :itemSku";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':itemSku', $_GET['getsku'], PDO::PARAM_STR);

    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        
        echo '<h3> ARE YOU SURE YOU WANT TO DELETE THE FOLLOWING ITEM FROM THE DATABSE? </h3>';
        
        echo '<strong> SKU : </strong>'.$row['sku'].'<br />';
        
        echo '<strong> Item Name : </strong>'.$row['name'].'<br />';
        
        echo '<strong> Item Description : </strong>'.$row['description'].'<br />';
        
        echo '<strong> Item Units : </strong>'.$row['units'].'<br />';
        
        echo '<strong> Item Packaging : </strong>'.$row['packaging'].'<br />';
        
        echo '<strong> Item Price : </strong>'.$row['price'].'<br />';
        
        echo '<strong> Item Category : </strong>'.$row['category'].'<br />';
        
        echo '<strong> Item Image : </strong>'.$row['image'].'<br />';
        
        echo '<form action = "removeScore.php" method = "post">';

        echo '<input type = "submit" value = "YES" id = "yesBtn" name = "yesBtn" />';
        
        echo '<input type = "hidden" name = "postsku" value = "' .$row['sku']. '" />';
         
        echo '<input type = "hidden" name = "postfile" value = "' .$row['image']. '" />';
        
        echo '</form>';
        
        
    }

    if(isset($_POST['yesBtn']))
    {
        
        $sql1 = "DELETE FROM item WHERE sku = :itemsku";
        
        $stmt1 = $pdo->prepare($sql1);
        
        $stmt1->bindParam(':itemsku', $_POST['postsku'], PDO::PARAM_STR);
        
        $success = $stmt1->execute();
        
        @unlink(FILE_UPLOADPATH.$_POST['postfile']);
        
        if($success)
        {
            
            echo "THE ITEM WAS SUCCESSFULLY REMOVED FROM THE DATABASE.";
            
        }
    }
    echo 'ITEM REMOVAL PAGE!';
    
?>