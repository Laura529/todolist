/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function close_page() {
    window.location = 'index.php';
}

$j=jQuery.noConflict();

$j(document).ready(function(){
    $j('#myform2').validate({
        rules: {
            username: {
                required: true,
                minlength: 6,
                maxlength: 10
            },
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
            },
            email1: {
                required: true,
                email: true,
                maxlength: 30
            },
            email2: {
                required: true,
                email: true,
                maxlength: 30,
                equalTo: "#email1"
            },
            birth: {
                date: true
            }
        }
    });
    
    $j('#myform1').validate({
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 30
            },
            pwd: {
                required: true,
                minlength: 6,
                maxlength: 25
            }
        }
    });
    
    
});

