<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script type="text/javascript" language="javascript">

    function checkform()
    {
        var f = document.forms["theform"].elements;
        var cansubmit = true;
        
        for (var i = 0; i < f.length; i++) {
            console.log(f[i]);
            if (f[i].value.length == 0) {
                console.log(f[i].value.length);
                cansubmit = false;
            }
        }

        if (cansubmit) {
            document.getElementById('submitbutton').disabled = false;
        }
    }

</script>
</head>
<body>
<div align="center">
<form name="theform" action="login.php" method="post">

    <label>Name</label><br/>     
    <input class="alert alert-info" type="text" name="name"  placeholder="Name" onKeyup="checkform()" required><br/>

    <label>Password</label><br/>     
    <input class="alert alert-info" type="text" name="password" placeholder="Password" onKeyup="checkform()" required><br/>

    <button id="submitbutton" type="submit" disabled="disabled" name="submit" value="Submit">Submit</button>
</form>
</div>
</body>
</html>

<?php
 
    //LOGIN NOT WORKING.. :(
  
    require 'crud.php';
    
    class Authenticate extends CRUD{
        function __construct(){
            parent::__construct();
        }
    }

    $name = $_POST['name'];
    $password = $_POST['password'];
    if($name != ''){
    $query = "select emp_name, password, eORa from employee
              where emp_name = '".$name."' and password = '".$password."' ";
    $result = mysqli_query($this->conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    if(isset($row[emp_name]))
    if($name == $row[emp_name] && $password == $row[password]){
        if($row[eORa] == 1){
           header( "Location: http://localhost/30AUG/employeeMaster.php?name ='".$name."'" ); die;
           //header( "Location: employeeMaster.php" ); die;
        }
        else{
            header( "Location: http://localhost/30AUG/create.php?name ='".$name."'" ); die;
            //header( "Location: adminMaster.php" ); die;
        }
    }
    }
?>