<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div id="header">
        <h1>OTOszroto</h1>
    </div>
    <div id="main">
        <div id="left">
              <!--forms with buttons to insert information into div right-->
            <form action="index.php" method="post">
            <button id="load" name="load" >Wyświetl Wszystkie</button>
            </form>
            <form action="index.php" method="post">
            <button id="edit" name="edit">Edytuj Informacje</button>
            </form>
            <form action="index.php" method="post">
            <button id="add" name="add">Dodaj Samochody</button>
            </form>
        </div>
        <div id="right">
            <?php
            //when the buttons are clicked, this div will contain the content of the files assigned to the button
            if(isset($_POST['load']))
            {
                include('scripts/load.php');
            }
            ?>
            <?php
            if(isset($_POST['edit']))
            {
                include('scripts/edit.php');
            }
            ?>
            <?php
            if(isset($_POST['add']))
            {
                //form relating to the script for adding records to the database
                echo '<form class="add" method="post" action="scripts/add.php"> ';
                echo '<p>Podaj markę: </p><input type="text" name="marka"><br>';
                echo '<p>Podaj model: <input type="text" name="model"></p><br>';
                echo '<p>Podaj rok produkcji: <input type="number" name="rok"></p><br>';
                echo '<p>Podaj przebieg: <input type="number" name="przebieg"></p><br>';
                echo 'Wybierz status: <select name="status">
                    <option value="Dostępny">Dostępny</option>
                    <option value="Niedostępny">Niedostępny</option>
                </select><br>';
                echo '<button name="submit">Dodaj do bazy</button>';
                echo '</form>';

                include('scripts/add.php');
            }
            ?>

        </div>
    </div>

</body>
</html>