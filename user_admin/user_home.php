<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My To-Do Lists | Best way to organize your important tasks</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->
    <link href="../css/user_home.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        label.error {
            color: #ff0000;
        }
    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="link">
                    <a class="link" href="?action=user_home">
                        <img src="./upload/<?php echo $_SESSION['img']; ?>" alt="photo" class="circle">
                    <?php echo $_SESSION['username']; ?>
                </a>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="link">
                        <a href="?action=user_form">Profile</a>
                    </li>
                    <li class="link">
                        <a href="../?action=logout">Sign out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="panel panel-danger">
                            <div class="panel-title column-header title-color1">
                                <span class="glyphicon glyphicon-paperclip"> Preparing</span> 
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 panel-body-top">
                                    <?php if (!empty($tasks)) {
                                        foreach ($tasks as $task): if($task['type'] == '0') {?>
                                    <div class="card" <?php if(isset($task['description'])){ ?>title="<?php echo $task['description']; ?>"<?php } ?>>
                                        <div class="col-lg-8">
                                            <?php echo $task['due'] . '   ' . $task['content']; ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="?action=edit_type&tid=<?php echo $task['tid']; ?>&type=0" class="glyphicon glyphicon-arrow-right pull-right icon-right" title="edit"></a>
                                                <a href="?action=delete_task&tid=<?php echo $task['tid']; ?>" class="glyphicon glyphicon-trash pull-right icon-right" title="remove"></a>
                                                <a href="?action=edit_item&tid=<?php echo $task['tid']; ?>" class="glyphicon glyphicon-pencil pull-right icon-right" title="edit"></a>
                                        </div>  
                                            </div>
                                        <?php } endforeach;} ?>
                                </div>
                                <div class="add-content" id="add-content1">
                                    <form id="user-home-add-form1" class="form" action="./" method="post">
                                        <div class="col-lg-12 form-group panel-body-top">
                                            <input type="date" name="user_home_due1" id="user_home_due1" class="form-control">
                                        </div>
                                        <div class="col-lg-12 form-group panel-body-top">
                                            <input type="text" name="user_home_title1" id="user_home_title1" class="form-control" placeholder="task title...">
                                        </div>
                                        <div class="col-lg-12 form-group panel-body-top">
                                            <input type="text" name="user_home_desc1" id="user_home_desc1" class="form-control" placeholder="task content...">
                                            <input type="hidden" name="action" value="add_task">
                                            <input type="hidden" name="category" value="0">
                                        </div>
                                        <div class="col-lg-12 form-group panel-body-top">
                                            <input type="submit" class="form-control" value="OK">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel-footer column-header">
                                <button class="btn btn-primary" id="add-task-btn1">Add</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-primary">
                            <div class="panel-title column-header title-color2">
                                <span class="glyphicon glyphicon-wrench"> Working</span>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 panel-body-top">
                                    <?php if (!empty($tasks)) {
                                        foreach ($tasks as $task): if($task['type'] == '1') {?>
                                    <div class="card" <?php if(isset($task['description'])){ ?>title="<?php echo $task['description']; ?>"<?php } ?>>
                                        <div class="col-lg-8">
                                            <?php echo $task['due'] . '   ' . $task['content']; ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="?action=edit_type&tid=<?php echo $task['tid']; ?>&type=1" class="glyphicon glyphicon-arrow-right pull-right icon-right" title="edit"></a>
                                                <a href="?action=delete_task&tid=<?php echo $task['tid']; ?>" class="glyphicon glyphicon-trash pull-right icon-right" title="remove"></a>
                                                <a href="?action=edit_item&tid=<?php echo $task['tid']; ?>" class="glyphicon glyphicon-pencil pull-right icon-right" title="edit"></a>
                                        </div> 
                                            </div>
                                        <?php } endforeach;} ?>
                                </div>
                                <div class="add-content" id="add-content2">
                                    <form id="user-home-add-form2" class="form" action="./" method="post">
                                        <div class="col-lg-12 form-group panel-body-top">
                                            <input type="date" name="user_home_due2" id="user_home_due2" class="form-control">
                                        </div>
                                        <div class="col-lg-12 form-group panel-body-top">
                                            <input type="text" name="user_home_title2" id="user_home_title2" class="form-control" placeholder="task title...">
                                        </div>
                                        <div class="col-lg-12 form-group panel-body-top">
                                            <input type="text" name="user_home_desc2" id="user_home_desc2" class="form-control" placeholder="task content...">
                                            <input type="hidden" name="action" value="add_task">
                                            <input type="hidden" name="category" value="1">
                                        </div>
                                        <div class="col-lg-12 form-group panel-body-top">
                                            <input type="submit" class="form-control" value="OK">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel-footer column-header">
                                <button class="btn btn-primary" id="add-task-btn2">Add</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-success">
                            <div class="panel-title column-header title-color3">
                                <span class="glyphicon glyphicon-ok"> Done</span>
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 panel-body-top">
                                    <?php if (!empty($tasks)) {
                                        $tasks_reverse = array_reverse($tasks);
                                        $i = 0;
                                        foreach ($tasks_reverse as $task): if($task['type'] == '2') {?>
                                    <div class="card <?php if($i>8){echo 'add-content1';} ?>" <?php if(isset($task['description'])){ ?>title="<?php echo $task['description']; ?>"<?php } ?>>
                                        <div class="col-lg-8">
                                            <?php echo $task['due'] . '   ' . $task['content']; ?>
                                        </div>
                                        <div class="col-lg-4">
                                            <a href="?action=delete_task&tid=<?php echo $task['tid']; ?>" class="glyphicon glyphicon-trash pull-right icon-right" title="remove"></a>
                                        </div> 
                                    </div>
                                        <?php $i ++; } endforeach;} ?>
                                </div>
                            </div>
                            <div class="panel-footer column-header">
                                <button class="btn btn-primary" id="check_all_btn">Show All</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

<!--    <div class="container">

        <hr>

         Footer 
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
     /.container -->
<script src="../js/jquery-1.11.0.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/user_home.js"></script>



</body>

</html>
