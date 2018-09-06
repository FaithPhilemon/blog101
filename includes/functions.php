<?php 
// =========================================
// Takes in table name and id of the row to 
// be delted.
// Return type: True
// =========================================
function delete_row($table, $id){
    include ("connection.php");

    // create sql command
    $cmd = "DELETE FROM $table WHERE id = '$id'";

    // Execute command 
    $result = mysqli_query($conn, $cmd);

    // Check if query executed correctly
    if(!$result){
        // query went bad
        die("ERROR OCCURED " . mysqli_error($conn));
    }else {
        // query went well
        return true;
    }
}


// =========================================
// Takes in data and validtes it
// =========================================
function validate($data){
    if(empty($data)){
        return false;
    }else{
        stripslashes(trim(mysqli_real_escape_string($conn, $data)));
        return $data;
    }
}