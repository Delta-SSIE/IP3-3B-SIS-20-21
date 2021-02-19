<?php


final class RoomModel extends BaseModel
{

    protected string $dbTable = "room";
    protected string $primaryKeyName = "room_id";

    protected array $dbKeys = ["name", "no", "phone"];

    public string $name = "";
    public string $no = "";
    public ?string $phone = null;

    public function isValid(): bool {
        if (!$this->name)
            return false;

        if (!$this->no)
            return false;

        return true;
    }

}