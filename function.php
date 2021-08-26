<?php

// Suristi duomenys ir issaugoti json

function store() {
    $data = getData();
    $data[] = [
        'id' => newID(),
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'age' => $_POST['age'],
        
    ];
    file_put_contents("./data.txt", json_encode($data));
}


// Gauti duomenys 
function getData() {
   $data =  json_decode(file_get_contents("./data.txt", 1));
   foreach($data as &$animal) {
       $animal = (array) $animal;
   }
   return $data;
}

// Sukurti ID

function newID() {
    $id = json_decode(file_get_contents("./id.txt", 1));
    $id++;
    file_put_contents("./id.txt", json_encode($id));
    return $id;
}

// Sukurti json ir id failus//
init();
function init() {
    if(!file_exists("./data.txt")) {
        file_put_contents("./data.txt", "[]");
        file_put_contents("./id.txt", 0);
    }
}

// find id
function find($id){
    $data = getData();
    foreach ($data as $entry) {
        if($entry['id'] == $id){
             return (array) $entry;
        }
    }   
}

// update
function update() {
   $data = getData();
   $updateAnimal = [
       'id' => $_POST['id'],
       'name' => $_POST['name'],
       'surname' => $_POST['surname'],
       'age' => $_POST['age']
   ];
   foreach ($data as &$entry) {
       if($entry['id'] == $updateAnimal['id']) {
           $entry = $updateAnimal;
           file_put_contents("./data.txt", json_encode($data));
           return;
       }
   }
}
?>