
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        background-color: white;
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .dashboard-box {
        background-color: white;
        width: 80%;
        margin: 10px auto;
        border: 1px solid #ccc;
        border-radius: 12px;
        padding: 50px;
    }

    .filter-container {
        border: none;
        text-align: center;
        padding-left: 300px;
        padding-top: 55px;
    }

    .openModal {
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .modal {
        text-align: center;
        display: none;
        position: fixed;
        z-index: 2;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        padding-left:500px;
    }

    .modalContent {
        font-size: 20px;
        font-weight: bold;
        background-color: #fefefe;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
    }


    .close {
        color: rgb(255, 65, 65);
        float: right;
        font-size: 30px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #ff1010;
    }

    .modalContent button {
        border: none;
        border-radius: 4px;
        font-size: 18px;
        font-weight: bold;
        padding: 10px;
        margin: 5px;
        cursor: pointer;
    }

    .del {
        color: #ff5050;
    }
 
    .del:hover{
        background-color: rgb(167, 167, 167);
    }
   

    .cancel:hover {
        background-color: rgb(167, 167, 167);
    }
    </style>
</head>

<body>
    <div class="filter-container">
        <div class="dashboard-box">
            <a href="Editprofile.php" class="non-style-link">
                <div class="dashboard-items setting-tabs">
                    <div>
                        <div class="h1-dashboard">Account Settings &nbsp;</div><br>
                        <div class="h3-dashboard" style="font-size: 15px;">Edit your Account Details & Change Password
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="dashboard-box">
            <a href="profile.php" class="non-style-link">
                <div class="dashboard-items setting-tabs">
                    <div>
                        <div class="h1-dashboard">View Account Details</div><br>
                        <div class="h3-dashboard" style="font-size: 15px;">View Personal information About Your Account
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="dashboard-box">
            <button type="submit" class="openModal">
                <div class="dashboard-items setting-tabs">
                    <div>
                        <div class="h1-dashboard" style="color: #ff5050;">Delete Account</div><br>
                        <div class="h3-dashboard" style="font-size: 15px;">Will Permanently Remove your Account
                        </div>
                    </div>
                </div>
            </button>
            <div class="modal">
                <div class="modalContent">
                    <span class="close" onclick="hideModal()">&times;</span>
                    <p>Are you sure you want to delete your account?</p>
                    <a class="del" href="deleteaccount.php">Delete Account</a>
                    <a class="cancel" href="settings.php">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php
    include_once "../includes/footer.php";
    ?>
</footer>
<script>
var modal = document.querySelector(".modal");
var btn = document.querySelector(".openModal");
var span = document.querySelector(".close");

btn.addEventListener("click", () => {
    modal.style.display = "block";
});

span.addEventListener("click", () => {
    hideModal();
});

function hideModal() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        hideModal();
    }
};
</script>

</html>