<?php

// require base_path("Validator.php");

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);


$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more than 1,000 is required.";
}

// errors - problem first
if(!empty($errors)) {
    // validation issue
    return view("notes/create.view.php", [
      'heading' => "Create Note",
      "errors" => $errors
  ]);
}

// happy path
$db->query("INSERT INTO `myapp`.`notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
  ":body" =>  $_POST['body'],
  ":user_id" => 1
]);

header('location: /notes');

die();
