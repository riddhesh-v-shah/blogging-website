<?php

class UserHelper{
    private $database;
    private $table = "users";

    public function __construct(Database $database){
        $this->database = $database;
    }

    public function getUserByEmail(string $email){
        return $this->database->table($this->table)->where('email',"=",$email)->executeWhere()->first();
    }

    public function getUserByUsername(string $username){
        //var_dump()
        return $this->database->table($this->table)->where('username',"=",$username)->executeWhere()->first();
    }



    
    public function getUserByBlogId($blog_id){
        $blog = $this->database->table("blogs")->where('blog_id',"=",$blog_id)->executeWhere()->first();
        return $this->database->table($this->table)->where('id',"=",$blog->blogger_id)->executeWhere()->first();
    }

    public function getBlogsByBloggerId($id){
        return $this->database->table("blogs")->where("blogger_id","=",$id)->executeWhere()->get();
    }

    public function getBlogsByTypeId($type){
        return $this->database->table("blogs")->where("type","=",$type)->executeWhere()->get();
    }

    public function getBlogById($id){
        return $this->database->table("blogs")->where("id","=",$id)->executeWhere()->first();
    }

}

?>