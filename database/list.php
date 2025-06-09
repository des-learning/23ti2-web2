<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;
use Uph\Database\Twig;

function filter(string $query): array
{
    $sql = $query;
    $where = [];
    $params = [];
    if ($_GET['search_task'] ?? '') {
        $where[] = 'task LIKE :search_task'; // array_push($where, 'task LIKE :search_task');
        $params['search_task'] = "%{$_GET['search_task']}%";
    }
    if ($_GET['search_status'] ?? '') {
        $where[] = 'status = :search_status';
        $params['search_status'] = $_GET['search_status'];
    }
    if (count($where)) {
        $sql .= ' WHERE ' . implode(' AND ', $where);
    }

    // untuk debug
    // die($sql);

    return ['sql' => $sql, 'params' => $params];
}

$twig = Twig::make('templates');
$db = DB::getDB();
$sql = 'SELECT * FROM todo';
$filter_params = filter($sql);
$sql = $filter_params['sql'];
$q = $db->prepare($sql);
$q->execute($filter_params['params']);

$rows = $q->fetchAll();
echo $twig->render(
    'list.twig.html',
    [
        'rows' => $rows,
        'search_task' => $_GET['search_task'] ?? '',
        'search_status' => $_GET['search_status'] ?? '',
        'rows_count' => count($rows),
    ]
);