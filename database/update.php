<?php

require_once('vendor/autoload.php');

use Uph\Database\DB;

$id = intval($_GET['id'] ?? 0);
if (!$id) {
    Header('Bad Request', true, 400);
    die('Bad Request');
}

$task = $_POST['task'] ?? null;
$status = $_POST['status'] ?? null;
if (!$task || !$status) {
    Header('Bad Request', true, 400);
    die ('Bad Request');
}

$db = DB::getDB();
$q = $db->prepare(
    'SELECT * FROM todo WHERE id = :id'
);
$q->execute(['id' => $id]);
$todo = $q->fetch();

if (!$todo) {
    Header('Not Found', true, 404);
    die('Not Found');
}

$q = $db->prepare(
    <<<SQL
    UPDATE todo SET task = :task, 
    status = :status,
    updated_at = :updatedAt WHERE id = :id
    SQL
);
$q->execute([
    'id' => $id,
    'task' => $task,
    'status' => $status,
    'updatedAt' => (new DateTime())->format('Y-m-d h:i:s'), 
]);

header(
    "Location: view.php?id={$id}",
    true,
    302
);