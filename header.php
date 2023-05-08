<?php
include_once "utility.php";

/**
 * Generates head, start of body tag, and navigation.
 * @param string $title Title of the page being generated.
 * @param string $stylesheetPath Path to style sheet to be used.
 */
function GenerateHeader($title = 'Content Management Page') { 
    // TODO GET STYLE PATH FROM SESSION
    ValidateHeaderVariables($title, $stylesheetPath);
    return '
        <head>
            <title>'.$title.'</title>
            <link rel="stylesheet" href="'.$stylesheetPath.'"/>
        </head>
        <body>
    ';
}
function GenerateNavigationElement() {
    $pages = array(
        "Home"=>"index.php",
        "Content Page"=>"contentPage.php",
    );
    $navigationElement = '<div class="navigation">';
    foreach (array_keys($pages) as $pageKey)
    {
        $page = $pages[$pageKey];
        $navigationElement .= "<a href=".$page.">".$pageKey."</a>";

        if (array_key_last($pages) != $pageKey) 
            $navigationElement .= "&nbsp; &nbsp;";
    }
    return $navigationElement."</div><br/>";
}

/**
 * Get all variables from session and return in a associative array
 */
function GetSession() {
    // TODO
}

function ValidateHeaderVariables(&$title, &$stylesheetPath) {
    if (IsNullOrEmptyString($title))
        $title = 'Content Managment Page';
    if (IsNullOrEmptyString($stylesheetPath))
        $stylesheetPath = 'styleDefault.php';
}
?>