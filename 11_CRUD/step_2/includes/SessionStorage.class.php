<?php


final class SessionStorage
{
    private string $baseKey;

    /**
     * SessionStorage constructor.
     */
    public function __construct()
    {
        session_start();
        $this->baseKey = Config::APP_NAME;
        if (!array_key_exists($this->baseKey, $_SESSION) || !is_array($_SESSION[$this->baseKey])) {
            $_SESSION[$this->baseKey] = [];
        }
    }

    public function get($key) {
        return $_SESSION[$this->baseKey][$key] ?? null;
    }

    public function set($key, $value) : void {
        $_SESSION[$this->baseKey][$key] = $value;
    }
}