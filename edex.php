<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-Compantible" content="IE=edge">
        <meta name="vieport" content="width=, initial-scale=1.0">
        <title>ducument</title>

    </head>
    <body>
        <h3>human resource managment system</h3>
        <link rel="stylesheet" href="index.css">
        <article>
            <div id="box2">
            <form action="edex.php" name="form" method="POST">
                <input type="text" name="firstname" placeholder="first name">
                <input type="text" name="lastname" placeholder="last name">
                <input type="text" name="id" placeholder="Employee reg number">
                <label for="date">Date of birth</label>
                <input type="date" name="date">

                <select name="resident" id="">
                    <option value="select">select</option>
                    <option value="Dodoma">Dodoma</option>
                    <option value="Arusha">Arusha</option>
                
                    <option value="Tanga">Tanga</option>
                </select>

                <input type="number" name="basicsalary" placeholder="basic Salary">
                <input type="submit" name="submit" value="save data">
            </form>
            </div>
           

            <?php
            //connection
            $host="localhost";
            $user="root";
            $database="humanresources_manager";
            $passord="";
            $con=mysqli_connect($host,$user,$passord,$database);

            $firstname="";
            if(isset($_POST['firstname'])){
                $firstname=$_POST['firstname'];
            }

            $lastname="";
            if(isset($_POST['lastname'])){
                $lastname=$_POST['lastname'];
            }

            $id="";
            if(isset($_POST['id'])){
                $id=$_POST['id'];
            }

            $date="";
            if(isset($_POST['date'])){
                $date=$_POST['date'];
            }

            $basicsalary="";
            if(isset($_POST['basicsalary'])){
                $basicsalary=$_POST['basicsalary'];
            }
            
            $resident="";
            if(isset($_POST['resident'])){
                $resident=$_POST['resident'];
            }

            if($con){
                if(isset($_POST['submit'])){
                    $sql="SELECT * FROM employee where id='$id' ";
                    $result=mysqli_query($con,$sql);
                    if(mysqli_num_rows($result)>0){
                        echo "The user you are trying to register has already been registered";
                    }
                    else{
                        $sql="INSERT INTO employee(id,firstname,lastname,resident,basicsalary,date) VALUES('$id','$firstname','$lastname','$resident','$basicsalary','$date') ";

                        if(mysqli_query($con,$sql)){
                            echo "record added successful!!";
                        }
                        else{
                            echo "try again later..";

                        }
                    }
                }

            }
            //no connection
            else{
                echo "database failure!!";
            }
            


            ?>
        </article>
    </body>
</html>