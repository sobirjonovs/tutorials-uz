<?php 

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        $this->title = 'Bosh sahifa';
        $categories = (new Page)->getCatList();
        return $this->render('home/index',['jsurl'=>'','categories'=>$categories]);
    }    
    public function about()
    {
        $this->title = "Biz haqimizda";
        return $this->render('home/aboutus',['jsurl'=>'']);
    }
    public function contact()
    {
    	$this->title = 'Bog\'lanish';
    	return $this->render('home/contact',['jsurl'=>'']);
    }
    public function gallery()
    {
    	$this->title = 'Rasmlar';
    	return $this->render('home/gallery',['jsurl'=>'']);
    }
    public function login()
    {
    	$this->title = 'Avtorizatsiya';
    	return $this->render('home/login',['jsurl'=>'']);
    }
    public function register()
    {
    	$this->title = 'Registratsiya';
    	return $this->render('home/register',['jsurl'=>'']);
    }
    public function blogList()
    {
        $this->title = "Blog postlar";
        $blogList = (new Page)->fetchBlogList();
        return $this->render('home/blog',['jsurl'=>'','blogs'=>$blogList]);
    }
    public function blogPost()
    {
        $blogList = (new Page)->fetchBlogList();
        $page = new Page;
        $url = explode("/",$_SERVER['REQUEST_URI']);
        $realUrl = end($url);
        $lastTenPosts = (new Page)->fetchLastPost();
        foreach ($blogList as $blog) {
            if ($blog['blog_post_slug'] == $realUrl) {
                $this->title = $blog['blog_title'];
                $this->content = $blog['blog_post'];
                $this->date = $blog['blog_post_date'];
                $this->views = $blog['blog_views'];
                $this->author = $blog['blog_post_author'];
                if (isset($_SERVER['REMOTE_ADDR'])) {
                $id = $blog['blog_id'];
                $ip = $_SERVER['REMOTE_ADDR'];
                $execute = [':ip'=>$ip];
                $page->insert('user_ip',['columns'=>'ip_addr, date','values'=>':ip, NOW()','execute'=>$execute]);
                $datas = ['ip'=>$ip,'row'=>'user_ip','table'=>'ip_addr'];
                $page->deleteAfterMinute();
                $counts = $page->rowCounter($datas);
                if ($counts < 2) {
                  $page->updateBlog('blog',['row'=>'blog_views','id'=>$id,'quantity'=>1]);
                 }
               }
                return $this->render('home/blog_post',['jsurl'=>'','title'=>$this->title,'content'=>$this->content,'date'=>$this->date,'author'=>$this->author,'lastPost'=>$lastTenPosts,'views'=>$this->views]);
            }
        }
        $this->title = "Sahifa topilmadi";
     return $this->render('error/notFound',['jsurl'=>'']);
    }
}
