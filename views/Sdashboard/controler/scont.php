<?php
  $var;
  require_once '../models/db_connect.php';
  if(isset($_POST["add_picture"]))
  {
    insertPicture();
  }
  else if(isset($_POST["Update_student"]))
	{
		Profileupdate();
	}
  function getstudent()
  {
    $query ="SELECT * FROM student";
    $products = get($query);
    return $products;
  }

  function insertPicture()
  {

     //file upload
        $target_dir="../storage/product_image/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    //echo $target_file;
    $query="UPDATE `student` SET `Picture`='$target_file' WHERE `UserName`='Ayshik111'";
    execute($query);


  }

  function getdetails()
  {
    session_start();

    if(!empty('$_SESSION["loggedinuser"]')){
      $var=$_SESSION["loggedinuser"];
      
    }


    $query="SELECT * FROM student WHERE UserName='$var'";
    $product=get($query);
    return $product[0];

  }

  function Profileupdate()
  {
      session_start();

      if(!empty('$_SESSION["loggedinuser"]')){
        $var=$_SESSION["loggedinuser"];

      }

  if(isset($_POST["mpass"]) || isset($_POST["npass"]) || isset($_POST["cpass"])){



    $institute=$_POST["institute"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
    $password=$_POST["mpass"];
      $npassword=$_POST["npass"];
        $cpass=$_POST["cpass"];


     $query="UPDATE student SET Institute='$institute',Phone='$phone',Address='$address',Password='$cpass' WHERE UserName='$var'";
    execute($query);


  }
}

?>
