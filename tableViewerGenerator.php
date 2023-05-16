<?php
include_once "utility.php";
/**
 * Creates Table Viewer Element for a specific table.
 * @param string $tableName Table name used in database
 * @return string String representing a table viewer element.
 */
function TableViewer($tableName = "") {
    // VALIDATE TABLE
    if (!IsValidTable($tableName))
        return "";
    // GET DATA
    $data = GetDataForTable($tableName);
    // CREATE HTML WITH DATA
    $html = GenerateTableViewer($data, $tableName);
    // RETURN HTML
    return $html;
}

/**
 * Generates html table element and propagates it with data provided.
 * @param mixed $data Array of dictionary objects, where the key is the column name and the value is it's database value
 * @param string $tableName String of table name, used to create delete option
 * @return string Returns HTML Table representaion of dataset.
 */
function GenerateTableViewer($data, $tableName) {
    if (is_array($data) && count($data) == 0)
        return '';
    $table = '<table>';
    $toprow = "";
    while ($row = $data->fetch_assoc())
    {
        if (IsNullOrEmptyString($toprow)) {
            $toprow = GenerateTableViewerColumnNames($row);
            $table .= $toprow;
        }
        $table .= '<tr>';
        foreach ($row as $value)
            $table .= '<td>'.$value.'</td>';
        $table .= GenerateDeleteOption($row['id'], $tableName);
        $table .= '</tr>';
    }
    return $table.'</table>';
}

function GenerateDeleteOption($id, $tableName) {
    $endpoint = "Backend/endpoints/sqlDelete";
    switch ($tableName) {
        case "manufacturer":
            $endpoint .= "Category.php?manufacturer=";
            break;
        case "vehicle":
            $endpoint .= "SubCategory.php?vehicle=";
            break;
    }
    $endpoint .= $id;
    return '<td><a href="'.$endpoint.'">X</td>';
}

/**
 * Generates the header row for an html table using the keys in an associative array.
 * @param mixed $dataRow A single row from a set that will be used as an example for the table
 * @return string Table row containing each table header
 */
function GenerateTableViewerColumnNames($dataRow = array()) {
    $topRowHTML = "<tr>";
    foreach ($dataRow as $key => $value)
    {
    	$topRowHTML .= '<th>'.strtoupper($key).'</th>';
    }
    return $topRowHTML.'</tr>';
}

/**
 * Based on table name, will return all rows json of table entered.
 * @param mixed $tableName Name of table, must be exact
 * @return array|bool|string
 */
function GetDataForTable($tableName = "") {
    switch ($tableName) {
        case "manufacturer":
            return CategoriesForHeader();
        case "vehicle":
            return SubCategories();
        default:
            return array();
    }
}

/**
 * Validates string and checks if table exists.
 * @param mixed $tableName Name of table (Exact)
 * @return bool Whether or not table exists.
 */
function IsValidTable($tableName = "") {
    if (IsNullOrEmptyString($tableName))
        return false;

    include_once "Backend/models.php";

    if (in_array($tableName, GetAllTables()))
        return true;
    else
        return false;
}
?>