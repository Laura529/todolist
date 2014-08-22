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
                            <img src="upload/<?php echo $_SESSION['img']; ?>" alt="photo" class="circle">
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
                            <a href="../?action=logout">sign out</a>
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
                        <form class="form-horizontal" role="form" action="./" method="post">
                            <div class="form-group">
                                <label for="due" class="col-sm-offset-2 col-sm-2 control-label">Due Date</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" id="due" name="due" value="<?php echo $task['due']; ?>">
                                </div>
                                <div class="col-sm-3 star">
                                    <span>*</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="task_title" class="col-sm-offset-2 col-sm-2 control-label">Title</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="task_title" name="task_title" value="<?php echo $task['content']; ?>">
                                </div>
                                <div class="col-sm-3 star">
                                    <span>*</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="task_desc" class="col-sm-offset-2 col-sm-2 control-label">Description</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" id="task_desc" name="task_desc"><?php echo $task['description']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-4">
                                    <button type="submit" class="btn btn-default">Update</button>
                                    <input type="hidden" name="action" value="edit">
                                    <input type="hidden" name="tid" value="<?php echo $task['tid']; ?>">
                                </div>
                                <div class="col-sm-4">
                                    <a href="?action=user_home" class="btn btn-default" id="cancel_btn" name="cancel_btn">Cancel</a>
                                </div>
                            </div>
                        </form>
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
        <script src="../js/task_form.js"></script>



    </body>

</html>
