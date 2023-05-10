<?php
include_once "header.php";
include_once "footer.php";
include_once "subCategoryElement.php";

// get db variable for category

echo GenerateHeader(title:' Category Page');

echo '
<section>
    <div class="sidebar">
    </div>'.
    GenerateSubCategory().
'</section>
';

echo GenerateFooter();
?>