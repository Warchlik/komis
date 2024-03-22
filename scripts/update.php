<?php
//This function will only be called when the button named "update" is pressed.
if (isset($_POST['update']))
{
    //bind the variables
    $servername = '127.0.0.1';
    $username = 'mechanik';
    $password = 'codefellow';
    $database = 'komis';
    $ids = $_POST['id'];
    $marki = $_POST['marka'];
    $modele = $_POST['model'];
    $roki = $_POST['rok'];
    $przebiegi = $_POST['przebieg'];
    $statusy = $_POST['status'];

    //Connection to the database
    $connect = new mysqli($servername, $username, $password, $database);

    // This if is to check that the number of all elements is consistent, if so, it executes a for loop whose task is to process all the records from the form and then replace them with the ones entered by the user at the end of the if which checks that the loop has been executed correctly and displays a message in the form of an alert.
    if (count($ids) == count($marki) && count($marki) == count($modele) && count($modele) == count($roki) && count($roki) == count($przebiegi) && count($przebiegi) == count($statusy))
    {
        for ($i = 0; $i < count($ids); $i++)
        {
            $id = $ids[$i];
            $marka = $marki[$i];
            $model = $modele[$i];
            $rok = $roki[$i];
            $przebieg = $przebiegi[$i];
            $status = $statusy[$i];

            //Conditional variable with code that changes the data entered by the user in the input table and then inserts it into the database
            $sql_edit = "UPDATE auta SET marka = '$marka', model = '$model', rok_produkcji = '$rok', przebieg = '$przebieg', status ='$status'  WHERE id = '$id' ";

            if ($connect->query($sql_edit) !== TRUE)
            {
                echo "<script>alert('UPS!! Błąd podczas aktualizacji rekordu o ID: $id');</script>";
            }
        }
        echo "<script>alert('Udało się wstawić wszystkie dane do bazy! :)');</script>";
        echo "<script>window.location.href = '../index.php';</script>";
    }
    //closing the connection
    $connect->close();
}
?>