<?php
    require 'crud.php';

    class Read extends CRUD{
        function __construct(){
            parent::__construct(); 
        }
    }
    $obj = new Read();
    $result = $obj->read();

    if($_GET['id']){
        $id = implode($_GET);
        $obj->delete($id);
    }
?>
<html>
    <head> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    <head>
    <body>
    <div align="center">
        <table>
            <thead>
                <th>EMP-ID</th>
                <th>EMP-NAME</th>
                <th>EMP-CONTACT</th>
                <th>CITY</th>
                <th>Emp_or_Admin</th>
                <th>EMP-Department</th>
                <th>EMP-Designation</th>
                <th>Password</th>
            </thead>


            <?php 
            
            while($row = mysqli_fetch_assoc($result)){
                
                echo('<tr>');
                foreach($row as $value){
                    $id = $row[emp_ID];
                    echo '<td>'.$value.'</td>';    
                }  
                if($row != null){
                    echo(
                        '<td>' . '<a href="http://localhost/30AUG/create.php?id='.$id.'">' ."edit" .'</a>'. '</td>' .
                        '<td>' . '<a href="http://localhost/30AUG/readUpdateDelete.php?id='.$id.'">' ."delete" . '</td>');   
                    }
                echo('</tr>');
                }
            ?>  
        </table>
        <button type="submit" onClick="document.location.href='http://localhost/30AUG/create.php'">Go Back</button>
    </div>
    </body> 
</html>