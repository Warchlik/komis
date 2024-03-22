<?php
//This function will only be called when the button named "load" is pressed.
if(isset($_POST['load']))
{
    //bind the variables
    $servername = '127.0.0.1';
    $username = 'mechanik';
    $password = 'codefellow';
    $database = 'komis';
    //establishing a connection with the base
    $connect = new mysqli($servername, $username, $password, $database);
    //sql command to display all records of a given table in a database
    $sql_load ="SELECT * FROM auta";
    //conclusion of a command to perform a sql query
    $result = $connect->query($sql_load);
    //loop extracting records from the database
    while($row = $result->fetch_assoc()) {

        echo '<br>'.'<br>'.'<p>'.'Marka:  ' . $row['marka'] .' , Model:  '.$row['model'].' , Rok produkcji:  '.$row['rok_produkcji'].' , Przebieg:  '.$row['przebieg'].' , Status:  '.$row['status'].'</p>'.'<br>';

    }
    //closing the connection
    $connect->close();
}
?>