<!DOCTYPE html>
<html>
<head>
    <title>Live Search using AJAX</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <input type="text" id="search" placeholder="Search by First Name" />
    <div id="search-results"></div>
    <script>
        $(document).ready(function() {
            $("#search").on("input", function() {
                var query = $(this).val();
                if (query !== "") {
                    $.ajax({
                        url: "livesearch.php",
                        method: "POST",
                        data: { query: query },
                        success: function(data) {
                            $("#search-results").html(data);
                        }
                    });
                } else {
                    $("#search-results").empty();
                }
            });
        });
    </script>
</body>
</html>
