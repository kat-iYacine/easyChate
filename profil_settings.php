<?php
  session_start();
  if (!isset($_SESSION['email'])) 
  {
    header("location:index.php");
  }
  $con=mysqli_connect("localhost","root","","users")or die(mysqli_error($con));
  $id=$_SESSION['id'];
  $query=mysqli_query($con,"SELECT * FROM accounts WHERE id='$id'");

  while ($row=mysqli_fetch_array($query)) 
  {
    $photo_profil = $row['photo_profil'];
    $user = $row['username'];
    $status = $row['online'];
    $email = $row['email'];
    $sex = $row['sex'];
    $birthdate = $row['birth_date'];
    
  }
    ?>
    <div id="main" style="background-image: url('img/Images29.jpg');">
    <header>
    <a href="home.php"><img id="logo" src="img/chatlogo.png"></a>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search people..." />
        <div class="result"></div>
    </div>    
      <div id="header_icons">
        <a class="tooltips" href="home.php"><img id="home_icon" src="img/home.png"></a>      
        <a class="tooltips" href="profil_settings.php"><img id="settings_icon" src="img/settings_icon3.png">
        <a class="tooltips" href="Deconexion.php"><img id="logout_icon" src="img/logout.png">        
        <span><!--Settings--></span></a>
      </div>
    </header>        
      <div id="edit_info">
      <div id="profile_info">
        <center>
        <div id="photo_profil">
            <p><img style="width: 100px; height: 100px; border-radius: 100px; box-shadow: 1px 1px 1px 1px;" src=<?php echo '"'.$photo_profil.'"' ?>></p>
          </div>
          
          <ul>
            <li><p>Username: <?php echo $user; ?></p></li><hr>
            <li><p>Status: <?php if($status == 1) {echo 'Online';}else{echo'Offline';} ?></p></li><hr>
            <li><p>Email address: <?php echo $email; ?></p></li><hr>
            <li><p>Sex: <?php echo $sex; ?></p></li><hr>
            <li><p>Date of Birth: <?php echo $birthdate; ?></p></li><hr>
          </ul>

          <form action="add.php" method="POST">
            <input type="hidden" name="IDtoDelete" <?php echo'value="'.$id.'"'; ?>>
            <button type="submit" name="Del" >Delete my account</button>
          </form>
          </center>
          <hr>
        </div>
        <div id="edit"><?php include('update_profile_form.php'); ?></div>
        </div>
      <h2><center>Friends</center></h2>
      

    
    <div id="friends_list">
      <?php
        $query2 = "SELECT id,username,photo_profil FROM accounts WHERE id 
        in (SELECT id_res FROM frends WHERE (id_emtr='$id' or id_res='$id') and statu='1' 
        UNION SELECT id_emtr FROM frends WHERE (id_emtr='$id' or 
        id_res='$id') and statu='1')";

        $query3 = mysqli_query($con,$query2);
        $i=0;
        while ($row=mysqli_fetch_array($query3))
        {
          $friend_name = $row['username'];
          $friend_photo = $row['photo_profil'];
          $friend_id = $row['id'];
          if ($friend_id != $id) {
            ?>
            <div id="a">
              <div id="a_1">
                <img id="pic" <?php echo 'src="'.$friend_photo.'"'; ?>>
                <a href="#"><p style="color: black;"><?php echo $friend_name; ?> </p></a>
              </div>
              <div id="a_2">
                  <button  id="delete" <?php echo'name="'.$friend_id.'"'; ?>  >Delete</button>
                  <form style="margin-bottom: 0px;" action="add.php" method="POST">
                    <input type="hidden" name="reportID" <?php echo'value="'.$friend_id.'"'; ?>>
                    <button type="submit" name="reportbtn" <?php echo'name="'.$friend_id.'"'; ?>>Report</button>
                  </form>
                  <a href="#openModal"><button style="width:70px; margin-top: 5px;"  <?php echo'id="'.$friend_id.'"'; ?> name="message" <?php echo'value="'.$friend_name.'"'; ?> >Message</button></a>
              </div>
              </div>
               
            <?php
          }
        }
        ?>
        <div id="openModal" class="modalDialog">
          <div>
            <a href="#close" title="Close" class="close">x</a>
            <p id="msg_to" >Message to: <span id="test"></span></p>
            <form action="update_process.php" method="POST">
              <input type="hidden" name="toID" id="to">
              <div id="box">
                <textarea id="msg" name="msg_offline"></textarea>
                <center><button type="submit" id="sendbtn">Send Message</button></center>
              </div>
            </form>
          </div>
        </div>  
</div>
  </div>

