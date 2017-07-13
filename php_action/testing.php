<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 11-07-2017
 * Time: 16:35
 */
include 'getAllStates.php';
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

    <script type="text/javascript">

      function getChildrens(value,StateOrCity){
        $(".allChildren").empty();
        var data1;
        if(StateOrCity == 1){
          data1 = "state="+$("#select_state").val();
        }else{
          data1 = "state="+$("#select_state").val()+"&city="+$("#city_select").val();
        }
        //alert(data1);
        $.ajax({
          type:"POST",
          url:"getAllChild.php",
          data:data1,
          success:function(response){
            var res = [];
            res = JSON.parse(response);
            console.log(res);
            var i = 0;
            if(res["names"].length > 0){
              $.each(res["names"], function (key,value) {
                //alert(res["names"][0]);
                $('.allChildren').append('<div class="col-lg-3 col-lg-offset-1 child_cards"><img src='+'../../'+res["images"][i]+ ' class="card_image" /><div class="inner_details"><h5>'+res["names"][i]+'</h5><h5>'+res["address"][i]+'</h5><h5>'+res["disease"][i]+'</h5></div><div id="wrap" style="padding-top: 10px;padding-bottom: 10px"><form action="profile.php" method="POST"><input type="hidden" value='+res["ids"][i]+ ' name="id"><input type="submit" class="btn btn-default btn-lg" style="border-radius: 15px"></form></div></div>');
                i++;
                //console.log('<a href=abc.php?id='+1+' class=abc>');
              });
            }else{
              $('.allChildren').append('<div class="alert alert-success"><strong>Sorry!</strong> No results found for this state.</div>');
            }
          }
        });
      }

      function getAllCities(value){
        $("#city_select").empty();
        $.ajax({
          type:"POST",
          url:"getAllCities.php",
          data:"state="+value,
          success:function(response){
            var res = [];
            res = JSON.parse(response);
            $.each(res, function (i, item) {
              $('#city_select').append($('<option value='+item+'>'+item+'</option>'));
              //console.log('<a href=abc.php?id='+1+' class=abc>');
          });
          }
        });
        getChildrens(value);
        
      }
    </script>
    <style type="text/css">
      .child_cards{
        border-radius: 15px;
        border:1px solid #EEE;
        padding:0px;
      }
      .card_image{
        height:30vh;
        width:100%;
        border-radius: 15px 15px 0 0;
      }
      .inner_details{
        padding:0px 20px 20px 20px;
        border-bottom: 1px solid #EEE;
      }
      #wrap {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      #wrap input:hover{
        
        color:#c0972e;
      }
      /*.button_div{
        padding-top: 10px;
        padding-bottom: 10px
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .button_div a{
        margin: 0 auto;
      }
      .button_div a:hover{
        
        color:black;
      }*/
    </style>
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

    <div class="col-lg-12 mainprof" style="width:96%">
        <!--
        <button type="button" style="margin-top: 1%; margin-left: 1%" data-toggle="collapse" data-target="#filters" class="visible-lg btn btn-warning btn-lg collapsed" aria-expanded="false">
                <span class="glyphicon glyphicon-plus">

                </span>
        </button>
        -->
        <div class="col-lg-2 mainprof" style="padding: 1%" id="filters" aria-expanded="false">
            <div style="margin-top: 1%; background-color: #f8f8f8; padding: 1%">
                <ul class="nav nav-pills nav-stacked mytabs">

                    <h4 style="color:#e40046;margin-left:3vw;">Admin Section</h4>
                    <hr style="margin-top:10px;">
                    <li class="active">
                        <h5>Select state</h5>
                        <select class="form-control" onchange="getAllCities(this.value)" id="select_state">
                         <?php 
                              if(mysqli_num_rows($allStates)){
                                while($row = mysqli_fetch_assoc($allStates)){
                          ?>  
                          <option value="<?php echo $row["state"]?>"><?php echo $row["state"]?></option>
                          <?php        
                                }
                              }

                         ?>
                        </select>
                    </li>
                    <br>
                    <li>
                        <h5>Select city</h5>
                        <select class="form-control" id="city_select" onchange="getChildrens(this.value,2)">
                         
                        </select>
                    </li>
                    <br>
                    <li>
                        <a data-toggle="tab" href="#volunteer" aria-expanded="true">
                            <span class="fa fa-user"></span>
                            &nbsp;&nbsp;Volunteer
                        </a>
                    </li>
                    <br>
                    <li>
                        <a data-toggle="tab" href="#child" aria-expanded="true">
                            <span class="fa fa-user"></span>
                            &nbsp;&nbsp;Child
                        </a>
                    </li>
                    <br>
                </ul>
            </div>
        </div>

        <div class="col-lg-10" style="margin-top: 1%; paddingbackground-color: #f8f8f8">
            <div class="tab-content">
                <div class="row">
                  <div class="col-lg-12 allChildren">
                    
                  </div>
                </div>
               <!-- <div id="home" class="tab-pane fade">
                    <h1>I am Home</h1>
                </div>
                <div id="doctor" class="tab-pane fade">
                    
                </div>
                <div id="volunteer" class="tab-pane fade">
                    <h1>I am Volunteer</h1>
                </div>
                <div id="child" class="tab-pane fade">
                    <h1>I am Child</h1>
                </div>-->
            </div>
        </div>
    </div>

</body>
</html>


