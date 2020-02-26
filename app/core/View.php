<?php 

namespace App\Core;

class View
{
    public function render(Page $page)
    {
       return $this->renderLayout($page, $this->renderView($page));
    }
    private function renderLayout(Page $page, $content)
    {
        $layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/public/layouts/{$page->layout}.php";

        if (file_exists($layoutPath)) {
            ob_start();
            $title = $page->title;
            $jsurl = $page->data['jsurl'];
            include_once $layoutPath;
            return ob_get_clean();
        }else {
            echo "Fayl topilmadi";
        }
    }
    private function renderView(Page $page)
    {
        if ($page->view) {
            $viewPath = $_SERVER['DOCUMENT_ROOT'] . "/app/views/{$page->view}.php";
            if (file_exists($viewPath)) {
                ob_start();
                $data = $page->data;
                extract($data);
                include_once $viewPath;
                return ob_get_clean();
                }
        }else {
            echo "View topilmadi";
        }
    }
}
