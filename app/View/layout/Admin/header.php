<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap 5  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>DashBoard</title>
</head>

<body cz-shortcut-listen="true" style="height:100vh ;" class="roe">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap py-3 " style="height: 8%;">
        <div class="container">

            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/Admin">Admin Dashbard </a>
            <ul class="navbar-nav pt-2">
                <li class="nav-item text-nowrap">
                    <h5>
                    <a class=" btn btn-info py-2 px-4 mr-3 text-white" href="/">
                            home page
                        </a>
                        <a class=" btn btn-danger py-2 px-4 mr-3 text-white" href="/logout">
                            log out
                        </a>
                    </h5>
                </li>
            </ul>
        </div>
    </nav>

    <div style="height: 92%;">
        <div style=" height: 100%; display: flex;">
            <nav class=" bg-light sidebar " style="width: 15%;">
                <div class="sidebar-sticky">
                    <ul class="list-group">
                        <li class="list-group-item ">
                            <a href="/Admin" class="text-dark h5">
                                Dashboard
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/user-list" class="text-dark h5">
                                Users
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/category" class="text-dark h5">
                                category
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/product" class="text-dark h5">
                                product
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" style="width: 85%;"class=" pt-3 px-4">