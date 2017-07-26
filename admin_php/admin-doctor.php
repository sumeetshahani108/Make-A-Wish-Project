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

    <script src="../assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="../assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="../assests/plugins/fileinput/js/fileinput.min.js"></script>


    <!-- DataTables -->
    <script src="../assests/plugins/datatables/jquery.dataTables.min.js"></script>
    <script>
        /**
         * Created by Sumeet on 13-07-2017.
         */
        function viewDoc(doctorId) {
            //alert("here");
            if(doctorId){
                //alert("here");
                $.ajax({
                    url : 'php_action/fetchDoctorDocuments.php',
                    type : 'post',
                    data : {doctorId : doctorId},
                    dataType : 'json',
                    success : function (response) {
                        var path = response.documents;
                        $.ajax({
                            url : 'php_action/fetchActualDoctorDocuments.php',
                            type : 'post',
                            data : {path : response.documents},
                            dataType : 'json',
                            success : function (response) {
                                console.log(response);
                                var temp = 0;
                                $('#documentImages').empty();
                                $.each(response, function (key, value){
                                    //alert("here");
                                     var e = "../" + path + "/" +response[key];
                                     //alert(e);
                                     console.log(e);
                                     if(temp == 0){
                                     $('#documentImages').append('<div class="item active">' +
                                     '<img src="' + e + '" alt="Cant Load Images">' +
                                     '</div>');
                                     temp = 1;
                                     }else{
                                     $('#documentImages').append('<div class="item">' +
                                     '<img src="' + e + '" alt="Cant Load Images">' +
                                     '</div>');
                                     }



                                })
                            }
                        });
                    }

                });
            }
        }
    </script>



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
                            <th style="width:15%;">Options</th>
                        </tr>
                        </thead>
                    </table>
                </div> <!--panel body-->
            </div> <!-- end of panel-->
        </div>
    </div>

    <div class="modal fade" id="viewDocs" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Certificates of Doctor</h4>
                </div>
                <div class="modal-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" id="documentImages">

                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editDoctor" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <form class="form-horizontal" id="editDoctorForm" action="php_action/editDoctor.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Doctor Verification</h4>
                    </div>
                    <div class="modal-body">

                        <div id="edit-brand-messages"></div>



                        <div class="edit-doctor-result">
                            <div class="form-group">
                                <label for="editDoctorName" class="col-sm-3 control-label">Doctor Name: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-8">
                                   <!-- <label for="editDoctorName" class="col-sm-3 control-label" id="editDoctorName"></label> -->
                                    <input type="text" class="form-control" id="editDoctorName" placeholder="Brand Name" name="editDoctorName" autocomplete="off">
                                </div>
                            </div> <!-- /form-group-->
                            <div class="form-group">
                                <label for="editDoctorStatus" class="col-sm-3 control-label">Verification Status: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="editDoctorStatus" name="editDoctorStatus">
                                        <option value="">~~SELECT~~</option>
                                        <option value="1">Verify</option>
                                        <option value="0">Do not Verify</option>
                                    </select>
                                </div>
                            </div> <!-- /form-group-->
                        </div>
                        <!-- /edit brand result -->

                    </div> <!-- /modal-body -->

                    <div class="modal-footer editDoctorFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

                        <button type="submit" class="btn btn-success" id="editDoctorBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
                    </div>
                    <!-- /modal-footer -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /modal-content -->
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="deleteDoctor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Doctor</h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to remove ?</p>
                </div>
                <div class="modal-footer removeBrandFooter">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="button" class="btn btn-primary" id="removeDoctorBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <script src="../custom/js/admin-doctor.js"></script>

</body>
</html>
