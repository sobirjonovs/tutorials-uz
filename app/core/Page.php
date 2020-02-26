<?php 

namespace App\Core;

class Page
{
    private $title;
    private $layout;
    private $data;
    private $view;
    public function __construct($layout, $title = '', $view = null, $data = [])
    {
        $this->layout = $layout;
        $this->title = $title;
        $this->view = $view;
        $this->data = $data;
    }
    public function __get($proper)
    {
        return $this->$proper;
    }
}
