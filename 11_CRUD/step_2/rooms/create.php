<?php
require "../includes/bootstrap.inc.php";


final class CreateRoomPage extends BaseCRUDPage {

    private RoomModel $room;

    protected function setUp(): void
    {
        parent::setUp();

        $this->state = $this->getState();

        if ($this->state === self::STATE_PROCESSED) {
            //je hotovo, reportujeme
            if ($this->result === self::RESULT_SUCCESS) {
                $this->extraHeaders[] = "<meta http-equiv='refresh' content='5;url=./'>";
                $this->title = "Místnost založena";
            } elseif ($this->result === self::RESULT_FAIL) {
                $this->title = "Založení místnosti selhalo";
            }
        } elseif ($this->state === self::STATE_FORM_SENT) {
            //načíst data
            $this->room = $this->readPost();
            //validovat data
            if ($this->room->isValid()){

                $token = bin2hex( random_bytes(20) );

                //uložit a přesměrovat
                if ($this->room->insert()) {
                    //přesměruj se zprávou "úspěch"
                    $this->sessionStorage->set($token, ['result' => self::RESULT_SUCCESS]);
                } else {
                    //přesměruj se zprávou "neúspěch"
                    $this->sessionStorage->set($token, ['result' => self::RESULT_FAIL]);
                }

                $this->redirect($token);

            } else {
                //jít na formulář nebo
                $this->state = self::STATE_FORM_REQUESTED;
                $this->title = "Založit místnost : Neplatný formulář";
            }
        } else {
            //přejít na formulář
            $this->title = "Založit místnost";
            $this->room = new RoomModel();
        }

    }

    protected function body(): string
    {
        if ($this->state === self::STATE_FORM_REQUESTED) {
            return $this->m->render("roomForm", ['create' => true, 'room' => $this->room]);
        } elseif ($this->state === self::STATE_PROCESSED) {
            if ($this->result === self::RESULT_SUCCESS) {
                return $this->m->render("roomSuccess", ["message" => "Místnost byla úspěšně vytvořena."]);
            } elseif ($this->result === self::RESULT_FAIL) {
                return $this->m->render("roomFail", ["message" => "Vytvoření místnosti selhalo"]);
            }
        }
    }

    protected function getState() : int {
        //rozpoznání processed
        if ($this->isProcessed())
            return self::STATE_PROCESSED;

        $action = filter_input(INPUT_POST, 'action');
        if ($action === 'create') {
            return self::STATE_FORM_SENT;
        }

        return self::STATE_FORM_REQUESTED;
    }

    private function readPost() : RoomModel {
        $room = [];
        $room['name'] = filter_input(INPUT_POST, 'name');
        $room['no'] = filter_input(INPUT_POST, 'no');
        $room['phone'] = filter_input(INPUT_POST, 'phone');

        if (!$room['phone'])
            $room['phone'] = null;

        return new RoomModel($room);
    }

}

$page = new CreateRoomPage();
$page->render();

