<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<link href='//fonts.googleapis.com/css?family=Aref Ruqaa' rel='stylesheet'>
<style type="text/css">
    body{
        font-family: 'Aref Ruqaa';
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
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
    .result p:hover{
        
        display: flex;
        flex-direction: row;
    }

    .add
    {
        display: flex;
        flex-direction: row;
        border-bottom: 1px solid #CCCCCC;
        border-right : 1px solid #CCCCCC;
        border-left: 1px solid #CCCCCC;
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


</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("Unit.php", {term: inputVal}).done(function(data){
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
    
    $(document).on("click", "button", function(){
        idf=$(this).attr('id');
        name_button=$(this).attr('name');
        if(name_button == 'add')
        {
            //$.post("update_process.php",{idf:idf;name_button:name_button});            
        }

        });
});
</script>
</head>
<body>
    <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search people..." />
        <div class="result"></div>
    </div>
</body>
</html>