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

<div class="forms">
    <div class="form_wrapper">
        <h3>Выборка</h3>
        <form action="select.php" method="get">
        <input type="radio" name="tables" value="labor_contract" id="labor_contract" />
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
        <button type="submit">Вывести данные</button>
        </form>
    </div>
</div>

<div class="forms">
    <div class="form_wrapper">
        <h3>Удаление</h3>
        <form action="delete.php" method="get">
        <input type="radio" name="tables" value="labor_contract" id="labor_contract" />
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
    </div>
</div>

<div class="forms">
    <div class="form_wrapper">
        <h3>Добавление в таблицу teacher</h3>
        <form action="insert.php" method="get">
        <input type="number" name="id"  placeholder="teacher_id" />
        <input type="text" name="cabinet"  placeholder="cabinet" />
        <button type="submit">Добавить данные</button>
        </form>
    </div>
</div>
<?php
$dbuser = "postgres";
$dbpass = "1234";
$host = "localhost";
$dbname="school";

// $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
// $stmt = $pdo->query("select * from labor_contract, teacher where teacher_id = 2 and teacher = 2");
// echo "<table>";
// echo "<tr>";
// echo "<td>" . "labor_contract_id" . "</td>";
// echo "<td>" . "hire" . "</td>";
// echo "<td>" . "teacher" . "</td>";
// echo "<td>" . "teacher_id" . "</td>";
// echo "<td>" . "cabinet" . "</td>";
// echo "</tr>";
// while ($row = $stmt->fetch())
// {
// echo "<tr>";
// echo "<td>" . $row["labor_contract_id"] . "</td>";
// echo "<td>" . $row["hire"] . "</td>";
// echo "<td>" . $row["teacher"] . "</td>";
// echo "<td>" . $row["teacher_id"] . "</td>";
// echo "<td>" . $row["cabinet"] . "</td>";
// echo "</tr>";
// }
// echo "</table>";


// $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
// $stmt = $pdo->query("select * from labor_contract where (select extract(month from hire) = 10) and teacher = 3;");
// echo "<table>";
// echo "<tr>";
// echo "<td>" . "labor_contract_id" . "</td>";
// echo "<td>" . "hire" . "</td>";
// echo "<td>" . "teacher" . "</td>";
// echo "</tr>";
// while ($row = $stmt->fetch())
// {
// echo "<tr>";
// echo "<td>" . $row["labor_contract_id"] . "</td>";
// echo "<td>" . $row["hire"] . "</td>";
// echo "<td>" . $row["teacher"] . "</td>";
// echo "</tr>";
// }
// echo "</table>";

// $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
// $stmt = $pdo->query("select concat(pupil_id, ' - ', name) as id_name from pupil;");
// echo "<table>";
// echo "<tr>";
// echo "<td>" . "id_name" . "</td>";
// echo "</tr>";
// while ($row = $stmt->fetch())
// {
// echo "<tr>";
// echo "<td>" . $row["id_name"] . "</td>";
// echo "</tr>";
// }
// echo "</table>";

// $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
// $stmt = $pdo->query("select * from pupil where pupil_id in (select pupil_id from journal where pupil_id = 1);");
// echo "<table>";
// echo "<tr>";
// echo "<td>" . "pupil_id" . "</td>";
// echo "<td>" . "class_id" . "</td>";
// echo "<td>" . "name" . "</td>";
// echo "<td>" . "gender" . "</td>";
// echo "<td>" . "average_score" . "</td>";
// echo "</tr>";
// while ($row = $stmt->fetch())
// {
// echo "<tr>";
// echo "<td>" . $row["pupil_id"] . "</td>";
// echo "<td>" . $row["class_id"] . "</td>";
// echo "<td>" . $row["name"] . "</td>";
// echo "<td>" . $row["gender"] . "</td>";
// echo "<td>" . $row["average_score"] . "</td>";
// echo "</tr>";
// }
// echo "</table>";

$pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
$stmt = $pdo->query("select * from journal where pupil_id in (select pupil_id from pupil where class_id in (select class_id from class where class_id = 1));");
echo "<table>";
echo "<tr>";
echo "<td>" . "journal_id" . "</td>";
echo "<td>" . "marks" . "</td>";
echo "<td>" . "subject" . "</td>";
echo "<td>" . "pupil_id" . "</td>";
echo "</tr>";
while ($row = $stmt->fetch())
{
echo "<tr>";
echo "<td>" . $row["journal_id"] . "</td>";
echo "<td>" . $row["marks"] . "</td>";
echo "<td>" . $row["subject"] . "</td>";
echo "<td>" . $row["pupil_id"] . "</td>";
echo "</tr>";
}
echo "</table>";

?>

 </div>


</body>
</html>
