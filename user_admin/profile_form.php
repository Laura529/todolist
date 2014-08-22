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
                        <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="col-sm-offset-2 col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <label class="star"><?php if(isset($_GET['msg1'])){$msg1 = $_GET['msg1'];} else {$msg1='';} echo $msg1; ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="uname" class="col-sm-offset-2 col-sm-2 control-label">Username</label>
                                <div class="col-sm-5">
                                    <form role="form" id="uname_form" action="./" method="post">
                                        <input type="text" class="form-control" id="uname" name="uname" value="<?php echo $_SESSION['username']; ?>" readonly>
                                        <input type="hidden" name="action" value="edit_uname">
                                    </form>
                                    </div>
                                <div class="col-sm-3">
                                    <a id="uname_edit" class="glyphicon glyphicon-pencil"></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-offset-2 col-sm-2 control-label">Email</label>
                                <div class="col-sm-5">
                                    <form role="form" id="email_form" action="./" method="post">
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" readonly>
                                        <input type="hidden" name="action" value="edit_email">
                                    </form>
                                    </div>
                                <div class="col-sm-3">
                                    <a id="email_edit" class="glyphicon glyphicon-pencil"></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birth" class="col-sm-offset-2 col-sm-2 control-label">Birthday</label>
                                <div class="col-sm-5">
                                    <form role="form" id="birth_form" action="./" method="post">
                                        <input type="date" class="form-control" id="birth" name="birth" value="<?php echo $_SESSION['birth']; ?>" readonly>
                                        <input type="hidden" name="action" value="edit_birth">
                                    </form>
                                    </div>
                                <div class="col-sm-3">
                                    <a id="birth_edit" class="glyphicon glyphicon-pencil"></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pwd" class="col-sm-offset-2 col-sm-2 control-label">Password</label>
                                <div class="col-sm-5">
                                    <input type="button" class="form-control btn btn-default" id="pwd" name="pwd" value="Change Password">
                                </div>
                            </div>
                            <div class="form-group add-content" id="change_pwd_form">
                                <label class="col-sm-offset-2 col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <form role="form" id="pwd_form" class="form col-sm-6" action="./" method="post">
                                        <div class="form-group">
                                            <input type="password" class="form-control input-sm" id="pwd1" name="pwd1" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control input-sm" id="pwd2" name="pwd2" placeholder="Confirm Password">
                                            <input type="hidden" name="action" value="edit_pwd">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="col-sm-offset-2 col-sm-2 control-label">Photo</label>
                                <div class="col-sm-5">
                                    <input type="button" class="form-control btn btn-default" id="photo" name="photo" value="Change Photo">
                                </div>   
                            </div>
                            <div class="form-group add-content" id="change_img_form">
                                <label class="col-sm-offset-2 col-sm-2 control-label"></label>
                                <div class="col-sm-5">
                                    <form role="form" id="img_form" class="form col-sm-6" action="./" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="file" class="form-control input-sm" id="file" name="file">
                                            <input type="hidden" name="action" value="edit_img">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-default" value="submit">
                                        </div>
                                    </form>
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
        <script>
            $j = jQuery.noConflict();
            $j(document).ready(function(){
                $j('#uname_form').validate({
                    rules: {
                        uname: {
                            required: true,
                            minlength: 6,
                            maxlength: 10
                        }
                    }
                });
                
                $j('#email_form').validate({
                    rules: {
                        email: {
                            required: true,
                            email: true,
                            maxlength: 30
                        }
                    }
                });
                
                $j('#pwd_form').validate({
                    rules: {
                        pwd1: {
                            required: true,
                            minlength: 6,
                            maxlength: 25
                        },
                        pwd2: {
                            required: true,
                            minlength: 6,
                            maxlength: 25,
                            equalTo: "#pwd1"
                        }
                    }
                });
                
                $j('#uname_edit').click(function(){
                    $j('#uname').attr('readonly', false);
                });
                
                $j('#uname').keypress(function(e){
                    if(e.which == 13){
                        $j('#uname_form').submit();
                    }
                });
                
                $j('#email_edit').click(function(){
                    $j('#email').attr('readonly', false);
                });
                
                $j('#email').keypress(function(e){
                    if(e.which == 13){
                        $j('#email_form').submit();
                    }
                });
                
                $j('#birth_edit').click(function(){
                    $j('#birth').attr('readonly', false);
                });
                
                $j('#birth').keypress(function(e){
                    if(e.which == 13){
                        $j('#birth_form').submit();
                    }
                });
                
                $j('#pwd').click(function(){
                    $j('#change_pwd_form').toggle();
                });
                
                $j('#pwd2').keypress(function(e){
                    if(e.which == 13){
                        $j('#pwd_form').submit();
                    }
                });
                
                $j('#photo').click(function(){
                    $j('#change_img_form').toggle();
                });
            });
        </script>


    </body>

</html>
