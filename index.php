<?php
include "function.php";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    store();
    header("location:./");
    die;
}

//fill form for edit
if(isset($_GET['id'])){
    $animal = find($_GET['id']);
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    update();
    header("location:./");
    die;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<form action="" method="post">
         <?= (isset($animal)) ? '<input type="hidden" name="id" value="'.$animal['id'].'">':""?>
        <input type="text" name="surname" value=<?=(isset($animal)) ? $animal['name'] :""?>>
        <input type="text" name="name" value=<?=(isset($animal)) ? $animal['surname'] :""?>>
        <input type="text" name="age" value=<?=(isset($animal)) ? $animal['age'] :""?>>
        <button type="submit">atnaujinti</button>
    </form>

<table class="table">
    <tr>
    <th>id</th>
    <th>Vardas</th>
    <th>Pavarde</th>
    <th>Amzius</th>
    <th>edit</th>
    <th>delete</th>
</tr>

<?php 
/// Saraso atvaizdavimas HTML
foreach (getData() as $animal) { ?>
    <tr>
    <td> <?= $animal['id'] ?> </td>
    <td> <?= $animal['name'] ?> </td>
    <td> <?= $animal['surname'] ?> </td>
    <td> <?= $animal['age'] ?> </td>
    <td><a class="btn btn-success" href="?id=<?= $animal['id'] ?>">edit</a></td>
<?php } ?>
</body>
</html>