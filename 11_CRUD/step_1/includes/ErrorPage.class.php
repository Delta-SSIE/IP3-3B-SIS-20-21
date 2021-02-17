<?php


class ErrorPage extends BasePage
{
    private int $httpErrCode;

    public function __construct($httpErrCode = 500)
    {
        $this->httpErrCode = $httpErrCode;
        $this->title = "Error $this->httpErrCode";
        parent::__construct();
    }

    protected function setUp(): void
    {
        parent::setUp();
        http_response_code($this->httpErrCode);
    }

    protected function body(): string
    {
        switch ($this->httpErrCode) {
            case 400:
                return "<h1>Error 400: Bad request</h1>";
            case 404:
                return "<h1>Error 404: Not found</h1>";
            case 500:
                return "<h1>Internal server error</h1>";
            default:
                return "<h1>Error {$this->httpErrCode} encountered</h1>";
        }
    }
}