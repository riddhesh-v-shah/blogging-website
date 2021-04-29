<?php

require_once "app/init.php";

//dd($_POST);
//dd($auth->user()->id);

if(isset($_POST["blog_id"])){
    $id = $_POST["blog_id"];
    $validBlog = $database->table("blogs")->where("id","=",$id)->executeWhere()->first();
    if($validBlog != null){
        $database->update("blogs",["is_deleted" => "0"],"id=$id");
    }
    header("Location: admin.php");
}

if(isset($_POST['publish_id'])){
    $id = $_POST['publish_id'];
    $blogger_id = $auth->user()->id;

    $blog = $database->table("blogs")->where("id","=",$id)->andWhere("blogger_id","=",$blogger_id);

    if($blog != null){

        $database->update("blogs",['is_published' => 1], "id = $id");

        $date = date("Y-m-d");
        $database->update("blogs",['published_on' => $date], "id = $id");

        header("Location: my_blogs.php");
    }else{
        header("Location: index.php");
    }   
}

if($auth->user() != null){
    //dd("Inside IF");
    //$blogs = $userHelper->getBlogsByBloggerId($auth->user()->id);
    //dd($auth->user());
    $blogger_id = $auth->user()->id;
    //$blogs = $database->table("blogs")->where("blogger_id","=",$blogger->id)->executeWhere()->get();
    //$blogs = $database->rawQueryExecutor("SELECT * FROM blogs WHERE blogger_id = $blogger->id");
    
    $present = 1;
    $absent = 0;
    
    $blogs = $database->table("blogs")->where("blogger_id","=",$blogger_id)->andWhere("is_deleted","=",$absent)->andWhere("is_published","=",$present)->executeWhere()->get();
    
    $drafts = $database->table("blogs")->where("blogger_id","=",$blogger_id)->andWhere("is_deleted","=",$absent)->andWhere("is_published","=",$absent)->executeWhere()->get();

    $deletedBlogs = $database->table("blogs")->where("blogger_id","=",$blogger_id)->andWhere("is_deleted","=",$present)->executeWhere()->get();
    
    //dd($blogs);
}else{
    header("Location: index.php");
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


                    <?php
if(!($auth->user() != null)):
?>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    <?php
else:
?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">All Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create_blog.php">Create Blog</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/profile_images/<?= $auth->user()->image?>" alt="" class="profile-image-photo" style="height:25px"></a>
                        <div class="dropdown-menu text-center" id="dropdown-menu" aria-labelledby="navbarDropdown" data-display="none">
                            <div class="profile-info">
                                <div class="profile-image">
                                    <img src="images/profile_images/<?= $auth->user()->image?>" alt="" class="profile-image-photo">
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

                    <?php
endif;
?>
                </ul>
            </form>
        </div>
    </nav>

    <div class="container">

        <div id="responsiveTabStructure">
            <ul class="tabs ml-3">
                <li class="tab-name"><a href="#my-blogs" id="my-blogs-name" class="active">My Blogs</a></li>
                <li class="tab-name"><a href="#my-drafts" id="my-drafts-name">My Drafts</a></li>
                <li class="tab-name"><a href="#deleted-blogs" id="deleted-blogs-name">Deleted Blogs</a></li>
            </ul>


            <div id="my-blogs">
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
                            <div class="blog_type d-inline-block capsule" style="background-color: <?= $type->color?>">
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
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between">
                            <div class="d-inline-block date-format">

                                <p>Published On : <?= $blog->published_on?></p>

                            </div>
                            <div class="d-inline-block">
                                <!-- <form action="index" id = "editForm" name = "editForm" method = "POST"></form> -->

                                <div class="d-inline-block">
                                    <form action="edit_blog.php" method="POST" name="edit_form<?= $blog->id?>">
                                        <input type="hidden" name="edit_id" id="edit_id" value="<?= $blog->id?>">
                                        <a class="btn btn-primary fa fa-pencil edit-btn shadow" onclick="document.forms.edit_form<?= $blog->id?>.submit()"></a>
                                    </form>
                                </div>
                                <div class="d-inline-block ">
                                    <form action="delete.php" method="POST" name="delete_form<?= $blog->id?>">
                                        <input type="hidden" name="delete_id" id="delete_id" value="<?= $blog->id?>">
                                        <a class="btn btn-primary fa fa-trash delete-btn shadow" onclick="document.forms.delete_form<?= $blog->id?>.submit()"></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->

                <?php
endforeach;
?>
            </div>


            <div id="my-drafts">
                <?php

foreach($drafts as $blog):

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
                            <div class="blog_type d-inline-block capsule" style="background-color: <?= $type->color?>">
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
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between">
                            <div class="d-inline-block date-format">

                            </div>
                            <div class="d-inline-block">
                                <!-- <form action="index" id = "editForm" name = "editForm" method = "POST"></form> -->
                                <div class="d-inline-block">
                                    <form action="my_blogs.php" method="POST" name="publish_form<?= $blog->id?>">
                                        <input type="hidden" name="publish_id" id="publish_id" value="<?= $blog->id?>">
                                        <a class="btn btn-primary fa fa-check publish-btn" onclick="document.forms.publish_form<?= $blog->id?>.submit()"></a>
                                    </form>
                                </div>
                                <div class="d-inline-block ">
                                    <form action="edit_blog.php" method="POST" name="edit_form<?= $blog->id?>">
                                        <input type="hidden" name="edit_id" id="edit_id" value="<?= $blog->id?>">
                                        <a class="btn btn-primary fa fa-pencil edit-btn shadow" onclick="document.forms.edit_form<?= $blog->id?>.submit()"></a>
                                    </form>
                                </div>
                                <div class="d-inline-block ">
                                    <form action="delete.php" method="POST" name="delete_form<?= $blog->id?>">
                                        <input type="hidden" name="delete_id" id="delete_id" value="<?= $blog->id?>">
                                        <a class="btn btn-primary fa fa-trash delete-btn shadow" onclick="document.forms.delete_form<?= $blog->id?>.submit()"></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->

                <?php
endforeach;
?>
            </div>

            
            <div id="deleted-blogs">
                <?php

foreach($deletedBlogs as $blog):

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
                            <div class="blog_type d-inline-block capsule" style="background-color: <?= $type->color?>">
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
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between">
                            <div class="d-inline-block date-format">

                            </div>
                            <div class="d-inline-block">
                                <!-- <form action="index" id = "editForm" name = "editForm" method = "POST"></form> -->

                                <form action="my_blogs.php" name="blog<?= $blog->id?>" method="POST">
                                    <input type="hidden" name="blog_id" value="<?= $blog->id?>">
                                    <a class="btn upload-btn mr-2 ml-2 pr-3 pl-3" onclick="document.forms.blog<?= $blog->id?>.submit()" name="" value=""><span class="fa fa-upload"></span></a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

<?php
endforeach;
?>
            <!-- </div> -->


        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>

</html>
