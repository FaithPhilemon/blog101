<?php include ("../includes/header.php") ?>
<?php include ("../includes/connection.php") ?>

<div class="container">
    <div class="col-md-12">
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="POST" role="form">
                <legend>CREATE POST</legend>

                <!-- POST TITLE -->
                <div class="form-group">
                    <label for="txt_title">Title</label>
                    <input type="text" class="form-control" id="txt_title" name="txt_title">
                </div>

                <!-- POST CONTENT -->
                <div class="form-group">
                    <label for="txt_body">Body</label>
                    <textarea name="txt_body" id="txt_body" class="form-control" rows="3" required="required"></textarea>
                </div>

                <!-- POST CATEGORY -->
                <div class="form-group">
                    <label for="ddl_category">Category</label>
                    <select name="ddl_category" id="ddl_category" class="form-control">
                        <option value="">choose category</option>
                        <?php
                            // populate dropdown with categories
                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>

                
                <!-- SUBMIT BUTTON -->
                <button type="submit" name="btn_add" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>
                    ADD POST
                </button>
            </form>

        </div>
    </div>
</div>

<?php include ("../includes/footer.php") ?>