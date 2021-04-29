<?php

require_once "app/init.php";

//var_dump($_POST);
if(!empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rememberMe = $_POST['rem'] ?? null; // ?? (Operator of PHP 7) - Its has come with shorthand of ternary operator, It checcks the nullCheck of left condition is NOT null, then it will return itself else it will return the right hand side thing

    //die(var_dump($id));
    //dd($email);

    $validator = new Validator($database, $errorHandler);
    $validation = $validator->check($_POST, [
        'email' => [
            'required' => true
        ],
        'password' => [
            'required' => true
        ]
    ]);

    if($validation->fails()){
        //Display the ERRORS
        echo "Error";
        echo "<pre>" . print_r($validation->errors()->all()) . "</pre>";
    }else{
        //  dd("else");
        $signin = $auth->signIn([
            'email' => $email,
            'password' => $password
        ]);
        //dd("Email Password Checked");
        //var_dump($signin);
        if($signin){
            if($rememberMe){
                $token = $tokenHandler->createRememberMeToken($userHelper->getUserByEmail($email)->id);

                setcookie('token',$token,time()+1800);

                //die(var_dump($token))
            }
            header('Location: index.php');
        }
    }
}

if(isset($_COOKIE['token']) && $tokenHandler->isValid($_COOKIE['token'], 1)){
    header('Location: index.php');
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
    <link rel="stylesheet" href="custom-bootswatch.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Sign In</title>
</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5 shadow">
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
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>








    <div class="container">
        <div class="row">
            <div class="col-md-6 " style="margin : 0 auto">
                <div class="card">
                    <article class="card-body">
                        <h4 class="card-title mb-4 mt-1">Sign In</h4>
                        <form action = "signin.php" method="POST">
                            <div class="form-group">
                                <label>Your Email</label>
                                <input name="email" class="form-control" placeholder="Email" type="">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <a class="float-right" href="#">Forgot?</a>
                                <label>Your password</label>
                                <input class="form-control" placeholder="Password" type="" name="password">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <div class="checkbox float-right mb-2">
                                    <label> <input type="checkbox"> Save password </label>
                                </div> <!-- checkbox .// -->
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"> Login </button>
                            </div> <!-- form-group// -->
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
