<?php 
    include ("../includes/functions.php");
    include ("../includes/connection.php");

    $msg_success = $err_empty = $msg_delete_success = "";

    if (isset($_GET['delete']) && $_GET['delete'] == "success") {
        $msg_delete_success = '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Category deleted!
                                </div>';
    }

    if (isset($_POST['btnAdd'])) {

        $cat = validate($_POST['txt_cat']);
       
        if ($cat == false) {
           $err_empty = '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             One or more field(s) empty
                        </div>';
           
        }else {
            $sql = "INSERT INTO categories (name) VALUES('$cat')";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo die("Error occured " . mysqli_error($conn));
            }else {
                $msg_success = '<div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>'.$cat.'</strong> category has been created
                                </div>';

            }
           
        }


    }

?>

<?php include ("../includes/header.php") ?>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-6">
                <?php echo $msg_success ?>
                <?php echo $err_empty ?>
                <form action="manage-categories.php" method="post" class="form-inline">
                    <div class="form-group">
                        <div class="row">
                            <label for="txt_cat">Category name</label>
                            <input type="text" name="txt_cat" id="txt_cat" class="form-control">
                            <button type="submit" name="btnAdd" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus"></span>
                                ADD CATEGORY
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
            <?php echo $msg_delete_success ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                                                <td>'.$row['id'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>
                                                    <a href="edit.php?id='.$row['id'].'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                                    <a href="delete.php?id='.$row['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                                </td>
                                            </tr>';
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
<?php include ("../includes/footer.php") ?>



