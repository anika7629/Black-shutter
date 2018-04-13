                        <?php

$dbc=mysqli_connect("localhost","root","","lara_login");
if(isset($_POST['port_btn']))
{   $title=mysqli_real_escape_string($dbc,$_POST['title']);
    $body=mysqli_real_escape_string($dbc,$_POST['body']);
  
   
            $sql="INSERT INTO photo(title,body) VALUES('$title','$body')";
              mysqli_query($dbc,$sql);  
          header("Location: http://127.0.0.1:8000/home");
die();
  
}

?>
<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'lara_login');

$input = filter_input_array(INPUT_POST);

$title = mysqli_real_escape_string($connect, $input["title"]);
$body = mysqli_real_escape_string($connect, $input["body"]);
$b = mysqli_real_escape_string($connect, $input["time"]);
if($input["action"] === 'edit')
{
 $query = "
 UPDATE photo 
 SET title = '".$title."', 
 body = '".$body."' , 
 time = '".$time."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM photo 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>

    