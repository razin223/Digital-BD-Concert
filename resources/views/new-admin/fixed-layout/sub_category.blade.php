<?php
if (!isset($CategoryId)) {
    $CategoryId = !empty(request()->input('category_id')) ? request()->input('category_id') : old('category_id');
}
if (!isset($SubCategoryId)) {
    $SubCategoryId = !empty(request()->input('sub_category_id')) ? request()->input('sub_category_id') : old('sub_category_id');
}
?>
<select name="sub_category_id" id="sub_category_id" class="form-control select2">
    <?php
    if (isset($CategoryId) && !empty($CategoryId)) {
        ?>
        <option value="">(select)</option>
        <?php
        foreach (\App\SubCategory::where('category_id', $CategoryId)->orderBy('sub_category_name', 'asc')->get() as $value) {
            echo "<option value='{$value->id}'";
            echo ($value->id == $SubCategoryId) ? " selected " : "";
            echo ">{$value->sub_category_name}</option>";
        }
    }
    ?>
</select>
