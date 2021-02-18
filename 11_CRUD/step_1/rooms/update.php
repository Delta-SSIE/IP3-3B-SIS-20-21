<?php
require "../includes/bootstrap.inc.php";


final class UpdateRoomPage extends BaseDBPage {

    const STATE_FORM_REQUESTED = 1;
    const STATE_FORM_SENT = 2;
    const STATE_PROCESSED = 3;

    const RESULT_SUCCESS = 1;
    const RESULT_FAIL = 2;

    private int $state;
    private int $result = 0;
    private array $room;

    protected function setUp(): void
    {
        parent::setUp();

        $this->state = $this->getState();

        if ($this->state === self::STATE_PROCESSED) {
            //je hotovo, reportujeme
            if ($this->result === self::RESULT_SUCCESS) {
                $this->extraHeaders[] = "<meta http-equiv='refresh' content='5;url=./'>";
                $this->title = "Místnost upravena";
            } elseif ($this->result === self::RESULT_FAIL) {
                $this->title = "Aktualizace místnosti selhala";
            }
        } elseif ($this->state === self::STATE_FORM_SENT) {
            //načíst data
            $this->room = $this->readPost();
            //validovat data
            if ($this->isDataValid($this->room)){
                //uložit a přesměrovat
                if ($this->update($this->room)) {
                    //přesměruj se zprávou "úspěch"
                    $this->redirect(self::RESULT_SUCCESS);
                } else {
                    //přesměruj se zprávou "neúspěch"
                    $this->redirect(self::RESULT_FAIL);
                }
            } else {
                //jít na formulář nebo
                $this->state = self::STATE_FORM_REQUESTED;
                $this->title = "Aktualizovat místnost : Neplatný formulář";
            }
        } else {
            //přejít na formulář
            $this->title = "Aktualizovat místnost";
            $room_id = $this->findId();
            if (!$room_id)
                throw new RequestException(400);
            $this->room = $this->readDB($room_id);
            if (!$this->room)
                throw new RequestException(404);
        }

    }

    protected function body(): string
    {
        if ($this->state === self::STATE_FORM_REQUESTED) {
            return $this->m->render("roomForm", ['update' => true, 'room' => $this->room ]);
        } elseif ($this->state === self::STATE_PROCESSED) {
            if ($this->result === self::RESULT_SUCCESS) {
                return $this->m->render("roomSuccess", ["message" => "Místnost byla úspěšně aktualizována."]);
            } elseif ($this->result === self::RESULT_FAIL) {
                return $this->m->render("roomFail", ["message" => "Aktualizace místnosti selhala"]);
            }
        }
    }

    private function getState() : int {
        //rozpoznání processed
        $result = filter_input(INPUT_GET, 'result', FILTER_VALIDATE_INT);

        if ($result === self::RESULT_SUCCESS) {
            $this->result = self::RESULT_SUCCESS;
            return self::STATE_PROCESSED;
        } elseif ($result === self::RESULT_FAIL) {
            $this->result = self::RESULT_FAIL;
            return self::STATE_PROCESSED;
        }

        $action = filter_input(INPUT_POST, 'action');
        if ($action === 'update') {
            return self::STATE_FORM_SENT;
        }

        return self::STATE_FORM_REQUESTED;
    }

    private function findId() : ?int {
        $room_id = filter_input(INPUT_GET, 'room_id', FILTER_VALIDATE_INT);
        return $room_id;
    }

    private function readPost() : array {
        $room = [];

        $room['room_id'] = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
        $room['name'] = filter_input(INPUT_POST, 'name');
        $room['no'] = filter_input(INPUT_POST, 'no');
        $room['phone'] = filter_input(INPUT_POST, 'phone');

        if (!$room['phone'])
            $room['phone'] = null;

        return $room;
    }

    private function readDB(int $room_id) : array {
        $query = "SELECT room_id, name, no, phone FROM room WHERE room_id = :room_id;";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':room_id', $room_id);
        $stmt->execute();

        $room = $stmt->fetch(PDO::FETCH_ASSOC);

        return $room;
    }

    private function isDataValid(array $room) : bool {
        if (!$room['name'])
            return false;

        if (!$room['no'])
            return false;

        return true;
    }

    private function update(array $room) {
        $query = "UPDATE room SET name = :name, phone = :phone, no = :no WHERE room_id = :room_id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':room_id', $room['room_id']);
        $stmt->bindParam(':name', $room['name']);
        $stmt->bindParam(':no', $room['no']);
        $stmt->bindParam(':phone', $room['phone']);

        return $stmt->execute();
    }

    private function redirect(int $result) : void {
        $location = strtok($_SERVER['REQUEST_URI'], '?');
        header("Location: {$location}?result={$result}");
        exit;
    }

}

$page = new UpdateRoomPage();
$page->render();

