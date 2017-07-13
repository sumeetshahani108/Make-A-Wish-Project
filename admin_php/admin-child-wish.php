<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 12-07-2017
 * Time: 13:42
 */
include '../php_action/db_connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Section</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../assests/bootstrap/css/bootstrap.min.css">
    <!-- bootstrap theme-->
    <link rel="stylesheet" href="../assests/bootstrap/css/bootstrap-theme.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="../assests/font-awesome/css/font-awesome.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="../custom/css/admin-doctor.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../assests/plugins/datatables/jquery.dataTables.min.css">

    <!-- file input -->
    <link rel="stylesheet" href="../assests/plugins/fileinput/css/fileinput.min.css">

    <!-- jquery -->
    <script src="../assests/jquery/jquery.min.js"></script>
    <!-- jquery ui -->
    <link rel="stylesheet" href="../assests/jquery-ui/jquery-ui.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="../custom/css/admin-home.css">
    <script src="../assests/jquery-ui/jquery-ui.min.js"></script>

    <!-- bootstrap js -->
    <script src="../assests/bootstrap/js/bootstrap.min.js"></script>

    <script src="../assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="../assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="../assests/plugins/fileinput/js/fileinput.min.js"></script>


    <!-- DataTables -->
    <script src="../assests/plugins/datatables/jquery.dataTables.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-1">

            </div>
            <div class="col-lg-9">
                <ul class="list-group">
                    <div class="verified-children">
                        <br><br>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
           $.ajax({
               type : "GET",
               url : "php_action/verified_child_info.php",
               processData : false,
               contentType : "application/json",
               data : '',
               success : function (r) {

                   var childs = JSON.parse(r);
                   $.each(childs,function (index) {
                       console.log(childs[index].child_id);
                       $('.verified-children').html(
                           $('.verified-children').html() +
                               ' <li class="list-group-item" id="'+childs[index].child_id+'"><blockquote><p>'+ childs[index].child_first_name+" " + childs[index].child_last_name+'</p>'
                                + childs[index].street + ", " + childs[index].city + ", " + childs[index].state + ", " + childs[index].country + ' ' + '<a href=admin-child-wish-details.php?child_id='+childs[index].child_id +' class="btn btn-default" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;float: right" data-id=\"'+childs[index].child_id+'\">View the Wishes of Child</a>' + '<footer> Verified By Doctor ' + childs[index].doctor_first_name + " " + childs[index].doctor_last_name + " and Volunteer " + childs[index].volunteer_first_name + " " + childs[index].volunteer_last_name +'</footer>' + '</li>'
                       )
                   })
               }
           }) ;
        });
    </script>
</body>

</html>
