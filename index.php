<?php

require_once "app/init.php";

//sdd($database->table("blogs")->where("id","=",1)->andWhere("blogger_id","=",1)->executeWhere()->get());

//dd($auth->user());
//dd($_POST);
if(isset($_POST["type_id"])){
    //dd("type");
    //$blogs = $userHelper->getBlogsByTypeId($_POST["type_id"]);
    $type_id = $_POST["type_id"];
    $is_deleted = 0;
    $is_published = 1;
    $blogs = $database->table("blogs")->where("type","=",$type_id)->andWhere("is_deleted","=",$is_deleted)->andWhere("is_published","=",$is_published)->executeWhere()->get();
    //dd($blogs);
}else if(isset($_POST["name_id"])){
    $name_id = $_POST["name_id"];
    $is_deleted = 0;
    $is_published = 1;
    $blogs = $database->table("blogs")->where("blogger_id","=",$name_id)->andWhere("is_deleted","=",$is_deleted)->andWhere("is_published","=",$is_published)->executeWhere()->get();
    //dd($blogs);
}else{
    $is_deleted = 0;
    $is_published = 1;
    $blogs = $database->table("blogs")->where("is_deleted","=",$is_deleted)->andWhere("is_published","=",$is_published)->executeWhere()->get();
}

//dd($blogs);

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
    <link rel="stylesheet" href="custom-bootswatch.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5 shadow">
        <a class="navbar-brand text-shadow" href="index.php">Bloggers Hub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <?php
if($auth->user() == null):

    if(isset($_POST["type_id"]) || isset($_POST["name_id"])):
?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">All Blogs</a>
                    </li>

<?php
    endif;
?>
                    <li class="nav-item">
                        <a class="nav-link text-shadow" href="signin.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-shadow" href="signup.php">Sign Up</a>
                    </li>
                    <?php
else:
?>

                    <?php
if(isset($_POST["type_id"]) || isset($_POST["name_id"])):
?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">All Blogs</a>
                    </li>

                    <?php
endif;
?>



                    <li class="nav-item">
                        <a class="nav-link" href="my_blogs.php">My Blogs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="create_blog.php">Create Blog</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="signout.php">Sign Out</a>
                    </li> -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/profile_images/<?= $auth->user()->image?>" alt="" class="profile-image-photo" style = "height:25px"></a>
                        <div class="dropdown-menu text-center" id="dropdown-menu" aria-labelledby="navbarDropdown" data-display="none">
                            <div class="profile-info">
                                <div class="profile-image">
                                    <img src="images/profile_images/<?= $auth->user()->image?>" alt="" class="profile-image-photo">
                                </div>
                                <p class="profile-name"><?= $auth->user()->first_name . " " . $auth->user()->last_name ?></p>
                            </div>
                            <a class="text-center btn btn-primary d-block mt-2" href="view_profile.php">View Profile</a>
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


                    <?php
endif;
?>
                </ul>
            </form>
        </div>
    </nav>

    <?php
    
    //////////////////////////////////////////////// Statistics Code /////////////////////////////////////////////////////////

$sql = "SELECT * FROM views ORDER BY view_count desc limit 0, 1";
$most_viewed_blog_id = $database->rawQueryExecutor($sql)[0]->blog_id;

$sql = "SELECT * FROM blogs WHERE id = $most_viewed_blog_id";
$most_viewed_blog = $database->rawQueryExecutor($sql)[0];

$sql = "SELECT * FROM users";
$bloggers = $database->rawQueryExecutor($sql);

$highest_blogger_view = -1;
$highest_blogger_id = -1;

foreach($bloggers as $blogger):
    $view_count = 0;
    $sql = "SELECT * FROM blogs WHERE blogger_id = $blogger->id";
    $view_blogs = $database->rawQueryExecutor($sql);
    foreach($view_blogs as $view_blog):
        $sql = "SELECT * FROM views WHERE blog_id = $view_blog->id";
        $count = $database->rawQueryExecutor($sql)[0]->view_count;
        $view_count += $count;
    endforeach;
    if($highest_blogger_view < $view_count):
        $highest_blogger_view = $view_count;
        $highest_blogger_id = $blogger->id;
    endif;
endforeach;

$sql = "SELECT * FROM users WHERE id = $highest_blogger_id";
$most_viewed_blogger = $database->rawQueryExecutor($sql)[0];

// dd(readfile("words.txt"));


$sql = "SELECT * FROM blog_types";
$categories = $database->rawQueryExecutor($sql);

$highest_category_view = -1;
$highest_category_id = -1;

foreach($categories as $category):
    $view_count = 0;
    $sql = "SELECT * FROM blogs WHERE type = $category->id";
    $view_blogs = $database->rawQueryExecutor($sql);
    foreach($view_blogs as $view_blog):
        $sql = "SELECT * FROM views WHERE blog_id = $view_blog->id";
        $count = $database->rawQueryExecutor($sql)[0]->view_count;
        $view_count += $count;
    endforeach;
    if($highest_category_view < $view_count):
        $highest_category_view = $view_count;
        $highest_category_id = $category->id;
    endif;
endforeach;

