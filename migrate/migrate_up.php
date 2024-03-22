<?php
//bind the variables and establish a connection to the server
$servername = '127.0.0.1';
$username = 'root';
$password = '';

$connect = new mysqli($servername, $username, $password);

//include an sql query to create a database of 'komis' in-laws
$sql_create_database = "CREATE DATABASE IF NOT EXISTS komis";

//the condition which will display a message about the addition of the base
if ($connect->query($sql_create_database) === TRUE)
{
    echo "Baza danych 'komis' została utworzona\n";
}
else
{
    echo "Błąd podczas tworzenia bazy danych\n";
}

//connection to a database named 'komis'
$connect->select_db('komis');

//inserting a table into a database 'komis'
$sql_create_table = "CREATE TABLE IF NOT EXISTS auta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marka VARCHAR(50) NOT NULL,
    model VARCHAR(40) NOT NULL,
    rok_produkcji INT NOT NULL,
    przebieg INT,
    status TEXT
)";

// condition that checks whether the table has been added; if so, a message is displayed
if ($connect->query($sql_create_table) === TRUE)
{
    echo "Tabela 'auta' została utworzona\n";
}
else
{
    echo "Błąd podczas tworzenia tabeli\n";
}

// Add user with permissions and the display of the successful operation command
$sql_create_user = "CREATE USER 'mechanik'@'localhost' IDENTIFIED BY 'codefellow'";
if ($connect->query($sql_create_user) === TRUE)
{
    echo "Użytkownik 'mechanik' został dodany\n";
}
else
{
    echo "Błąd podczas dodawania urzytkownika\n";
}


$sql_grant_permissions = "GRANT SELECT, INSERT, UPDATE ON komis.auta TO 'mechanik'@'localhost'";
if ($connect->query($sql_grant_permissions) === TRUE)
{
    echo "Nadano uprawnienia użytkownikowi 'mechanik'\n";
}
else
{
    echo "Dłąd podczas dodawaniu uprawnień\n";
}


//conclusion of an sql query inserting records into a database
$sql_add_records = 'INSERT INTO auta(marka,model,rok_produkcji,przebieg,status) 
VALUES  ("Audi", "Rs6",2017, 50000, "Dostępny"), ("BMW","E46",2000,300000,"Dostępny") ,
        ("Toyota","Trueno A86",1993, 250000,"Dostępny"),("Volkswagen","Golf 4",2000,280000,"Dostępny")';

//a condition that checks whether records have been added if yes, it displays a message
if ($connect-> query($sql_add_records) === TRUE)
{
    echo "Dane udało się dodać dane do bazy\n";
}
else
{
    echo  "Błąd podczas dodawania danych do bazy\n";
}

//closing the connection
$connect->close();
?>