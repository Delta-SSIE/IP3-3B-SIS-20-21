<?php
require "../includes/bootstrap.inc.php";


final class ListRoomsPage extends BaseDBPage {

    protected function setUp(): void
    {
        parent::setUp();
        $this->title = "Seznam místností";
    }

    protected function body(): string
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `room` ORDER BY `name`");
        $stmt->execute([]);
        return $this->m->render("roomList", ["roomDetail" => "room.php", "rooms" => $stmt]);
    }

}

$page = new ListRoomsPage();
$page->render();

