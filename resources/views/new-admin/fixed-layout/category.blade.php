<?php
if (!isset($CategoryId)) {
    $CategoryId = !empty(request()->input('category_id')) ? request()->input('category_id') : old('category_id');
}
?>
<select name="category_id" id="category_id" class="form-control select2" >
    <?php
    foreach (\App\Category::orderBy('category_name', 'asc')->get() as $value) {
        echo "<option value='{$value->id}'";
        echo ($value->id == $CategoryId) ? " selected " : "";
        echo ">{$value->category_name}</option>";
    }
    ?>
</select>
