<?php 

namespace App\Controllers;

use App\Core\Controller;

class ErrorController extends Controller
{
    public function notfound()
    {
        $this->title = "404 not Found";
        return $this->render('error/notFound',['jsurl'=>'']);
    }
}
