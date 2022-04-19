<?php
 $id; 
 $photo;
 $user;
session_start();
if (!isset($_SESSION['email'])) {
	header("location:index.php");
}
$con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
$id=$_SESSION['id'];
$query=mysqli_query($con,"SELECT username,photo_profil FROM accounts WHERE id='$id'");
                   while ($row=mysqli_fetch_array($query)) {
                    	
                
                        $photo=$row['photo_profil'];
                        $user=$row['username'];
                  }
                  	
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user;?></title>
	<script src="js/jquery-3.1.1.min.js"> </script>
	<script>
		$(document).ready(function(){

          
           $("#showmsg,#creatmsg").hide();
			$("#messages_icon").click(function(){
				$("#msg").slideToggle(),$("#list").slideUp(),$("#inv").slideUp();
			});
			$("#config").click(function(){
				$("#list").slideToggle(),$("#msg").slideUp(),$("#inv").slideUp();
			});
			$("#friend_request_icon").click(function(){
				$("#inv").slideToggle(),$("#list").slideUp(),$("#msg").slideUp();
			});
      var ide; 
      setInterval(function(){newmsg();},2000);
      function newmsg(){
         $("#showmsg").load('call/chat.php?idfnd='+ide);
      }
      setInterval(function(){act();},2000);

      function act(){ 
                                   
        $(document).on('click',".b div div div",function(){
                
                  $("#showmsg,#creatmsg").show();
             $(".c").html('<center><p id="chatwith">Chatting with:'+$(this).text()+'</h3></center>'),ide=$(this).attr('id');
               $("#showmsg").load('call/chat.php?idfnd='+ide);
                
                                      });  

               $('#myfrd').load('call/myfrds.php');
               $('#inv').load('call/invetation.php');
               $('#msg').load('call/mymsg.php'); 
              
                                                      }

       $("#me").click(function(){
           $(".c").html("<center><h3>"+$(this).text()+"</h3></center>");}); 

             $("#creatmsg").keypress(function(e){
           if (e.which==13) {
              if($("#creatmsg").val()!=""){
             $.get('call/insert.php',{idfnd:ide,msg:$("#creatmsg").val()} ) ,$("#creatmsg").val("");

           }
               }
                  }); 
                      var chose;
                       var idf;
	                       $(document).on('click',"button",function(){
                            chose=$(this).attr('name');
                            idf=$(this).attr('id');
                               $.get('call/AcceptOrDelet.php',{idf:idf,ichose:chose});
                          
                             }); 
$('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("sech.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });

                              });
	
	</script>
	

	 <link rel="stylesheet" href="stylehome.css">
</head>
<body style="background-image: url('img/Images29.jpg');">
<!--<div class="a">
<div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search people..." />
        <div class="result"></div>
    </div>
<div id="a2">
<img id="anvitation" src="img/anvitation.png">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<img id="talk" src="img/Users-Talk.png">&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<img id ="config" src="img/config.png">&nbsp; &nbsp;&nbsp; &nbsp;         
</div></div>-->
  
    <header>
    <a href="home.php"><img id="logo" src="img/chatlogo.png"></a>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search people..." />
        <div class="result"></div>
    </div>    
      <div id="header_icons">
        <a class="tooltips" href="home.php"><img id="home_icon" src="img/home.png"></a>
        <a class="tooltips" href="#"><img id="friend_request_icon" src="img/friend_request.png">
        <span><!--Invitations--></span></a>
        <a class="tooltips" href="#"><img id="messages_icon" src="img/messages.png">
        <span><!--Messages--></span></a>
        <a class="tooltips" href="profil_settings.php"><img id="settings_icon" src="img/settings_icon3.png">
        <span><!--Settings--></span></a>
        <a class="tooltips" href="Deconexion.php"><img id="logout_icon" src="img/logout.png">
        <span><!--Settings--></span></a>        
      </div>
    </header>
<div class="b">
<div id="me"><center><?php echo '<a style="text-decoration: none;color:black;" href="profil_settings.php">'.$user.'</a><span><a href="profil_settings.php"><img id=img src='.$photo.'></a></span>' ?></center></div>
<hr id="h1"></hr>
<br><center><h3>FRIENDS ONLINE</h3></center></br>
<hr id="h2"></hr>

        <div id="myfrd">
          
</div>
</div>
<div class="c"><center><h1>WELCOME HOME</h1> </div></center>

<div class="d"> <div id="showmsg"></div> <input id="creatmsg" type="txt" name="masg" placeholder="your massage here..."> 


</div>
<div id="list"> <br> <a href="#">Configiration</a></br>
                <br> <a href="Deconexion.php">Diconexion</a></br>
                </div>
                <div id="inv"> </div>
                <div id="msg"></div>
        

   
</body>
</html>