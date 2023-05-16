<?php
include_once 'header.php';



GenerateHeader("Admin Add/Update");
?>
<section>
    <div class="cat">
        <h1>Manufacturer</h1>
        <form method="post">
            <label for="manufacturerId">ID:</label>
            <input type="text" id="manufacturerId" name="manufacturerId" />
            <label for="manufacturerName">Name:</label>
            <input type="text" id="manufacturerName" name="manufacturerName" />
            <button onclick="CreateCat()">Create</button>
            <button onclick="UpdateCat()">Update</button>
        </form>
    </div>
    <div class="sub">
        <h1>Vehicle</h1>
        <form method="post">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" />
            <label for="manufacturer">Manufacturer:</label>
            <input type="text" id="manufacturer" name="manufacturer" />
            <label for="model">Model:</label><br />
            <input type="text" id="model" name="model" />
            <label for="year">Year:</label><br />
            <input type="text" id="year" name="year" />
            <label for="image">ImageUrl:</label><br />
            <input type="text" id="image" name="image" />
            <label for="mpg">MPG:</label><br />
            <input type="text" id="mpg" name="mpg" />
            <label for="bodyStyle">Body Style:</label><br />
            <input type="text" id="bodyStyle" name="bodyStyle" />
            <label for="price">Price:</label><br />
            <input type="text" id="price" name="price" />
            <button onclick="CreateSub()">Create</button>
            <button onclick="UpdateSub()">Update</button>
        </form>
    </div>
</section>

<script type="text/javascript">
    var request = new XMLHttpRequest();

    const CreateCat = () => {
        var manu = document.getElementById("manufacturerName").value;
        var body = `{"manufacturerName":"${manu}"}`;
        console.log("FUCK");
        request.open("POST", 'Backend/endpoints/sqlCreateCategory.php');
        console.log(body);
        request.send(body);
    }

    const UpdateCat = () => {
        var id = document.getElementById("manufacturerId").value;
        var manu = document.getElementById("manufacturerName").value;
        var body = `{"manufacturerId":"${id}", "manufacturerName":"${manu}"}`;

        console.log("FUCK");                                    
        request.open("POST", 'Backend/endpoints/sqlUpdateCategory.php');
        console.log(body);
        request.send(body);
    }

    const CreateSub = () => {
        var man = document.getElementById("manufacturer").value;
        var model = document.getElementById("model").value;
        var year = document.getElementById("year").value;
        var image = document.getElementById("image").value;
        var mpg = document.getElementById("mpg").value;
        var style = document.getElementById("bodyStyle").value;
        var price = document.getElementById("price").value;

        var body = `{"manufacturerId":"${man}", "vehicleModel":"${model}", "vehicleYear":"${year}", "vehicleImageUrl":"${image}", "vehicleMpg":"${mpg}", "vehicleBodyStyle":"${style}", "vehiclePrice":"${price}"}`;

        request.open('POST', 'Backend/endpoints/sqlCreateSubCategory.php');
        request.send(body);
    }

    const UpdateSub = () => {
        var id = document.getElementById("id").value;
        var man = document.getElementById("manufacturer").value;
        var model = document.getElementById("model").value;
        var year = document.getElementById("year").value;
        var image = document.getElementById("image").value;
        var mpg = document.getElementById("mpg").value;
        var style = document.getElementById("bodyStyle").value;
        var price = document.getElementById("price").value;

        var body = `{"vehicleId":"${id}", "manufacturerId":"${man}", "vehicleModel":"${model}", "vehicleYear":"${year}", "vehicleImageUrl":"${image}", "vehicleMpg":"${mpg}", "vehicleBodyStyle":"${style}", "vehiclePrice":"${price}"}`;

        request.open('POST', 'Backend/endpoints/sqlUpdateSubCategory.php');
        console.log(body);
        request.send(body);
    }
</script>