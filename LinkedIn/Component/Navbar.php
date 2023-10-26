<?php

if (isset($_SESSION['token'])) {
    echo "
    <nav class='navbar navbar-dark bg-dark px-5'>
        <div class='container-fluid'>
            <div class='brand'>
                <img src='./images/linkedIn.png' width='50' class='rounded-3 me-4' alt='linkedin logo' />
                <h1 class='navbar-brand d-inline-block'>Welcome, {$_SESSION['profile']['firstName']} {$_SESSION['profile']['lastName']}</h1>
            </div>
            <ul class='navbar-nav flex-row'>
                <li class='nav-item float-start mx-4'>
                    <button class='nav-link active bg-transparent border-0' data-target='NormalPost'>Normal Text</button>
                </li>
                <li class='nav-item float-start mx-4'>
                    <button class='nav-link bg-transparent border-0' data-target='ArticlePost'>Article</button>
                </li>
                <li class='nav-item float-start mx-4'>
                    <button class='nav-link bg-transparent border-0' data-target='ImagePost'>Image Post</button>
                </li>
            </ul>
            <div class='end-part'>
                <img src='{$_SESSION['profile']['profilePicture']}' class='rounded-circle' width='50' alt='Profile picture'/>
                <button class='btn btn-danger btn-sm ms-5' onclick='logout()'>Logout</button> 
            </div>
        </div>
    </nav>";
}
