<?php
//bind the variables
$servername = '127.0.0.1';
$username = 'mechanik';
$password = 'codefellow';
$database = 'komis';
//establishing a connection with the base
$connect = new mysqli($servername, $username, $password, $database);
//including an sql command to display all the data of a given table in a database
$sql = "SELECT * FROM auta";
//conclusion of the database query command
$result = $connect->query($sql);
//if will display the table with the records extracted from the database, if it does not find any record in the table it will display a message and then return to the main file page.
if ($result->num_rows > 0)
{
    echo '<form action="../scripts/update.php" method="post">';
    echo '<table border="1">';
    echo '<tr><th>Marka</th><th>Model</th><th>Rok</th><th>Przebieg</th><th>Status</th></tr>';
    while ($row = $result->fetch_assoc())
    {
        echo '<tr>';
        echo '<td><input type="text" name="marka[]" value="' . $row['marka'] . '"></td>';
        echo '<td><input type="text" name="model[]" value="' . $row["model"] . '"></td>';
        echo '<td><input type="number" name="rok[]" value="' . $row["rok_produkcji"] . '"></td>';
        echo '<td><input type="number" name="przebieg[]" value="' . $row["przebieg"] . '"></td>';
        echo '<td><select name="status[]">';
        echo '<option value="Dostępny" ' . ($row["status"] == "Dostępny" ? "selected" : "") . '>Dostępny</option>';
        echo '<option value="Niedostępny" ' . ($row["status"] == "Niedostępny" ? "selected" : "") . '>Niedostępny</option>';
        echo '</select></td>';
        echo '<td><input type="hidden" name="id[]" value="' . $row['id'] . '"></td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '<br><button name="update" class="update" >Aktualizuj</button>';
    echo '</form>';
}
else
{
    echo "<script>alert('Nie znaleziono danych w bazie');</script>";
    echo "<script>window.location.href = '../index.php';</script>";
    exit();}
//closing the connection
$connect->close();
?>