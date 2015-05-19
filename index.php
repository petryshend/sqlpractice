<?php 

require_once 'bootstrap.php';

$exercises = [];

/*****************************************/

$stmt = $conn->prepare('SELECT Name FROM Products');
$stmt->execute();
$rows = $stmt->fetchAll(); 

$ex = [
    'task' => 'Select the names of all the products in the store.',
    'rows' => $rows,
];

$exercises[] = $ex;

/******************************************/

render('main', ['exercises' => $exercises]);
