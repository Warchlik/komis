<?php
//bind the variables and establish a connection to the server
$servername = '127.0.0.1';
$username = 'root';
$password = '';

$connect = new mysqli($servername, $username, $password);
//conclusion of the sql command
$sql_drop_db = "DROP DATABASE IF EXISTS komis";
//a condition that displays messages in the console about the correct deletion of the database or its error
if ($connect->query($sql_drop_db) === TRUE)
{
    echo "Udało się usunąć bazę\n";
}
else
{
    echo "Błąd podczas usuwania bazy\n";
}

// Drop user
$sql_drop_user = "DROP USER 'mechanik'@'localhost'";
if ($connect->query($sql_drop_user) === TRUE)
{
    echo "Użytkownik 'mechanik' został usunięty\n";
}
else
{
    echo "Błąd podczas usuwania użytkownika\n ";
}
//closing the connection
$connect->close();
?>