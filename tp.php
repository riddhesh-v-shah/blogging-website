<div class="container">

        <div id="responsiveTabStructure">
            <ul class = "tabs ml-3">
                <li class="tab-name"><a href="#recovery-tab"  id = "recovery-tab-name" class = "active">Recovery Tab</a></li>
                <li class="tab-name"><a href="#blog-calculation-tab" id = "blog-calculation-tab-name">Blog Calculation Tab</a></li>
            </ul>

            <div id="recovery-tab">
<?php
if($blogs != null):
?>

                <table class="table text-center mb-3 table-hover" style="cellspacing:10px">
                    <thead class="mt-3">
                        <tr class="table-dark">
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">USER</th>
                            <th scope="col" class="text-center">TOPIC</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="">


<?php

foreach($blogs as $blog):

// $sql = "SELECT * FROM users WHERE id = $blog->blogger_id";
// $user = $database->rawQueryExecutor($sql)[0];

// $sql = "SELECT * FROM blog_types WHERE id = $blog->type";
// $type = $database->rawQueryExecutor($sql)[0];

$show_length = 30;
$title = $blog->title;
if(strlen($blog->title) > $show_length){
    $title = substr($blog->title, 0, $show_length) . ".....";
}

$user = $database->table("users")->where("id","=",$blog->blogger_id)->executeWhere()->first();

// $blog_id = $blog->id;

//dd($blogs);

?>

                        <tr class="table table-active">
                            <td class="text-center align-middle"><?= $blog->id?></td>
                            <td class="text-center align-middle"><?= $user->first_name . " " . $user->last_name?></td>
                            <td class="text-center align-middle"><?= $title?></td>
                            <td class="text-center align-middle">

                                <form action="admin.php" name="blog<?= $blog->id?>" method="POST">
                                    <input type="hidden" name="blog_id" value="<?= $blog->id?>">
                                    <a class="btn upload-btn mr-2 ml-2 pr-3 pl-3" onclick="document.forms.blog<?= $blog->id?>.submit()" name="" value=""><span class="fa fa-upload"></span></a>
                                </form>

                                <!-- <p class="">
                            <a href="" class="btn upload-btn mr-2 ml-2 pr-3 pl-3"><span class="fa fa-upload"></span></a>
                        </p> -->
                            </td>
                        </tr>



<?php
endforeach;
?>
                    </tbody>
                </table>

<?php
else:
    echo("No Deleted blogs yet");
endif;
?>
</div>

            <div id="blog-calculation-tab">
<?php

$users = $database->table("users")->where("1","=","1")->executeWhere()->get();

if($users != null):
?>

                <table class="table text-center mb-3 table-hover" style="cellspacing:10px">
                    <thead class="mt-3">
                        <tr class="table-dark">
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">USER</th>
                            <th scope="col" class="text-center">POSTS IN DAYS</th>
                            <th scope="col" class="text-center">GRANT ADMIN ACCESS</th>
                        </tr>
                    </thead>
                    <tbody class="">


<?php

foreach($users as $user):

// $show_length = 30;
// $title = $blog->title;
// if(strlen($blog->title) > $show_length){
//     $title = substr($blog->title, 0, $show_length) . ".....";
// }

// $user = $database->table("users")->where("id","=",$blog->blogger_id)->executeWhere()->first();

$is_published = 1;
$is_deleted = 0;

// $firstBlog = $database->table("blogs")->where("blogger_id","=",$user->id)->andWhere("is_published","=",$is_published)->andWhere("is_deleted","=",$is_deleted)->executeWhere()->first();
$lastBlog = $database->table("blogs")->where("blogger_id","=",$user->id)->andWhere("is_published","=",$is_published)->andWhere("is_deleted","=",$is_deleted)->executeWhere()->last();

// $firstDate = $firstBlog->published_on;
$firstDate = date("Y-m-d");
$lastDate = $lastBlog->published_on;

$numOfDays = date_diff(date_create($lastDate), date_create($firstDate))->format("%a");
$numOfPosts = $database->table("blogs")->where("blogger_id","=",$user->id)->andWhere("is_published","=",$is_published)->andWhere("is_deleted","=",$is_deleted)->executeWhere()->count();

$calculation = "";

if($numOfPosts <= 1){
    $calculation .= "$numOfPosts Post in ";
}else{
    $calculation .= "$numOfPosts Posts in ";
}

if($numOfDays <= 1){
    $calculation .= "$numOfDays Day";
}else{
    $calculation .= "$numOfDays Days";
}

// dd($numOfPosts);

// $blog_id = $blog->id;

//dd($blogs);

?>

                        <tr class="table table-active">
                            <td class="text-center align-middle"><?= $user->id?></td>
                            <td class="text-center align-middle"><?= $user->first_name . " " . $user->last_name?></td>
                            <td class="text-center align-middle"><?= $calculation?></td>
                            <td class="text-center align-middle">

                                <form action="admin.php" name="user<?= $user->id?>" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user->id?>">
                                    
<?php
if($user->is_admin == 0):
?>
                                    <a class="btn grant-btn mr-2 ml-2 pr-3 pl-3" onclick="document.forms.user<?= $user->id?>.submit()" name="" value=""><span class="fa fa-check"></span></a>
<?php
else:
?>
                                    <a class="btn refuse-btn mr-2 ml-2 pr-3 pl-3" onclick="document.forms.user<?= $user->id?>.submit()" name="" value=""><span class="fa fa-times"></span></a>
<?php
endif;
?>
                                    
                                </form>

                                <!-- <p class="">
                            <a href="" class="btn upload-btn mr-2 ml-2 pr-3 pl-3"><span class="fa fa-upload"></span></a>
                        </p> -->
                            </td>
                        </tr>



<?php
endforeach;
?>
                    </tbody>
                </table>

<?php
else:
    echo("No blogs posted yet");
endif;
?>
            </div>

        </div>



    </div>
