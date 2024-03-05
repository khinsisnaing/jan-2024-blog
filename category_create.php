<?php 
    include "db.php"; 
?>

<?php

if (isset($_POST['category-create'])) {
    $name = $_POST['name'];
    $error = [];

    empty($name) ?  $error[] = 'Name is required' : '' ;

    if(!$error) {
        $query = "INSERT INTO category (name) VALUES ('$name')";
        $result = mysqli_query($conn, $query);
        
    //error tat nay thae nay yar
        
        if($result) {   
            header("location: category_index.php");      
        } else {
            echo mysqli_connect_error();
        }
    

}
?>

<?php
    include "header.php"; 
    include "sidebar.php";
?>

<h1>Create New Category</h1>

<?php include 'error.php' ; ?>

<form method="post" action="">

    <input class="form-control mb-3" name="name" type="text" placeholder="New Category" aria-label="Search">

    <button class="tm-search-button" type="submit" name="category-create">Add</button>

</form>

<?php 
    include "footer.php" ; 
?>