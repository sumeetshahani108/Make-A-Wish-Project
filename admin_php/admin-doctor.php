<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 11-07-2017
 * Time: 18:14
 */


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

    <script src="../assests/plugins/fileinput/js/plugins/canvas-to-blob.min.js'); ?>" type="text/javascript"></script>
    <script src="../assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="../assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="../assests/plugins/fileinput/js/fileinput.min.js"></script>


    <!-- DataTables -->
    <script src="../assests/plugins/datatables/jquery.dataTables.min.js"></script>

</head>
<body>

    <div class="row">
        <div class="col-md-12">

            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Doctors</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Doctors</div>
                </div>

                <div class="panel-body">
                    <div class="remove-messages"></div>
                    <table class="table" id="manageDoctorTable">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name </th>
                            <th>View Documents</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                    </table>
                </div> <!--panel body-->
            </div> <!-- end of panel-->
        </div>
    </div>

    <script src="../custom/js/admin-doctor.js"></script>

</body>
</html>
