<?php 

namespace App\Core;

class Controller
{
    protected $layout = 'default';

    protected function render($view, $data = []) {
        return new Page($this->layout, $this->title, $view, $data);
    }
}
