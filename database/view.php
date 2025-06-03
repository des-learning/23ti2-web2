<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;
use Uph\Database\Twig;

$id = intval($_GET['id'] ?? null);

if (!$id) {
    header('Location: list.php', true, 302);
    die();
}

$db = DB::getDB();
$q = $db->prepare(
    'SELECT * FROM todo WHERE id = :id'
);
$q->execute(['id' => $id]);
$todo = $q->fetch();

if (!$todo) {
    header('Not Found', true, 404);
    echo 'Todo not found';
    die();
}

$twig = Twig::make('templates');
echo $twig->render('view.twig.html', 
    ['todo' => $todo]);
