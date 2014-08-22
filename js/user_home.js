/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$j = jQuery.noConflict();

$j(document).ready(function() {
    $j('#user-home-add-form1').validate({
        rules: {
            user_home_due1: {
                required: true,
                date: true
            },
            user_home_title1: {
                required: true,
                maxlength: 20
            }
        }
    });

    $j('#add-task-btn1').click(function() {
        $j('#user_home_due1').val('');
        $j('#user_home_title1').val('');
        $j('#user_home_desc1').val('');
        $j('#add-content1').toggle();
        if($j('#add-task-btn1').html()  == 'Add'){
            $j('#add-task-btn1').html('Cancel');
        } else {
            $j('#add-task-btn1').html('Add');
        }
    });
    
    $j('#user-home-add-form2').validate({
        rules: {
            user_home_due2: {
                required: true,
                date: true
            },
            user_home_title2: {
                required: true,
                maxlength: 20
            }
        }
    });

    $j('#add-task-btn2').click(function() {
        $j('#user_home_due2').val('');
        $j('#user_home_title2').val('');
        $j('#user_home_desc2').val('');
        $j('#add-content2').toggle();
        if($j('#add-task-btn2').html()  == 'Add'){
            $j('#add-task-btn2').html('Cancel');
        } else {
            $j('#add-task-btn2').html('Add');
        }
    });
    
    $j('#check_all_btn').click(function(){
        $j('.add-content1').toggle();
        if($j('#check_all_btn').html()  == 'Show All'){
            $j('#check_all_btn').html('Hide');
        } else {
            $j('#check_all_btn').html('Show All');
        }
    });
});



