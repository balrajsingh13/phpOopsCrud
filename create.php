<?php
    require 'crud.php'; 

    class CreateUpdateDelete extends CRUD{
        function __construct(){
            parent::__construct();
        }
    }
    $obj = new CreateUpdateDelete();

    if(isset($_POST['submit']) && $id!=null ){
        $name = $_POST['name'];
        $contactNumber = $_POST['contactNo'];
        $city = $_POST['city'];
        $department = $_POST['department'];
        $designation = $_POST['designation'];
        $eORa = $_POST['eORa'];
        $password = $_POST['password'];
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        //if($id != null){
            $obj->update($id, $name, $contactNumber, $city, $department, $designation, $eORa, $password);
        // }
        // else{
        //     $obj->create($name, $contactNumber, $city, $department, $designation, $eORa, $password);
        // }
     }

    if($_GET){
        echo '<br>';
        echo '<br>';
        $id = implode($_GET);
        if(!empty($_POST['id'])){
            $id = $_POST['id'];
        }       
        $row = $obj->fillForm($id);
        $id_edit = $row[0];
        $name_edit = $row[1];
        $contactNumber_edit = $row[2];
        $city_edit = $row[3];
        $department_edit = $row[4];
        $designation_edit = $row[5];
        $password_edit = $row[6];

        echo $id_edit;
    }
    
    // else{
    //     echo "Value is empty";
    // }
?>

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
<h1>ADMIN</h1>
<form name="theform" action="create.php" method="post">
    <input type="hidden" name="id" value=<?php echo $id;?> onKeyup="checkform()">

    <label>Name</label><br/>     
    <input class="alert alert-info" type="text" name="name"  placeholder="Name" onKeyup="checkform()" required
        value="<?php if(!empty($name_edit)){echo $name_edit;} ?>"
        ><br/>
 
    <label>Contact number</label><br/>     
    <input class="alert alert-info" type="text" name="contactNo" placeholder="Contact Number" onKeyup="checkform()" required
        value="<?php if(!empty($contactNumber_edit)){echo $contactNumber_edit;} ?>"
        ><br/>

    <label>Password</label><br/>     
    <input class="alert alert-info" type="text" name="password" placeholder="Password" onKeyup="checkform()" required
        value="<?php if(!empty($password_edit)){echo $password_edit;} ?>"
        ><br/>
  

    <label>City</label><br/>     
    <input class="alert alert-info" type="text" name="city" placeholder="City" onKeyup="checkform()" required
        value="<?php if(!empty($city_edit)){echo $city_edit;} ?>"
        ><br/>
 
    <label>Department</label><br/> 
    <label>HR &nbsp<input type="radio" name="department" value=1 onchange="checkform()" ></label>
    <label>Delivery &nbsp<input type="radio" name="department" value=2 onchange="checkform()" ></label>
    <label>Sales &nbsp<input type="radio" name="department" value=3 onchange="checkform()" ></label>
    <br/><br/>    

    <label>Designation</label><br/>     
    <select class="alert alert-info" required  name="designation">
        <!-- <option disabled selected value> -- select an option -- </option> -->
        <option value=1 onChange="checkform()">Trainee</option>
        <option value=2 onChange="checkform()">Associate</option>
        <option value=3 onChange="checkform()">Manager</option>
    </select>
    <br/> 

    <label>Employee or Admin</label><br/> 
    <label>Employee &nbsp<input type="radio" name="eORa" value=1 onchange="checkform()" ></label>
    <label>Admin &nbsp<input type="radio" name="eORa" value=0 onchange="checkform()" ></label>
    <br/> 
    <br/> 
    <br/> 

    <button id="submitbutton" type="submit" disabled="disabled" name="submit" value="Submit">Save</button>
    <br>
    <a class = "btn btn-default" role="button" onClick="document.location.href='http://localhost/30AUG/readUpdateDelete.php'">Edit</a>  
    <br>
    <a class = "btn btn-default" role="button">Go Back</a>

</form>
</div>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $contactNumber = $_POST['contactNo'];
        $city = $_POST['city'];
        $department = $_POST['department'];
        $designation = $_POST['designation'];
        $eORa = $_POST['eORa'];
        $password = $_POST['password'];
    }

    $obj->create($name, $contactNumber, $city, $department, $designation, $eORa, $password);
?>