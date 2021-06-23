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
// $dbuser = "postgres";
// $dbpass = "1234";
// $host = "localhost";
// $dbname="school";

// $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass);
// $stmt = $pdo->query("select * from labor_contract");
// echo "<table>";
// echo "<tr>";
// echo "<td>" . "labor_contract_id" . "</td>";
// echo "<td>" . "date" . "</td>";
// echo "<td>" . "teacher_id" . "</td>";
// echo "</tr>";
// while ($row = $stmt->fetch())
// {
// // var_dump($row);
// echo "<tr>";
// echo "<td>" . $row["labor_contract_id"] . "</td>";
// echo "<td>" . $row["hire"] . "</td>";
// echo "<td>" . $row["teacher"] . "</td>";
// echo "</tr>";
// }
// echo "</table>";
// ?>
// </div>


</body>
</html>