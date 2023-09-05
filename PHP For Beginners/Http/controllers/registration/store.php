<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the from inputs
$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'Please provide a password at least seven characters';
}

if (!empty($errors)) {
  return view("registration/create.view.php", [

    "errors" => $errors
  ]);
}


// check if the account already exists
$db = App::resolve(Database::class);
$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

if ($user) {
  // then someone with that email ordeady exists and has an account
  // If yes, redirect to a login page
  // header('location: /login');
  header('location: /');
  exit();
} else {
  // If not, save one to the database, and then log the user id, and redirect
  $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT) // PASSWORD_BCRYPT
  ]);

  login([
    'email' => $email
  ]);

  // dd($_SESSION);

  header('location: /');
  exit();
}
