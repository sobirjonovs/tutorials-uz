<?php

namespace App\Models;

use App\Core\Model;

class Page extends Model
{
    public function fetchData($table, $data = [])
    {
        $cat = $data['category'];
        return $this->findMany("SELECT * FROM $table WHERE `category` = '$cat'");
    }
    public function fetchBlogList()
    {
        return $this->findMany("SELECT * FROM blog");
    }
    public function fetchLastPost()
    {
        return $this->findMany("SELECT * FROM blog ORDER BY blog_title, blog_post_slug DESC LIMIT 10");
    }
    public function getTutorials()
    {
        return $this->findMany("SELECT id, title, author, content, category, views, slug FROM tutorials");
    }
    public function getCatList()
    {
        return $this->findMany("SELECT cat_name, cat_image_path FROM category");
    }
    public function update($table, $params = [])
    {
        $row = $params['row'];
        $quantity = $params['quantity'];
        $ok = $params['id'];
        $query = "UPDATE `$table` SET $row = $row + $quantity WHERE id = $ok";
        return $this->query($query);
    }
    public function updateBlog($table, $params = [])
    {
        $row = $params['row'];
        $quantity = $params['quantity'];
        $ok = $params['id'];
        $query = "UPDATE `$table` SET $row = $row + $quantity WHERE blog_id = $ok";
        return $this->query($query);
    }
    public function insert($table, $params = [])
    {
        $columns = $params['columns'];
        $values = $params['values'];
        $execute = $params['execute'];
        $query = "INSERT INTO `$table` ($columns) VALUES ($values)";
         $stmt = $this->insertData($query);
         $stmt->execute($execute);
    }
    public function rowCounter($params = [])
    {
       $table = $params['table'];
       $row = $params['row'];
       $ip = $params['ip'];
       $query = "SELECT `$table` FROM `$row` WHERE `$table` = '$ip'";
       return $this->counter($query);
    }
    public function deleteAfterMinute()
    {
        return $this->query("DELETE FROM `user_ip` WHERE date <= NOW() - INTERVAL 2 SECOND");
    }
}
