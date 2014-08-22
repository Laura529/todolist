<?php
if (empty($msg1)) {
    $msg1 = '';
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My To-Do Lists | Register</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
        <style type="text/css">
            label.error {
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="close_page();">×</button>
                        <h1 class="text-center">Registration</h1>
                        <p class="star"><?php echo $msg1; ?></p>
                    </div>
                    <div class="modal-body newheight">
                        <form id="myform2" class="form col-md-12 center-block" action="./" method="post">
                            <div class="form-group">
                                <input class="form-control input-lg" type="text" name="username" id="username" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="password" name="pwd1" id="pwd1" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="password" name="pwd2" id="pwd2" placeholder="Confirm passord"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="email" name="email1" id="email1" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="email" name="email2" id="email2" placeholder="Confirm email"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg" type="date" name="birth" id="birth" placeholder="Birthday"/>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="action" value="signup">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" name="submit" class="btn btn-lg btn-primary">
                            </div>
                        </form>
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
