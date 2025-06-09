<?php

require_once('vendor/autoload.php');

use Uph\Database\DB;
use Uph\Database\Twig;

$id = intval($_GET['id'] ?? null);

if (!$id) {
    header('Bad Request', true, 400);
    die('Bad Request');
}

$db = DB::getDB();
$q = $db->prepare(
    'SELECT * FROM todo WHERE id = :id'
);
$q->execute(['id' => $id]);

$todo = $q->fetch();
if (!$todo) {
    header('Not Found', true, 404);
    die('Not Found');
}

$twig = Twig::make('templates');
echo $twig->render('form.twig.html', [
    'action' => "update.php?id={$id}",
    'task' => $todo['task'],
    'status' => $todo['status'],
]);