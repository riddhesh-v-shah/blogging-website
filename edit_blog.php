<?php

require_once "app/init.php";

//dd($_POST);
if($auth->user() == null){
    header("Location: index.php");
}

if(isset($_POST['edit_id'])){
    
    //dd($_FILES);

    if(isset($_POST["title"])){
        // dd($_FILES);
        $id = $_POST['edit_id'];
        $blogger_id = $auth->user()->id;

        $blog = $database->table("blogs")->where("blogger_id","=",$blogger_id)->andWhere("id","=",$id)->executeWhere()->first();
        // dd($blog);
        if($blog == null){
            header("Location: my_blogs.php");
        }else{
            $title = $_POST["title"];
            
            /**
             * HANDLING THE IMAGE UPLOAD
             */
            $image = strtolower($blog->id);
            $has_to_update_image = false;

            if($_FILES['pic']['name'] !== ""){
                $file_name = $_FILES['pic']['name'];
                $has_to_update_image = true;

                $temp_file_path = $_FILES['pic']['tmp_name'];
                $temp = explode('.', $file_name);
                $extension = end($temp);
                // dd($temp);
                //die($extension);

                $image = "$image.$extension";
                //die($image);
                move_uploaded_file($temp_file_path, "images/blog_images/$image");
            }


            /**
             * If the user has updated the Contact Name i.e first_name or/and last_name then we have 2 condditions:
             * Either the photo as been changed or the Photo hasen't been changed!
             * If the photo was changed, then the above code would have already created a new file with new name, so our TASK IS TO JUST DELETE THE OLD PHOTO!
             * Otherwise if only the name was changed then OUR TASK IS TO RENAME THE OLD FILE!
             */
            $old_image_name = $blog->image;

            if(!$has_to_update_image){
                // echo "Hello World!";
                $temp_array = explode('.', $old_image_name);
                $extension = end($temp_array);
                $image = "$image.$extension";
                
            }
            //dd($image);
            if($old_image_name === $image){
                // no ussue and no image name has to be updated in the database!
            }else{
                // Now two paths either rename or delete
                $path = "images/blog_images/";
                if($has_to_update_image){
                    unlink($path.$old_image_name);
                }else{
                    $old_file_path = $path.$old_image_name;
                    $new_file_path = $path.$image;
                    rename($old_file_path, $new_file_path);
                }
            }
            /**
             * PHP METHODS:
             * rename($old_file_path, $new_file_path)
             * unlink($resource_path_to_be_deleted)
             */

            /**
             * END OF FILE UPLOADS
             */
                    

            $content = $_POST["content"];
            $blogger_id = $auth->user()->id;
            
            $type_name = $_POST["type"];
            $type = $database->table("blog_types")->where("name","=","$type_name")->executeWhere()->first()->id;
            

            if(isset($_POST["is_draft"])){
                $is_published = 0;
            }else{
                $is_published = 1;
            }

            $published_on = $blog->published_on;

            $data = [
                "title" => $title,
                "image" => $image,
                "content" => $content,
                "blogger_id" => $blogger_id,
                "type" => $type,
                "published_on" => $published_on,
                "is_published" => $is_published
            ];
            // dd($data);

            $database->update("blogs",$data,"id = $blog->id");

            header("Location: index.php");
        }
    }else{
        $id = $_POST['edit_id'];
        $blogger_id = $auth->user()->id;

        $blog = $database->table("blogs")->where("blogger_id","=",$blogger_id)->andWhere("id","=",$id)->executeWhere()->first();

        if($blog == null){
            header("Location: my_blogs.php");
        }
    }
}else{
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
        <a class="navbar-brand" href="index.php">Blog Management</a>
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

                </ul>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 " style="margin : 0 auto">
                <!-- <div class="card"> -->
                    <article class="card-body">
                        <h4 class="card-title mb-4 mt-1">Edit Blog</h4>
                        <form action="edit_blog.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="image-preview-div">
                                        <img src="" alt="" class="image-preview">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="pic" type="file" value="<?= $blog->image?>" class="custom-file-input" id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose File</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Enter Title</label>
                                <input name="title" id="title" class="form-control" placeholder="Title" type="" value="<?= $blog->title ?>">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label>Enter Content</label>
                                <textarea class="form-control" id="content" rows="10" name="content" style="resize:none"><?= $blog->content ?></textarea>
                            </div>

                            <input type="hidden" name="edit_id" value="<?= $blog->id?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="custom-select" name="type">
                                            <!-- <option selected="">Open this select menu</option> -->
                                            <?php
$types = $database->table("blog_types")->where("1","=","1")->executeWhere()->get();
//var_dump($types);
$i = 1;
foreach($types as $type):
    if($i == $blog->type):
        echo($i);
?>

                                            <option selected value="<?= $type->name?>"><?= $type->name?></option>
                                            <?php
    else:
?>

                                            <option value="<?= $type->name?>"><?= $type->name?></option>

                                            <?php
    endif;
    $i = $i + 1;
endforeach;
?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <label class="form-check-label mb-5">

                                                <?php
if($blog->is_published == 0):
?>

                                                <div class="input-file mt-2">
                                                    <input class="form-check-input" type="checkbox" value="" checked name="is_draft">
                                                    <p class="d-inline-block">Save As Draft</p>
                                                </div>
                                                <?php
endif;
?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6" style="margin: 0 auto">
                                    <input type="submit" class="btn btn-primary d-block">
                                </div>
                            </div>





                        </form>
                    </article>
                <!-- </div> -->
            </div>
        </div>
    </div>

    <script src="jquery.min.js"></script>
    <script src="script.js"></script>

</body>

</html>
