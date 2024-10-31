<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .content {
            padding: 2rem;
        }
        .panel-title {
            text-align: center;
            margin-bottom: 1rem;
            font-weight: bold;
            font-size: 1.5rem;
            color: #333;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-nav .nav-link {
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #fff !important;
        }
        .navbar-nav .nav-link:hover {
            color: #d4d4d4 !important;
        }
        .footer {
            text-align: center;
            padding: 1rem;
            background-color: #333;
            color: white;
            width: 100%;
        }
        .department-table th,
        .department-table td,
        .subcounty-table th,
        .subcounty-table td {
            border: none;
            padding: 0.75rem;
        }
        .department-table th,
        .subcounty-table th {
            background-color: #f1f1f1;
        }
        .department-table tr:nth-child(odd),
        .subcounty-table tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg mb-3">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="content container-fluid flex-grow-1">
        <!-- Title Above Panels -->
        <h2 class="panel-title">Government Project Overview</h2>

        <!-- Panels as Bootstrap Cards in Rows of 2 -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- All Projects Card -->
            <div class="col">
                <div class="card border-dark text-primary">
                    <div class="card-body text-center">
                        <h5 class="card-title">All Projects</h5>
                        <p><strong>42</strong></p>
                        <p><strong>KES 1,200,000</strong></p>
                    </div>
                </div>
            </div>
            <!-- Completed Projects Card -->
            <div class="col">
                <div class="card border-dark text-success">
                    <div class="card-body text-center">
                        <h5 class="card-title">Completed Projects</h5>
                        <p><strong>25</strong></p>
                        <p><strong>KES 900,000</strong></p>
                    </div>
                </div>
            </div>
            <!-- Ongoing Projects Card -->
            <div class="col">
                <div class="card border-dark text-warning">
                    <div class="card-body text-center">
                        <h5 class="card-title">Ongoing Projects</h5>
                        <p><strong>10</strong></p>
                        <p><strong>KES 300,000</strong></p>
                    </div>
                </div>
            </div>
            <!-- In Procurement Card -->
            <div class="col">
                <div class="card border-dark text-info">
                    <div class="card-body text-center">
                        <h5 class="card-title">In Procurement</h5>
                        <p><strong>5</strong></p>
                        <p><strong>KES 150,000</strong></p>
                    </div>
                </div>
            </div>
            <!-- Stalled Projects Card -->
            <div class="col">
                <div class="card border-dark text-danger">
                    <div class="card-body text-center">
                        <h5 class="card-title">Stalled Projects</h5>
                        <p><strong>2</strong></p>
                        <p><strong>KES 80,000</strong></p>
                    </div>
                </div>
            </div>
            <!-- Projects This Year Card -->
            <div class="col">
                <div class="card border-dark text-secondary">
                    <div class="card-body text-center">
                        <h5 class="card-title">Projects This Year</h5>
                        <p><strong>7</strong></p>
                        <p><strong>KES 250,000</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects by Department and Sub-County Section -->
        <div class="row mt-5">
            <div class="col-md-6">
                <h3 class="panel-title">Projects by Department</h3>
                <table class="table department-table">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Number of Projects</th>
                            <th>Cost (KES)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Agriculture Department</td>
                            <td>12 Projects</td>
                            <td>KES 400,000</td>
                        </tr>
                        <tr>
                            <td>Health Department</td>
                            <td>15 Projects</td>
                            <td>KES 600,000</td>
                        </tr>
                        <tr>
                            <td>Education Department</td>
                            <td>8 Projects</td>
                            <td>KES 200,000</td>
                        </tr>
                        <tr>
                            <td>Infrastructure Department</td>
                            <td>10 Projects</td>
                            <td>KES 500,000</td>
                        </tr>
                        <tr>
                            <td>Water and Sanitation</td>
                            <td>9 Projects</td>
                            <td>KES 300,000</td>
                        </tr>
                        <tr>
                            <td>Finance Department</td>
                            <td>6 Projects</td>
                            <td>KES 180,000</td>
                        </tr>
                        <tr>
                            <td>Environment and Wildlife</td>
                            <td>5 Projects</td>
                            <td>KES 220,000</td>
                        </tr>
                        <tr>
                            <td>Public Works</td>
                            <td>11 Projects</td>
                            <td>KES 450,000</td>
                        </tr>
                        <tr>
                            <td>Housing and Urban Development</td>
                            <td>7 Projects</td>
                            <td>KES 240,000</td>
                        </tr>
                        <tr>
                            <td>Tourism Department</td>
                            <td>13 Projects</td>
                            <td>KES 550,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h3 class="panel-title">Projects by Sub-County</h3>
                <table class="table subcounty-table">
                    <thead>
                        <tr>
                            <th>Sub-County</th>
                            <th>Number of Projects</th>
                            <th>Cost (KES)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mandera East</td>
                            <td>5 Projects</td>
                            <td>KES 200,000</td>
                        </tr>
                        <tr>
                            <td>Mandera West</td>
                            <td>8 Projects</td>
                            <td>KES 350,000</td>
                        </tr>
                        <tr>
                            <td>Mandera North</td>
                            <td>7 Projects</td>
                            <td>KES 300,000</td>
                        </tr>
                        <tr>
                            <td>Mandera South</td>
                            <td>6 Projects</td>
                            <td>KES 250,000</td>
                        </tr>
                        <tr>
                            <td>Mandera Central</td>
                            <td>4 Projects</td>
                            <td>KES 150,000</td>
                        </tr>
                        <tr>
                            <td>Banissa</td>
                            <td>3 Projects</td>
                            <td>KES 120,000</td>
                        </tr>
                        <tr>
                            <td>Elwak</td>
                            <td>5 Projects</td>
                            <td>KES 220,000</td>
                        </tr>
                        <tr>
                            <td>Fino</td>
                            <td>6 Projects</td>
                            <td>KES 300,000</td>
                        </tr>
                        <tr>
                            <td>Rhamu</td>
                            <td>4 Projects</td>
                            <td>KES 180,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Financial Years Section -->
        <div class="row mt-5">
            <h3 class="panel-title">Projects by Year</h3>
            <div class="col-md-12">
                <div class="d-flex justify-content-around">
                    <div class="p-2">
                        <h5>2018</h5>
                        <p>12 Projects</p>
                        <p>KES 300,000</p>
                    </div>
                    <div class="p-2">
                        <h5>2019</h5>
                        <p>15 Projects</p>
                        <p>KES 450,000</p>
                    </div>
                    <div class="p-2">
                        <h5>2020</h5>
                        <p>18 Projects</p>
                        <p>KES 500,000</p>
                    </div>
                    <div class="p-2">
                        <h5>2021</h5>
                        <p>20 Projects</p>
                        <p>KES 600,000</p>
                    </div>
                    <div class="p-2">
                        <h5>2022</h5>
                        <p>22 Projects</p>
                        <p>KES 700,000</p>
                    </div>
                    <div class="p-2">
                        <h5>2023</h5>
                        <p>7 Projects</p>
                        <p>KES 250,000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Mandera County Government. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
