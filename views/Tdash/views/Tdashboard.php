<?php


include('Dashboard/header.php');

include('Dashboard/navbar.php');

//require ('../controler/tcont.php');
$products = getteacher();
$pro = getpic();

$message=getmsgnoti();

$var=$_SESSION["loggedinuser"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tm";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


if($query="SELECT count(Sl) AS total FROM tinbox WHERE Status='unread' and ReceiverId='$var'")
{
  $result=mysqli_query($conn,$query);
  $values=mysqli_fetch_assoc($result);
  $unreadmassage=$values["total"];

}






?>



<style>

body{
	background-color:white;
	padding:0px;

}
.card{
	border:1px solid black;
	width:300px;
	height:50px;
	margin-left:10px;
	margin-right:10px;
	margin-top:10px;
	border-radius: 5px;
	text-align: center;
	background-color:black;
	padding:5px;


}
.text{
	font-family:consolas;
	color:black;
}
.text-white{
	font-family:consolas;
	color:white;
}

.center{
	margin: 0 auto;
    width:50% ;
	padding:20px;


}
.header-index{
	position:relative;
	left:0;
	top:0;
	width: 100%;
	background-color: black;
	color: white;
	font-family:consolas;
	padding:5px;

}
.name{
	font-family:consolas;
	font-size:16px;
}

.card-product{
	display: inline-block;
	border:1px solid;
	width:200px;
	height:349px;
	margin-left:10px;
	margin-right:29px;
	margin-top:32px;
	border-radius: 15px;
	text-align: center;
	padding:5px;


}
.card-image{
	width:190px;
	height:190px;
	border-radius: 5px;
}
.card-text{
	text-align:center;

}
.price-label{
	width:185px;
	padding:3px;
	margin-left:2px;
	background-color:black;
	color:white;
	border-radius: 5px;
}
.center-index{
	margin: 0 auto;
    width:90% ;
	padding:20px;

}
.item-image{
	width:200px;
	height:250px;
	border-radius: 5px;
}
.center-login{
	position: absolute;
	left: 50%;
	top: 50%;
	-webkit-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	padding-left:100px;
	padding-right:100px;
	padding-bottom:10px;
	border:1px solid black;
	border-radius:10px;
	vertical-align:center;


}
.btn{
	font-family:consolas;
}
.ca {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
    width: 185px;
    font-family: consolas;
    margin-top: 5px;
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}




           </style>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->


            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?php echo $unreadmassage ; ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>

								<?php
                  foreach($message as $msg)

                  {
                  ?>

                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="../storage/product_image/icon.png" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?php echo $msg["Message"]?></div>
                    <div class="small text-gray-500"><?php echo $msg["SenderId"]?>---<?php echo $msg["Date&Time"]?></div>
                  </div>
                </a>

								<?php
										 }

										 ?>

                <a class="dropdown-item text-center small text-gray-500" href="../controler/resetnoti.php">Mark all seen</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span name="uid" class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["loggedinuser"];?></span>
                <img class="img-profile rounded-circle" src="<?php echo $pro["Picture"];?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Home.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->



          <!-- Content Row -->
<div class="row">

            <!-- Earnings (Monthly) Card Example -->


            <!-- Earnings (Monthly) Card Example -->


          <!-- Content Row -->
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <input type="text" name= "ft" placeholder="Find Teacher " width="80%">
            <input type="Submit" value="Find">

          </div>

          <div class="col-md-12">
          		<?php
          			foreach($products as $product)
          			{
          		?>
          			<div class="card-product col-md-4">


          						<img class="card-image" src="<?php echo $product["Picture"];?>"></img>
          						<b class="text"> <?php echo $product["Name"];?></b><br>
                      	<b class="text"> <?php echo $product["Institute"];?></b><br>
                        	<b class="text"> <?php echo $product["Address"];?></b><br>

          					<div class="price-label"><span ><b><?php echo $product["UserName"];?></b></span></div>

          					<div class="ca"><a class="cb" href="contact.php?uid=<?php echo $product["UserName"] ?>" style="width:185px;font-family:consolas;margin-top:5px;color:black;font-weight:bold;">Contract</a></span></div>

          			</div>
          		<?php
          			}
          		?>

          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->







  <?php


  include('Dashboard/scripts.php');

  include('Dashboard/footer.php');



  ?>
