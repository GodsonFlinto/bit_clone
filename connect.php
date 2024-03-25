<?php
$servername="localhost";
$username="root";
$password="";
$database_name="knots";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}

if(isset($POST['save']))
{
    $fullName = $_POST['fullName'];
    $emailAddress = $_POST['emailAddress'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $region = $_POST['region'];
    $postCode = $_POST['postCode'];

    $sql_query = INSERT INTO registration (fullName,emailAddress,phoneNumber,gender,address1,address2,city,region,postalCode)
    VALUES ('$fullName','$emailAddress','$phoneNumber','$gender','$address1','$address2','$city','$region','$postalCode');

    if (mysqli_query($conn, $sql_query))
    {
        echo "Registration Success";
    }
    else
    {
        echo "Error: "   $sql    ""   mysqli_error($conn);
    }
    myssqli_close($conn);

}
?>