<!DOCTYPE html>
<html>
<head>

  <title> <?php echo $user.' > '; ?> Settings</title>
  <script src="js/jquery-3.1.1.min.js"> </script>
  <script>

</script>
  <script>
      $('div#openModal').hide();
  $(document).ready(function(){

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

    $('button').click(function(){
        var idf;
        var name_button;
        idf=$(this).attr('name');
        name_button=$(this).attr('id');
        v=$(this).attr('value'); 
        if (idf == 'message') 
        {
          $('div#openModal').show();
          $('span#test').text(v);
          $('input#to').val(name_button);
        }

        if (name_button == 'delete') 
        {
          $.get("update_process.php",{idf:idf,name_button:name_button});
          $("#main").load("profil_settings.php");   
        }

        if (name_button == 'admin') 
        {
          window.location.href='home.php';   
        }    
  });

    $(window).scroll(function(){
        if ($(window).scrollTop() > 100){
            $('.modalDialog').css('top','0px');
        }
    });
    });

    /*jQuery("button#sendbtn").click(function() {
    var msg_offline = jQuery("textarea#msg").val();                
    });*/
  </script>
  <script>

  </script>
  <style>

    #nofound
    {
      background-color: #FFFFFF;
      width: 280px;
    }
   .search-box{
        width: 300px;
        display: inline-block;
        font-size: 14px;
        position: absolute;
        left: 300px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
        height: 132px;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        
        border-top: none;
        cursor: pointer;
        width: 100%;
    }

    .add
    {
        display: flex;
        flex-direction: row;
        border-bottom: 1px solid #CCCCCC;
        border-right : 1px solid #CCCCCC;
        border-left: 1px solid #CCCCCC;
        background-color: #FFFFFF;
        height: 33px;


    }

    .add:hover
    {
        background: #f2f2f2;
    }

    .btn 
    {
      width: 70px;
      -webkit-border-radius: 60;
      -moz-border-radius: 60;
      border-radius: 60px;
      -webkit-box-shadow: 0px 1px 3px #666666;
      -moz-box-shadow: 0px 1px 3px #666666;
      box-shadow: 0px 1px 3px #666666;
      font-family: Arial;
      color: #ffffff;
      font-size: 14px;
      background: rgba(40,59,100,.9);
      border: solid rgba(40,59,100,.9) 2px;
      text-decoration: none;
      margin-top: 5px;
      margin-bottom: 5px;
      margin-right: 5px;
      font-family: 'Aref Ruqaa';
    }

    .btn:hover 
    {
      background: #3cb0fd;
      background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
      background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
      background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
      background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
      background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
      text-decoration: none;
      cursor: pointer;
    }
  #friends_list
  {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    padding: 5px 5px 5px 5px;
    
  }

  #a
  {
    display: flex;
    flex-direction: row;
    border:1px solid gray;
    width: 30%;
    align-items: center;
    justify-content: space-between;
    margin: 5px 5px 5px 5px;
    border-radius: 10px;
  }

  #a:hover
  {
    -webkit-box-shadow:0 0 20px blue; 
    -moz-box-shadow: 0 0 20px blue; 
    box-shadow:0 0 20px blue;
  }

  img[id="pic"]
  {
    width: 100px;
    height: 100px;
    display: inline-block;
    margin-right: 10px;
    border-right: 1px solid black;
  }

  #a_1
  {
    display: flex;
    flex-direction: row;
    align-items: center;
  }

  #a_2
  {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 80px;
    margin-right: 10px;
  }

  a:visited
  {
    color: black;
  }

  a:hover
  {
    text-decoration: underline;
  }

  a
  {
    text-decoration: none;
  }

  button[id="delete"]
  {
    width: 70px;
    
    font-stretch: extra-condensed;

  }

  button[id="message"]
  {
    width: 70px;
    margin-left: 10px;
    border-radius: 1px;
  }

  ul
  {
    list-style-type: none;
  }

#button_sub
{

  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;

}

#msg_to
{

}

textarea
{

  margin-top: 12px;
  margin-bottom: 12px;
}

textarea:hover
{
  -webkit-box-shadow:0 0 20px blue; 
  -moz-box-shadow: 0 0 20px blue; 
  box-shadow:0 0 20px blue;
}

textarea:focus
{
  -webkit-box-shadow:0 0 20px blue; 
  -moz-box-shadow: 0 0 20px blue; 
  box-shadow:0 0 20px blue;
}

button[id="sendbtn"]
{
  width: 100px;
  height: 50px;
  border-radius: 1px;
}

