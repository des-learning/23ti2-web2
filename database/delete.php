<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;

$id = intval($_GET['id'] ?? null);

if (!$id) {
    header('Bad request', true, 400);
    die('Bad request');
}

$db = DB::getDB();
$q = $db->prepare(
    'DELETE FROM todo WHERE id = :id'
);
$q->execute(['id' => $id]);
header('Location: list.php', true, 302);
