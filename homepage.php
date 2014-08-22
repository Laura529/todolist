<?php
if(!isset($msg1)){
    $msg1 = '';
}
if(!isset($msg2)){
    $msg2 = '';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>My To-Do Lists | Best way to organize your important tasks</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">
        
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
        <style type="text/css">
            label.error{
                color: #ff0000;
            }
        </style>
    </head>
    <body>
        <!--login modal-->
        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="text-center">TO DO LIST</h1>
                        <p class="star"><?php echo $msg1; ?></p>
                    </div>
                    <div class="modal-body body-height">
                        <form id="myform1" class="form col-md-12 center-block" action="./" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control input-lg" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control input-lg" placeholder="password" name="pwd">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign In">
                                <span><a href="#">Forget Password?</a></span>
                            </div>
                            <input type="hidden" name="action" value="login">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <form action="./" method="post">
                                <input type="hidden" name="action" value="user_form">
                                <input type="submit" value="New User" class="btn btn-lg btn-primary">
                            </form>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
        <!-- script references -->
        <script src="js/jquery-1.11.0.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/list.js"></script>
    </body>
</html>