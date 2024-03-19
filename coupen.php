<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coupen Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body background="./images/pattern.png">
    <form action="coupen.php" method="post">
    <div class="container mtop mt-5">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <label for="u_name" class="mb-2 text-light">First name</label>
                    <input type="text" class="form-control form-control-sm"  id="u_name" name="fname" required>
                </div>
                <div class="col-md-3">
                    <label for="u_name" class="mb-2 text-light">Second name</label>
                    <input type="text" class="form-control form-control-sm"  id="u_name" name="sname" required>  
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3">
                    <label for="u_name" class="mb-2 text-light">Email</label>
                    <input type="text" class="form-control form-control-sm "  id="u_name" name="email" required>
                </div>
                <div class="col-md-3">
                    <label for="u_name" class="mb-2 text-light">Password</label>
                    <input type="text" class="form-control form-control-sm"  id="u_name" name="pass" required>
                </div>
            </div>
            
            <div class="row justify-content-center mt-3">
                <div class="col-md-2">
                    <label for="text_area" class="mb-3 form-label text-light">Gender</label>
                    <select name="sel1" id="District" class="form-select">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="text_area" class="mb-3 form-label text-light">Age</label>
                    <select name="sel2" id="District" class="form-select">
                        <option value="10-20">10-20</option>
                        <option value="20-30">20-30</option>
                        <option value="30-40">30-40</option>
                        <option value="40-50">40-50</option>
                        <option value="40-50">Above</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="text_area" class="mb-3 form-label text-light">Coupen code</label>
                    <input type="text" class="form-control form-control-sm p-2"  id="coupen_name" name="coupen">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <label for="text_area" class="mb-3 form-label text-light">Feed back</label>
                    <textarea  id=""  rows="5" class="form-control" name="describe" required></textarea>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-md-6">
                    <input type="checkbox" class="form-check-input" required>
                    <label for="check_box" class="form-label text-light">Check me out</label>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <button class="btn btn-primary" id="regbtn" name="btn" onclick="coupenalert()">Register</button>
                    <button class="btn btn-primary" id="bckbtn" name="btn"><a href="./Simon.php" class="text-white" style="text-decoration: none;">Back</a></button>
                </div>
                
            </div>
            
        </div>
    </form>
</body>
<script>
    function coupenalert() {
        alert("Submitted successfully")
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>
<?php


   if(isset($_POST['btn'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['sname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $description = $_POST['describe'];
    $gender = $_POST['sel1'];
    $age = $_POST['sel2'];
    $coupenname = $_POST['coupen'];
    $conn = new mysqli('localhost','root','','onlinefoodphp');
    if($conn->connect_error){
        die("connection failed");
    }
    $sql = "Insert into coupencode (fname,lname,email,pass,description,gender,age,coupennum) values ('$firstname','$lastname','$email','$password','$description','$gender','$age','$coupenname')";
    if ($conn -> query($sql) === TRUE) {
        echo "record added successfully";
    } else {
        echo "record not added";
    }
    $conn-> close();
   }
?>


if(isset($_POST['btn'] )) 
{
     if(empty($_POST['fname']) || 
   	    empty($_POST['sname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['pass'])||
		empty($_POST['describe'])||
		empty($_POST['sel1']) ||
		empty($_POST['sel2'])||
		empty($_POST['coupen']))
		{
			$message = "All fields must be Required!";
		}
}else
	{

    }

