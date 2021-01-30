<?php
require "includes/bootstrap.inc.php";
use Tracy\Debugger;
Debugger::enable();


$pdo = DB::getConnection();
$stmt = $pdo->prepare("SELECT * FROM `room` ORDER BY `name`");
$stmt->execute([]);

$m = new MustacheRunner();
echo $m->render("head", ["title" => "Simple DB connection"]);
echo $m->render("roomList", ["roomDetail" => "room.php", "rooms" => $stmt]);
echo $m->render("foot");

