<?php
function GenerateSubCategory($id) {
    if ($id == null)
        return '<div class="subcategory"></div>';
    return '
<div class="subcategory">
    <img id="imageUrl" />
    <table>
        <tr>
            <td>Model</td>
            <td id="model"></td>
        </tr>
        <tr>
            <td>Year</td>
            <td id="year"></td>
        </tr>
        <tr>
            <td>MPG</td>
            <td id="mpg"></td>
        </tr>
        <tr>
            <td>Body Style</td>
            <td id="body_style"></td>
        </tr>
        <tr>
            <td>Price</td>
            <td> id="price"</td>
        </tr>
    </table>
</div>
'.include "subCategoryElementGenerator.php";
}
?>