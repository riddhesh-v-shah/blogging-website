<?php

require_once "app/init.php";

//dd($_POST);

//Code if you only want to allow the user to login and then read more
// if($auth->user() == null){
//     header("Location: index.php");
// }
// if($auth->user() != null){
//     if(isset($_POST["read_more_id"])){
//         $blog = $userHelper->getBlogById($_POST["read_more_id"]);
//         //dd($blog);
//     }else{
//         header("Location: index.php");
//     }
// }else{
//     header("Location: signin.php");
// }

if(isset($_POST["read_more_id"])){
    $blog_id = $_POST["read_more_id"];
    $blog = $database->table("blogs")->where("id","=",$blog_id)->executeWhere()->get();
    if($blog == null){
        header("Location: index.php");
    }else{
        /**
         * Wherever there is usage of $array = $array[0]
         * This trick is used as ->first() gives an execption if the $array is null and we try to access first element, so to access first element we use ->get() the $array and check whether it is NULL of not and then takes the required "First Element"
         */
        $blog = $blog[0];
    }

    // dd($blog);
    
    // $user_id = $auth->user()->id;

    //$view = $database->table("views")->where("user_id","=",$user_id)->andWhere("blog_id","=",$blog_id)->executeWhere()->get();
    // dd($view);
    if($blog != null){
        $view = $database->table("views")->where("blog_id","=",$blog_id)->executeWhere()->get();
        if($view == null){
            $database->table("views")->insert([
                "blog_id" => $blog_id,
                "view_count" => 1
            ]);
        }else{
            $view = $view[0];
            $count = intval($view->view_count) + 1;
            //dd($count);
            $database->update("views",["view_count" => $count],"blog_id = $blog_id");
        }
    }else{
        header("Location: index.php");
    }
    
    // if(empty($view)){
    //     //dd("ME");
    //     $result = $database->table("views")->insert([
    //         "blog_id" => $blog_id,
    //         "user_id" => $user_id
    //     ]);
    // }

    //dd($blog);
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
        <link
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
            crossorigin="anonymous">
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://bootswatch.com/4/cerulan/bootstrap.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
            <a class="navbar-brand" href="index.php">Bloggers Hub</a>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarColor01"
                aria-controls="navbarColor01"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto"></ul>
                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <?php
if(!($auth->user() != null)):
?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">All Blogs</a>
                        </li>
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
                            <a class="nav-link" href="my_blogs.php">My Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="create_blog.php">Create Blog</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle "
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"><img
                                src="images/profile_images/<?= $auth->user()->image?>"
                                alt=""
                                class="profile-image-photo"
                                style="height:25px"></a>
                            <div
                                class="dropdown-menu text-center"
                                id="dropdown-menu"
                                aria-labelledby="navbarDropdown"
                                data-display="none">
                                <div class="profile-info">
                                    <div class="profile-image">
                                        <img
                                            src="images/profile_images/<?= $auth->user()->image?>"
                                            alt=""
                                            class="profile-image-photo">
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

        <div class="container">

            <?php

//dd($blog);

$sql = "SELECT * FROM users WHERE id = $blog->blogger_id";
$user = $database->rawQueryExecutor($sql)[0];

$sql = "SELECT * FROM blog_types WHERE id = $blog->type";
$type = $database->rawQueryExecutor($sql)[0];

$blog_id = $blog->id;

?>

            <div class="card mt-5 card-effect">
                <!-- <div class="card"> -->
                <div class="card-header d-flex justify-content-between">
                    <div onclick="document.forms.blog_name<?= $blog->id?>.submit()">
                        <div class="blog-image-profile d-inline-block mr-3">
                            <img
                                src="images/profile_images/<?= $user->image?>"
                                alt=""
                                style="width: 30px"
                                class="rounded-circle">
                        </div>
                        <div class="name d-inline-block">
                            <form action="index.php" name="blog_name<?= $blog->id?>" method="POST">
                                <input type="hidden" name="name_id" value="<?= $user->id?>">
                                <p>
                                    <a class="name-title" name="" value=""><?= $user->first_name . " " . $user->last_name?></a>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div
                        class="blog_type d-inline-block capsule"
                        style="background-color: <?= $type->color?>">
                        <form action="index.php" name="blog_type<?= $blog->id?>" method="POST">
                            <input type="hidden" name="type_id" value="<?= $type->id?>">
                            <a
                                class="capsule-link"
                                onclick="document.forms.blog_type<?= $blog->id?>.submit()"
                                name=""
                                value=""><?= $type->name?></a>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <!-- <div class="col-md-4"> -->
                            <div class="image" style="margin: 0 auto 30px">
                                <img
                                    src="images/blog_images/<?= $blog->image?>"
                                    alt=""
                                    class="image-photo"
                                    style="width: 100%">
                            </div>
                            <!-- </div> -->
                            <!-- <div class="col-md-8"> -->
                            <div class="content">
                                <h5 class="card-title"><?= $blog->title?></h5>
                                <p class="card-text d-inline"><?= $blog->content?></p>

                            </div>
                            <!-- </div> -->
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

?>
                                <p class="view_amount p-0">
                                    <span class="fa fa-eye mr-2"></span><?= $views ?></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between">
                    <div class="d-inline-block date-format">
                        <p>Published On :
                            <?= $blog->published_on?></p>
                    </div>
                    <!-- <div class="d-inline-block"> <form action="index" id = "editForm" name =
                    "editForm" method = "POST"></form> <a href="" class = "btn btn-primary fa
                    fa-pencil delete-btn"></a> <a href="" class = "btn btn-primary fa fa-trash
                    edit-btn"></a> </div> -->

                    <?php
if($auth->user() != null && $auth->user()->id == $blog->blogger_id):
?>

                    <div class="d-inli-ne-block">
                        <div class="d-inline-block">
                            <form action="edit_blog.php" method="POST" name="edit_form<?= $blog->id?>">
                                <input type="hidden" name="edit_id" id="edit_id" value="<?= $blog->id?>">
                                <a
                                    class="btn btn-primary fa fa-pencil edit-btn"
                                    onclick="document.forms.edit_form<?= $blog->id?>.submit()"></a>
                            </form>
                        </div>
                        <div class="d-inline-block">
                            <form action="delete.php" method="POST" name="delete_form<?= $blog->id?>">
                                <input type="hidden" name="delete_id" id="delete_id" value="<?= $blog->id?>">
                                <a
                                    class="btn btn-primary fa fa-trash delete-btn"
                                    onclick="document.forms.delete_form<?= $blog->id?>.submit()"></a>
                            </form>
                        </div>
                    </div>

                    <?php
endif;
?>

                </div>
                <!-- </div> -->
            </div>

        </div>

        <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
        <script src="script.js"></script>

    </body>

</html>