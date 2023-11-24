<style>
    #search-bar {
        display: flex;
        margin-top: 20px;
    }

    #search-bar select {
        margin-right: 10px;
        padding: 5px;
    }

    #search-bar input[type="text"] {
        padding: 5px;
        flex: 1;
    }

    #search-results {
        margin-top: 10px;
    }

    #search-results table {
        width: 100%;
        border-collapse: collapse;
    }

    #search-results table th,
    #search-results table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    #search-results table th {
        background-color: #f5f5f5;
    }

    #search-results a {
        text-decoration: none;
        color: black;
        display: block;
    }
</style>

<?php
include("../includes/db.php");
include(".\classes.php");

if (isset($_POST["query"])) {
    $usertype = $_POST['type'];
    $search = $_POST["query"];

    $viewpatients = Patient::patientSearch($search);
    if (!empty($viewpatients)) {
        echo '<div id="search-results">';
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Email</th>';
        echo '<th>First Name</th>';
        echo '<th>Last Name</th>';
        echo '</tr>';
        foreach ($viewpatients as $pat) {
            echo '<tr>';
            echo '<td><a href="patientinfo.php?uid=' . $pat->uid . '">' . $pat->pid . '</a></td>';
            echo '<td><a href="patientinfo.php?uid=' . $pat->uid . '">' . $pat->email . '</a></td>';
            echo '<td><a href="patientinfo.php?uid=' . $pat->uid . '">' . $pat->firstname . '</a></td>';
            echo '<td><a href="patientinfo.php?uid=' . $pat->uid . '">' . $pat->lastname . '</a></td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    } else {
        echo "No results found.";
    }
}
?>