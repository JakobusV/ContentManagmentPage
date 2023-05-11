<?php
class BaseModel {
    public int $id;
    /**
ааа * Allows for all or specific columns to be retrieved on table, returns query string for execution.
ааа * @param mixed $columns Optional: Columns that exist within the table, used to specify return data. If blank will return all columns.
ааа * @param mixed $filters Optional: Filters for the query specified by strings. Filters are only attached with AND operators.
ааа * @return string Query for phpapi database
ааа */
    public function SelectQuery($columns = array(), $filters = array(), $limit = 100) {
        foreach ($columns as $column)
            $this->ValidateColumn($column);
        $jsonColumns = $this->CreateSelectJson($columns);
        $filter = '';
        if (count($filters) > 0)
            $filter = 'WHERE '.join(' AND ', $filters);
        return 'SELECT '.$jsonColumns.' FROM '.get_class($this).' '.$filter.' LIMIT '.$limit.';';
    }
    /**
ааа * Creates SQL JSON_OBJECT format for select statements that are expecting JSON.
ааа * @param mixed $columns
ааа * @return array|string
ааа */
    private function CreateSelectJson($columns = array()) {
        if (count($columns) == 0)
            $columns = array_keys(get_class_vars(get_class($this)));
        $jsonColumns = 'JSON_OBJECT(';
        foreach($columns as $column)
            $jsonColumns .= "'".$column."', ".$column.',';
        $jsonColumns = substr_replace($jsonColumns, ') as data', -1);
        return $jsonColumns;
    }
    /**
ааа * Generic insert query utilizing all class specific properties.
ааа * @return string
ааа */
    public function InsertQuery() {
        $values = get_class_vars(get_class($this));
        array_splice($values, 0, 1);
        $query = 'INSERT INTO '.get_class($this).' ';
        $columnNames = '('.join(', ', array_keys($values)).')';
        $columnValues = array();
        foreach ($values as $column => $val)
            array_push($columnValues, $this->FormatColumnValue($this->$column));
        return $query.$columnNames.' VALUES ('.join(', ', $columnValues).');';
    }
    /**
ааа * Generic update query utilizing all class properties.
ааа * @return string
ааа */
    public function UpdateQuery() {
        $values = get_class_vars(get_class($this));
        $query = 'UPDATE '.get_class($this).' SET ';
        $columnChanges = array();
        foreach ($values as $column => $val)
            array_push($columnChanges, $column.' = '.$this->FormatColumnValue($this->$column));
        $query .= join(', ', $columnChanges).' WHERE id = '.$this->id;
        return $query;
    }
    /**
ааа * Generic delete query utilizing class' id property.
ааа * @return string
ааа */
    public function DeleteQuery() {
        return 'DELETE FROM '.get_class($this).' WHERE id = '.$this->id;
    }
    /**
ааа * Create SQL where statement using equals. Used for exact strings or number datatypes.
ааа * @param mixed $column
ааа * @param mixed $value
ааа * @return string
    */
    public function CreateFilterExact($column, $value) {
        return $column.'='.$value;
    }
    /**
ааа * Create SQL where statement using LIKE. Used for stirngs and text datatypes.
ааа * @param mixed $column
ааа * @param mixed $value
ааа * @return string
ааа */
    public function CreateFilterLike($column, $value) {
        return $column." LIKE '%".$value."%'";
    }
    /**
ааа * Perform check to see if column exists within class. Throws UnexpectedValueException if column not found.
ааа * @param mixed $column
ааа * @throws UnexpectedValueException
ааа */
    protected function ValidateColumn($column) {
        if (!property_exists(get_class($this), $column))
            throw new UnexpectedValueException("Column not found within table. column:".$column." table:".get_class($this));
    }

    /**
     * Formats given value for sql query usage
     * String data types are surounded by single quotes
     * Bool data types are converted to 1 for true and 0 for false
     * Other numbers are unchanged
     * @param mixed $value
     * @return mixed
     */
    protected function FormatColumnValue($value) {
        if (is_string($value)) return "'" . $value . "'";
        else if (is_bool($value)) return ($value)? 1 : 0;
        else return $value;
    }
}

class manufacturer extends BaseModel {
    public int $id;
    public string $name;
}

class user extends BaseModel {
    public int $id;
    public string $email;
    public string $password;
    public bool $isAdmin;
}

class vehicle extends BaseModel {
    public int $id;
    public int $manufacturer_id;
    public string $model;
    public int $year;
    public string $imageUrl;
    public float $mpg;
    public string $body_style;
    public float $price;
}

?>