$sql = "SELECT * FROM blog_types WHERE id = $highest_category_id";
$most_viewed_category = $database->rawQueryExecutor($sql)[0];

//////////////////////////////////////////////// Statistics Code /////////////////////////////////////////////////////////


    ?>

    <div class="container mb-5">

        <div class="card">
            <div class="card-header">
                <p><strong>Statistics</strong></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p class = "mb-0"><strong>Mosted Viewed Category - </strong><?= $most_viewed_category->name?></p>
                </li>
                <li class="list-group-item">
                    <p class = "mb-0"><strong>Most View Blog - </strong><?= $most_viewed_blog->title?></p>
                </li>
                <li class="list-group-item">
                    <p class = "mb-0"><strong>Most Viewed Blogger - </strong><?= $most_viewed_blogger->first_name . " " . $most_viewed_blogger->last_name?></p>
                </li>
            </ul>
        </div>

        <?php

foreach($blogs as $blog):

$sql = "SELECT * FROM users WHERE id = $blog->blogger_id";
$user = $database->rawQueryExecutor($sql)[0];

$sql = "SELECT * FROM blog_types WHERE id = $blog->type";
$type = $database->rawQueryExecutor($sql)[0];

$show_length = 600;
$content = $blog->content;
if(strlen($blog->content) > $show_length){
    $content = substr($blog->content, 0, $show_length) . ".....";
}

$blog_id = $blog->id;

//dd($blogs);

?>

        <div class="card mt-5 card-effect">
            <!-- <div class="card"> -->
                <div class="card-header d-flex justify-content-between">
                    <div onclick="document.forms.blog_name<?= $blog->id?>.submit()">
                        <div class="blog-image-profile d-inline-block mr-3">
                            <img src="images/profile_images/<?= $user->image?>" alt="" style="width: 30px" class="rounded-circle">
                        </div>
                        <div class="name d-inline-block">
                            <form action="index.php" name="blog_name<?= $blog->id?>" method="POST">
                                <input type="hidden" name="name_id" value="<?= $user->id?>">
                                <p><a class="name-title" name="" value=""><?= $user->first_name . " " . $user->last_name?></a></p>
                            </form>
                        </div>
                    </div>
                    <div class="blog_type d-inline-block capsule <?= strtolower($type->name)?>-pill">
                        <form action="index.php" name="blog_type<?= $blog->id?>" method="POST">
                            <input type="hidden" name="type_id" value="<?= $type->id?>">
                            <a class="capsule-link" onclick="document.forms.blog_type<?= $blog->id?>.submit()" name="" value=""><?= $type->name?></a>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="image">
                                <img src="images/blog_images/<?= $blog->image?>" alt="" class="image-photo">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="content">
                                <h5 class="card-title"><?= $blog->title?></h5>

                                <form action="read_more.php" name="read_more<?= $blog->id?>" method="POST">
                                    <input type="hidden" name="read_more_id" value="<?= $blog->id?>">
                                    <p class="card-text d-inline"><?= $content?></p>
<?php
if(strlen($blog->content) > $show_length):
?>
                                    <a class="read_more_link" onclick="document.forms.read_more<?= $blog->id?>.submit()" name="" value="">Read More</a>
                                    <?php
endif;
?>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-11"></div>
                        <div class="col-md-1">
                            <div class="view-counter">
<?php
$views = $database->table("views")->where("blog_id","=",$blog->id)->executeWhere()->get();

if($views == null){
    $views = 0;
}else{
    $views = $views[0]->view_count;
}

$likes = $database->table("views")->where("blog_id","=",$blog->id)->executeWhere()->first();

if($likes == null){
    $likes = 0;
}else{
    $likes = $likes->like_count;
}

?>
                                <p class = "view_amount p-0" ><span class = "fa fa-eye mr-2"></span><?= $views ?></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between">
                    <div class="d-inline-block date-format">
                        <p>Published On : <?= $blog->published_on?></p>
                    </div>
                    <div class="like" onclick="likeIncrementor(this)">
                        <div class="like-count d-inline mr-1">
                            <span><?= $likes?></span>
                        </div>
                        <div class="d-inline p-0 m-0 like_btn">
                            <div class="fa fa-heart"></div>
                        </div>
                    </div>
                    <!-- <div class="d-inline-block">
                        <form action="index" id = "editForm" name = "editForm" method = "POST"></form>
                        <a href="" class = "btn btn-primary fa fa-pencil delete-btn"></a>
                        <a href="" class = "btn btn-primary fa fa-trash edit-btn"></a>
                    </div> -->
                </div>
            <!-- </div> -->
        </div>

        <?php
endforeach;
?>
    </div>

    <script src="jquery.min.js"></script>
    <script src="script.js"></script>
    <script>
        function likeIncrementor(e){
            var text = e.firstElementChild;
            var icon = e.lastElementChild;
            // console.log(Number(text.firstElementChild.innerHTML)+1);
            if(icon.style.color != "red"){
                icon.style.color = "red";
                text.firstElementChild.innerHTML = Number(text.firstElementChild.innerHTML)+1;
            }else{
                icon.style.color = "grey";
                text.firstElementChild.innerHTML = Number(text.firstElementChild.innerHTML)-1;
            }
        }
    </script>

</body>

</html>
