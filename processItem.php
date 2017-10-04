<!--
================================================================================================================================================================
Application to store items into a datbase from the data sent by the form. The application is a mock application of the current AOSS Inventory Addition System.
    *** @Author: Nischal Basnet
    *** @Date: 10/03/2017
    *** Built as a project for AOSS Medical Supplies, Monroe, LA, 71203, USA
================================================================================================================================================================
!-->

<?php

require_once('appVars.php');

if(isset($_POST['submitBtn']))
{
    $host = '127.0.0.1';
    
    $db ='adminapp';
    
    $user = 'root';
    
    $pass = '';
    
    $charset = 'utf8';
    
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    
    $opt = [
                PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,        
                PDO::ATTR_EMULATE_PREPARES=>false,
           ];
    
    $pdo = new PDO($dsn,$user,$pass,$opt);
    
    $myFile = $_FILES['inputFile']['name'];
    
    $target = FILE_UPLOADPATH.$myFile;
    
    if(move_uploaded_file($_FILES['inputFile']['tmp_name'],$target))
    {

        $sql = "INSERT INTO item(sku,name,description,units,packaging,price,category,image) VALUES (:itemSKU,:itemName,:itemDescription,:itemUnits,:itemPackaging,:itemPrice,:itemCategory,:itemImage)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':itemSKU',$_POST['itemSKU'], PDO::PARAM_STR);

        $stmt->bindParam(':itemName',$_POST['itemName'], PDO::PARAM_STR);

        $stmt->bindParam(':itemDescription',$_POST['itemDescription'], PDO::PARAM_STR);

        $stmt->bindParam(':itemUnits',$_POST['itemUnits'], PDO::PARAM_STR);

        $stmt->bindParam(':itemPackaging',$_POST['itemPackaging'], PDO::PARAM_STR);

        $stmt->bindParam(':itemPrice',$_POST['itemPrice'], PDO::PARAM_STR);

        $stmt->bindParam(':itemCategory', $_POST['itemCategory'], PDO::PARAM_STR);

        $stmt->bindParam(':itemImage',$_FILES['inputFile']['name'], PDO::PARAM_STR);

        $success = $stmt->execute();
        
        if($success)
        {
            
            echo "THE ITEM WAS SUCCESSFULLY ENTERED INTO THE DATABSE. <br />";
            
            echo '<a href = "http://127.0.0.1/devground/OnGoing%20Projects/Admin%20Application/addItem.php"> << BACK TO HOME PAGE. </a> <br / > <br />';
            
        }
        
        $sql1 = "SELECT * FROM item";
        
        $stmt1 = $pdo->prepare($sql1);
        
        $stmt1->execute();
        
        echo '<table>';    

        while($row = $stmt1->fetch(PDO::FETCH_ASSOC))
        {

            echo '<tr><td>';

            echo '<strong> Item SKU : </strong>'. $row['sku'] . '<br />';

            echo '<strong> Item Name : </strong>'. $row['name'] . '<br />';

            echo '<strong> Item Description : </strong>'. $row['description'] . '<br />';

            echo '<strong> Item Units : </strong>'. $row['units'] . '<br />';

            echo '<strong> Item Packaging : </strong>'. $row['packaging'] . '<br />';

            echo '<strong> Item Price : </strong>'. $row['price'] . '<br />';

            echo '<strong> Item Category : </strong>'. $row['category'] . '<br />';
            
            echo '<div style = "max-width:40px">';

            echo '<strong> Item Image : </strong> <img src = "' . FILE_UPLOADPATH.$row['image'] . '" alt = "Uploaded Image"> </td> </tr>';
            
            echo '</div>';
            
        }

        echo '</table>';
        
        $pdo = null;

    }
    
    
    

}

?>