<?php 

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Page;

class TutorialsController extends Controller
{
    public function tutorial()
    {
        $urlArr = explode("/",$_SERVER['REQUEST_URI']);
        $catName = ucfirst(strtolower(end($urlArr)));
        $tutorials = (new Page)->fetchData('tutorials',['category'=>strtoupper($catName)]);
        $this->title = $catName.' darslari';   
        return $this->render('tutorials/tutorial', ['tutorials'=>$tutorials,'jsurl'=>'','catname'=>$catName]);
}
    public function pager()
    {
        $page = new Page;
        $urlArr = explode("/",$_SERVER['REQUEST_URI']);
        $catName = $urlArr[2];
        $slug = end($urlArr);
        $tutorials = $page->fetchData('tutorials',['category'=>$catName]);
        foreach ($tutorials as $tutorial) {
        if ($slug == $tutorial['slug']) {
              $this->title = $tutorial['title'];
              $this->content = $tutorial['content'];
              if (isset($_SERVER['REMOTE_ADDR'])) {
                $id = $tutorial['id'];
                $ip = $_SERVER['REMOTE_ADDR'];
                $execute = [':ip'=>$ip];
                $page->insert('user_ip',['columns'=>'ip_addr, date','values'=>':ip, NOW()','execute'=>$execute]);
                $datas = ['ip'=>$ip,'row'=>'user_ip','table'=>'ip_addr'];
                $page->deleteAfterMinute();
                $counts = $page->rowCounter($datas);
                if ($counts < 2) {
                  $page->update('tutorials',['row'=>'views','id'=>$id,'quantity'=>1]);
                 }
               }
               return $this->render('tutorials/pager', ['title'=>$this->title,'content'=>$this->content,'jsurl'=>'','tutorials'=>$tutorials,'slug'=>$slug]);
            }
          }
        $this->title = "Sahifa topilmadi";
     return $this->render('error/notFound',['jsurl'=>'']);
    }
}
