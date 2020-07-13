<?php 
include 'db.php';
if (isset($_POST['status'])) {
    $id= $_POST['id'];
    $status= displayStatusForSlide($_POST['status']);
    $sql="update orders set status = $status where id='$id'";
    $kq=$conn->prepare($sql);
    if ($kq->execute()) {
        header("Location:order.php");
    }else{
        echo"Loi";
    }
}

function displayStatusForSlide($status){
    return ($status == 'accept') ? 0 : 1;

    // example
    // if ($status == 'ON') {
    //  return 0;
    // }else{
    //  return 1;
    // }
}
?>

