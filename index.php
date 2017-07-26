<?php
/**
 * Created by PhpStorm.
 * User: Sumeet
 * Date: 19-07-2017
 * Time: 21:19
 */
include 'php_action/db_connect.php';

$cities = "SELECT DISTINCT city FROM apartment_data";
$cities_in_db = $connect->query($cities);

$bhk = "SELECT DISTINCT BHK FROM apartment_data";
$bhk_in_db = $connect->query($bhk);

$type = "SELECT DISTINCT type_of_apartment FROM apartment_data";
$type_in_db = $connect->query($type);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Filters</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
    <!-- bootstrap theme-->
    <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="custom/css/admin-home.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

    <!-- file input -->
    <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

    <!-- jquery -->
    <script src="assests/jquery/jquery.min.js"></script>
    <!-- jquery ui -->
    <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="custom/css/admin-home.css">
    <script src="assests/jquery-ui/jquery-ui.min.js"></script>

    <!-- bootstrap js -->
    <script src="assests/bootstrap/js/bootstrap.min.js"></script>


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
        <div class="row">
            <div class="col-md-3">
                <div class="form-group" style="padding-left: 10%; padding-right: 10%">
                    <label for="cities" class="control-label" style="text-align: center">SELECT CITIES</label>
                    <select class="form-control" id="cities" name="cities" onchange="changed();">
                        <?php
                            if($cities_in_db->num_rows > 0){
                                while($row = $cities_in_db->fetch_array()){
                                    ?>
                            <option value="<?php echo $row['city'] ?>"> <?php echo $row['city']; ?></option>
                        <?php }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group" style="padding-left: 10%; padding-right: 10%">
                    <label for="bhk" class="control-label" style="text-align: center">BHK</label>
                    <?php
                        if($bhk_in_db->num_rows > 0){
                            while ($row = $bhk_in_db->fetch_array()){
                                ?>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="<?php echo $row['BHK']; ?>" name="bhk" class="bhk" id="bhk" onclick="changed();"><?php echo $row['BHK']." BHK"?></label>
                                </div>
                            <?php }
                        }
                    ?>
                </div>

                <div class="form-group" style="padding-left: 10%; padding-right: 10%">
                    <label for="type_of_apartment" class="control-label" style="text-align: center">Type of Apartment</label>
                    <div class="row" style="margin:0% 0% 0% 10px">
                        <?php
                        $i = 0;
                        if($type_in_db->num_rows > 0){
                            while ($row = $type_in_db->fetch_array()) {
                                if($i % 2 == 0){
                                    ?>
                                <div class="col-md-6">
                                    <div class="radio radio-danger">
                                        <input type="radio" name="type_of_aparment" class="type_of_aparment" id="type_of_aparment" value="<?php echo $row['type_of_apartment']; ?>" onclick="changed();">
                                        <label><?php echo $row['type_of_apartment']; ?></label>
                                    </div>
                                </div>
                                <?php
                                 $i++ ;
                                }else{
                                    ?>
                                <div class="col-md-6">
                                    <div class="radio radio-danger">
                                        <input type="radio" name="type_of_aparment" class="type_of_aparment" id="type_of_aparment" value="<?php echo $row['type_of_apartment']; ?>" onclick="changed();">
                                        <label><?php echo $row['type_of_apartment']; ?></label>
                                    </div>
                                </div>
                                    <?php
                                $i++;
                                }
                            }}
                        ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="min" name="min" placeholder="Min" onblur="changed();">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="max" name="max" placeholder="Max" onblur="changed();">
                    </div>
                </div>
            </div>

            <div class="col-md-9">

            </div>
        </div>

<script src="custom/js/index.js"></script>

</body>
</html>
