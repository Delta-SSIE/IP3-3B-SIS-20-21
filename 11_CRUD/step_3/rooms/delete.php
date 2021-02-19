<?php
require "../includes/bootstrap.inc.php";


final class DeleteRoomPage extends BaseCRUDPage {

    private ?int $room_id;

    protected function setUp(): void
    {
        parent::setUp();

        $this->state = $this->getState();

        if ($this->state === self::STATE_PROCESSED) {
            //je hotovo, reportujeme
            if ($this->result === self::RESULT_SUCCESS) {
                $this->extraHeaders[] = "<meta http-equiv='refresh' content='5;url=./'>";
                $this->title = "Místnost smazána";
            } elseif ($this->result === self::RESULT_FAIL) {
                $this->title = "Smazání místnosti selhalo";
            }
        } elseif ($this->state === self::STATE_DELETE_REQUESTED) {
            //načíst data
            $this->room_id = $this->readPost();
            //validovat data
            if (!$this->room_id) {
                throw new RequestException(400);
            }

            //smazat a přesměrovat
            $token = bin2hex( random_bytes(20) );

            if (RoomModel::deleteById($this->room_id)) {
                //přesměruj se zprávou "úspěch"
                $this->sessionStorage->set($token, ['result' => self::RESULT_SUCCESS]);
            } else {
                //přesměruj se zprávou "neúspěch"
                $this->sessionStorage->set($token, ['result' => self::RESULT_FAIL]);
            }
            $this->redirect($token);
        }
    }

    protected function body(): string
    {
        if ($this->result === self::RESULT_SUCCESS) {
            return $this->m->render("roomSuccess", ["message" => "Místnost byla úspěšně smazána."]);
        } elseif ($this->result === self::RESULT_FAIL) {
            return $this->m->render("roomFail", ["message" => "Smazání místnosti selhalo."]);
        }
    }

    protected function getState() : int {
        //rozpoznání processed
        if ($this->isProcessed())
            return self::STATE_PROCESSED;

        return self::STATE_DELETE_REQUESTED;
    }

    private function readPost() : ?int {
        $room_id = filter_input(INPUT_POST, 'room_id', FILTER_VALIDATE_INT);
        return $room_id;
    }

}

$page = new DeleteRoomPage();
$page->render();

