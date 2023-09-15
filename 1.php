<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Масив кураторів з групами студентів
$curators = [
  [
    "name" => "Марія Іванівна",
    "group" => "Еu-11",
    "students" => ["Петро", "Діана","Валентина"]
  ],
  [
    "name" => "Володимир Петрович",
    "group" => "Pcb-11-07",
    "students" => ["Даніїл", "Оксана", "Жанна"]
  ],
  [
    "name" => "Іван Іванович",
    "group" => "Bo-11",
    "students" => ["Назар", "Андрій", "Олексій", "Людмила"]
  ]
  ];

// Вивід таблиці з даними кураторів та групами студентів
    echo "<table>";
    echo "<tr><th>Куратор</th><th>Група</th><th>Студенти</th></tr>";
    foreach ($curators as $curator) {
      echo "
      <tr>
      <td>" . $curator["name"] . "</td>
      <td>" . $curator["group"] . "</td>
      <td>" . implode(", ", $curator["students"]) . "</td>
      </tr>
      ";
    }
    echo "</table>";

  // Вивід групи студентів для обраного куратора
  if (isset($_POST['curator'])) {
    $curator = $_POST['curator'];
    foreach ($curators as $c) {
      if ($c['name'] === $curator) {
        echo "Група студентів для куратора " . $curator . ": " . $c['group'];
      }
    }
  }
  ?>

<!-- Форма для вибору куратора -->
<form method="post">
  <label for="curator">Виберіть куратора:</label>
  <select name="curator">
    <?php foreach ($curators as $curator) { ?>
      <option value="<?php echo $curator['name']; ?>"><?php echo $curator['name']; ?></option>
    <?php } ?>
  </select>
  <input type="submit" value="Вибрати">
</form>
</body>
</html>