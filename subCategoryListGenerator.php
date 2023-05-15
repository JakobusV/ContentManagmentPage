<?php

?>

<script>
    var request = new XMLHttpRequest();

    getSubs = () => {
        const cat = getURLParameter("category");

        const requestAddr = "backend/endpoints/sqlGetSubCategoryByCategoryId.php?manufacturer=" + cat;
        request.open("GET", requestAddr);
        request.onload = generateSubList;
        request.send();
    }

    generateSubList = (event) => {
        var subs = [];
        var data = event;
        const cat = getURLParameter("category");
        const active = getURLParameter("sub");
        var response = request.responseText;    
        data = JSON.parse(response);

        for (i in data) {
            var classes = "sidebar-sub-btn"
            var model = data[i].model;
            if (model == active)
                classes += " active"
            subs.push(`<a href="contentPage.php?category=${cat}&sub=${model}">${model}</a>`);
        }

        var res = subs.join("\n");

        document.getElementsByClassName("sidebar-subcats-cont")[0].innerHTML = res;
    }

    getURLParameter = (parameterKey) => {
        const URLParams = new URLSearchParams(window.location.search);
        return URLParams.get(parameterKey);
    }

    getSubs();
</script>