button[id="sendbtn"]:hover
{
  -webkit-box-shadow:0 0 20px blue; 
  -moz-box-shadow: 0 0 20px blue; 
  box-shadow:0 0 20px blue;
}

button[id="sendbtn"]:active
{
  -webkit-box-shadow:0 0 20px yellow; 
  -moz-box-shadow: 0 0 20px yellow; 
  box-shadow:0 0 20px yellow;
}

#sendbtn
{
  font-size: x-large;
  margin-top: 12px;
  width: 300px;
}

textarea
{
  width:100%;
  height:50%; 
  resize: none;
  border-radius: 10px;
  outline: none;
  overflow: auto;
}

  .modalDialog {
  position: fixed;
  font-family: Arial, Helvetica, sans-serif;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(0,0,0,0.8);
  z-index: 99999;
  opacity:0;
  -webkit-transition: opacity 400ms ease-in;
  -moz-transition: opacity 400ms ease-in;
  transition: opacity 400ms ease-in;
  pointer-events: none;
}

.modalDialog:target {
  opacity:1;
  pointer-events: auto; 
}

.modalDialog > div {
  width: 400px;
  position: relative;
  margin: 10% auto;
  padding: 5px 20px 13px 20px;
  border-radius: 10px;
  background: #fff;
  background: -moz-linear-gradient(#fff, #999);
  background: -webkit-linear-gradient(#fff, #999);
  background: -o-linear-gradient(#fff, #999);
}

.close {
  background: #606061;
  color: #FFFFFF;
  line-height: 25px;
  position: absolute;
  right: -12px;
  text-align: center;
  top: -10px;
  width: 24px;
  text-decoration: none;
  font-weight: bold;
  -webkit-border-radius: 12px;
  -moz-border-radius: 12px;
  border-radius: 12px;
  -moz-box-shadow: 1px 1px 3px #000;
  -webkit-box-shadow: 1px 1px 3px #000;
  box-shadow: 1px 1px 3px #000;
}

.close:hover { background: #00d9ff; }

#profile_info
{
    width: 30%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

#edit_info
{
  display: flex;
  flex-direction: row;
  border-bottom: 1px solid gray;
}

#edit
{

  width: 70%;
  border-left: 1px solid gray;
}

#main
{
  background-color: rgb(241,241,241);
  left:0;
  bottom:0;
  top: 0;
  right: 0;
  position: fixed;
  overflow: auto; 
}

a[id="admin"]
{
  display: inline-block;
  background-color: yellow;
}

button[name="MainPage"]
{
  display: block;
  margin-top: 50px;
  width: 200px;
  height: 100px;
  font-size: xx-large;
}

button[name="MainPage"]:hover
{
  text-decoration: none;
}

fieldset:hover
{
  -webkit-box-shadow:0 0 20px blue; 
  -moz-box-shadow: 0 0 20px blue; 
  box-shadow:0 0 20px blue;
}

fieldset:focus
{
  -webkit-box-shadow:0 0 20px blue; 
  -moz-box-shadow: 0 0 20px blue; 
  box-shadow:0 0 20px blue;
}

header
{
  background-color: rgba(40,59,100,.9);
  height: 42px;
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;


}

#header_icons
{
  width: 120px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin-right: 300px;
}

#friend_request_icon
{
  display: inline-block;
  width: 30px;
  height: 30px;
  opacity: 0.7;
  margin-right: 7px;
  margin-left: 7px;
}

#messages_icon
{
  display: inline-block;
  width: 25px;
  height: 25px;
  margin-right: 1px;
  margin-left: 1px;
  opacity: 0.7;
  margin-left: 7px;
  margin-right: 7px;
}

#settings_icon
{
  display: inline-block;
  width: 25px;
  height: 25px;
  opacity: 0.7;
  margin-left: 7px;
  margin-right: 7px;
}

fieldset
{
  margin-left: 190px;
  margin-right: 190px;
  margin-bottom: 5px;
  margin-top:5px;
}

#logo
{
  display: inline-block;
  width: 9em;
  position: absolute;
  left: 150px;
  top: -50px;
  
}

#home_icon
{
  display: inline-block;
  width: 23px;
  height: 23px;
  opacity: 0.7;
  margin-right: 7px;
}

#logout_icon
{
  display: inline-block;
  width: 25px;
  height: 25px;
  opacity: 0.7;
  margin-left: 7px;
}

button[name="Del"]
{
  position: absolute;
  top: 500px;
  left: 150px;
}

button[name="reportbtn"]
{
  
  width: 70px;
  margin-top: 5px;
}

</style>

</head>
  <body style="background-image: url('img/Images29.jpg');">
    

        

  </body>
</html>
