<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 12-07-2017
 * Time: 16:10
 */
include '../php_action/db_connect.php';

$id = $_GET['child_id'];
$sql = "SELECT child.first_name, child.last_name,address.street,address.city,address.state,address.country FROM child,address 
        WHERE child.address_id = address.id
        AND child.id = $id" ;
$result = $connect->query($sql);

if($result->num_rows > 0){
    while ($row = $result->fetch_array()){
        $first_name = $row[0];
        $last_name = $row[1];
        $street = $row[2];
        $city = $row[3];
        $state = $row[4];
        $country = $row[5];
    }
}
?>
<!DOCTYPE html>
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
    <link rel="stylesheet" href="../custom/css/admin-home.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../assests/plugins/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">Brand</a> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" id="navSetting">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>
                        <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <br><br>
                <li class="list-group-item"><span><strong>About Child</strong></span>
                    <p><?php echo $first_name." ".$last_name ;?></p>
                    <p><?php echo $street." ".$city." ".$state." ".$country?></p>
                </li>
            </ul>
        </div>

        <div class="col-md-9">
            <ul class="list-group">
                <div class="child-wishes">
                    <br><br>
                </div>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="selectWish" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" id="wishForm" action="php_action/enterWishDetails.php" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Store the Date and Time for Wish</h4>
                </div>
                <div class="modal-body">

                    <div id="wish-messages"></div>



                    <div class="wish-result">
                        <div class="form-group">
                            <label for="wishDate" class="col-sm-3 control-label">Wish Date: </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-8">
                                <!-- <label for="editDoctorName" class="col-sm-3 control-label" id="editDoctorName"></label> -->
                                <div class='input-group date' id='datetimepicker1'>
                                    <input type='text' class="form-control" id="date-time"/>
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div> <!-- /form-group-->

                    </div>
                    <!-- /edit brand result -->

                </div> <!-- /modal-body -->

                <div class="modal-footer editDoctorFooter">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>

                    <button type="submit" class="btn btn-success" id="wishBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                </div>
                <!-- /modal-footer -->
            </form>
            <!-- /.form -->
        </div>
        <!-- /modal-content -->
    </div>
</div>

<script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    $(document).ready(function () {
        var id = <?php echo $id; ?> ;

       $.ajax({
           type : "GET",
           url : "php_action/wishes_of_child.php",
           processData : false,
           contentType : "application/json",
           data : "child_id="+id,
           success :function (r) {

                var wishes = JSON.parse(r);
                $.each(wishes, function (index) {
                    $('.child-wishes').html(
                        $('.child-wishes').html() +
                            '<li class="list-group-item" id="'+wishes[index].id+'"><blockquote><p>'+wishes[index].wish+ '<button class="btn btn-default" type="button" style="color:#eb3b60;background-image:url(&quot;none&quot;);background-color:transparent;float: right" data-id=\"'+wishes[index].id+'\">Select the Wish</button></p></li>'
                    )

                    $('[data-id]').click(function () {
                       var wish_id = $(this).attr('data-id');
                        showSelectWishModal(wish_id);
                    });
                })

           }
       }) ;
    });

    function showSelectWishModal(wish_id) {
        var id = wish_id ;
        $('#selectWish').modal('show');
        $('#wishForm').unbind('submit').bind('submit', function() {

            // remove the error text
            $(".text-danger").remove();
            // remove the form error
            $('.form-group').removeClass('has-error').removeClass('has-success');


            var wish_date_time = $('#date-time').val();

            if(wish_date_time == "") {
                $("#date-time").after('<p class="text-danger"> Date and Time is required</p>');

                $('#date-time').closest('.form-group').addClass('has-error');
            } else {
                // remove error text field
                $("#date-time").find('.text-danger').remove();
                // success out for form
                $("#date-time").closest('.form-group').addClass('has-success');
            }

            if(wish_date_time) {

                //console.log("reached here");
                var form = $(this);

                // submit btn
                $('#wishBtn').button('loading');
                console.log(form.attr('action'));
                console.log(form.attr('method'));
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: {wishId : id, wish_date_time : wish_date_time},
                    dataType: 'json',
                    success:function(response) {

                        if(response.success == true) {
                            console.log('here');
                            console.log(response);
                            // submit btn
                            $('#wishBtn').button('reset');

                            // reload the manage member table
                            // remove the error text
                            $(".text-danger").remove();
                            // remove the form error
                            $('.form-group').removeClass('has-error').removeClass('has-success');

                            $('#wish-messages').html('<div class="alert alert-success">'+
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                                '</div>');

                            $(".alert-success").delay(500).show(10, function() {
                                $(this).delay(3000).hide(10, function() {
                                    $(this).remove();
                                });
                            }); // /.alert
                        } // /if

                    }// /success
                });	 // /ajax
            } // /if

            return false;
        });
    }
</script>
</body>
