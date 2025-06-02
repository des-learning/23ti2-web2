<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;
use Uph\Database\Twig;

$twig = Twig::make('templates');
$db = DB::getDB();
$q = $db->query('SELECT * FROM todo');
$rows = $q->fetchAll();
echo $twig->render(
    'list.twig.html',
    [
        'rows' => $rows,
        'rows_count' => count($rows),
    ]
);