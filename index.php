<?php include_once("header_con.php");
$result = mysqli_query($con,"SELECT * FROM tasks");

?>
<body>

<div class="container mt-3">
  <h2>TODO List</h2>
  <form action="db/insert.php" method="post">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Enter Task" name="task" require>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


<div class="container">
<button class="btn btn-dark" id="myInput" onclick="myFunction(this.id)">All Tasks</button>
<button class="btn btn-danger" id="myInput2" onclick="myFunction(this.id)" value="Pending">Pending</button>
<button class="btn btn-success" id="myInput3" onclick="myFunction(this.id)" value="Complete">Complete</button>   
  <table class="table table-dark table-striped mt-2" id="myTable">
    <thead>
      <tr>
        <th>Sno.</th>
        <th>Checkbox</th>
        <th>Task</th>
        <th>Status</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    
    <?php $i=0; while($row = mysqli_fetch_array($result)){ $i++;
     $checked=""; if($row['status'] == "Complete") {$checked="checked";}?>
      <tr> 
        <td><?= $i; ?></td>
        <td><input type="checkbox"<?= $checked; ?> id="<?= $row['id']?>,<?= $row['status']?>" onclick="val(this.id,this.value)"/></a></td>
        <td><?= $row['task']; ?></td>
        <td><?= $row['status']; ?></td>
        <td><?= $row['created']; ?></td>
        <td>
            <!-- <a href="db/update.php?id=<?= $row['id']?>">Edit</a> -->
        &nbsp;<a type="button" class="btn btn-info" href="db/delete.php?id=<?= $row['id']?>">Delete</a></td>
      </tr>
      <?php }  ?>
    </tbody>
  </table>
</div>

<?php include_once("footer.php");?>