<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>VeZeeTa</title>
</head>
<body class="body">
    <section class="header">
        <div class="logo">
            <i class="ri-menu-line menu"></i>
            <h2><span>VE</span>ZeeTa.</h2>
        </div>
        <div class="header--items">
            <i class="ri-search-2-line"></i>
            <div class="dark--theme--btn">
                <i class="ri-moon-line moon"></i>
                <i class="ri-sun-line sun"></i>
            </div>
            <i class="ri-notification-2-line"></i>
            <i class="ri-wechat-2-line chat"></i>
            <div class="profile">
                <img src="assets/images/profile.jpg" alt=""> <!--el pp-->
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="#" class="active">
                        <span class="icon"><i class="ri-bar-chart-line"></i></span>
                        <div class="sidebar--item">Overview</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="ri-empathize-line"></i></span>
                        <div class="sidebar--item">Appointments</div>
                    </a>
                </li>
                <li>
                    <div class="dropdown">
                    <a  href="#">
                        <span class="icon"><i class="ri-user-line"></i></span>
                        <div class="sidebar--item">Users</div>
                    </a>
                    <div class="dropdown-options">
                        
                         <a href="addpatient.php">Patients</a>
                   <a href="addemployees.php">Employees</a>
    
  </div>
  </div>

                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="ri-calendar-line"></i></span>
                        <div class="sidebar--item">Calender</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="ri-profile-line"></i></span>
                        <div class="sidebar--item">Profile</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="ri-settings-3-line"></i></span>
                        <div class="sidebar--item">Settings</div>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom--items">
                <li>
                    <a href="#">
                        <span class="icon"><i class="ri-question-line"></i></span>
                        <div class="sidebar--item">Help</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="ri-logout-box-r-line"></i></span>
                        <div class="sidebar--item">Logout</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--container">
            <div class="section--title">
                <h3 class="title">Welcome back, Jenny</h3>
                <select name="date" id="date">
                    <option value="last7">Last 7 days</option>
                    <option value="lastmonth">Last month</option>
                    <option value="lastyear">Last year</option>
                    <option value="alltime">All time</option>
                </select>
            </div>
            <div class="cards">
                <div class="card card-1">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-shopping-bag-2-line"></i></span>
                        <span>Sales</span>
                    </div>
                    <h3 class="card--value">$432,576.34 <i class="ri-arrow-up-circle-fill up"></i></h3>
                    <h5 class="more">4,234 more than usual</h5>
                    <div class="chart">
                        <canvas id="sales"></canvas>
                    </div>
                </div>
                <div class="card card-2">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-gift-line"></i></span>
                        <span>Orders</span>
                    </div>
                    <h3 class="card--value">2,567 <i class="ri-arrow-down-circle-fill down"></i></h3>
                    <h5 class="less">234 less than usual</h5>
                    <div class="chart">
                        <canvas id="orders"></canvas>
                    </div>
                </div>
                <div class="card card-3">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-handbag-line"></i></span>
                        <span>Products</span>
                    </div>
                    <h3 class="card--value">587 <i class="ri-arrow-up-circle-fill up"></i></h3>
                    <h5 class="more">23 more than usual</h5>
                    <div class="chart">
                        <canvas id="products"></canvas>
                    </div>
                </div>
                <div class="card card-4">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-user-line"></i></span>
                        <span>Customers</span>
                    </div>
                    <h3 class="card--value">4,300 <i class="ri-arrow-down-circle-fill down"></i></h3>
                    <h5 class="less">34 less than usual</h5>
                    <div class="chart">
                        <canvas id="customers"></canvas>
                    </div>
                </div>
            </div>
            <div class="target-vs-sales--container">
                <div class="section--title">
                    <h3 class="title">Schedule</h3>
                    <div class="sales--value">
                        <div class="target">
                            <i class="ri-checkbox-blank-circle-fill circle"></i>
                            Finished <span>&nbsp; </span>
                        </div>
                        <div class="current">
                            <i class="ri-checkbox-blank-circle-fill circle"></i>
                            Not  <span>&nbsp;Finished</span>
                        </div>
                    </div>
                </div>
                <div class="target--vs--sales">
                    <canvas id="tarsale"></canvas>
                </div>
            </div>
            <div class="table">
                <div class="section--title">
                    <h3 class="title">Recent Patients</h3>
                    <div></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Patient name</th>
                            <th>Patient ID</th>
                            <th>Age</th>
                            <th>Mobile Number</th>
                            <th>Diagnoses</th>
                            <th>Next time Appointment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MacBook Air AAPL</td>
                            <td>#231234</td>
                            <td>$1846</td>
                            <td>331</td>
                            <td>12</td>
                            <td>$337,218.54</td>
                        </tr>
                        <tr>
                            <td>MacBook Air AAPL</td>
                            <td>#231234</td>
                            <td>$1846</td>
                            <td>331</td>
                            <td>12</td>
                            <td>$337,218.54</td>
                        </tr>
                        <tr>
                            <td>MacBook Air AAPL</td>
                            <td>#231234</td>
                            <td>$1846</td>
                            <td>331</td>
                            <td>12</td>
                            <td>$337,218.54</td>
                        </tr>
                        <tr>
                            <td>MacBook Air AAPL</td>
                            <td>#231234</td>
                            <td>$1846</td>
                            <td>331</td>
                            <td>12</td>
                            <td>$337,218.54</td>
                        </tr>
                        <tr>
                            <td>MacBook Air AAPL</td>
                            <td>#231234</td>
                            <td>$1846</td>
                            <td>331</td>
                            <td>12</td>
                            <td>$337,218.54</td>
                        </tr>
                        <tr>
                            <td>MacBook Air AAPL</td>
                            <td>#231234</td>
                            <td>$1846</td>
                            <td>331</td>
                            <td>12</td>
                            <td>$337,218.54</td>
                        </tr>
                        <tr>
                            <td>MacBook Air AAPL</td>
                            <td>#231234</td>
                            <td>$1846</td>
                            <td>331</td>
                            <td>12</td>
                            <td>$337,218.54</td>
                        </tr>
                        <tr>
                            <td>MacBook Air AAPL</td>
                            <td>#231234</td>
                            <td>$1846</td>
                            <td>331</td>
                            <td>12</td>
                            <td>$337,218.54</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sales.js"></script>
    <script src="assets/js/orders.js"></script>
    <script src="assets/js/products.js"></script>
    <script src="assets/js/customers.js"></script>
    <script src="assets/js/tarsale.js"></script>
</body>
</html>