<?php
header("Content-type: text/css");
?>

nav {
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    width: -webkit-calc(100% - 1rem);
    width:    -moz-calc(100% - 1rem);
    width:         calc(100% - 1rem);
    height: 3rem;
    background-color: var(--secondary-light);
    align-items: center;
    padding-left: 1rem;
}

nav a {
    text-decoration: none;
    border-radius: 10px;
    padding: 3px;
    color: var(--primary-light);
    border: solid 1px var(--primary-light);
    background-color: var(--secondary-base);
}
nav a:hover {
    background-color: var(--secondary-dark);
}

section {
    position: absolute;
    display: grid;
    top: 3.5rem;
    left: 0;
    bottom: 3.5rem;
    width: 100%;
    justify-content: center;
    align-items: center;
}

section>div {
    height: 95%;
    display: grid;
    grid-template-columns: 25rem 50rem;
    grid-template-rows: 1fr;
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    grid-template-areas: 'side content';
    border-radius: 1rem;
    box-shadow: lightgray 2px 2px 10px 5px;
}

.sidebar {
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 7fr;
    grid-column-gap: 0;
    grid-row-gap: 0;
    grid-template-areas: 'cat' 'subs';
    grid-area: side;
    background-color: var(--primary-base);
    border-radius: 1rem 0 0 1rem;
}

.sidebar-cat-cont {
    grid-area: cat;
    border-radius: 1rem 0 0 0;
    background-color: var(--primary-dark);
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    box-shadow: inset black -6px 0px 10px -10px;
}
.sidebar-subcats-cont {
    grid-area: subs;
    border-radius: 0 0 0 1rem;
    background-color: var(--primary-base);
    width: 100%;
    box-shadow: inset black -12px 6px 10px -10px;
    display: flex;
    flex-flow: column;
    gap: 1rem;
    padding: 1rem;
}
.sidebar-sub-btn {
    height: 2rem;
    background-color: var(--primary-dark);
    padding-left: 1rem;
    border-radius: 20px;
    box-shadow: black 2px 2px 5px 0px;
    color: black;
    text-decoration: none;
    padding-top: 1rem;
}
.sidebar-sub-btn:hover {
    border: solid 2px var(--secondary-light);
}
.active {
    border: solid 2px var(--secondary-base);
    margin-left: 2rem;
}

.subcategory {
    grid-area: content;
    background-color: var(--primary-dark);
    border-radius: 0 1rem 1rem 0; 

    display: flex;
    flex-flow: column;
    align-items: center;
    padding-top: 1rem;
    gap: 10px;
}

.subcategory img {
    width: 90%;
    max-height: 60%;
}

.subcategory table {
    border: 2px solid black;
}

.subcategory table tr td {
    border: 1px solid #00000055;
    padding: 0.25rem;
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