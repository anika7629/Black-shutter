@extends('adminlte::layouts.app')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{ asset('/js/jquery.tabledit.min.js') }}"></script>
@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="container-fluid spark-screen">

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				
	<?php
$connect = mysqli_connect("localhost", "root", "", "lara_login");
$query = "SELECT * FROM photo ORDER BY id DESC";
$result = mysqli_query($connect, $query);
?>				

<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Publish Portfolio</h3>
            </div>
			<form action="events.php" method="post">
            <div class="box-body">
              <input class="form-control input-lg" type="text" id="title" name="title" required="" placeholder="Image Url">
              <br>
			  <div class="form-group">
                       <textarea type="text" id="body" class="form-control"  name="body" required="" rows="3" placeholder="Description"></textarea>
                </div>
				
       			  <div align="center" class="form-group">
				<button type="submit" name="port_btn" class="btn btn-success">Add Portfolio</button>
				<br>
            </div>
			 </div>
			
			</form>
            <!-- /.box-body -->
          </div>			
												
<!------ Include the above in your HEAD tag ---------->

    <div class="container">    
    
       </div>
		
		
				
			</div>
		</div>
			<div class="container">  
   <br />  
   <br />  
   <br />  
            <div class="table-responsive">  
    <h3 align="center">Portfolio Box</h3><br />  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>ID</th>
       <th>Photo url</th>
       <th>Description</th>
	    <th>Time</th>
      </tr>
     </thead>
     <tbody>
    
   
 <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["id"].'</td>
       <td>'.$row["title"].'</td>
       <td>'.$row["body"].'</td>
	    <td><div class="b">'.$row["time"].'</div></td>
	   	        </tr>
			
      ';
     }
     ?>
     </tbody>
    </table>
	
   </div>  
  </div>   
	</body>   
<script>  
( function($) {
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'events.php',
      columns:{
       identifier:[0, "id"],
       editable:[[1, 'title'], [2, 'body'], [3, 'time']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  } ) ( jQuery );
 </script>
	</div>
	<body> 
@endsection
