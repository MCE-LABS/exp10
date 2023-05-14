<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinion System</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: gainsboro;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container{
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 30px 30px 0;
            border-radius: 10px;
            width:45vw;
        }
        form{
            display: flex;
            flex-direction: column;
            margin: 10px auto;
        }
        form input{
            padding: 10px;
            margin: 8px 0;
        }
        textarea{
            padding: 10px;
        }
        button{
            width:fit-content;
            background-color: dodgerblue;
            color:white;
            padding:10px;
            border:none;
            border-radius: 5px;
            margin: 15px auto auto;
            cursor: pointer;
        }
        button:hover{
            background-color: rgb(42, 125, 207)
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Opinion Collection System</h1>
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Name" required>
            <input type="text" name="regno" id="regno" placeholder="Register No." required>
            <div style="width:150%;">
                <label for="year">Year</label>
            <select name="year" id="year" required>
                <option value="">-----</option>
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
                <option value="4">IV</option>
            </select>
                <label for="dept">Department</label>
            <select name="dept" id="dept" required>
                <option value="">-----</option>
                <option value="CSE">CSE</option>
                <option value="IT">IT</option>
                <option value="ECE">ECE</option>
                <option value="EEE">EEE</option>
            </select>
            <label for="section">Section</label>
            <input type="radio" name="section" id="section" value="A" required> A
            <input type="radio" name="section" id="section" value="B" required> B
            </div>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="text" name="mobile" id="mobile" placeholder="Mobile No." required>
            <textarea name="opinion" id="opinion" cols="30" rows="10" placeholder="Write your opinion here..."></textarea required>
            <button name="submit">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="opinion_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])) {
    $regno = $_POST['regno'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $dept = $_POST['dept'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $opnion = $_POST['opinion'];

    $sql = "INSERT INTO opinions VALUES ('$regno', '$name', '$year','$dept','$section','$email','$mobile','$opnion')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        Swal.fire(
            'Thank You!',
            'Your opinion was recorded!',
            'success'
          )
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);   
    }

    mysqli_close($conn);
}
?>