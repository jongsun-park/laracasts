<?php


use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

// find the corresponding note
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_POST['id']])->findOrFail();

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

// validate the form
$errors = [];

if(! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more than 1,000 is required.";
}

if(count($errors)) {
    return view("notes/edit.view.php", [
      'heading' => "Edit Note",
      "errors" => $errors,
      'note' => $note
  ]);
}

// if no validation errors, update the record in the note database record
$db->query("UPDATE notes set body = :body WHERE id = :id", [
  "id" => $_POST['id'],
  "body" =>  $_POST['body'],
]);

// redirect to the user
header('location: /notes');

die();

/**
 * index - show all of a resources
 * show - show a specific note
 * create - show me a form to create a new note
 * store - storing the note
 * edit - show a form to edit the note
 * update - updating a specific notes.
 * destory - removing note from the database
 */
