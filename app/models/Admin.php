<?php

namespace App\Models;

use App\Core\Model;

class Admin extends Model
{
    public function getAdmin()
    {
        return $this->findMany("SELECT email, password, user_type FROM users");
    }
    public function getTutorials()
    {
    	return $this->findMany("SELECT id, title, author, views, slug, category, content FROM tutorials");
    }
    public function getBlogList()
    {
        return $this->findMany("SELECT * FROM blog");
    }
    public function getCatList()
    {
        return $this->findMany("SELECT id,cat_name, cat_image_path FROM category");
    }
    public function insert($table, $params = [])
    {
        $columns = $params['columns'];
        $values = $params['values'];
        foreach ($params as $value) {
            $query = "INSERT INTO `$table` ($columns) VALUES ($values)";
        }
         $stmt = $this->insertData($query);
         $stmt->execute($params['execute']);
    }
    public function deleteData($table, $id)
    {
        $query = "DELETE FROM `$table` WHERE id = '$id'";
        return $this->query($query);
    }
    public function deleteThread($table, $id)
    {
        $query = "DELETE FROM `$table` WHERE blog_id = '$id'";
        return $this->query($query);
    }
    public function update($table, $params = [])
    {
        $rowVal = $params['rowVal'];
        $ok = $params['id'];
        $query = "UPDATE `$table` SET $rowVal WHERE id = $ok";
        return $this->query($query);
    }
    public function updateBlog($table, $params = [])
    {
        $rowVal = $params['rowVal'];
        $ok = $params['id'];
        $query = "UPDATE `$table` SET $rowVal WHERE blog_id = $ok";
        return $this->query($query);
    }
}
