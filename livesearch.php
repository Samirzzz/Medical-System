<style>
    /* Style for search results container */
#search-result {
    margin-top: 20px; /* Add some spacing at the top */
}

/* Style for each result item */
#search-result a {
    text-decoration: none; /* Remove the underline from links */
    color: black;
    display: block; /* Display the links as block elements for better spacing */
    padding: 10px 0; /* Add padding around each result item */
    border-bottom: 1px solid #ddd; /* Add a border at the bottom of each result item */
    margin-left: 230px;
}

/* Add a hover effect for result items */
#search-result a:hover {
    background-color: #f5f5f5; /* Change the background color on hover */
    color: blue;
}

</style>
<?php
include("connection.php");

if (isset($_POST["query"])) {
    $search = $conn->real_escape_string($_POST["query"]);
    $sql = "SELECT * FROM patient WHERE firstname LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div id="search-result">';
        while ($row = $result->fetch_assoc()) {
            
            echo '<a href="patientinfo.php?uid=' . $row["uid"] . '"><h6>'."Id #". $row["uid"] .' &nbsp  &nbsp'. $row["firstname"] . ' ' . $row["lastname"] . '</h6></a><br>';
        }
        echo '</div>';
    } else {
        echo "No results found.";
    }
}
?>

