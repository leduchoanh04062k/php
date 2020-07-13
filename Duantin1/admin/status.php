<?php 
include 'db.php';
if (isset($_POST['status'])) {
    $id= $_POST['id'];
    $status= displayStatusForSlide($_POST['status']);
    $sql="update contacts set status = $status where id='$id'";
    $kq=$conn->prepare($sql);
    if ($kq->execute()) {
        header("Location:contact.php");
    }else{
        echo"Loi";
    }
}

function displayStatusForSlide($status){
    return ($status == 'Show') ? 0 : 1;

    // example
    // if ($status == 'ON') {
    //  return 0;
    // }else{
    //  return 1;
    // }
}
?>

