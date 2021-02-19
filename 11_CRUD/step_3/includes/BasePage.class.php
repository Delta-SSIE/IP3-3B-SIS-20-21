<?php


abstract class BasePage
{

    protected MustacheRunner $m;
    protected string $title;
    protected array $extraHeaders = [];

    /**
     * BasePage constructor.
     */
    public function __construct()
    {
        $this->m = new MustacheRunner();
    }


    public function render() {
        try {
            $this->setUp();
            $html = $this->header();
            $html .= $this->body();
            $html .= $this->footer();
            echo $html;
            $this->wrapUp();
        } catch (RequestException $e) {
            $ePage = new ErrorPage($e->getStatusCode());
            $ePage->render();
        } catch (Exception $e) {
            $ePage = new ErrorPage();
            $ePage->render();
        }
        exit;
    }


    protected function setUp() : void {}

    protected function header() : string {
        return $this->m->render("head", ["title" => $this->title, 'extraHeaders' => $this->extraHeaders]);
    }

    protected abstract function body() : string;

    protected function  footer() : string {
        return $this->m->render("foot");
    }

    protected function wrapUp() : void{}

}