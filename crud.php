<?php
    require 'connection.php';

    class CRUD extends Connection{
        function __construct(){
            parent::__construct();     //explicitly using parent class constructor.
        }

        function create($name, $contactNumber, $city, $department, $designation, $eORa, $password){
            $query = "insert into employee(emp_name,
                                        emp_contact,
                                        city,
                                        dept_ID,
                                        desig_ID,
                                        eORa,
                                        password)
                        values('$name',
                            '$contactNumber',
                            '$city',
                            $department,
                            $designation,
                            $eORa,
                            '$password');";
            $result = mysqli_query($this->conn, $query);
            if(!$result){
                echo 'query failed';
            }
        }
        
        public function read(){
            $query = "select employee.emp_ID,
              employee.emp_name, 
              employee.emp_contact, 
              employee.city,
              employee.eORa, 
              department.department_NAME, 
              designation.designation_NAME,
              employee.password 
              from employee 
              inner join department on employee.dept_ID = department.department_ID 
              inner join designation on employee.desig_ID = designation.designation_ID;";
            $result = mysqli_query($this->conn, $query);
            return $result;
        }

        public function update($id, $name, $contactNumber, $city, $department, $designation, $eORa, $password){
            $query = "update employee set
                    emp_name = '".$name."',
                    emp_contact = '".$contactNumber."', 
                    city = '".$city."', 
                    dept_ID = ".$department.", 
                    desig_ID = ".$designation.", 
                    eORa = ".$eORa.",
                    password = '".$password."' 
                    where emp_ID = ".$id.";";
            $result = mysqli_query($this->conn, $query);
            if(!$result){
                echo 'query failed';
            }
        }

        public function delete($id){
            $delete = "delete from employee where emp_ID =".$id.";";
            mysqli_query($this->conn, $delete);
        }

        function fillForm($id){
            $get_query = "select employee.emp_ID,
            employee.emp_name, 
            employee.emp_contact, 
            employee.city, 
            department.department_NAME, 
            designation.designation_NAME,
            employee.password 
            from employee 
            inner join department on employee.dept_ID = department.department_ID 
            inner join designation on employee.desig_ID = designation.designation_ID
            where employee.emp_ID = ".$id.";";
            $result = mysqli_query($this->conn, $get_query);
            $row = mysqli_fetch_row($result);         
            return $row;
        }

        // function authenticationn($username, $password){
        //     //$query = "call authenticate('".$username."','".$password."')$$";
        //     $query = "select emp_name, password, eORa from employee
        //             where emp_name = '".$name."' and password = '".$password."'$$ ";
        //     $result = mysqli_query($this->conn, $query);
        //     $row = mysqli_fetch_row($result);
        //     return $row;
        // }
    }

    // $obj = new CRUD();
    // $obj->read();
    
?>

 