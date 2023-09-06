# PHP For Beginners

**[phpforbeginners.com](http://phpforbeginners.com/)**

https://github.com/laracasts/PHP-For-Beginners-Series

# SECTION 1 The Fundamentals

## 01 **[How to Choose a Programming Language](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/1)**

<aside>
📒 **How exactly do you choose a first programming to learn? Why PHP, and not Ruby? And what about JavaScript or Python? How can you possibly be expected to make an educated decision at this early stage of your learning?**

</aside>

## **02 [Tools of the Trade](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/2)**

<aside>
📒 **Before we can dig in, we must first create the world, so to speak. To follow along with this series, you'll need to install a handful of essential tools. Let's go over them in this episode.**

</aside>

### **Environments**

**[Homebrew](https://brew.sh/) 
[Laragon](https://laragon.org/)  \*[WSL](https://docs.microsoft.com/en-us/windows/wsl/)
[XAMPP](https://www.apachefriends.org/index.html)
[MAMP](https://www.mamp.info/)**

### **Code Editors**

**[PHPStorm](https://www.jetbrains.com/phpstorm/)  \*[Sublime Text](https://www.sublimetext.com/)
[Visual Studio Code](https://code.visualstudio.com/)**

### **Terminals**

**[Warp](https://www.warp.dev/)  \*[iTerm](https://iterm2.com/)
[Windows Terminal](https://docs.microsoft.com/en-us/windows/terminal/)**

### **Database GUIs**

**[Table Plus](https://tableplus.com/)  \*[PHPMyAdmin](https://www.phpmyadmin.net/)**

[Beekeeper Studio](https://www.beekeeperstudio.io/)

## **03 [Your First PHP Tag](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/3)**

<aside>
📒 **Our first order of business is to prepare some basic HTML, boot a PHP server, and view it in the browser.**

</aside>

index.php - 새로운 파일을 생성하고

```php
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Document</title>
  </head>
  <body>
    <h1>
      <?php
        echo "Hello, World";
      ?>
    </h1>
  </body>
</html>
```

PHP 서버 실행 - 터미널을 사용하여 PHP 서버를 실행

```php
php -h

// php [options] -S <addr>:<port> [-t docroot] [router]
// -S <addr>:<port> Run with built-in web server.

php -S localhost:8888
// PHP 8.2.5 Development Server (http://localhost:8888) started
```

## **04 [Variables](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/4)**

<aside>
📒 **Okay, let's move on and review basic concatenation and variables. The first time I learned about variables, my first thought was, "But why?". Let's talk about it!**

</aside>

```php
echo "Hello, " . "World";

// variable
// why - the variable will point to things that you don't have control over
// 개발자가 통제하지 못하는 값을 사용해야 하는 경우
// 동적인 데이터

$greeting = "Hello";
echo $greeting . " " . "Everybody!";

// double quote + variabable
// "" - 값을 출력
echo "$greeting Everybody!";
// Hello Everybody!

// single quote - text only
// '' - 이름을 출력
// $greeting Everybody!
echo '$greeting Everybody!';
```

## **05 [Conditionals and Booleans](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/5)**

<aside>
📒 **For this next episode, we'll build a quick webpage that displays a dynamic message based upon whether or not you've read a particular book. This will give us the opportunity to review both conditionals and booleans.**

</aside>

```php
<?php
  $name = "Dark matter";
  // this var should be dynamic
  // ex. data from database
  $read = true;
	// initiate variable will be used in the rest part of code
  $mesasge = "";

  // var is not predictable when code is written
	// using conditional statement to prepare for each conditions.
  if($read) {
      $mesasge = "You have read $name";
  } else {
      $mesasge = "You have NOT read $name";
  }

  ?>
  <h1>
    <!-- shorthand for echo -->
    <!-- without semicolon(;) - immediately close statement -->
    <?= $mesasge ?>
  </h1>
```

## **06 [Arrays](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/6)**

<aside>
📒 **At this point, you know how to create a variable for a primitive string or number. But what about situations when we want to declare a collection, or list of things? A list of usernames, or book titles, or tweets? In these situations, we can reach for arrays.**

</aside>

```php
<h1>Recommended Books</h1>

<?php
	$books = ['Do Androids Dream of Electric Sheep', 'The Langoliers', 'Hail Mary'];
?>

<ul>
  <?php
		foreach ($books as $book) {
      echo "<li>$book</li>";
			// 변수명에 이어서 문자열을 사용할 경우 중괄호를 사용하여 변수명의 범위를 명시 할 수 있다.
      // echo "<li>{$book}tm</li>";
	  }
	?>

  <!-- Alternative foreach syntax -->
  <?php foreach($books as $book) : ?>
	  <li><?= $book ?></li>
  <?php endforeach; ?>
</ul>
```

## **07 [Associative Arrays](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/7)**

<aside>
📒 **Let's stick with arrays just a little longer. In this episode, you'll learn the syntax for accessing individual items within an array. You'll also learn about associative arrays, which allow you to associate a key with each value.**

</aside>

Associative Arrays

- 키와 값으로 이루어진 배열
- 키를 사용하여 아이템의 값에 접근 할 수 있다.

```php
<?php
  $books = [
    [
      'name' => 'Do Androids Dream of Electric Sheep',
      'author' => 'Philip K. Dick',
      'purchaseUrl' => 'http://example.com',
      'releaseYear' => '1968'
    ],
    [
      'name' => 'Project Hail Mary',
      'author' => 'Andy Weir',
      'purchaseUrl' => 'http://example.com',
      'releaseYear' => '2021'
    ],
  ];
?>

<ul>
  <?php foreach($books as $book): ?>
  <li>
    <a
      href="<?= $book['purchaseUrl']?>"><?= "{$book['name']} ({$book['releaseYear']})" ?>
    </a>
  </li>
  <?php endforeach; ?>
</ul>
```

Output

```html
<ul>
  <li>
    <a href="http://example.com">Do Androids Dream of Electric Sheep (1968)</a>
  </li>
  <li>
    <a href="http://example.com">Project Hail Mary (2021)</a>
  </li>
</ul>
```

## **08 [Functions and Filters](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/8)**

<aside>
📒 **Congratulations for making it this far! Let's take things a step further now and review functions. You can think of functions as the verbs of the programming world.**

</aside>

```php

<?php
function filterByReleaseYear($movies, $releaseYear)
{
    $filteredMovies = [];

    foreach($movies as $movie) {
        if ($movie['releaseYear'] >= $releaseYear) {
						// 조건을 만족하는 경우에만 배열에 추가
            $filteredMovies[] = $movie;
        }
    }

		// 필터된 결과물을 반환
    return $filteredMovies;
}
?>

<ul>
	<!-- foreach 내부에서 배열을 필터링하고 필터된 배열로 루프 -->
  <?php foreach(filterByAuthor($books, 'Andy Weir') as $book): ?>
  <li>
    <a
      href="<?= $book['purchaseUrl']?>"><?= "{$book['name']} ({$book['releaseYear']}) - By {$book['author']}" ?>
    </a>
  </li>
  <?php endforeach; ?>
</ul>
```

Homework

```php
<?php
function filterByReleaseYear($movies, $releaseYear)
{
    $filteredMovies = [];

    foreach($movies as $movie) {
        if ($movie['releaseYear'] >= $releaseYear) {
            $filteredMovies[] = $movie;
        }
    }

    return $filteredMovies;

}
?>

<ul>
  <?php foreach(filterByReleaseYear($movies, 2000) as $movie): ?>
  <li>
    <?= "{$movie['name']} ({$movie['releaseYear']})" ?>
  </li>
  <?php endforeach; ?>
</ul>
```

## **09 [Lambda Functions](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/9)**

<aside>
📒 **Buckle up, because we have a lot to cover in this episode! As part of our first code refactor, we'll discuss what lambda functions are, as well as when and why you might reach for them.**

</aside>

```php
// Lamda function (Anonymous function)
// 익명 함수를 변수의 값으로 할당 할 수 있다.
// 익명 함수의 인자는 변수명에 전달 할 수 있다.
$filter = function ($items, $fn) {
    $filteredItems = [];

    foreach($items as $item) {
				// 매개변수를 전달된 함수를 실행
				// 조건을 만족하는 경우에만 결과 배열에 추가한다.
        if($fn($item)) {
            $filteredItems[] = $item; // add book to filteredItems array
        }
    }

    return $filteredItems;
}; // expression requres semicolon;
// 함수를 변수에 할당한 표현식이기 때문에 세미클론이 필요하다.

// More Generic
$filteredItems = $filter($books, function ($book) {
		// 필터 로직이 담긴 함수를 filter 변수에 전달한다.
    return $book['releaseYear'] === 1968;
});

// PHP Provided Function
$filteredItems = array_filter($books, function ($book) {
		// && 연산자를 사용하여 두 조건을 만족하는 경우 true 를 반환한다.
    return $book['releaseYear'] >= 1950 &&  $book['releaseYear'] < 2020;
});
```

## **10 [Separate Logic From the Template](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/10)**

<aside>
📒 **Before we move on to the technical check-in for this chapter, let's set aside a bit of time to discuss code organization and why we might want to separate our PHP logic from the view, or HTML.**

</aside>

데이터 및 변수를 정의하는 파일과 뷰 (템플릿)을 담당하는 파일을 분리

index.php

```php
<?php

$books = [ ... ];
$filter = function ($items, $fn) { ... };
$filteredItems = array_filter($books, function ($book) {
    return $book['releaseYear'] >= 1950 &&  $book['releaseYear'] < 2020;
});

require "index.view.php";
```

index.view.php

```php
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Document</title>
  <style></style>
</head>

<body>
  <ul>
    <?php foreach($filteredItems as $book): ?>
    <li>
      <a
        href="<?= $book['purchaseUrl']?>"><?= "{$book['name']} ({$book['releaseYear']}) - By {$book['author']}" ?>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
```

## **11 [Technical Check-in #1 (With Quiz)](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/11)**

<aside>
📒 **Before we move on to section two, let's do a quick technical check-in to ensure that everything you've learned so far has been committed to memory. And don't forget to complete the quiz before**

</aside>

[https://laracasts.com/quizzes/php-for-beginners-check-in-1](https://laracasts.com/quizzes/php-for-beginners-check-in-1)

# SECTION 2 Dynamic Web Applications

## **12 [Page Links](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/12)**

<aside>
📒 **Welcome to section two! While section one focused entirely on the initial fundamentals of PHP, now, we'll move on and learn what it looks like to build a typical PHP application with a MySQL database.**

</aside>

Tailwind UI - Stacked Layouts

- [https://tailwindui.com/components/application-ui/application-shells/stacked](https://tailwindui.com/components/application-ui/application-shells/stacked)
- 템플릿을 복사해서 body 태그 내부에 붙여 넣기
- html, body 태그에 클래스 추가
- script 태그에 CDN 추가 - `<script src="[https://cdn.tailwindcss.com](https://cdn.tailwindcss.com/)"></script>`

파일 구조

```
index.php - require "index.view.php";
index.view.php

about.php - require "about.view.php";
about.view.php

contact.php - require "contact.view.php";
contact.view.php
```

네비게이션

- 파일을 찾을 수 없으면 루트 (index.php)로 리다이렉트 한다.
- 확장명 (.php) 를 함께 써야 해당 파일을 찾을 수 있다.

```php
// index.view.php

<a href="/" class="active" aria-current="page">Home</a>
<a href="/about.php" class="">About</a>
<a href="/contact.php" class="">Contact</a>
<a href="/our-mission.php" class="">Our Mission</a>
```

`aria-current`

- 접근성을 향상 시키기 위한 속성
- A non-null `aria-current` state on an element indicates that this element represents the current item within a container or set of related elements.
- [https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-current](https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Attributes/aria-current)

## **13 [PHP Partials](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/13)**

<aside>
📒 **In the previous episode, we begrudgingly duplicated the same HTML for every PHP view. Let's fix that now by reaching for PHP partials.**

</aside>

중복되는 코드를 partials 로 분리하고 뷰에서 가져옴

파일 구조

```
views
- partials
  - banner.php
	- footer.php
	- head.php
	- nav.php
- about.view.php // view
- contact.view.php
- index.view.php
about.php // controller
contact.php
index.php
```

index.php

```php
<?php

// partials 에서 사용 할 수 있는 변수
$heading = "Home";
require "views/index.view.php";
```

views/index.view.php

```php
<?php require('partials/head.php'); ?>
<?php require('partials/nav.php'); ?>
<?php require('partials/banner.php'); ?>

<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <!-- Your content -->
    <p>Home page</p>
  </div>
</main>

<?php require('partials/footer.php'); ?>
```

views/partials/banner.php

```php
<header class="bg-white shadow">
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">
      <?= $heading ?>
    </h1>
  </div>
</header>
```

## **14 [Superglobals and Current Page Styling](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/14)**

<aside>
📒 **Often, you'll need to apply styles or trigger certain logic based upon the current page. Luckily, we can use PHP's `$_SERVER` superglobal array to dynamically determine the current page.**

</aside>

**Superglobals**

- 모든 스크립트에서 접근할 수 있는 변수
- `$_SERVER`
- `$_SERVER["REQUEST_URI"]` - ex. “/”, “/about.php”

**Ternary Operator**

- if( condition ) { true_code } else { false_code };
- condition ? true_code : false_code;
- echo condition ? true_code : false_code;

**var_dump**

- echo 는 문자열을 인자로 받는다.
- var_dump 메서드를 사용하면 배열을 브라우저에 출력할 수 있다.

여러 페이지에서 공통적으로 사용할 메서드는 functions.php 로 분리한 후, 컨트롤러 (index.php) 에 가져올 수 있다.

functions.php

```php
<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die(); // do not execute after this

}

// dd($_SERVER["REQUEST_URI"]);
// dd($_SERVER);

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}
```

nav.php

```php
<a href="/"
  class="<?= urlIs('/') ? 'bg-gray-900 text-white' : 'text-gray-300' ?>
		text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
  <?= urlIs('/') ? 'aria-current="page"' : '' ?>
>Home</a>

<a href="/about.php"
  class="<?=urlIs('/about.php') ? 'bg-gray-900 text-white' : 'text-gray-300' ?>
	rounded-md px-3 py-2 text-sm font-medium"
  <?= urlIs('/about.php') ? 'aria-current="page"' : '' ?>
>About</a>

<a href="/contact.php"
  class="<?=urlIs('/contact.php') ? 'bg-gray-900 text-white' : 'text-gray-300' ?>
	text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
	<?= urlIs('/contact.php') ? 'aria-current="page"' : '' ?>
>Contact</a>
```

## **15 [Make a PHP Router](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/15)**

<aside>
📒 **I think your PHP skills have now matured to the point that you're ready to build a custom PHP router from scratch. This will give us the chance to discuss code organization, response codes, and more.**

</aside>

**Routers**

- 엔트리 파일에서 파일 이름이 아닌 경로를 사용
- 경로 뿐만 아니라 다른 데이터로 전달 (ex. 쿼리 스트링)

**Status Code**

- 경로와 일치하는 파일을 반환하면 200, 파일을 찾지 못하면 404 HTTP Status Code를 브라우저에 전달
- `http_response_code(404);`

[HTTP response status codes - HTTP | MDN](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status)

**Code Organization**

- 엔트리 파일 (index.php) 에서 functions.php 와 router.php 을 가져오고, - `index.php`
- router.php 파일에서 path 에 따라 컨트롤러 가져옴 - `controllers/index.php`
- 컨트롤러에서 뷰를 가져옴 - `views/index.view.php`

index.php

```php
<?php

require 'functions.php';
require 'router.php';
```

router.php

```php
<?php

// 브라우저에서 사용한 uri 에서 경로만 추출
// $_SERVER['REQUEST_URI'] - /about?q=testing
// parse_url - ['path' => '/about', "query" => "q=testing" ]
// ['path'] - /about
$uri = parse_url($_SERVER['REQUEST_URI'])['path']; // ignore query strings

// if ($uri === '/') {
//     require 'controllers/index.php';
// } elseif ($uri === '/about') {
//     require 'controllers/about.php';
// } elseif ($uri === '/contact') {
//     require 'controllers/contact.php';
// } else {
//     // PAGE NOT FOUND
//     echo "Not Found";
//     dd($_SERVER);
// }

// 경로와 컨트롤러로 구성된 배열 (맵)
$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php',
];

// $routes 에 $uri 가 존재한다면 매치되는 컨트롤러를 실행하고
// 존재 하지 않는다면 abort 메서드 실행
function routeToController($uri, $routes)
{
    if(array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

// 전달한 응답 코드를 전달하고 404 뷰 출력
function abort($code = 404)
{
    // HTTP Response Status Codes
    http_response_code($code);

    // Not Found Template
    // echo "Sorry, Not Found.";
    // TODO - Check $code.view.php exists
    require "views/{$code}.view.php";
    die();
}

routeToController($uri, $routes);
```

## **16 [Create a MySQL Database](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/16)**

<aside>
📒 **We're now ready to begin interacting with a MySQL database. Before we write any PHP, let's first review how to connect to MySQL, and then create a database and table.**

</aside>

**Databases**

- GUI 를 사용해서 데이터베이스 커넥션 생성
- [localhost](http://localhost):3306 / root / rootroot

**Tables**

- ex. posts

**Columns**

- ex. id - primary key, auto increment / title - text

## **17 [PDO First Steps](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/17)**

<aside>
📒 **The next step on our journey is to figure out how to connect to MySQL from PHP and execute a simple SELECT query. We'll of course reach for PHP Data Objects, or PDO, to orchestrate this task securely.**

</aside>

- **Select Queries**
  - select \* from myapp.posts;
  - select title from myapp.posts where id = 1;
- **DSNs**
  - 데이터베이스에 연결하기 위해 필요한 정보
  - 데이터베이스 타입; 호스트; 데이티버에스 네임; 인코딩
  - `mysql:host=localhost:3306;dbname=myapp;charset=utf8mb4`
- **PDO**
  - PHP Data Objects
  - 데이터베이스에 연결하고 상호작용 하기 위한 클래스
  - PDO 인스턴스를 사용하여 쿼리를 전송하고 결과를 받는다.

index.php

```php
// connect to our MySQL database.
// connection string
$dsn = "mysql:host=localhost:3306;dbname=myapp;charset=utf8mb4";
$username = "root";
$password = "rootroot";

// PDO instance
$pdo = new PDO($dsn, $username, $password);

// prepare query
$statement = $pdo->prepare("select * from myapp.posts");
// execute query
$statement->execute();

// fetch all
$posts = $statement->fetchAll(PDO::FETCH_ASSOC); // key 와 index 중 key 만 출력

// dd($posts);

// print result
foreach($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
```

## **18 [Extract a PHP Database Class](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/18)**

<aside>
📒 **Now that we understand the basic logic for initializing a PDO instance and executing a prepared query, let's clean things up a bit by extracting a dedicated `Database` class.**

</aside>

- **Classes**
- **Constructor Functions**
  - 클래스가 인스턴스화 했을 때 실행되는 메서드
  - PDO 인스턴스를 속성에 저장하고, 쿼리를 전달 할 때 마다 인스턴스를 새로 생성하지 않고 하나의 커넥션을 계속 사용한다.
- **Database Connections**

index.php

```php
<?php
require 'Database.php';
// 하나의 클래스로 구성된 파일은 파일명이 대문자로 시작한다.

// 인스턴스 생성
$db = new Database();
// 레코드 배열 반환
$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);
// 레코드 반환
$post = $db->query("select * from posts where id = 1")->fetch(PDO::FETCH_ASSOC);
```

Database.php

```php
<?php

class Database
{
    // define instance properties
    public $connection;

    // constructor
    // call when this instance is created
    public function __construct()
    {
        $dsn = "mysql:host=localhost:3306;dbname=myapp;charset=utf8mb4";
        $username = "root";
        $password = "rootroot";

        $this->connection = new PDO($dsn, $username, $password);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        // return $statement->fetchAll(PDO::FETCH_ASSOC);
				// statement 를 반환하고, fetch 메서드를 사용할지 fetchAll 메서드를 사용할지는 호출 할 때 결정
        return $statement;
    }
}
```

## **19 [Environments and Configuration Flexibility](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/19)**

<aside>
📒 **We have one glaring issue with our `Database` class right now. The connection values have been hard-coded. So what happens when we push the project to production, where the host and port are entirely different?**

</aside>

- **Environments**
  - Database 클래스 내부에서 PDO 를 생성하기 위한 데이터를 가지지 않고
  - 인스턴스를 생성 할 때 클래스 외부에서 PDO 에 필요한 데이터 전달
  - 또한 PDO 클래스의 상수를 클래스 내부에서 지정
- **Push Configurable Data Upward**
  - 환경 변수를 config.php 파일에 분리시키고, 필요한 경우에 호출

Databse.php

```php
public function __construct($config, $username = "root", $password = "rootroot")
{
    // $dsn = "mysql:host={$config['host']}:{$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

    $dsn = 'mysql:' . http_build_query($config, '', ';');
    // dd(http_build_query($config));                       // host=localhost&port=3306&dbname=myapp&charset=utf8mb4
    // dd(http_build_query($config, '', ';'));              // host=localhost;port=3306;dbname=myapp;charset=utf8mb4
    // dd('mysql:' . http_build_query($config, '', ';'));   // mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4

    $this->connection = new PDO($dsn, $username, $password, [
        // options
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

}
```

index.php

```php
$config = require('config.php');

$db = new Database($config['database'], "root", "rootroot");
```

config.php

```php
<?php

// 해당 파일을 require 할 때 함수 처럼 바로 값을 반환
return [
  'database' => [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'myapp',
    'charset' => 'utf8mb4'
  ],
  // 'services' => [
  //   'prerender' => [
  //     'token' => '',
  //     'secret' => ''
  //   ]
  // ]
];
```

## **20 [SQL Injection Vulnerabilities Explained](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/20)**

<aside>
📒 **In this episode, we'll review some examples of SQL injection and discuss why it's so important that you always assume that, on the web, a person is guilty until proven innocent.**

</aside>

- **SQL Injection**
  - 사용자의 데이터를 쿼리에 직접 사용하는 경우, 의도하지 않은 쿼리가 실행 될 수 있다.
  - example. drop table users;
- **Prepared Statements**
  - 플레이스 홀더를 사용한 쿼리와 사용자의 데이터를 분리한다.
  - 쿼리가 정상적인 경우에만 사용자 데이터를 바인딩해서 쿼리 실행
- **Parameter Binding**
  - `? - [$id]`
  - `:id - [’:id’ ⇒ $id]`
  - `:id - [’id’ ⇒ $id]`

index.php

```php
// Vulnerable (security risk)- 사용자가 입력한 값을 그대로 쿼리에 사용 - SQL Injection
// Dangerous example- select * from posts where id = 1; drop table users;

// Do not inline user's data into the query string!!!
// $id = "1; drop table users'; users 테이블이 의도하지 않게 삭제된다.
// dd($db->query("select * from posts where id = {$id}")->fetch());

$query = "select * from posts where id = ?";
// $query = "select * from posts where id = :id";

$post = $db->query($query, [$id])->fetch();
// $post = $db->query($query, [':id' => $id])->fetch();
```

Database.php

```php
// $params - 쿼리에 사용되는 사용자로 부터 입력받은 데이터 ex. $id

public function query($query, $params = [])
{
    $statement = $this->connection->prepare($query);
    $statement->execute($params);

    return $statement;
}
```

# SECTION 3 Notes Mini-Project

## **21 [Database Tables and Indexes](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/21)**

<aside>
📒 **You've learned enough of the fundamentals at this point to begin working on your first mini-project. Let's make a notes app! We'll begin with the initial database structure, which will give us the opportunity to review MySQL indexes.**

</aside>

- **Table Relationships**
  - users - 사용자에 대한 정보 - id / name / email
  - notes - 사용자는 노트를 남길 수 있다. 노트에 대한 정보 - id / body / user_id
- **Indexes**
  - PK - 기본키 - id
  - UNIQUE - email

notes

![Untitled](PHP%20For%20Beginners%20ee4f714a180b4a8e9212a91e0c29efc2/Untitled.png)

users

![Untitled](PHP%20For%20Beginners%20ee4f714a180b4a8e9212a91e0c29efc2/Untitled%201.png)

FK - notes.user_id

1. notes.user_id 컬럼 생성 - type: int
2. notes.user_id 컬럼이 users 테이블의 id 를 참조
3. Foreign Key Options (Constraint)
   1. RESTRICT - 노트가 있는 경우 사용자를 삭제 할 수 없다.
   2. CASCADE - 사용자가 삭제되면 사용자가 작성한 노트도 삭제된다.

![Untitled](PHP%20For%20Beginners%20ee4f714a180b4a8e9212a91e0c29efc2/Untitled%202.png)

## **22 [Render the Notes and Note Page](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/22)**

<aside>
📒 **Now that we have the initial database structure in place, let's create one page to display all of John Doe's notes, and then another page for each individual note.**

</aside>

**Fetch Notes By User**

- SQL - `SELECT * FROM notes where id = 1`
- 컨트롤러 - `$db->query('...')->fetchAll()`

파일 구조

```
router.php
controllers
- notes.php // $notes = $db->query('SELECT * FROM notes')->fetchAll();
- note.php  // $note  = $db->query('SELECT * FROM notes where id = :id', ['id' => $_GET['id']])->fetch();
views
- notes.view.php // $notes
- note.view.php  // $note
```

nav.php

```php
<a href="/notes"
	 class="<?=urlIs('/notes') ? 'bg-gray-900 text-white' : 'text-gray-300' ?> rounded-md px-3 py-2 text-sm font-medium"
	 <?= urlIs('/notes') ? 'aria-current="page"' : '' ?>>
	 Notes
</a>
```

router.php

```php
$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/notes' => 'controllers/notes.php',
  '/note' => 'controllers/note.php',
  '/contact' => 'controllers/contact.php',
];
```

notes.php

```php
<?php

// TODO - 서비스 컨테이너
$config = require('config.php');
$db = new Database($config['database'], "root", "rootroot");

$heading = "My Notes";

$notes = $db->query('SELECT * FROM notes')->fetchAll();

require "views/notes.view.php";
```

note.php

```php
<?php

// TODO - 서비스 컨테이너
$config = require('config.php');
$db = new Database($config['database'], "root", "rootroot");

$heading = "Note";

$note = $db->query('SELECT * FROM notes where id = :id', ['id' => $_GET['id']])->fetch();

require "views/note.view.php";
```

## **23 [Introduction to Authorization](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/23)**

<aside>
📒 **In the previous episode, we added support for reading all notes that were created by a particular user. But, in doing so, we unwittingly introduced a major security concern. In this lesson, we'll discuss authorization, status codes, and magic numbers.**

</aside>

- **Authorization**
  - 인가; 사용자에게 특정 기능을 허가하는 것
  - 본인 노트만 볼 수 있도록 사용자가에게 특정 기능을 한정하는 것
- **Magic Numbers**
  - 하드 코딩된 데이터는 차후 코드를 이해햐는 데 문제가 될 수 있다.
  - 변수를 사용하여 데이터의 이미를 명시하거나
  - 자주 사용하는 경우 클래스를 사용 하여 분리 할 수 있다.
- **Status Codes**
  - 404 - Page Not Found
  - 403 - Forbidden
  - 숫자의 의미를 명시하기 위해 클래스로 분리 시켜 값 대신 변수를 사용 할 수 있다.
  - `Response::FORBIDDEN`

note.php

- 노트 아이디로 페이지에 접근하는 경우, 해당 노트가 사용자 아이디와 불일치 한다면 403 뷰를 보여준다.
- `abort()` - 데이터베이스에서 아이디에 해당하는 레코드를 찾지 못한 경우 (404) - page not found
- `abort(Response::FORBIDDEN)` - 노트의 사용자 아이디와 현재 사용자의 아이디가 일치하지 않는 경우 (403) - Forbidden

```php
<?php

$config = require('config.php');
$db = new Database($config['database'], "root", "rootroot");

$heading = "Note";
$note = $db->query('SELECT * FROM notes where id = :id', ['id' => $_GET['id']])->fetch();

// Not getting any from Database
// ID Doesn't exists
// Correspond data from database
if(!$note) {
    abort();
}

$currentUserId = 1;
// Break guildine - Inline if the variable used only once.
// Identifiying what the variable is.
if($note['user_id'] !== $currentUserId) {
    // Provide extra clearity
    // Used all over the place, then create another file.
    // Class to represent this variables
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";
```

Response.php

- 자주 사용하는 HTTP 응답 코드를 클래스로 분리하고, 에플리케이션 전반에서 사용할 수 있다.

```php
<?php

class Response
{
    public const NOT_FOUND = 404;
    public const FORBIDDEN = 403;
}
```

index.php

```php
require 'functions.php';
require 'Database.php';
require 'Response.php'; // HTTP CODE RESPONSE class
require 'router.php';
```

## **24 [Programming is Rewriting](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/24)**

<aside>
📒 **Before we move on to building a form to persist new notes to the database, let's take ten minutes to refactor our current code and discuss wrapping up APIs you don't own.**

</aside>

- **Refactoring**
  - 컨트롤러 (note.php) 에 있는 로직을 클래스 (Database.php) 로 리팩토링
    - 컨트롤러 마다 중복 될 수 있는 코드를 클래스로 분리 시킬 수 있다.
- **API Ownership**
  - PDO 객체의 fetch, fetchAll 메서드를 자체 클래스 메서드로 래핑하여 추가적인 로직을 구현하거나 메서드 호출 방식을 변경할 수 있다.

notes.php

```php
// POD::fetch()
// Database::findOrFail()
$note = $db
	->query('SELECT * FROM notes where id = :id', ['id' => $_GET['id']])
	->findOrFail();

$currentUserId = 1;

// 인가; 전달한 인자의 값에 따라 abort() 실행
// 노트의 작성자와 현재 사용자가 일치하지 않은 경우 abort(403) 실행
// 두번쨰 인자로 403 이외의 HTTP 응답 코드 전달 가능
authorize($note['user_id'] === $currentUserId);
```

Database.php

```php
class Database
{
    public $connection;
		// 쿼리 실행 결과 statement 인스턴스를 클래스의 속성에 저장
    public $statement;

    public function __construct($config, $username = "root", $password = "rootroot"){ /* ... */ }

		// SQL, 매개변수를 인자로 받아서 statement 를 생성하고 하고
		// 인스턴스 자체를 반환
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

		// PDO::fetchAll();
    public function get()
    {
        return $this->statement->fetchAll();
    }

		// PDO::fetch();
    public function find()
    {
        return $this->statement->fetch();
    }

		// PDO::fetch()
		// 레코드를 찾을 수 없는 경우 abort()
    public function findOrFail()
    {
        $result = $this->find();

        if(! $result) {
            abort();
        }

        return $result;

    }
}
```

functions.php

```php
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}
```

## **25 [Intro to Forms and Request Methods](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/25)**

<aside>
📒 **We're overdue, but it's finally time to dig into forms. In this lesson, we'll learn how to submit a form using two different request methods. Next, we'll discuss how our controller might detect whether a POST submission has occurred.**

</aside>

- **Forms**
  - action = “path”; 지정한 경로로 요청을 보낸다. 경로를 지정하지 않거나 action 속성을 명시하지 않은 경우 해당 페이지로 요청한다.
  - 요청을 한 경우 `$_SERVER['REQUEST_METHOD']` 을 통해 GET 요청인지 POST 요청인지 판단할 수 있다.
- **GET Requests**
  - 링크 및 서버로 전달되는 요청은 기본적으로 GET 이다.
  - URL 을 통해 데이터를 전달한다. `?name=value`
  - 요청을 계속 하더라도 동일한 결과를 받는다.
- **POST Requests**
  - `method=”POST”` 로 전달된 요청은 데이터베이스의 특정 레코드를 변경시킬 수 있다.
  - 주로 링크 보다는 폼을 통해 전달된다.

notes.view.php

노트 목록에 노트를 추가 할 수 있는 링크

```php
<a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
```

routes.php

```php
// routers.php 파일에서 routes와 라우터 로직을 분리 한다.

return [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/notes' => 'controllers/notes.php',
  '/note' => 'controllers/note.php',
  **'/notes/create' => 'controllers/note-create.php',** // for convention; resource-action.php
  '/contact' => 'controllers/contact.php',
];

/**
 * Naming Convention
 * Following convention to community
 *
 * /notes - all notes - /resources
 * /note - single note - /resource
 * /notes/:note - single note - /resources/:id (identifier)
 * /notes/create - /resources/action
 *
 */
```

router.php

```php
$routes = require('routes.php');
// return [...]
// routes.php 파일의 읽고 routes 값을 가져온다.
```

controllers/note-create.php

```php
// POST 요청인 경우 $_POST 전역 변수에 담긴 폼 데이터를 출력하고
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    dd($_POST);
}

// POST 요청이 아닌 경우 뷰를 렌더링 한다.
require 'views/note-create.view.php';
```

views/note-creative.view.php

노트를 추가하는 폼

[From Layouts - TailwindUI](https://tailwindui.com/components/application-ui/forms/form-layouts)

```php
<form method="POST" class="max-w-[650px] mx-auto">
  <div class="space-y-12">
    <div class="border-b pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="col-span-full">
          <label for="body"
            class="block text-sm font-medium leading-6 text-gray-900">Body</label>
          <div class="mt-2">
            <textarea id="body" name="body" rows="3"
              class="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
              placeholder="Here's an idea for note..."></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button"
      class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit"
      class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>
```

## **26 [Always Escape Untrusted Input](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/26)**

<aside>
📒 **In this lesson, we'll finally persist a new note to the database. But, in doing so, you'll be introduced to a new security concern that requires us to always escape user-provided input.**

</aside>

- **Insert Queries**
  - `INSERT INTO myapp.notes (body, user_id) VALUES (:body, :user_id)`
  - 데이터베이스에 사용자가 입력한 값을 저장
  - Prepared statement 를 사용하여 하드 코드된 사용자 아이디와 `$_POST` 배열에 담긴 body 를 매개변수로 전달.
- **htmlspecialchars()**
  - 모든 사용자는 악의적인 코드를 입력할 수 있다.
  - 사용자가 입력한 값을 데이터베이스에 저장하기 전에 `sanitize` 하거나
  - 데이터베이스에 저장은 허용하되, 페이지에 출력할 때 `escape` 할 수 있다.
  - `htmlspecialchars()` 를 사용하면, 코드로 인식되수 있는 특수 문자를 엔티티로 변경하여 페이지에 랜더링 한다.

note-create.php

```php
$config = require('config.php');
$db = new Database($config['database'], "root", "rootroot");

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query("INSERT INTO `myapp`.`notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
        ":body" =>  $_POST['body'],
        ":user_id" => 1 // TODO: Session handling & authentication
    ]);
}
```

notes.view.php

```php
<a class="text-blue-500 hover:underline" href="/note?id=<?= $note['id'] ?>">
	<?= htmlspecialchars($note['body']) ?>
</a>
```

## **27 [Intro to Form Validation](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/27)**

<aside>
📒 **In this lesson, we'll review two layers of form validation: browser and server-side. We can use validation to ensure and confirm that the user submits their data in the exact format that we require.**

</aside>

- **Browser Validation**
  - = client validation
  - 브라우저에서 실행되는 유효성 검사
  - 사용자가에 즉각 적인 피드백을 제공 할 수 있지만, 브라우저 외에서 서버로 전송되는 경우 유효성 검사를 할 수 없다.
  - ex. `required`
- **Server-side Validation**
  - 데이터가 서버로 전송 되었을 때 실행되는 유효성 검사
  - 데이터가 유효성 검사를 통과하는 여부에 따라 데이터베이스에 추가하거나, 경우에 따라 에러 메시지를 변수에 담아 뷰에 전달 할 수 있다.
- **strlen()**
  - 인자로 전달된 문자열의 길이를 반환한다.
  - 빈 문자열의 경우 0을 반환한다.

note-create.php

```php
$errors = [];

// If body is empty
if(strlen($_POST['body']) === 0) {
    $errors['body'] = "Body should not empty";
}

// If body is longer than 1000
if(strlen($_POST['body']) > 1000) {
    $bodyLength = strlen($_POST['body']);
    $errors['body'] = "Body should not exceed 1000 - length {$bodyLength}";
}

// If everything is ok
if(empty($errors)) {
    $db->query("INSERT INTO `myapp`.`notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
        ":body" =>  $_POST['body'],
        ":user_id" => 1
    ]);
}
```

views/note-create.view.php

```php
<!-- Previous Value -->
<textarea id="body" name="body">
	<?= $_POST['body'] ?? '' ?>
</textarea>

<!-- Errors -->
<?php if(isset($errors['body'])) : ?>
<p class="text-red-500 text-xs pt-2">
  <?= $errors['body'] ?>
</p>
<?php endif; ?>
```

터미널에서 HTTP 요청 - [curl](https://curl.se/)

`curl -X POST http://localhost:8888/notes/create -d 'body='`

- `-X`: Request method
- `-d`: Data

## **28 [Extract a Simple Validator Class](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/28)**

<aside>
📒 **To make for a more flexible and readable experience, let's extract the basic validation rules we wrote in the previous episode into a dedicated Validator class.**

</aside>

- **Validation**
  - 컨트롤러 내부의 유효성 검사 로직을 클래스로 분리
  - ex. `string($value, $min, $max)`
- **Pure Functions**
  - 함수 외부에서 아무것도 참조하지 않는 메서드 / 메서드 내부에서 메서드를 실행하는 데 필요한 모든 것을 제공
  - 내부의 상태 (`$this→`) 혹은 외부 객체, 클래스를 참조하지 않는 메서드
  - 정적 메서드로 사용 하기 적합
- **Static Methods**
  - 인스턴스를 생성하지 않고 클래스에서 메서드를 호출 할 수 있다.
  - `$validator->string() - public fn`
  - `Validator::string() - static fn`

Validator.php

```php
class Validator
{
    public static function string($value, $min = 1, $max = INF)
    {
        $length = strlen(trim($value));
        return $length >= $min && $length <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
```

note-create.php

```php
// static funtion
// 만약 유효성 검사를 통과하지 못한다면
if(! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more than 1,000 is required.";
}

// public function
// $validator = new Validator();
// $validator->string(($_POST['body'])
```

# SECTION 4 Project Organization

## **29 [Resourceful Naming Conventions](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/29)**

<aside>
📒 **Let's take a short pause on the notes exercise, and instead switch our attention to general code organization. We'll start by switching to a common naming convention for resources.**

</aside>

- **Resources**
  - 자원별로 디렉터리를 만들고, 액션에 따라 파일을 생성
- **Common Action Names**
  - ex. index, show, create …

Notes 관련 파일을 하나의 디렉터리로 정리

- notes.php → notes/index.php - Note Collection
- note.php → notes/show.php - Single Note
- notes-create.php → notes/create.php - Create Note

Routes.php

```php
return [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/notes' => 'controllers/notes/index.php', // Note Collection
  '/note' => 'controllers/notes/show.php', // Single Note
  '/notes/create' => 'controllers/notes/create.php', // Create Note
  '/contact' => 'controllers/contact.php',
];
```

controllers/notes/index.php

```php
require "views/notes/index.view.php";
```

views/notes/index.view.php

```php
<?php require('views/partials/head.php'); ?>
<?php require('views/partials/nav.php'); ?>
<?php require('views/partials/banner.php'); ?>

<main><!-- ... -></main>

<?php require('views/partials/footer.php'); ?>
```

```php
<?php require __DIR__ . '/../views/partials/head.php'; ?>
```

## **30 [PHP Autoloading and Extraction](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/30)**

<aside>
📒 **Okay, buckle up. This will be the most dense episode yet, as we discuss a variety of topics related to project organization. We'll touch on document roots, helper functions, constants, PHP autoloading, and more.**

</aside>

- **Autoloading Classes**
  - 새로운 클래스를 사용할 때 마다 엔트리 파일에서 클래스 파일을 require 하는 대신 `spl_autoload_register` 함수를 사용하여 오토로딩 구현.
  - 클래스를 호출 할 때 `spl_autoload_register` 함수로 전달된 콜백함수가 실행된다.
  - 클래스명이 콜백함수의 인자로 전달되며, 경로를 지정하여 require 할 수 있다.
- **Document Root**
  - 프로젝트 루트에 엔트리 파일이 있는 경우, 다른 설정 / 유틸 파일 까지 브라우저에서 접근이 가능하다. 서버를 실행 할 때 docroot 를 지정하여 브라우저에서 접근 가능한 경로를 한정 할 수 있다.
  - `php -S localhost:8888 -t public`
- **extract()**
  - 전달된 배열을 분해하야 배열의 키를 변수명으로 사용 할 수 있도록 한다.
  - Import variables into the current symbol table from an array
  - extract(['foo' => 'bar'])
  - $foo = 'bar';

디렉터리 구조

```
controllers
- notes
- index.php
**Core // autocload class**
- Database.php
- Response.php
- Validator.php
**public // docroot**
- index.php
views
- notes
- partials
- index.view.php
config.php
functions.php
router.php
routes.php
```

index.php

```php
const BASE_PATH =  __DIR__ . '/../';
// string(51) "C:\Users\jongs\Desktop\php-projects\demo\public/../"

require BASE_PATH . 'functions.php';

// Autoload
spl_autoload_register(function ($class) {
    // dd($class); // string(8) "Database"
    require base_path("Core/{$class}.php");
});

require base_path('router.php');
```

functions.php

```php
function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/{$path}");
}
```

## **31 [Namespacing: What, Why, How?](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/31)**

<aside>
📒 **It's time to discuss PHP namespacing, but don't worry: I'm going to make this incredibly easy to understand. If you can remember the days of storing your entire music collection locally, you'll grasp namespacing in seconds.**

</aside>

- **PHP Namespaces**
  - 클래스의 이름 충돌을 방지하기 위해 네임스페이스란 카테고리 안에 클래스를 정의
- **The `use` Keyword**
  - 네임스페이를 지정하고, 클래스를 호출하는 경우 자동으로 현재 파일에서 사용한 네임스페이스에 속하는 클래스로 인식한다.
  - 클래스를 네임스페이스와 함께 사용하거나,
  - `use` 키워드를 사용하면 네임스페이스 안에서 외부 네임스페이스의 클래스를 전체 경로 없이 사용가능하다.

네임스페이스 지정

```php
namespace Core;
```

네임스페이스 안에서 외부 클래스를 사용해야 하는 경우

- `use` 키워드 - `use PDO; new PDO();`
- 전체 경로 - `\PDO()`

오토로딩

```php
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
		// Core\Database - namespace path
		// Core/Database - file path
		// require base_path("Core/Database.php");
    require base_path("{$class}.php");
});
```

## **32 [Handle Multiple Request Methods From a Controller Action?](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/32)**

<aside>
📒 **Over the next three episodes, we'll review a number of refactors that are a bit more advanced. But first, we need to encounter a situation that necessitates the refactors. We'll use the example of a messy controller action that can respond to multiple request types.**

</aside>

- **Request Methods**
  - 브라우저에서는 GET, POST 메서드만 지원한다.
  - DELETE 요청을 하기 위해서는 POST 메서드를 사용하고, 컨트롤러 내부에서 해당 요청을 구분한다.
  - show 컨트롤러에서 GET / POST 요청을 모두 핸들링한다.
- **Delete Forms**
  - POST 요청
  - id 를 히든 인풋으로 전달

show.index.php

```php
<form
  action="/note?id<?= $note['id']?>"
  method="POST" class="mt-6">
  <input type="hidden" name="id"
    value="<?= $note['id'] ?>">
  <button type="submit" class="text-sm text-red-500">Delete</button>
</form>
```

show.php

```php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
		// find author user_id
    $note = $db->query('SELECT * FROM notes where id = :id', [':id' => $_POST['id']])->findOrFail();
		// compare author & user
    authorize($note['user_id'] === $currentUserId);

		// delete note
    $db->query("DELETE FROM notes WHERE id = :id", ['id' => $_POST['id']]);

		// redirect
    header('location: /notes');

    exit();

} else { /* */ }
```

## **33 [Build a Better Router](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/33)**

<aside>
📒 **In this episode, we'll build a better router that can handle and respond to any form request type. However, because forms only natively support GET and POST, we'll need to use a hidden input field to spoof the request type.**

</aside>

- **Request Methods & Request Type Spoofing**
  - 경로는 동일하지만 메서드에 따라 다른 컨트롤러를 실행
  - 브라우저에서는 GET 과 POST 만 지원하지만, 필요에 따라 DELETE, PUT, PATCH 를 사용하는 방법
  - 뷰에서 폼을 보낼 떄 히든 인풋을 사용하여 메서드를 전달한다.
  - 컨트롤러에서 POST 슈퍼 글로벌에 `_method` 키가 있다면 해당 값을 사용하고 없다면 서버 슈퍼 글로벌의 `REQUEST_METHOD` 값을 메서드로 사용한다.
- **Routing**
  - 엔트리 파일에서 라우터 인스턴스를 생성하고 라우트 파일을 읽고 에플리케이션의 모든 경로를 라우터 인스턴스에 저장한다.
  - 라우터 인스턴스를 조회하여 현재 페이지의 주소와 메서드가 일치하는 경우의 컨트롤러를 출력한다.

public/index.php

```php
$router = new \Core\Router();

$routes = require base_path('routes.php'); // return [...]

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
```

Core/Router.php

```php
namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
        // $this->routes[] = compact('method', 'uri', 'controller');
    }

    public function get($uri, $controller)
    {
      $this->add('GET', $uri, $controller);
    }
    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }
    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }
    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }
    public function put($uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    public function abort($code = 404)
    {
        http_response_code($code);

        view("{$code}.view.php");
        die();
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }
}
```

routes.php

```php
$router = new \Core\Router();

// static pages
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// routes related to notes
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
```

view/show.view,php

```php
<form
  action="/note?id<?= $note['id']?>"
  method="POST" class="mt-6">
  <input type="hidden" name="_method" value="DELETE" />
  <input type="hidden" name="id"
    value="<?= $note['id'] ?>">
  <button type="submit" class="text-sm text-red-500">Delete</button>
</form>
```

## **34 [One Request, One Controller](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/34)**

<aside>
📒 **With an improved router that can respond to multiple form request types, we can now refactor our controller actions to be more focused. We'll also discuss the importance of keeping your controller actions as simple as possible.**

</aside>

- **Controller Actions**
  - index: resource collection: notes
  - show: single resource: note
  - destory: delete resource
  - create: show form
  - store: save resource
- **Request Methods**
  - index: GET
  - show: GET
  - destory: DELETE (POST)
  - create: GET
  - store: POST

하나의 액션을 하나의 컨트롤러로 구현한다.

컨트롤러 내부에서 요청 메서드를 확인하여 액션을 구분하지 않고, 독립적인 파일로 분리한다.

routes.php

```php
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');
```

controllers/notes/store.php

```php
<?php

// require base_path("Validator.php");

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database'], "root", "rootroot");

// 에러 변수 초기화
$errors = [];

// 유효성 검사
if(! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more than 1,000 is required.";
}

// 유효성 검사를 통과하지 못한 경우
if(!empty($errors)) {
    // validation issue
    return view("notes/create.view.php", [
      'heading' => "Create Note",
      "errors" => $errors
  ]);
}

// 유효성 검사를 통과한 경우
// 데이터베이스에 자원을 저장
$db->query("INSERT INTO `myapp`.`notes` (`body`, `user_id`) VALUES (:body, :user_id)", [
  ":body" =>  $_POST['body'],
  ":user_id" => 1
]);

// 리다이렉트
header('location: /notes');

// 이후 코드는 실행하지 않음
die();
```

## **35 [Make Your First Service Container](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/35)**

<aside>
📒 **In this episode, we'll discuss the concept of a service container, and how it can help us organize our code and remove the need to manually construct the same dependencies over and over again.**

</aside>

- **Service Containers**
  - 이슈: 컨트롤러 마다 설정 파일에서 설정 값을 가져와 데이터베이스 인스턴스를 생성
  - 해결: 컨테이너를 생성하여 데이터베이스 인스턴스를 넣은 다음에 필요한 경우에 컨테이너에서 가져와 사용
- **Static Methods**
  - 클래스의 인스턴스를 생성하지 않고 클래스 자체에서 호출 가능한 메서드
  - 싱글톤 패턴
- **Automatic Resolution**
  - 실제로 프레임워크를 사용하는 경우, 컨테이너를 통해 의존하는 클래스 (모듈)을 자동으로 해결한다.

```php

use Core\App;
use Core\Database;

// $config = require base_path('config.php');
// $db = new Database($config['database'], "root", "rootroot");

// $db = App::container()->resolve('Core\Database');
// $db = App::container()->resolve(Database::class);
$db = App::resolve(Database::class);
```

Container.php

```php
class Container
{
    protected $bindings = [];

    // add & 컨테이너에 집어 넣는 것
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    // resolve & 컨테이너에서 가져오는 것
    public function resolve($key)
    {
        // exception & guarding beginnings
        if(!array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching binding found for {$key} ");
        }

        $resolver = $this->bindings[$key];
        return call_user_func($resolver);
    }
}
```

App.php

```php
class App
{
    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    // referring; deligating
		// App 클래스에서 Container 의 메서드를 직접 사용할 수 있도록
		// 컨테이너의 메서드를 호출하는 App 클래스의 메서드를 정의
    public static function bind($key, $resolver)
    {
        return static::$container->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        return static::$container->resolve($key);
    }
}
```

bootstrap.php

```php
$container = new Container();

// 실제로는 데이터베이스 뿐만 아니라 프로젝트에 필요한
// 여러 모듈을 컨테이너에 집어 넣는다.
$container->bind('Core\Database', function () {
    $config = require base_path('config.php');
    return new Database($config['database'], "root", "rootroot");
});

App::setContainer($container);
```

index.php

```php
// 부트스트랩 실행
require base_path('bootstrap.php');
```

## **36 [Updating With PATCH Requests](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/36)**

<aside>
📒 **The only remaining step for our first resource is to support editing notes. Luckily, most of the legwork has been completed at this point. We only need to create the form, and register a corresponding route and controller.**

</aside>

- **PATCH Requests**
  - 기존 노트 수정
  - GET - ‘/note/edit’ - edit.php - 업데이트 폼
  - PATCH - ‘/note’ - update.php - 폼 제출 후 노트 업데이트
- **Validation Duplication**
  - 폼이 제출 되었을 때 사용자가 입력한 값이 유효한지 검증
  - 어플리케이션의 여러 곳에서 사용하는 경우 코드가 중복 될 수 있다.

routes.php

```php
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');
```

edit.php

```php
$db = App::resolve(Database::class);

// TODO: Session
$currentUserId = 1;

// edit?id=10
// 링크로 전달한 식별자에 일치하는 노트 검색
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail();

// 검증
authorize($note['user_id'] === $currentUserId);

// 뷰
view("notes/edit.view.php", [
  'heading' => "Edit Note",
  "errors" => [],
  "note" => $note
]);
```

edit.view.php

```php
<form method="POST" action="/note">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?= $note['id'] ?>">

    <div class="shadow sm:overflow-hidden sm:rounded-md">
      <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
        <div>
          <label for="body" class="block text-sm font-medium text-gray-700">Body</label>

          <div class="mt-1">
            <textarea id="body" name="body" rows="3"
              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
              placeholder="Here's an idea for a note..."><?= $note['body'] ?></textarea>

            <?php if (isset($errors['body'])) : ?>
		            <p class="text-red-500 text-xs mt-2">
		              <?= $errors['body'] ?>
		            </p>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div
        class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end items-center">
        <button type="button" class="text-red-500 mr-auto"
          onclick="document.querySelector('#delete-form').submit()">Delete</button>

        <a href="/notes"
          class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          Cancel
        </a>

        <button type="submit"
          class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          Update
        </button>
      </div>
    </div>
  </form>

<form id="delete-form" class="hidden" method="POST" action="/note">
  <input type="hidden" name="_method" value="DELETE">
  <input type="hidden" name="id"
    value="<?= $note['id'] ?>">
</form>
```

버튼을 클릭하면 (update) form 요소 외부에 있는 (delete) form 을 제출

```php
<button type="button" class="text-red-500 mr-auto"
        onclick="document.querySelector('#delete-form').submit()">Delete</button>

<form id="delete-form" class="hidden" method="POST" action="/note">
  <input type="hidden" name="_method" value="DELETE">
  <input type="hidden" name="id"
    value="<?= $note['id'] ?>">
</form>
```

update.php

```php
$db = App::resolve(Database::class);

$currentUserId = 1;

// find the corresponding note
// 일치하는 노트
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_POST['id']])->findOrFail();

// authorize that the current user can edit the note
// 인가 검증
authorize($note['user_id'] === $currentUserId);

// validate the form
// 에러 처리
$errors = [];

// 중복될 수 있는 코드
if(! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "A body of no more than 1,000 is required.";
}

// 에러가 발생하는 경우 다시 엡데이트 폼 출력
if(count($errors)) {
    return view("notes/edit.view.php", [
      'heading' => "Edit Note",
      "errors" => $errors,
      'note' => $note
  ]);
}

// if no validation errors, update the record in the note database record
// 에러가 없다면 데이터베이스에 해당 레코드 업데이트
$db->query("UPDATE notes set body = :body WHERE id = :id", [
  "id" => $_POST['id'],
  "body" =>  $_POST['body'],
]);

// redirect to the user
// 모두 성공 하면 컬렉션 페이지로 이동
header('location: /notes');

die();
```

# SECTION 5 Sessions and Authentication

## **37 [PHP Sessions 101](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/37)**

<aside>
📒 **Welcome to a new chapter! We'll now begin to explore the world of PHP sessions. We'll start by discussing the concept of sessions, and how they can be used to persist data across multiple requests.**

</aside>

- **Sessions**
  - 브라우저가 종료되기 전까지 유지되는 임시 데이터
  - $\_SESSION 슈퍼 글로벌로 특정 데이터를 저장 할 수 있으며
  - 세션 파일을 생성 하기 위해서는 엔트리 파일에서 `session_start()` 함수를 호출해야 한다.
  - 세션 파일을 생성하고 데이터를 저장하면, 각 페이지에서 세션 데이터에 접근 할 수 있다.
- **Session Files**
  - `php --info`
  - `session.save_path => no value => no value`
  - 세션 파일 경로를 저장하지 않은 경우, 임시 파일 위치에 저장된다.
  - AppData / Local / Temp / sess_0q0cmju339h892df6t2b6vtg9e
- **Cookies**
  - 브라우저에서 세션 쿠키가 저장되고 (PHPSESSID)
  - 세션 쿠키 값을 사용하여 서버에서 세션 파일을 검색한다.
  - 세션 쿠키가 저장되지 않은 경우는 서버에서 새로운 세션 파일을 생성한뒤, 브라우저에 새로운 쿠키를 생성한다.

index.php

```php
session_start();
```

controllers/index.php

```php
$_SESSION['name'] = 'Jeffrey';
```

banner.php

```php
<?= $_SESSION['name'] ?? 'Guest' ?>
```

Temp/sess_0q0cmju339h892df6t2b6vtg9e

```
name|s:7:"Jeffrey";last|s:3:"wey";
```

## **38 [Register a New User](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/38)**

<aside>
💡 **Now that we understand the basics of PHP session handling, we can build our first registration form. Once filled, we can create a new user in the database and then update the session to "mark" them as signed in.**

</aside>

- **Registration**
  - 사용자가 등록 폼을 사용하려 이메일과 비밀번호를 입력하면 - `create.php`
  - 유효성 검사 - 이메일, 비밀번호 - `store.php`
    - 유효하지 않은 경우 에러 메시지와 함께 등록 페이지로 리다이렉트
    - 유효한 경우
      - 이메일이 이미 등록되었는지 확인하고 - `SELECT`
      - 이메일이 등록되지 않은 경우 새로운 유저로 등록하고 세션에 유저 저장 - `INSERT`
- **Sessions**
  - index.php - session_start()
  - registration/store.php - 데이터베이스에 사용자를 등록하고 세션에 사용자 정보 입력
  - nav.php - 세션에 저장된 사용자 정보에 따라 아바타를 보여주거나 링크 렌더링

routes.php

```php
$router->get('/register', 'controllers/registration/create.php');
$router->post('/register', 'controllers/registration/store.php');
```

create.php

```php
view("registration/create.view.php", [
    "errors" => []
]);
```

store.php

```php
<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the from inputs
$errors = [];
if(!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if(!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password at least seven characters';
}

if(!empty($errors)) {
    return view("registration/create.view.php", ["errors" => $errors]);
}

// check if the account already exists
$db = App::resolve(Database::class);
$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

if($user) {
    // then someone with that email ordeady exists and has an account
    // If yes, redirect to a login page
    // header('location: /login');
    header('location: /');
    exit();
} else {
    // If not, save one to the database, and then log the user id, and redirect
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
      'email' => $email,
      'password' => $password
    ]);

    // mark that the user has logged in.
    $_SESSION['user'] = [
      'email' => $email
    ];

    header('location: /');
    exit();
}
```

nav.php

```php
<?php if(isset($_SESSION['user'])) : ?>
  <img class="h-8 w-8 rounded-full"
    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
    alt="">
<?php else: ?>
	<a href="/register" class="text-white">Register</a>
<?php endif; ?>
```

## **39 [Introduction to Middleware](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/39)**

<aside>
💡 **In this episode, we'll discuss the concept of middleware, and how it can be used as a bridge between an incoming request and the core of your application. We'll create two middleware classes to handle route authorization for guests and authenticated users.**

</aside>

- **Middleware**
  - 라우트 마다 공통적으로 실행될 수 있는 로직을 컨트롤러 내부에 작성하지 않고, 라우트에 클래스 내부에 작성하여 필요한 경우 라우트에 체이닝하는 것
  - 라우트 메서드는 인스턴스를 반환하고, 메서드를 체이닝하여 미들웨어를 지정할 수 있다.
- **Redirect Guests**
  - 세션에 유저가 저장되어 있지 않은 경우, 안전한 페이지로 라우팅한다.

routes.php

```php
// 로그인한 사용자만 notes에 접근
$router->get('/notes', 'controllers/notes/index.php')->only('auth');
// 로그인 하지 않은 사용자만 register 폼에 접근 가능.
$router->get('/register', 'controllers/registration/create.php')->only('guest');
```

Core\Router.php

```php
class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

		public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller); // $this 반환
    }

		public function only($key)
    {
        // 가장 최근에 등록한 라우트의 미들웨어에 $key 지정
				// 라우트 파일이 읽힐 때 순서대로 라우트가 생성되고
				// only 메서드를 체이닝 한 경우 전달한 인자가 미들웨어에 지정된다.
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

		public function abort($code = 404)
    {
        http_response_code($code);
        view("{$code}.view.php");
        die();
    }

		public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
								// 룩업 테이블 기능을 하는 미들웨어 클래스를 통해 동적으로 주입
								// $middleware = Middleware::MAP[$route['middleware']];
                // (new $middleware())->handle();
								Middleware::resolve($route['middleware']);
                return require base_path($route['controller']);
						}
				}
				// Error ex. Page Not Found
				$this->abort();
		}
}
```

`route()`

라우트에 등록된 미들웨어에 따라 로직을 실행

```php
if($route['middleware'] === 'guest') {
    if($_SESSION['user'] ?? false) {
        header('location: /');
        exit();
    }
}

if($route['middleware'] === 'auth') {
    if(!$_SESSION['user'] ?? false) {
        header('location: /');
        exit();
    }
}
```

로직을 클래스로 분리

```php
if($route['middleware'] === 'guest') {
  (new Guest())->handle();
}

if($route['middleware'] === 'auth') {
  (new Auth())->handle();
}
```

미들웨어로 사용되는 클래스를 매핑하는 Middleware 메서드를 사용하여 동적으로 주입

```php
if($route['middleware']) {
    $middleware = Middleware::MAP[$route['middleware']];
    (new $middleware())->handle();
}
```

키로 클래스를 찾고, 인스턴스를 생성하는 과정을 메서드로 분리

```php
Middleware::resolve($route['middleware']);
```

Core\Middleware\Middleware

```php
class Middleware
{
		// 미들웨어로 사용 되는 클래스의 키와 경로
    public const  MAP = [
      'guest' => Guest::class,
      'auth' => Auth::class,
    ];

    public static function resolve($key)
    {
				// 아무것도 전달하지 않은 경우
        if(!$key) {
            return;
        }

				// MAP - 룩업 테이블에서 키를 찾을 수 없는 경우
        $middleware = static::MAP[$key] ?? false;

				// 찾을 수 없을 때 예외 발생
        if(!$middleware) {
            throw new \Exception("No matching middleware found '{$key}'.");
        }

				// 인스턴스화 & 메서드 실행
        (new $middleware())->handle();
    }
}
```

Core\Middleware\Auth.php

```php
class Auth
{
    public function handle()
    {
        if(!isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}
```

## **40 [Manage Passwords Like This For The Remainder of Your Career](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/40)**

<aside>
💡 **Up until this point, we've been storing passwords in clear text (gasp)! Let's fix that. In this episode, we'll discuss the importance of password hashing, and why it's necessary to protect your users' sensitive data. We'll also discuss the Bcrypt algorithm, and how it can be used to generate secure hashes.**

</aside>

- Functioning registration system and simplified route middleware discussed.
- Password security and hashing revisited for improved user experience.
- Storing passwords in clear text identified as a significant security concern.
- PHP's built-in function, `password_hash`, introduced for hashing passwords.
- Bcrypt algorithm recommended as a secure password hashing method.
- Hashed password storage demonstrated for better security.
- Importance of using hashed passwords in all user registration systems emphasized.

로그인한 사용자에게 피드백 제공

views/index.view.php

```php
<p>Hello. <?= $_SESSION['user']['email'] ?? 'Guest' ?>. Welcome to the home page</p>
```

controllers/registration/store.php

- `passowrd_hash($string, $algo)` - 배밀번호 해시 생성

```php
$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
	'email' => $email,
	'password' => password_hash($password, PASSWORD_DEFAULT) // PASSWORD_BCRYPT
]);

// password
// $2y$10$oA5HwzUavTivwjSXzbQvsOty.Rj8MA6VauZSRntnqNq5gA0ErMEgK
```

## **41 [Log In and Log Out](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/41)**

<aside>
💡 **Now that we have a functioning registration form, we can finally build out the login system. As you'll see, there's a small handful of confusing, low-level steps that we need to follow - particularly when logging a user out.**

</aside>

- **Authentication**
  - 로그인 폼을 제출하면
    - 공통: 유효성 검사, 빈 값인지, 양식에 맞는지
    - 이메일: 데이터베이스에 저장된 값이 있는지
    - 비밀번호: 이메일로 찾은 유저의 비밀번호와 입력된 비밀번호가 일치하는지
  - 값이 유효하지 않으면 에러 메시지와 함께 폼을 전송하고
  - 로그인이 성공되면 세션에 유저 정보를 추가하고 메인 페이지로 리다이렉트 한다.
- **Expiring Cookies**
  - `setcookie(string $name, $value = '', array $options = [])`
  ```php
  setcookie(
  	string $name,
  	$value = "",
  	$expires_or_options = 0, // time() - 3600
  	$path = "",
  	$domain = "",
  	$secure = false,
  	$httponly = false
  ):
  ```
- **Destroying a Session**
  - 슈퍼 글로벌 $_SESSION 에 빈 배열을 추가하고 - `$\_SESSION = [];`
  - 세션 파일을 삭제 한 뒤 - `session_destroy();`
  - 브라우저에 저장된 쿠키를 제거한다. - `setcookie();`

routes.php

```php
$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');
```

functions.php

```php
function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];
    // Update the current session id with a newly generated one
    session_regenerate_id(true);
}

function logout()
{
    // log the user out.
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']); // 3600 = 1hour
}
```

controllers/session/create.php

```php
view('session/create.view.php');
```

controllers/session/store.php

```php
$db = App::resolve(Database::class);
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password)) {
  $errors['password'] = 'Please provide a valid password';
}

if (!empty($errors)) {
  return view("session/create.view.php", [
    "errors" => $errors
  ]);
}

// match the credential
$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

if ($user) {
  if (password_verify($password, $user['password'])) {
    login([
      'email' => $email
    ]);

    header('location: /');
    exit();
  }
}

return view("session/create.view.php", [
  "errors" => [
    'password' => 'No matching account found for that email address and password.'
  ]
]);
```

controllers/session/destroy.php

```php
logout();

header('location: /');
exit();
```

# SECTION 6 Refactoring Techniques

## 42 **[Extract a Form Validation Object](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/42)**

<aside>
💡 **For our first refactoring exercise, we'll extract a login form validation object. This approach will allow us to keep our controllers lean, clear, and easier to potentially reuse in other places.**

</aside>

- Http/
  - Http 요청과 관련된 코드; ex. controller
- Http/Forms/LoginForm
  - Application Specific code
  - 컨트롤러에 있는 로그인 폼 관련 코드를 클래스로 분리하여 컨트롤러 내에서 가독성을 높힘

routes.php

```php
// 컨트롤러 파일을 Http 디렉터리 하루로 옮기고
// 모든 라우트에서 중복되는 controllers를 라우터 클래스에서 명시

// $router->get('/', 'controllers/index.php');
$router->get('/', 'index.php');
```

Router.php

```php
base_path('Http/controllers/' . $route['controller']);
```

Http/controllers/session/store.php

```php
$form = new LoginForm();
// 유효성 검사를 통과하지 못한 경우
if (!$form->validate($email, $password)) {
  return view("session/create.view.php", [
    "errors" => $form->errors()
  ]);
}
```

Http/Froms/LoginForm.php

```php
namespace Http\Forms;

use Core\Validator;

class LoginForm
{
  protected $errors = [];

  public function validate($email, $password)
  {
    if (!Validator::email($email)) {
      $this->errors['email'] = 'Please provide a valid email address';
    }

    if (!Validator::string($password)) {
      $this->errors['password'] = 'Please provide a valid password';
    }

    return empty($this->errors);
    // empty - validate - true
    // not empty - errors - false
  }

  // getter
  // prevent modify protected properties from outside of class
  public function errors()
  {
    return $this->errors;
  }
}
```

## **43 [Extract an Authenticator Class](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/43)**

<aside>
💡 **Next up, we can further clean up our controller and improve clarity by extracting an `Authenticator` class. This new class can then be responsible for handling the actual authentication logic.**

</aside>

Authenticator

- attempt: 사용자가 입력한 이메일과 비밀번호를 가지고 사용자 조회후 비밀번호 비교
- login / logout: 유틸 함수에서 인증 클래스로 이동

Resonsibility

- Authenticator: 사용자 인증에 관련된 기능만 수행하고
- Controller: 뷰에 관련된 기능은 컨트롤러에서 처리

Redirect

- redirect($path)
- exit()

Code Styles - 조건문 블럭에서 exit() 을 처리하는 경우 else 대신 조건문 밖에서 코드를 작성해도 된다.

```php
if ($condition){
	// code
}

// else
return view();
```

store.php

```php
use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

// 유효성 검사를 통과하면
if ($form->validate($email, $password)) {

	// 인증을 시도하고
  if ((new Authenticator)->attempt($email, $password)) {
		// 인증이 성공하면 리다이렉트
    redirect('/');
  }

	// 인증이 실패하면 폼에 에러를 추가한 후
  $form->error('password', 'No matching account found for that email address and password.');
}

// 에러 메시지와 함께 리다이렉트
return view("session/create.view.php", [
  "errors" => $form->errors()
]);
```

Core/Authenticator.php

```php
<?php

namespace Core;

use Core\App;

class Authenticator
{
  public function attempt($email, $password)
  {
    $user = App::resolve(Database::class)
			->query('SELECT * FROM users WHERE email = :email', ['email' => $email])
			->find();

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
```

functions.php

```php
function redirect($path = '/')
{
    header("location: {$path}");
    exit();
}
```

## **44 [The PRG Pattern (and Session Flashing)](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/44)**

<aside>
💡 **In this episode, we'll discuss the PRG (Post-Redirect-Get) pattern, and how it can be used to prevent duplicate form submissions. Currently, we're returning a view directly from the `POST` request in the event of failed validation, however, this is far from ideal. Let's review the problem, and then seek a solution.**

</aside>

**PRG (Post-Redirect-Get) pattern**

- POST 요청 후
- Validation 에러가 발생하면
- Redirect 를 한 후
- GET 요청을 하여 뷰와 에러를 렌더링

Prevent duplicate form submissions

- 뷰를 새로고침 했을 때 POST 요청이 되는 것이아니라
- GET 요청을 통해 뷰만 다시 불러온다.

Http\controllers\session\store.php

```php
// $_SESSION['errors'] = $form->errors();
// 세션 자체에 errors 를 저장하는 경우
// 세션에 저장되기 때문에 에러가 불필요하게 계속 남아 있는다

// $_SESSION['_flash']['errors'] = $form->errors();
// _flash 키에 에러를 저장하고, _flash 를 페이지 요청이 끝난 후 비운다.
// _flash 문자열을 여러 곳에서 사용될 수 있기 때문에 차후 문제가 생길 수 있다.

Session::flash('errors',  $form->errors());
// Session 클래스를 만들어 _flash 문자열을 클래스 내부에서만 사용하고
// 유틸 함수를 통해 특정 데이터를 세션에 저장한다.

return redirect('/login');
// 유효성 검사를 통과 하지 못했을 때 login 페이지로 리다이렉트 한다.
```

Http\controllers\session\create.php

```php
view('session/create.view.php', [
  // 'errors' => $_SESSION['errors'] ?? []
	// 세션 바로 아래에 에러를 저장하는 경우
	// 에러가 계속 남아 있게 된다.

  // 'errors' => $_SESSION['_flash']['errors'] ?? []
	// _flash 문자열을 중복해서 사용

  'errors' => Session::get('errors')
	// 세션 클래스에서 세션 데이터에 접근
	// _flash 내부를 먼저 조회하고, 세션 슈퍼 글로벌에서 조회
]);
```

public\index.php

```php
// 뷰 렌더링을 한 후
$router->route($uri, $method);

// _flash 데이터를 비운다
// unset($_SESSION['_flash']);
// _flash 문자열 중복
Session::unflash();
// 클래스에서 _flash 키를 초기화
```

Core\Session.php

```php
namespace Core;

class Session
{
	// 세션에서 $key 에 해당하는 값을 조회 후, 불린으로 변환
  public static function has($key)
  {
    return (bool) static::get($key);
  }

	// $key 에 $value 저장
  public static function put($key, $value)
  {
    $_SESSION[$key] = $value;
  }

	// $key 값 조회
	// _flash 먼저 조회하고 $_SESSION 조회
  public static function get($key, $default = null)
  {
    return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
  }

	// _flash의 $key에 $value 저장
  public static function flash($key, $value)
  {
    // $_SESSION['_flash']['errors'] = $form->errors();
    $_SESSION['_flash'][$key] = $value;
  }

	// _flash 초기화
  public static function unflash()
  {
    unset($_SESSION['_flash']);
  }

	// $_SESSION 초기화
  public static function flush()
  {
    $_SESSION = [];
  }

	// $_SESSION 초기화 및 브라우저의 PHPSESSID 쿠키 초기화
  public static function destroy()
  {
    static::flush();

    session_destroy();

    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']); // 3600 = 1hour
  }
}
```

Core\Authenticator.php

```php
public function logout()
  {
		// 세션 클래스를 사용하여 세션 및 세션 쿠키 초기화
    Session::destroy();
  }
```

## **45 [Flash Old Form Data to the Session](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/45)**

<aside>
💡 **Now that we understand how to temporarily "flash" data to the session, we can now return to the topic of displaying "old" form data to the user.**

</aside>

VIEW - create.view.php

사용자가 입력한 값이 유효성 검사를 통과 하지 않았 때 이전 입력 값을 유지한다.

PRG

- POST - 유효성 검사를 하고 나서 이전 입력 값을 세션에 저장한다.
  - `$_SESSION[’_flash’][’old’][’email’]`
- GET - 폼 페이지를 요청 했을 때 세션에서 이전 입력 값을 가져 온다.

```php
<input
  id="email"
  name="email"
  type="email"
  value="<?= old('email') ?>"
>
```

CONTROLLER - Http\controllers\session\store.php

리다이렉트 하기 전에 세션에 폼 데이터를 담는다.

```php
Session::flash('old',  [
  'email' => $_POST['email']
]);

return redirect('/login');
```

FUNCTIONS - Core\functions.php

뷰에서 간편하게 사용할 수 있도록 세션 클래스의 정적 메서드를 사용하는 유틸 함수를 정의한다. 기본값을 전달 할 경우, 세션 데이터를 찾을 수 없을 때 인자로 전달한 기본값을 사용한다. ex. 현재 사용자의 이메일을 전달 할 수 있다.

`old('email', $_user()->email)`

```php
function old($key, $default = '')
{
    return Session::get('old')[$key] ?? $default;
}
```

## **46 [Automatically Redirect Back Upon Failed Validation](https://laracasts.com/series/php-for-beginners-2023-edition/episodes/46)**

<aside>
💡 **Next up, we'll learn how to automatically redirect back to the form upon failed validation. If we can manage to get this to work, we'll remove a significant amount of duplication and clutter from our various controllers.**

</aside>

어플리케이션에서 폼 양식이 여러 곳에 존재하는 경우 각 폼 마다 중복된 코드가 작성 될 수 있다. (폼 인스턴스 생성, 인가, 세션 접근, 리다이렉트)

중복 되는 코드를 상위 파일로 옮겨 불필요한 중복을 피할 수 있다.

한 곳에서 유효성 에러 관리 - index.php

```php
try {
		// 컨트롤러를 실행 했을 때
    $router->route($uri, $method);
} catch (ValidationException $exception) {
		// 유효성 에러가 발생하면 세션에 에러와 기존 입력 값을 저장하고
    Session::flash('errors',  $exception->errors);
    Session::flash('old',  $exception->old);
		// 이전 페이지로 리다이렉트 한다.
    return redirect($router->previousUrl());
}
```

폼 컨트롤러 - session/store.php

```php
// 유효성 검사
// 정적 메서드를 사용하여 각 입력값에 대해 유효성 검사를 하고 인스턴스를 변수에 담는다.
// 유효성 검사를 통과하지 못한 경우 ValidationException 을 발생 시킨다.
$form = LoginForm::validate($attributes = [
  'email' => $_POST['email'],
  'password' => $_POST['password']
]);

// 예외가 발생 하지 않았다면
// 인증 처리를 하고
$signedIn = (new Authenticator)->attempt(
  $attributes['email'],
  $attributes['password']
);

// 인증 처리가 실패한 경우
if (!$signedIn) {
  // LoginForm 인스턴스에 에러 메시지를 추가한 다음
	// 에러 객체를 던진다.
  $form
    ->error(
      'password',
      'No matching account found for that email address and password.'
    )->throw();
}

// 모든 과정을 문제 없이 통과됐다면
// 홈페이지로 리다이렉트 한다.
redirect('/');
```

폼 클래스 - LoginForm.php

```php
class LoginForm
{
  protected $errors = [];

  // 접근자 자료형 속성명 public array $attributes
	// 생성자 함수의 매개 변수에서 인스턴스의 속성을 지정
  public function __construct(public array $attributes)
  {
		// 생성자 함수 내에서 유효성 검사
    if (!Validator::email($attributes['email'])) {
      $this->errors['email'] = 'Please provide a valid email address';
    }

    if (!Validator::string($attributes['password'])) {
      $this->errors['password'] = 'Please provide a valid password';
    }

		// 유효성 검사 결과를 반환한다. (boolean)
    return empty($this->errors);
  }

  public static function validate($attributes)
  {
		// 정적 메서드 validate 에 전달된 이메일과 비밀번호를 사용하여 인스턴스를 생성하고
    $instance = new static($attributes);

		// 유효성 검사가 실패한 경우에는 에러 객체를 던지고
		// 통과한 경우 인스턴스를 반환한다.
    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function throw()
  {
    ValidationException::throw($this->errors(), $this->attributes);
  }

  public function failed()
  {
    return count($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  }

  public function error($field, $message)
  {
    $this->errors[$field] = $message;

    return $this;
  }
}
```

에러 객체 - ValidationException.php

```php
class ValidationException extends \Exception
{
  public readonly array $errors; // only assign once 재할당 금지
  public readonly array $old;

  public static function throw($errors, $old)
  {
    $instance = new static;

    $instance->errors = $errors;
    $instance->old = $old;

    throw $instance;
  }
}
```

Router.php

```php
public function previousUrl()
{
	// 이전 페이지의 Url 을 반환
  return $_SERVER['HTTP_REFERER'];
}
```