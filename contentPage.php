<?php
include_once "header.php";
include_once "footer.php";
include_once "subCategoryElement.php";

session_start();

if(!isset($_SESSION["current_user"]["auth"])){
    header("Location: Login.php");
} else {
    echo GenerateHeader('Category Page');

    if (isset($_GET["category"]))
        $category = $_GET["category"];

    if (isset($_GET["sub"]))
        $sub = $_GET['sub'];

    $catName = GetCatName($category);

    echo '
<section>
    <div>
        <div class="sidebar">
            <div class="sidebar-cat-cont">
                <h2>'.$catName.'</h2>
            </div>
            <div class="sidebar-subcats-cont">
            </div>
        </div>'.
    GenerateSubCategory($sub).
    '</div>
</section>
';

    echo GenerateFooter();

    include_once "subCategoryListGenerator.php";
}

?>