
<?php

    //This function will only be called when the button named "submit" is pressed.
    if (isset($_POST['submit']))
    {
        //bind the variables
        $servername = '127.0.0.1';
        $username = 'mechanik';
        $password = 'codefellow';
        $database = 'komis';
        $marka = $_POST['marka'];
        $model = $_POST['model'];
        $rok = $_POST['rok'];
        $przebieg = $_POST['przebieg'];
        $status = $_POST['status'];
        // creating a connection to the database
        $connect = new mysqli($servername, $username, $password, $database);

        //sql command to insert the entered data from the form into the database
        $sql_add = "INSERT INTO auta(id ,marka ,model ,przebieg,rok_produkcji,status) VALUES (null,'$marka','$model',$przebieg,$rok,'$status');";

         //if checks if one of the variables is not empty, if it is, it does not insert the data in the other fields and pops up an error message as an alert
        if(empty($marka)||empty($model)||empty($rok)||empty($przebieg))
        {
            echo "<script>alert('UPS!! Wystąpił błąd. Spróbuj ponownie.');</script>";
            echo "<script>window.location.href = '../index.php';</script>";
            exit();
        }
        else
        {
            $connect->query($sql_add);
            
            echo "<script>alert('Dane zostały pomyślnie dodane do bazy!');</script>";
            echo "<script>window.location.href = '../index.php';</script>";
            exit();
        }
        //closing the connection
        $connect->close();
    }
    

?>

