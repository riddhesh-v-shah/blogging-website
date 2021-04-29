<?php

require_once "app/init.php";

if($auth->user() == null){
    header("Location: index.php");
}

if(!empty($_POST)){

    // $max_content_length = 10;
    // $content_length = $_POST["content"] == null ? 0 : count(explode(" ", $_POST["content"]));
    // if($content_length > $max_content_length){
    //     redirect();
    // }
    
    $content = $_POST["content"];
    $word_file = fopen("words.txt", "r");
    $words = fread($word_file, filesize("words.txt"));
    $words_array = explode("\n", $words);
    $replace_words = [];
    // dd($words_array);

    foreach($words_array as $word){
        $word = strtr($word, "aeiou", "*****");
        array_push($replace_words,$word);
    }

    // dd($replace_words);

    for($i = 0; $i<count($words_array); $i++){
        // dd(str_replace("idiot ", "*d**t ", "idiot"));
        $content = str_ireplace(trim($words_array[$i]), trim($replace_words[$i]), $content);    
    }

    // $content = str_replace($words_array, $replace_words, $content);
    // dd($content);

    $title = $_POST["title"];
    //dd($_FILES);
    
    $image = $database->table("blogs")->lastInsertId();
    // dd($image);

    if(isset($_FILES['pic']['name']))
    {
        $file_name = $_FILES['pic']['name'];

        $temp_file_path = $_FILES['pic']['tmp_name'];

        $temp = explode('.',$file_name);
        $extension = end($temp);


        $image = "$image.$extension";

        //dd($image);
        move_uploaded_file($temp_file_path, "images/blog_images/$image");
    }

    $blogger_id = $auth->user()->id;
    
    $type_name = $_POST["type"];
    $type = $database->table("blog_types")->where("name","=","$type_name")->executeWhere()->first()->id;
    
    $published_on = strval(date("Y-m-d"));

    if(isset($_POST["is_draft"])){
        $is_published = 0;
    }else{
        $is_published = 1;
    }

    $data = [
        "title" => $title,
        "image" => $image,
        "content" => $content,
        "blogger_id" => $blogger_id,
        "type" => $type,
        "published_on" => $published_on,
        "is_published" => $is_published
    ];

    $database->table("blogs")->insert($data);
    $id = $database->table("blogs")->lastInsertId() - 1;

    $view_data = [
        "blog_id" => $id,
        "view_count" => 0
    ];
    $database->table('views')->insert($view_data);

    header("Location: index.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulan/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <a class="navbar-brand" href="index.php">Bloggers Hub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">All Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my_blogs.php">My Blogs</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/profile_images/<?= $auth->user()->image?>" alt="" class="profile-image-photo" style = "height:25px"></a>
                        <div class="dropdown-menu text-center" id = "dropdown-menu" aria-labelledby="navbarDropdown" data-display="none">
                            <div class="profile-info">
                                <div class="profile-image">
                                    <img src="images/profile_images/<?= $auth->user()->image?>" alt="" class = "profile-image-photo">
                                </div>
                                <p class="profile-name"><?= $auth->user()->first_name . " " . $auth->user()->last_name ?></p>
                            </div>
                            <a class="text-center btn btn-primary d-block mt-2" href="#">View Profile</a>
                            <!-- <a class="dropdown-item" href="#">Another action</a> -->
                            <!-- <div class="dropdown-divider"></div> -->
<?php
if($auth->user()->is_admin == 1):
?>
                            <a class="text-center btn btn-primary d-block mt-2" href="admin.php">Admin</a>
<?php
endif;
?>
                            <a class="text-center btn btn-primary d-block mt-2" href="signout.php">Sign Out</a>
                        </div>
                    </li>

                </ul>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 " style="margin : 0 auto">
                <!-- <div class="card"> -->
                    <article class="card-body">
                        <h4 class="card-title mb-4 mt-1">Create Blog</h4>
                        <form action="create_blog.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                                <label>Enter Title</label>
                                <input name="title" id = "title" class="form-control" placeholder="Title" type="" value="">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label>Enter Content</label>
                                <textarea class="form-control" id="content" rows="10" name = "content" style="resize:none" maxlength="2800"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="custom-select" name = "type" id = "blog_type" onchange="get_content_max_length()">
                                        <!-- <option selected="">Open this select menu</option> -->
<?php
$types = $database->table("blog_types")->where("1","=","1")->executeWhere()->get();
$i = 1;
foreach($types as $type):
?>

                                        <option id = "<?= $type->id?>" value="<?= $type->name?>"><?= $type->name?></option>
<?php
endforeach;
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name = "pic" type="file" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value="" name = "is_draft">
                                        Save As Draft
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <input type="submit" class = "btn btn-primary">
                                </div>
                            </div>

                            

                            
                            
                        </form>
                    </article>
                <!-- </div> -->
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src = "script.js"></script>
    <script>
        function get_content_max_length(){
            var blog_name = $("#blog_type")[0]["value"];
            var length = blog_name.length * 400;
            $("#content")[0]["maxlength"] = length;
            console.log($("#content")[0]["maxlength"]);
        }
    </script>

</body>

</html>