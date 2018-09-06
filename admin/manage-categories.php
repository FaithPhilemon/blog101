<?php 
    include ("../includes/functions.php");
    include ("../includes/connection.php");

    $msg_success = $err_empty = "";
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
        </div>
    </div>
<?php include ("../includes/footer.php") ?>



