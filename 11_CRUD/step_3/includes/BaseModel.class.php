<?php


abstract class BaseModel
{
    protected string $dbTable;
    protected string $primaryKeyName;
    protected ?int $primaryKey;

    //seznam polozek
    protected array $dbKeys;

    /**
     * BaseModel constructor.
     */
    public function __construct( $data = null ) {
        if (is_array($data))
            $this->hydrateFromArray($data);

        elseif (is_object($data))
            $this->hydrateFromObject($data);
    }

    /**
     * @return string
     */
    public function getDbTable(): string
    {
        return $this->dbTable;
    }

    /**
     * @return string
     */
    public function getPrimaryKeyName(): string
    {
        return $this->primaryKeyName;
    }

    /**
     * @return int|null
     */
    public function getPrimaryKey(): ?int
    {
        return $this->primaryKey;
    }

    /**
     * @return array
     */
    public function getDbKeys(): array
    {
        return $this->dbKeys;
    }

    public function insert() : bool {
        $bindings = [];
        foreach ($this->dbKeys as $key) {
            $bindings[":$key"] = $this->{$key};
        }

        $query = "INSERT INTO {$this->dbTable} (".implode(",", $this->dbKeys).") VALUES (".implode(",", array_keys($bindings)).")";

        $stmt = DB::getConnection()->prepare($query);

        if (!$stmt->execute($bindings))
            return false;

        $this->primaryKey = DB::getConnection()->lastInsertId();
        return true;
    }


    public function update() : bool {
        $bindings = [":{$this->primaryKeyName}" => $this->primaryKey];
        foreach ($this->dbKeys as $key) {
            $bindings[":$key"] = $this->{$key};
        }

        $sqlChunks = [];
        foreach ($this->dbKeys as $key) {
            $sqlChunks[] = "$key = :$key";
        }
        $query = "UPDATE {$this->dbTable} SET ".implode(",",$sqlChunks)." WHERE {$this->primaryKeyName} = :{$this->primaryKeyName}";

        $stmt = DB::getConnection()->prepare($query);
        return $stmt->execute($bindings);
    }

    public function delete() : bool {
        $query = "DELETE FROM {$this->dbTable} WHERE {$this->primaryKeyName} = :{$this->primaryKeyName}";

        $stmt = DB::getConnection()->prepare($query);
        $stmt->bindParam(":{$this->primaryKeyName}", $this->primaryKey);

        return $stmt->execute();
    }

    public static function deleteById(int $primaryKey) : bool {
        $instance = new static();
        $instance->primaryKey = $primaryKey;
        return $instance->delete();
    }

    public static function getById(int $primaryKey) : ?self {
        $instance = new static();

        $allKeys = $instance->dbKeys;
        $allKeys[] = $instance->primaryKeyName;

        $query = "SELECT ".implode(",", $allKeys)." FROM {$instance->dbTable} WHERE {$instance->primaryKeyName} = :{$instance->primaryKeyName};";

        $stmt = DB::getConnection()->prepare($query);
        $stmt->bindParam(":{$instance->primaryKeyName}", $primaryKey);

        if (!$stmt->execute())
            return null;

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data)
            return null;

        $instance->hydrateFromArray($data);

        return $instance;
    }


    private function hydrateFromArray(array $data) : void {
        if (array_key_exists($this->primaryKeyName, $data)) {
            $this->primaryKey = $data[$this->primaryKeyName];
        }

        foreach ($this->dbKeys as $key) {
            if (array_key_exists($key, $data)) {
                $this->$key = $data[$key];
            }
        }
    }

    private function hydrateFromObject(object $object) : void {
        if (isset($data->{$this->primaryKeyName})) {
            $this->primaryKey = $data->{$this->primaryKeyName};
        }

        foreach ($this->dbKeys as $key) {
            if (isset($data->$key)) {
                $this->$key = $data->$key;
            }
        }
    }

    abstract public function isValid() : bool;
}