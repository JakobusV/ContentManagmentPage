<?php
include_once "utility.php";

/**
 * Generates head, start of body tag, and navigation.
 * @param string $title Title of the page being generated.
 * @param string $stylesheetPath Path to style sheet to be used.
 */
function GenerateHeader($title = 'Content Management', $additionalStylesheets = array()) {
    $stylesheetPath = GetSession();
    ValidateHeaderVariables($title, $stylesheetPath);
    $links = CreateLinkTags($additionalStylesheets);
    $header =  '
        <head>
            <title>'.$title.'</title>
            <link rel="stylesheet" href="'.$stylesheetPath.'"/>
            <link rel="stylesheet" href="styleDefault.php"/>
            '.$links.'
        </head>';
    $nav = GenerateNavigationElement();
    return $header.$nav;
}
function GenerateNavigationElement() {
    // Get all categories
    $pages = CreatePageArray();

    $navigationElement = '<nav>';
    foreach (array_keys($pages) as $pageKey)
    {
        $page = $pages[$pageKey];
        $navigationElement .= "<a href=".$page.">".$pageKey."</a>";

        if (array_key_last($pages) != $pageKey)
            $navigationElement .= "&nbsp; &nbsp;";
    }
    return $navigationElement."</nav><br/>";
}

function CreatePageArray() {
    $categories = CategoriesForHeader();

    $pages = array(
        "Home"=>"index.php",
    );

    while ($row = $categories->fetch_assoc())
        $pages[$row["name"]] = 'contentPage.php?category='.$row["id"];

    return $pages;
}

/**
 * Get all variables from session and return in a associative array
 */
function GetSession() {
    return $_COOKIE["user_style_pref"];
}

function ValidateHeaderVariables(&$title, &$stylesheetPath) {
    if (IsNullOrEmptyString($title))
        $title = 'Content Managment Page';
    if (IsNullOrEmptyString($stylesheetPath))
        $stylesheetPath = 'styleVariant1.php';
}

function CreateLinkTags($additionalStylesheets = array()) {
    $returnVal = "";
    foreach ($additionalStylesheets as $stylesheet)
    {
    	$returnVal .= '<link rel="stylesheet" href="'.$stylesheet.'" />';
    }
    return $returnVal;
}
?>