<?php
header("Content-type: text/css");
?>

nav {
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 3rem;
    background-color: var(--secondary-light);
    align-items: center;
    padding-left: 1rem;
}

nav a {
    border: solid 1px black;
}
nav a:hover {
    background-color:
}

section {
    position: absolute;
    display: grid;
    grid-template-columns: 25rem 50rem;
    grid-template-rows: 1fr;
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    grid-template-areas: 'side content';
    top: 3.5rem;
    left: 0;
    bottom: 3.5rem;
    width: 100%;
    justify-content: center;
}

.sidebar {
    grid-area: side;
    background-color: var(--primary-base);
}

.subcategory {
    grid-area: content;
    background-color: var(--primary-dark);
}

footer {
    display: flex;
    height: 3rem;
    background-color: var(--secondary-light);
    width: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
    align-self: center;
    justify-content: center;
    align-items: center;
}