<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://use.fontawesome.com/cea09ff679.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .line{
      height:2px;
      background-color: #EEE;
      margin-top: 6vh
    }
    .silhoutte{
      border-radius: 70px;
      border:2px solid #EEE;
      padding-top:15px;
      padding-bottom:15px;
      padding-right:15px;
      padding-left:25px; 
    }
    .itags{
      font-size:60px;
    }
    .changeColor{
      background-color: orange;
    }
  </style>
</head>
<body>

<div class="container">
  <h3>Tabs With Dropdown Menu</h3>
  <ul class="nav nav-tabs">
    <li class="link active" onclick="openUser(event,'LogIn')"><a href="#">Log In</a></li>
    <li class="link" onclick="openUser(event,'SignUpChild')"><a href="#">SignUp as Patient</a></li>
    <li class="link" onclick="openUser(event,'SignUpDoctor')"><a href="#">SignUp as Doctor</a></li>
    <li class="link" onclick="openUser(event,'SignUpVolunteer')"><a href="#">SignUp as Volunteer</a></li>
  </ul>
</div>
  <div id="LogIn" class="w3-container w3-border city">
    
  </div>

  <div id="SignUpChild" class="w3-container w3-border city" style="display:none">
    <div class="container">
      <div class="row">
        <div class="col-lg-1 line">
        </div>
        <div class="col-lg-1 silhoutte changeColor">
          <i class="fa fa-user itags" aria-hidden="true"></i>
        </div>
        <div class="col-lg-1 line">
        </div>
        <div class="col-lg-1 silhoutte">
          <i class="fa fa-user itags" aria-hidden="true"></i>
        </div>
        <div class="col-lg-1 line">
        </div>
        <div class="col-lg-1 silhoutte">
          <i class="fa fa-user itags" aria-hidden="true"></i>
        </div>
        <div class="col-lg-1 line">
        </div>       
      </div>
      <div id="BasicDetails" class="w3-container w3-border details1">
        <?php include 'login1.php';?>
        <button type="button" class="btn btn-primary" onclick="openDetail1(event,'Documents',1)">Next</button>
      </div>

    <div id="Documents" class="w3-container w3-border details1" style="display:none">
      <?php include 'login2.php';?>
      <h2>Tokyo</h2>
      <p>Tokyo is the capital of Japan.</p
    </div>
    <div id="FinalDetails" class="w3-container w3-border details1" style="display:none">
      <h2>Tokyo</h2>
      <p>Tokyo is the capital of Japan.</p>
    </div>
    </div>
    
  </div>

  <div id="SignUpDoctor" class="w3-container w3-border city" style="display:none">
    <h2>Tokyo</h2>
    <p>Tokyo is the capital of Japan.</p>
  </div>
  <div id="SignUpVolunteer" class="w3-container w3-border city" style="display:none">
    <h2>Tokyo</h2>
    <p>Tokyo is the capital of Japan.</p>
  </div>
</div>

<script>
function openUser(evt, cityName,numb) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("link");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
function openDetail1(evt, cityName,numb) {
  var i, x, tablinks;
  x = document.getElementsByClassName("details1");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("silhoutte");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" changeColor", "");
  }
  document.getElementById(cityName).style.display = "block";
  x = document.getElementsByClassName("silhoutte");
  x[numb].style.backgroundColor = "orange";
  //$(".silhoutte:nth-child("+1+")").css("background-color","orange");
  //alert($(".silhoutte:nth-child("+2+")").attr("class"));
  //evt.currentTarget.className += " changeColor";
}
</script>

</body>
</html>
  