<?php
    session_start();
    include 'db.php';
    if(isset($_SESSION['name'])){
        echo "Chào bạn ".$name=$_SESSION['name'];
        $sql = "select * from users where name = '$name'";
        $kq = $conn->query($sql)->fetch();
      
        
?>
<?php
    include 'db.php';
    if(isset($_GET['id_xoa'])){
        $product_id = $_GET['product_id'];
        $id_xoa = $_GET['id_xoa'];
        $sql = "delete from comments where id='$id_xoa'";
        $kq = $conn->prepare($sql);
        if($kq->execute()){
            header("location:ctcomments.php?product_id=$product_id");
        }else{
            echo "Lỗi";
        }
    }
?>
<?php
    }else{
        header("location.php");
}
?>