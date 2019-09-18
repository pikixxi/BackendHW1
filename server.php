<?php 
	//session_start();
	$db = mysqli_connect('localhost', 'root', '', 'hw1');

    $id = 0;
	$name = "";
    $surname = "";
    $email = "";
	
	$update = false;

	if (isset($_POST['save'])) {
        $id = $_POST['id'];
		$name = $_POST['name'];
        $surname = $_POST['surname'];
        $email =  $_POST['email'];

        $query = "INSERT INTO user_table (id,name, surname, email) VALUES ('$id','$name', '$surname' , '$email')";
		mysqli_query($db, $query ); 
        header('location: index.php');
    }

    if (isset($_POST['update'])) {
        $id = ($_POST['id']);
        $name = ($_POST['name']);
        $surname =($_POST['surname']);
        $email = ($_POST['email']);
    
        mysqli_query($db, "UPDATE user_table SET name='$name', surname='$surname', email = '$email'  WHERE id=$id");
        header('location: index.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM user_table WHERE id=$id");
        mysqli_query($db, "UPDATE user_table SET id = '$id - 1'  WHERE id=$id+1");
        header('location: index.php');
    }

    $results = mysqli_query($db, "SELECT * FROM user_table");

    ?>