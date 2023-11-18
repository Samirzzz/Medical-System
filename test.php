<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="d1">
        <input type="button" value="Create new" name="t" id="t" onclick="create();">    

    </div>



</body>
<script>
        var counter = 1;

        function create() {
            var newButton = document.createElement("input");
            newButton.type = "button";
            newButton.value = "Add";
            

            document.getElementById("t").onclick = null;
            newButton.onclick = function() {
            d.appendChild(document.createElement("br"));
                
                createNewInput();
            d.appendChild(document.createElement("br"));

            };

            var d = document.getElementById("d1");
            d.appendChild(newButton);
            d.appendChild(document.createElement("br"));

        }

        function createNewInput() {
            var newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = "input_" + counter++; 
            newInput.id="inp";  
            newInput.placeholder = "Type here";
            newInput.style.width="300px";
            newInput.style.height="30px";
            //window.alert(newInput.name);
            var d = document.getElementById("d1");
            d.appendChild(newInput);
            d.appendChild(document.createElement("br"));

        }
    </script>

</html>