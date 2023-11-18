<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/patientscss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>



<body>
    
<?php
include_once'navigation.php';
?>
    
    <div class="container">
<div class="row">
    <div class="col-lg-12 card-margin">
        <div class="card search-form">
            <div class="card-body p-0">
                <form id="search-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="row no-gutters">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <select class="form-control" id="exampleFormControlSelect1" name="type">
                                        
                                        <option>clinic</option>
                                        <option>doctors</option>
                                        <option>patients</option>


                                        
                                    </select>
                                </div>
                                <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                    <input type="text" placeholder="Search..." class="form-control" id="search" name="search">
                                </div>
                                
                                <div>
                                <button type="submit" class="btn btn-base">
                                    </button>
                                </div>
                               
                                
                                

                                
                                <div id="search-results"></div>
                                <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function() {
            $("#search").on("input", function() {
                var query = $(this).val();
                var type=$("select[name='type']").val();
                if (query !== "") {
                    $.ajax({
                        url: "clivesearch.php",
                        method: "POST",
                        data: { query: query, type: type },
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