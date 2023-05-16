<?php
include_once 'header.php';

function onSubmit() {
    
}
?>

<div class="">
    <h1>Add Vehicle</h1>
    <form method="post">
        <label for="manufacturer">Manufacturer:</label>
        <input type="text" id="manufacturer" name="manufacturer"/>
        <label for="model">Model:</label><br>
        <input type="text" id="model" name="model"/>
        <label for="year">Year:</label><br>
        <input type="text" id="year" name="year"/>
        <label for="image">ImageUrl:</label><br>
        <input type="text" id="image" name="image"/>
        <label for="mpg">MPG:</label><br>
        <input type="text" id="mpg" name="mpg"/>
        <label for="bodyStyle">Body Style:</label><br>
        <input type="text" id="bodyStyle" name="bodyStyle"/>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"/>
        <input type="submit" name="submit"/>
    </form>
</div>