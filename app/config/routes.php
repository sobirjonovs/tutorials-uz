<?php 

use app\core\Route;

return [
    new Route('/','home','index'),
    new Route('/contact', 'home', 'contact'),
    new Route('/library','home','library'),
    new Route('/login','home','login'),
    new Route('/register','home','register'),
    new Route('/blog','home','blogList'),
    new Route('/blog/:title','home','blogPost'),
    new Route('/about-us','home','about'),
    //Tutorials
    new Route('/tutorial/:tut', 'tutorials','tutorial'),
    new Route('/tutorial/:tut/:id', 'tutorials','pager'),
    //Admin
    new Route('/admin/add', 'admin','add'),
    new Route('/admin/dashboard','admin','dashboard'),
    new Route('/admin/register','admin','register'),
    new Route('/admin/login','admin','login'),
    new Route('/admin/404','admin','error'),
    new Route('/admin/utilities-animation','admin','utility'),
    new Route('/admin/post-list','admin','postList'),
    new Route('/admin/category','admin','category'),
    new Route('/admin/comments','admin','comments'),
    new Route('/admin/category/delete/:id','admin','delete'),
    new Route('/admin/category/edit/:id','admin','edit'),
    new Route('/admin/post-list/delete/:id','admin','deletePost'),
    new Route('/admin/post-list/edit/:id','admin','editPost'),
    new Route('/admin/blog-list','admin','blogList'),
    new Route('/admin/blog-list/delete/:id','admin','deleteThread'),
    new Route('/admin/blog-list/edit/:id','admin','editBlog'),
    new Route('/admin/add-post','admin','addPost'),
    new Route('/admin/blog-cat','admin','blogCat'),
    new Route('/admin','auth','adminLogin'),
    new Route('/admin/logout','admin','logout')
];