<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <?php
        //     if (isset($_SESSION ["group"])) {
            //         $group = $_SESSION ["group"];
            //     } else {
                //         $group = [
                    //             "ey11" => [
                        //                 "nameЕu11" => ["Петро", "Діана","Валентина"],
                        //                 "timeEu11" => ["09:00", "10:00","11:00","12:00","13:00"]
                        //             ],
                        //             "pcb1107" => [
                            //                 "namePcb" => ["Даніїл", "Оксана", "Жанна"],
                            //                 "timePcb" => ["18:00", "17:00","16:00","13:00","14:00"]
                            //             ],
                            //             "bo11" => [
                                //                 "nameBo11" => ["Назар", "Андрій", "Олексій", "Людмила"],
                                //                 "timeBo11" => ["12:00", "11:00","13:00","18:00","08:00"]
                                //             ],
                                //         ];
                                //     }
                                //     var_dump($_SESSION);
                session_start();
                session_destroy();
                $groupEy11 = ["09:00", "10:00","11:00","12:00","13:00", "Вихідний", "Вихідний"];
                $groupPcb1107 = ["18:00", "17:00","16:00","13:00","14:00","Вихідний", "Вихідний"];
                $groupBo11 = ["12:00", "11:00","13:00","18:00","08:00","Вихідний", "Вихідний"];
                // запис зміненого графіка в сесію і виведення зміненого графіка з сесії в таблицю
                if (!isset($_SESSION["save"])) {
                    $_SESSION["save"] = $students =  [
                        "Еu-11" => ["Петро", "Діана","Валентина"],
                        "Pcb-11-07" => ["Даніїл", "Оксана", "Жанна"],
                        "Bo-11" => ["Назар", "Андрій", "Олексій", "Людмила"],
                    ];
                    // $_SESSION["saveTwo"] = $curators = [
                    //     "Еu-11" => "Марія Іванівна",
                    //     "Pcb-11-07" => "Володимир Петрович",
                    //     "Bo-11" => "Іван Іванович",
                    // ];
                } else {
                    $students = $_SESSION["save"];
                }
                // змінити масив і тоді записати в сесію
                if (isset($_POST["add"])) {
                    $login = $_POST["login"];
                    $group = $_POST["group"];
                    // додавання студента в групу
                  array_push($_SESSION["save"][$group], $login);
                }
                if (isset($_POST["minus"])) {
                    $group =  $_POST["group"];
                    $ind = $_POST["minus"];
                    // видалення студента з списку
                    array_splice($_SESSION["save"][$group], $ind, 1);
                }
                ?>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">Імя</th>
                    <th rowspan="2">Група</th>
                    <th colspan="7">Графік чергування</th>
                </tr>
                <tr>
                    <th>Понеділок</th>
                    <th>Вівторок</th>
                    <th>Середа</th>
                    <th>Четвер</th>
                    <th>Пятниця</th>
                    <th>Субота</th>
                    <th>Неділя</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Вивід студента і групи в таблицю
                    foreach ($_SESSION["save"] as $group => $value) {
                        foreach ($value as $ind => $name) {
                                // записується графік роботи відповідно до групи в якій знаходиться студент
                                echo "<tr>";
                                echo "<td>";
                                echo "$name"; 
                                echo "<form action='index.php' method='post'>
                                <input type='hidden' name='group' value='$group'>
                                <button class='button butt-style' type='submit' name='minus' value='$ind'>-</button>
                                </form>
                                </td>
                                <td>$group</td>
                                ";
                                foreach ($groupEy11 as $grafic => $value) {
                                    if ($group == "Еu-11") {
                                        echo "<td>$value</td>";
                                    }
                                }
                                // видалення студента з таблиці
                                foreach ($groupPcb1107 as $grafic1 => $value1) {
                                    if ($group == "Pcb-11-07") {
                                        echo "<td>$value1</td>";
                                    }
                                }
                                foreach ($groupBo11 as $grafic2 => $value2) {
                                    if ($group == "Bo-11") {
                                        echo "<td>$value2</td>";
                                    }
                                } 
                            }
                        }
                ?>
            </tbody>
        </table>
        <hr>
        <p>Додати студента</p>
        <!-- форма для додавання студента в таблицю -->
        <form class="formadd flex" action="index.php" method="post">
            <input type="text" name="login" placeholder="Імя">
            <label for="group" class="arrow">
                <select name="group" id="group" placeholder="Виберіть групу">
                    <option value="група" disabled>Виберіть групу</option>
                    <option value="Еu-11">Еu-11</option>
                    <option value="Pcb-11-07">Pcb-11-07</option>
                    <option value="Bo-11">Bo-11</option>
                </select>
            </label>
            <button type="submit" class="butt-style" name="add">+</button>
        </form>
    </div>
</body>
</html>