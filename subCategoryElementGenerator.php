<?php

?>

<script>
    var requestsub = new XMLHttpRequest();

    getSub = () => {
        const sub = getURLParameter("sub");

        const requestAddr = "backend/endpoints/sqlGetSubCategoryBySubCategoryId.php?vehicle=" + sub;
        requestsub.open("GET", requestAddr);
        requestsub.onload = generateSub;
        requestsub.send();
    }

    generateSub = (event) => {
        var subs = [];
        var data = event;
        var response = requestsub.responseText;
        data = JSON.parse(response);
        data = data[0];
        console.log(data);
        ids = ['model', 'year', 'mpg', 'price', 'body_style'];

        for (i in ids) {
            getElementAndSetIt(ids[i], data);
        }

        document.getElementById('imageUrl').src = data['imageUrl'];
    }

    getElementAndSetIt = (id, dict) => {
        document.getElementById(id).innerHTML = dict[id];
    }

    getURLParameter = (parameterKey) => {
        const URLParams = new URLSearchParams(window.location.search);
        return URLParams.get(parameterKey);
    }

    getSub();
</script>