<?php
include_once "header.php";
include_once "footer.php";

if (!isset($_SESSION["current_user"]["auth"]))
    header("Location: Login.php");
else if ($_SESSION["current_user"]["auth"] != 1)
    header("Location: contentPage.php");
echo GenerateHeader(title:"Admin Page");
?>
<section class="admin-del">
    <div class="cat">
        <?php
        include_once "tableViewerGenerator.php";
        echo TableViewer("manufacturer");
        ?>
    </div>
    <div class="sub">
        <?php
        include_once "tableViewerGenerator.php";
        echo TableViewer("vehicle");
        ?>
    </div>
</section>
<?php
echo GenerateFooter();
?>