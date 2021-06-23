<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-site</title>
    <style>
        .tables {
            display: flex;
            justify-content: space-evenly;
        }

        .forms {
            display: flex;
            justify-content: space-evenly;
            margin-bottom: 50px;
        }

        .form_wrapper {
            display: block;
        }

        table {
            border: 2px solid black;
            border-collapse: collapse;
        }

        td {
            border: 2px solid black;
        }
    </style>
</head>
<body>

<!-- <div class="forms">
    <div class="form_wrapper">
        <h3>Удаление</h3>
        <form action="delete.php" method="get">
        <input type="radio" name="tables" value="labor_contract" id="labor_contract_id" />
        <label for="labor_contract">Labor_contract</label>
        <input type="radio" name="tables" value="teacher" id="teacher" />
        <label for="teacher">Teacher</label>
        <input type="radio" name="tables" value="timetable" id="timetable" />
        <label for="timetable">Timetable</label>
        <input type="radio" name="tables" value="class" id="class" />
        <label for="class">Class</label>
        <input type="radio" name="tables" value="pupil" id="pupil" />
        <label for="pupil">Pupil</label>
        <input type="radio" name="tables" value="journal" id="journal" />
        <label for="journal">Journal</label>
        <input type="number" name="id" placeholder="Id записи">
        <button type="submit">Удалить данные</button>
        </form>
    </div> -->

<?php
$dbuser = "postgres";
$dbpass = "1234";
$host = "localhost";
$dbname= "school";

$table = $_GET['tables'];
$id = $_GET['id'];

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("delete from " . $table . " where " . $table . "_id = " . $id);

$tmp = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$result = $tmp->query('select * from ' . $table . ' limit 1');
$fields = array_keys($result->fetch(PDO::FETCH_ASSOC));

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select * from " . $table);
echo "<table>";
echo "<tr>";

foreach ($fields as $elem) {
    echo "<td>" . $elem . "</td>";
}
echo "</tr>";
while ($row = $stmt->fetch())
{

echo "<tr>";
foreach ($fields as $elem) {
    echo "<td>" . $row[$elem] . "</td>";
}
echo "</tr>";
}
echo "</table>";
?>
 <a href="bd_connection.php"><button>Назад на главную</button></a>
</body>
</html>