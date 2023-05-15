<?php

?>

<script>
    var request = new XMLHttpRequest();

    getSub = () => {
        const sub = getURLParameter("sub");

        const requestAddr = "backend/endpoints/sqlGetSubCategoryBySubCategoryId.php?vehicle=" + sub;
        request.open("GET", requestAddr);
        request.onload = generateSub;
        request.send();
    }

    generateSub = (event) => {
        var subs = [];
        var data = event;
        var response = request.responseText;
        data = JSON.parse(response);
        data = data[0];
        ids = ['model', 'year', 'mpg', 'price', 'body_style'];

        for (i in ids)
            getElementAndSetIt(i, data);

        document.getElementById('imageUrl').src = data['imageUrl'];
    }

    getElementAndSetIt = (id, dict) => {
        document.getElementById(id).innerHTML = dict[id];
    }

    getURLParameter = (parameterKey) => {
        const URLParams = new URLSearchParams(window.location.search);
        return URLParams.get(parameterKey);
    }

    getSubs();
</script>