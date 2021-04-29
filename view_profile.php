<?php

require_once "app/init.php";

$user = $auth->user();


if($user == null){
    header("Location: index.php");
}

if(isset($_POST["save"])){

    //dd($_POST);
    
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    //$image = $_POST["file"];

    /**
     * HANDLING THE IMAGE UPLOAD
     */
    $image = strtolower($user->id);
    $has_to_update_image = false;

    if($_FILES['pic']['name'] !== ""){
        $file_name = $_FILES['pic']['name'];
        $has_to_update_image = true;

        $temp_file_path = $_FILES['pic']['tmp_name'];
        $temp = explode('.', $file_name);
        $extension = end($temp);
        // dd($temp);
        // die($extension);

        $image = "$image.$extension";
        //die($image);
        move_uploaded_file($temp_file_path, "images/profile_images/$image");
    }


    /**
     * If the user has updated the Contact Name i.e first_name or/and last_name then we have 2 condditions:
     * Either the photo as been changed or the Photo hasen't been changed!
     * If the photo was changed, then the above code would have already created a new file with new name, so our TASK IS TO JUST DELETE THE OLD PHOTO!
     * Otherwise if only the name was changed then OUR TASK IS TO RENAME THE OLD FILE!
     */
    $old_image_name = $user->image;

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
        $path = "images/profile_images/";
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

    $data = [
        "username" => $username,
        "phone" => $phone,
        "first_name" => $first_name,
        "last_name" => $last_name,
        "email" => $email,
        "address" => $address,
        "image" => $image
    ];

    $database->update("users",$data,"id = $user->id");
    header("Location: index.php");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Sign In</title>
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
                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title mb-4 mt-1">Sign Up</h4>
                        <form action="view_profile.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Enter Username</label>
                                    <input name="username" class="form-control" placeholder="Username" type="" value="<?= $user->username?>">
                                </div> <!-- form-group// -->
                                <div class="form-group col-md-6">
                                    <label>Enter Phone</label>
                                    <input name="phone" class="form-control" placeholder="Phone" type="" value="<?= $user->phone?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Enter First Name</label>
                                    <input name="first_name" class="form-control" placeholder="First Name" type="" value="<?= $user->first_name?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Enter Last Name</label>
                                    <input name="last_name" class="form-control" placeholder="Last Name" type="" value="<?= $user->last_name?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Enter Email</label>
                                    <input name="email" class="form-control" placeholder="Email" type="" value="<?= $user->email?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Enter Address</label>
                                    <input name="address" class="form-control" placeholder="Address" type="" value="<?= $user->address?>">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6" style="margin:0 auto">
                                <label>Select Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name = "pic" type="file" class="custom-file-input" id="inputGroupFile02">
                                            <label name = "image" id = "image" class="custom-file-label" for="inputGroupFile02">Choose File</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mt-4">
                                <div class="form-group col-md-6" style="margin: 0 auto">
                                    <button type="submit" class="btn btn-primary btn-block" name = "save"> Save </button>
                                </div> <!-- form-group// -->
                            </div>
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src = "script.js"></script>

</html>
