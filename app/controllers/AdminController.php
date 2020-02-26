<?php 

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Admin;

class AdminController extends Controller
{
    public $layout = 'admin';

    public function logout()
    {
        $this->title = "Chiqish";
        session_destroy();
        header('Location: /admin');
    }
    public function add()
    {
        if (isset($_SESSION['admin'])) {
        $this->title = 'Darslik qo`shish';
        $insert = new Admin;
            if (!empty($_POST['submit'])) {
                $url = preg_replace('~([^a-zA-B0-9]+)~', '-', strtolower($_POST['title']));
                $real = preg_replace('#[-]{2,}#','-', $url);
                $execute = [':title'=>$_POST['title'],':author'=>$_POST['author'],':content'=>$_POST['editor'],':category'=>$_POST['category'],':slug'=>trim($real,'-')];
                $values = ['columns'=>'title, author, content, category, slug','values'=>':title,:author,:content, :category,:slug','execute'=>$execute];
                $insert->insert('tutorials',$values);
                header("Location: /admin/add");
            }
        $param = ['jsurl'=>'<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>','cats'=>$insert->getCatList()];
        return $this->render('admin/add_post',$param);
    }else{
        header('Location: /admin');
    }
    }    
    public function dashboard()
    {
        if (isset($_SESSION['admin'])) {
            $this->title = "Boshqaruv paneli";
            $dashboard = new Admin;
            $tutorials = $dashboard->getTutorials();
            $category = $dashboard->getCatList();
            foreach ($tutorials as $key => $value) {
               $this->tutcount = ($key+1);
            }
            foreach ($category as $key => $value) {
                $this->catcount = ($key+1);
            }
            return $this->render('admin/dashboard',['jsurl'=>'','tutorials'=>$this->tutcount,'category'=>$this->catcount]);
        }else{
            header('Location: /admin');
        }
    }
    public function register()
    {
       $this->title = "Royhatdan o'tish";
       return $this->render('admin/register',['jsurl'=>'']);
    }
    public function error()
    {
       $this->title = "Royhatdan o'tish";
       return $this->render('admin/404',['jsurl'=>'']);
    }
    public function postList()
    {
        if (isset($_SESSION['admin'])) {
          $data = (new Admin)->getTutorials();
          $this->title = "Darslar ro'yhati";
          return $this->render('admin/post-list',['tutorials'=>$data,'jsurl'=>""]);
        }else{
            header('Location: /admin');
        }
    }
    public function blogList()
    {
        if (isset($_SESSION['admin'])) {
            $this->title = "Maqolalar ro'yhati";
        $data = (new Admin)->getBlogList();
        return $this->render('admin/blog_list',['jsurl'=>'','bloglist'=>$data]);
        }else{
            header("Location: /admin");
        }
    }
    public function addPost()
    {
        if (isset($_SESSION['admin'])) {
            $this->title = 'Maqola qo`shish';
        $insert = new Admin;
            if (!empty($_POST['submit'])) {
                $url = preg_replace("#([^a-zA-Bа-яА-ЯЁё0-9]+)#u", '-', strtolower($_POST['title']));
                $real = preg_replace('#[-]{2,}#','-', $url);
                if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                    $imgArr = explode('.',$_FILES['img']['name']);
                    $imgExtension = strval(end($imgArr));
                    $customImgName = $_SERVER['DOCUMENT_ROOT'] . "/upload/img".rand().'.'.$imgExtension;
                    move_uploaded_file($_FILES['img']['tmp_name'], $customImgName);
                }
                $execute = [':title'=>$_POST['title'],':author'=>$_POST['author'],':content'=>$_POST['editor'],':slug'=>trim($real,'-'),':img'=>$customImgName];
                $values = ['columns'=>'blog_title, blog_post_author, blog_post, blog_post_slug, blog_post_img, blog_post_date','values'=>':title,:author,:content,:slug, :img, NOW()','execute'=>$execute];
                $insert->insert('blog',$values);
                header("Location: /admin/add-post");
            }
        $param = ['jsurl'=>'<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>'];
        return $this->render('admin/add_thread',$param);
        }else{
            header("Location: /admin");
        }
    }
    public function category()
    {
        if (isset($_SESSION['admin'])) {
            $this->title = "Kategoriyalar ro'yhati";
        $insert = new Admin;
            if (!empty($_POST['add_cat'])) {
                $execute = [':name'=>$_POST['cat_name'],':image'=>$_POST['cat_image_path']];
                $values = ['columns'=>'cat_name, cat_image_path','values'=>':name, :image','execute'=>$execute];
                $insert->insert('category',$values);
                header("Location: /admin/category");
            }
        $cat_list = $insert->getCatList();
        $param = ['jsurl'=>'','catlist'=>$cat_list];
        return $this->render('admin/category',$param);
        }else{
            header("Location: /admin");
        }
    }
    public function deleteThread()
    {
        if (isset($_SESSION['admin'])) {
            $category = new Admin;
            $url = explode('/',$_SERVER['REQUEST_URI']);
            $id = end($url);
            if (isset($id)) {
                $category->deleteThread('blog',$id);
                header("Location: /admin/blog-list");
            }else
            {
                echo "<script>alert('Id noto`g`ri') </script>";
            }
        }else{
            header("Location: /admin");
        }
    }
    public function deletePost()
    {
        if (isset($_SESSION['admin'])) {
            $category = new Admin;
            $url = explode('/',$_SERVER['REQUEST_URI']);
            $id = end($url);
            if (isset($id)) {
                $category->deleteData('tutorials',$id);
                header("Location: /admin/post-list");
            }else
            {
                echo "<script>alert('Id noto`g`ri') </script>";
            }
        }else{
            header("Location: /admin");
        }
    }
    public function editBlog()
    {
        if (isset($_SESSION['admin'])) {
            $this->title = "Tahrirlash";
        $edit = new Admin;
        $url = explode('/',$_SERVER['REQUEST_URI']);
        $id = end($url);
        $blogs = $edit->getBlogList();
        foreach ($blogs as $blog) {
            if ($id == $blog['blog_id']) {
                $btitle = $blog['blog_title'];
                $bauthor = $blog['blog_post_author'];
                $beditor = $blog['blog_post'];
                if (!empty($_POST['submit'])) {
                    $slugurl = preg_replace('~([^a-zA-B0-9]+)~', '-', strtolower($_POST['title']));
                    $real = trim(preg_replace('#[-]{2,}#','-', $slugurl),'-');
                    $title = $_POST['title'];
                    $author = $_POST['author'];
                    $editor = $_POST['editor'];
                    $edit->updateBlog('blog',['rowVal'=>"blog_title = '$title', blog_post_author = '$author', blog_post = '$editor', blog_post_slug = '$real'",'id'=>$blog['blog_id']]);
                    $url = "/admin/blog-list/edit/".$blog['blog_id'];
                    header("location: $url");
                }
                 $params = ['jsurl'=>'<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>','btitle'=>$btitle,'bauthor'=>$bauthor,'beditor'=>$beditor,'id'=>$blog['blog_id']];
                return $this->render('admin/blog_edit',$params);
            }
        }
        }else{
            header("location: /admin");
        }
    }
    public function editPost()
    {
        if (isset($_SESSION['admin'])) {
            $this->title = "Tahrirlash";
        $edit = new Admin;
        $url = explode('/',$_SERVER['REQUEST_URI']);
        $id = end($url);
        $tut = $edit->getTutorials();
        $cat = $edit->getCatList();
        foreach ($tut as $tuts) {
            if ($id == $tuts['id']) {
                $ititle = $tuts['title'];
                $icategory = $tuts['category'];
                $iauthor = $tuts['author'];
                $ieditor = $tuts['content'];
                if (!empty($_POST['submit'])) {
                    $slugurl = preg_replace('~([^a-zA-B0-9]+)~', '-', strtolower($_POST['title']));
                    $real = trim(preg_replace('#[-]{2,}#','-', $slugurl),'-');
                    $title = addslashes($_POST['title']);
                    $category = addslashes($_POST['category']);
                    $author = addslashes($_POST['author']);
                    $editor = addslashes($_POST['editor']);
                    $edit->update('tutorials',['rowVal'=>"title = '$title', category = '$category', author = '$author', content = '$editor', slug = '$real'",'id'=>$tuts['id']]);
                    $url = "/admin/post-list/edit/".$tuts['id'];
                    header("location: $url");
                }
                 $params = ['jsurl'=>'<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>','cats'=>$cat,'title'=>$ititle,'category'=>$icategory,'author'=>$iauthor,'editor'=>$ieditor,'id'=>$tuts['id']];
                return $this->render('admin/post_edit',$params);
            }
        }
        }else{
            header("Location: /admin");
        }
    }
    public function delete()
    {
        if (isset($_SESSION['admin'])) {
            $category = new Admin;
            $url = explode('/',$_SERVER['REQUEST_URI']);
            $id = end($url);
            if (isset($id)) {
                $category->deleteData('category',$id);
                header("Location: /admin/category");
            }else
            {
                echo "<script>alert('Id noto`g`ri') </script>";
            }
        }else{
            header("Location: /admin");
        }
    }
    public function edit()
    {
        if (isset($_SESSION['admin'])) {
            $this->title = "Tahrirlash";
        $edit = new Admin;
        $url = explode('/',$_SERVER['REQUEST_URI']);
        $id = end($url);
        $cat = $edit->getCatList();
        foreach ($cat as $data) {
            if ($id == $data['id']) {
                $cat_name = $data['cat_name'];
                $cat_image_path = $data['cat_image_path'];
                if (!empty($_POST['submit'])) {
                    $name = $_POST['name'];
                    $image = $_POST['image'];
                    $edit->update('category',['rowVal'=>"cat_name = '$name', cat_image_path = '$image'",'id'=>$data['id']]);
                    $url = "/admin/category/edit/".$data['id'];
                    header("location: $url");
                }
                 $params = ['jsurl'=>'','namer'=>$cat_name,'imager'=>$cat_image_path,'id'=>$data['id']];
                return $this->render('admin/edit',$params);
            }
        }
        }else{
            header("Location: /admin");
        }
    }
    public function comments()
    {
        if (isset($_SESSION['admin'])) {
            $this->title = "Izohlar ro'yhati";
        return $this->render('admin/comments',['jsurl'=>'']);
        }else{
            header("Location: /admin");
        }
    }
}
