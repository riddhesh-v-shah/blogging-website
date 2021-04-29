<?php

require_once "app/init.php";

//dd($_POST);
if($auth->user() == null){
    header("Location: index.php");
}
if(isset($_POST["delete_id"])){
    $id = $_POST["delete_id"];
    $blogger_id = $auth->user()->id;
    //$sql = "SELECT * FROM blogs WHERE id = $id and blogger_id = $blogger_id";
    //$data = $database->query($sql)->fetchAll(PDO::FETCH_OBJ);

    $data = $database->table("blogs")->where("id","=",$id)->andWhere("blogger_id","=",$blogger_id)->executeWhere()->first();
    //dd($data);

    if(!empty($data)){
        $database->update("blogs", ["is_deleted" => 1], "id = $id");
    }
    header("Location: my_blogs.php");

}
header("Location: my_blogs.php");

?>