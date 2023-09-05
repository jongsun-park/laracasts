<?php

use Core\Session;

view('session/create.view.php', [
  //   'errors' => $_SESSION['errors'] ?? []
  // 'errors' => $_SESSION['_flash']['errors'] ?? []
  'errors' => Session::get('errors')
]);

// problem
// 세션 데이터가 계속 유지된다
