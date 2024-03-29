<?php

/* ====================================================== */
/* Database connection function */
/* ====================================================== */
function dbConnect()
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "user_db";

    $conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed.");
    return $conn;
}

$conn = dbConnect();




/* ====================================================== */
/* Get Head function */
/* ====================================================== */

function getHead()
{
    $pageTitle = dynamicTitle();
    $output = '<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>' . $pageTitle . ' - Pure Coding</title>';

    echo $output;
}


/* ====================================================== */
/* Get Header function */
/* ====================================================== */

function getHeader()
{
    $output = '<header class="py-3 mb-4 border-bottom bg-white">
        <div class="d-flex flex-wrap justify-content-center container">
            <a href="todos.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Todo List</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="todos.php" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="add-todo.php" class="nav-link text-dark">Add Todo</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link bg-danger text-white">Logout</a></li>
            </ul>
        </div>
    </header>';

    echo $output;
}


/* ====================================================== */
/* Text Limit function */
/* ====================================================== */

function textLimit($string, $limit)
{
    if (strlen($string) > $limit) {
        return substr($string, 0, $limit) . "...";
    } else {
        return $string;
    }
}



/* ====================================================== */
/* Get Todo function */
/* ====================================================== */

function getTodo($todo)
{
    $output = '<div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title">' . textLimit($todo['title'], 28) . '</h4>
            <p class="card-text">' . textLimit($todo['description'], 75) . '</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="view-todo.php?id=' . $todo['id'] . '" class="btn btn-sm btn-outline-secondary">View</a>
                    <a href="edit-todo.php?id=' . $todo['id'] . '" class="btn btn-sm btn-outline-secondary">Edit</a>
                </div>
                <small class="text-muted">' . $todo['date'] . '</small>
            </div>
        </div>
    </div>';

    echo $output;
}



/* ====================================================== */
/* Dynamic Title function */
/* ====================================================== */

function dynamicTitle()
{
    global $conn;
    $filename = basename($_SERVER["PHP_SELF"]);
    $pageTitle = "";
    switch ($filename) {
        case 'index.php':
            $pageTitle = "Home";
            break;

        case 'todos.php':
            $pageTitle = "Todo List";
            break;

        case 'add-todo.php':
            $pageTitle = "Add Todo";
            break;

        case 'edit-todo.php':
            $pageTitle = "Edit Todo";
            break;

        case 'view-todo.php':
            $todoId = mysqli_real_escape_string($conn, $_GET["id"]);
            $sql1 = "SELECT * FROM todos WHERE id='{$todoId}'";
            $res1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($res1) > 0) {
                foreach ($res1 as $todo) {
                    $pageTitle = $todo["title"];
                }
            }
            break;

        default:
            $pageTitle = "Todo List";
            break;
    }

    return $pageTitle;
}
