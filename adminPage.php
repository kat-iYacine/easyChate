<?php
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
	<title>i'm admin</title>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script>
		$(document).ready(function(){

        $("#buttonpsw").click(function(){
				$("#psw").slideToggle(); 
			});

         $("#search").keypress(function(e){
           if (e.which==13) {
              if($("#search").val()!=""){
             $("#information").load('admin/search.php?idf='+$("#search").val()),$("#search").val(""),
               $("#search").val("");
           }
               }
                  }); 
                       var ope;
                       var idf;
	                       $(document).on('click',".b button",function(){
                            ope=$(this).attr('name');
                            idf=$(this).attr('id');
                               $.get('admin/DelOrBlock.php',{idf:idf,operation:ope});
                          
                             }); 
                                    $(document).on('click',".c button",function(){
                                   $("#chat").load('admin/chat.php?id1='+$("#first_id").val()+'&id2='+$("#second_id").val()),
                                   $("#first_id").val(""),$("#second_id").val("");
                             }); 
                                 
                       $("#newpsw").keypress(function(e){
                          if (e.which==13) {
                              if(($("#newpsw").val()!="") &($("#oldpsw").val()!="") ){
                             $("#databack").load('admin/update.php?opsw='+$("#oldpsw").val()+'&npsw='+$("#newpsw").val()),
                                   $("#newpsw").val(""),$("#oldpsw").val("");
                                                              }
                                                                }
                                                                    });                 

		});
	</script>
	 <link rel="stylesheet" href="css/styleadmin.css">
   <style>
     #adminbtn
     {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-right: 20px;
     }
   </style>
</head>
<body style="background-image: url('img/Images29.jpg');">

<div class="a" style="height:42px;"> 
<h2 style="color:#fff">&nbsp; &nbsp;&nbsp; "Wellcome Admin"</h2> <a href="admin/admin_login.html"><button id="buttonlogout">logout</button> </a>
</div>

<div class="b">
<br><h3 style="color: rgba(40,59,100,1)">"Users Online:<?php $all=mysqli_query($con,"SELECT COUNT(id)AS user  FROM accounts WHERE online=1");
                                                         while ($row=mysqli_fetch_array($all)) {  
                                                                      echo $row['user'];
                                                                         } ?>"</h3></br>
<br><h3 style="color: rgba(40,59,100,1)">"All Users:<?php $online=mysqli_query($con,"SELECT COUNT(id)AS online  FROM accounts");
                                                         while ($row=mysqli_fetch_array($online)) {  
                                                                      echo $row['online'];
                                                                         } ?>"</h3></br>
 <input id="search" type="text" name="search" placeholder="search user">
<div id="information"></div>
 </div>

<div class="c">
<div id="search_chat">
<br>&nbsp;&nbsp;&nbsp;<input id="first_id" type="text" placeholder="first_id"> 
<input id="second_id" type="text" placeholder="second_id">
&nbsp;<button>go</button></br> <br><hr></hr></br></div>
<div id="chat"></div>
</div>
<div class="d" style="overflow: auto;">
<ul>
  <?php 
    $con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
    $query = "SELECT * FROM Reports";
    $query3 = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($query3))
    {
      $report_from = $row['from_who'];
      $report_to = $row['to_who'];
      $report_date = $row['report_date'];

      echo '<li> User ID = <mark>' .$report_from.'</mark> <span style="color: red;" >reported</span> User ID = <mark>'.$report_to.'</mark> at '.$report_date.'</li><br><br>';
    }
  ?>
  </ul>
</div>

 <div id="psw">
   <br> <input id="oldpsw" type="text" name="oldpsw" placeholder="&nbsp; &nbsp; &nbsp; old password" ></br>
   <br><input  id="newpsw" type="text" name="newpsw" placeholder="&nbsp; &nbsp; &nbsp; newpassword"></br>
   <div id="databack"></div>
  </div>
</body>
</html>