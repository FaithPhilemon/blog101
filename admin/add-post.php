<?php include ("../includes/header.php") ?>

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
        <select name="ddl_category" id="ddl_category">
            <option value="">choose category</option>
        </select>
    </div>

    
    <!-- SUBMIT BUTTON -->
    <button type="submit" name="btn_add" class="btn btn-primary btn-lg">ADD POST</button>
</form>




<?php include ("../includes/footer.php") ?>