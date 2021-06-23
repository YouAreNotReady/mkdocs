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

<?php
$dbuser = "postgres";
$dbpass = "1234";
$host = "localhost";
$dbname="school";

$id = $_GET['id'];
$cabinet = $_GET['cabinet'];

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("insert into teacher (teacher_id, cabinet) values (" . $id . ", " . $cabinet . ")");

$tmp = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$result = $tmp->query('select * from teacher limit 1');
$fields = array_keys($result->fetch(PDO::FETCH_ASSOC));

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select * from teacher");
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