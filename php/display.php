
    <form name="search" action="" id="search" method="post">
        <input  id="Search_Textfield"type="text" name="searchBar" >
        <input id="Search_Button" type="submit" id="submit" name="submit" value="Search" onclick="search()"><br><br>
    </form>    
header("location:javascript://history.go(-1)");
<style>
        body
        {
            background-color:teal;
        }
        
        .Table_Of_Users
        {
            background-color:linen;
            border :5px solid black;
            top:20px;
            left:20px;
            width:1520px;
            height:static;
            text-align:center;
            font-size:15px;
            float:left;
        } 
        #Search_Textfield
        {
            margin-left:600;
            background: white;
            border:1px solid black;
            padding: 20px 30px;
            width: 200px;
            height:5px;
        }
        #Activate_Account , #Decline_Account
        {
            background-color: bisque;
            color: black;
            font-size: 12px;
            font-weight: bold;
            padding: 15px 20px;
            border-radius: 50px ;
            border:none;
            margin-bottom:10px; 
            margin-top:20px;
            margin-left:50px;
            cursor: pointer;
            width: 200px;
        }
        #Activate_Account:hover ,  #Decline_Account:hover /*when standing on the buttons*/
        {
            background-color:linen;
            opacity: 2.5;
        } 
</style>
