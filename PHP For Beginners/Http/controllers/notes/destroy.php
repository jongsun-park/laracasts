<?php

// 서비스프로바이더를 사용하는 이유
// 데이터베이스에 접속 할 때 마다 설정값을 가져와서 인스턴스를 만드는 것이 아니라
// 컨터이너를 사용하여 한번 설정하고 인스턴스를 만든 다음에 컨테이너에 집어 넣고
// 필요한 경우에 컨테이너에서 꺼내서 사용하는 것

// $config = require base_path('config.php');
// $db = new Database($config['database'], "root", "rootroot");
// END

// $db = App::container()->resolve('Core\Database');
// $db = App::container()->resolve(Database::class); // full namepace path

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// dd($db);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes where id = :id', [':id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("DELETE FROM notes WHERE id = :id", ['id' => $_POST['id']]);

header('location: /notes');

exit();
