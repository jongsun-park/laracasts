<?php

namespace Core;

use Core\App;

class Authenticator
{
  // login

  public function login($user)
  {
    $_SESSION['user'] = [
      'email' => $user['email']
    ];

    // Update the current session id with a newly generated one
    session_regenerate_id(true);
  }

  public function logout()
  {
    // log the user out.
    // $_SESSION = [];
    // Session::flush();

    // session_destroy();

    // $params = session_get_cookie_params();

    // setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']); // 3600 = 1hour

    Session::destroy();
  }


  public function attempt($email, $password)
  {
    $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $this->login([
          'email' => $email
        ]);

        return true;
      }
    }

    return false;
  }
}
