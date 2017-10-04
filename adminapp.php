<?php

    require_once('appVars.php');

    $host = '127.0.0.1';
    
    $db = 'adminapp';

    $user = 'root';

    $pass = '';

    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;chrset=$charset";

    $pdo = new PDO($dsn,$user,$pass);

    $sql = "SELECT * FROM item";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();
    
    echo '<table>';
    
    echo '<tr><th>SKU</th><th>ITEM NAME</th><th>ITEM DESCRIPTION</th><th>UNITS</th><th>PACKAGING</th><th>CATEGORY</th><th>IMAGE</th><th>REMOVE?</th></tr>';
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        
        echo '<tr>';
    
        echo '<td>'. $row['sku'].'</td>';
        
        echo '<td>'. $row['name'].'</td>';
        
        echo '<td>'. $row['description'].'</td>';
        
        echo '<td>'. $row['units'].'</td>';
        
        echo '<td>'. $row['packaging'].'</td>';
        
        echo '<td>'. $row['category'].'</td>';
        
        echo '<td>'. $row['image'].'</td>';
        
        echo '<td> <a href = "removeScore.php?getsku='.$row['sku'].'">&nbsp;REMOVE&nbsp;</a>';
         
        echo '</tr>';
        
    }
    
    echo '</table>';

?>