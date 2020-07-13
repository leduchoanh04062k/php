<div class="container">
  <h2>Category</h2>     
  <a href="themdm.php" class="btn btn-info" role="button">More category</a>
  <table class="table table-bordered">
  	<thead class="bg-primary">
      <tr>
        <th>Id_Category</th>
        <th>Name_Category</th>
        <th>Image_Category</th>
        <th>Edit</th>
        <th>del</th>
      </tr>
    </thead>
    <?php 
    include 'db.php';
    $sql="select * from category";
    $kq=$conn->query($sql);
    foreach ($kq as $key => $row) {
     ?>
     <tr>
      <th><?php echo $key+1; ?></th>
      <th><?php echo $row['name_category']; ?></th>
      <th><img src="imgload/<?php echo $row['image_category'] ?>" alt="" style="height: 50px;width: 80px"></th>
      <th><a href="suadm.php?masua=<?php echo $row ['id_category']?>"><input type="submit" name=""
        value="edit"></a></th>
        <th><a href="xoadm.php?maxoa=<?php echo $row ['id_category']?>"><input type="submit" name="" value="del" onclick="return confirm('ban co muon xoa k??')" ></a></th>
      </tr>
    <?php }
    ?>
  </table>
</div>