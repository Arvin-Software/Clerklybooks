<?php
    include 'khatral.php';
    khatral::khquery('INSERT INTO master_rec VALUES(NULL, :master_nm, :master_des)', array(
        ':master_nm'=>"Assets",
        ':master_des'=>"Assets"
    ));
    echo 'Assets inserted successfully';
    khatral::khquery('INSERT INTO master_rec VALUES(NULL, :master_nm, :master_des)', array(
        ':master_nm'=>"Expenses",
        ':master_des'=>"Expenses"
    ));
    echo 'Expenses inserted successfully';
    khatral::khquery('INSERT INTO master_rec VALUES(NULL, :master_nm, :master_des)', array(
        ':master_nm'=>"Income",
        ':master_des'=>"Income"
    ));
    echo 'Income inserted successfully';
    khatral::khquery('INSERT INTO master_rec VALUES(NULL, :master_nm, :master_des)', array(
        ':master_nm'=>"Liabilities",
        ':master_des'=>"Liabilities"
    ));
    echo 'Liabilities inserted successfully';
?>
