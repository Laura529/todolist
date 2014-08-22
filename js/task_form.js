/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$j = jQuery.noConflict();

$j(document).ready(function() {
    $j('.form-horizontal').validate({
        rules: {
            due: {
                required: true,
                date: true
            },
            task_title: {
                required: true,
                maxlength: 20
            },
            task_desc: {
                maxlength: 100
            }
        }
    });

});



