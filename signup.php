<?php

require_once "app/init.php";

//die("GET");
//die(var_dump($_GET));
//die("POST");
//die(var_dump($_POST));

if(!empty($_POST)){

    //echo("Inserted");
    //die(var_dump("inserted"));

    $email = $_POST['email'];
    $username = $_POST['username'];
    //var_dump($_POST['password']);
    $password = $_POST['password'];
    //var_dump($password);
    //die(var_dump($password));
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    //dd($_FILES);
    $image = $database->table("users")->lastInsertId();
    // dd($image);

    if(isset($_FILES['pic']['name']))
    {
        $file_name = $_FILES['pic']['name'];

        $temp_file_path = $_FILES['pic']['tmp_name'];

        $temp = explode('.',$file_name);
        $extension = end($temp);


        $image = "$image.$extension";

        //dd($image);
        move_uploaded_file($temp_file_path, "images/profile_images/$image");
    }

    $validator = new Validator($database, $errorHandler);
    $validation = $validator->check($_POST, [
        'email' => [
            'required' => true,
            'maxlength' => 255,
            'unique' => 'users',
            'email' => true
        ],
        'username' => [
            'required' => true,
            'minlength' => 2,
            'maxlength' => 20,
            'unique' => 'users'
        ],
        'password' => [
            'required' => true,
            'minlength' => 8
        ]
    ]);
    if($validation->fails()){
        //Display the ERRORS
        echo "<pre>" . print_r($validation->errors()->all()) . "</pre>";
    }else{
        //Create the USERS
        $created = $auth->create([
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'address' => $address,
            'image' => $image
        ]);
        //die(var_dump($password));

        //(var_dump($created));

        if($created){
            header('Location: signin.php');
        }
    }
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
                        <a class="nav-link" href="signin.php">Sign In</a>
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
                        <form action="signup.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Enter Username</label>
                                    <input name="username" class="form-control" placeholder="Username" type="">
                                </div> <!-- form-group// -->
                                <div class="form-group col-md-6">
                                    <label>Enter Password</label>
                                    <input name = "password" class="form-control" placeholder="Password" type="">
                                </div> <!-- form-group// -->
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Enter First Name</label>
                                    <input name="first_name" class="form-control" placeholder="First Name" type="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Enter Last Name</label>
                                    <input name="last_name" class="form-control" placeholder="Last Name" type="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Enter Email</label>
                                    <input name="email" class="form-control" placeholder="Email" type="">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Enter Address</label>
                                    <input name="address" class="form-control" placeholder="Address" type="">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label>Enter Phone</label>
                                    <input name="phone" class="form-control" placeholder="Phone" type="">
                                </div>

                                <div class="form-group col-md-6">
                                <label>Select Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="pic">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mt-4">
                                <div class="form-group col-md-6" style="margin: 0 auto">
                                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
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
