@extends('layouts.frontend')
@section('content')
<h2 class="panel-title">Government Project Overview</h2>

<!-- Panels as Bootstrap Cards in Rows of 2 -->
<div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- All Projects Card -->
    <div class="col">
        <div class="card border-dark text-primary">
            <div class="card-body text-center">
                <h5 class="card-title">All Projects</h5>
                <p><strong>{{ $totalProjects }}</strong></p>
                <p><strong>KES {{ number_format($totalCost, 2) }}</strong></p>
            </div>
        </div>
    </div>
    <!-- Completed Projects Card -->
    <div class="col">
        <div class="card border-dark text-success">
            <div class="card-body text-center">
                <h5 class="card-title">Completed Projects</h5>
                <p><strong>{{ $totalCompletedProjects }}</strong></p>
                <p><strong>KES {{ number_format( $totalCompletedCost, 2) }}</strong></p>
            </div>
        </div>
    </div>
    <!-- Ongoing Projects Card -->
    <div class="col">
        <div class="card border-dark text-warning">
            <div class="card-body text-center">
                <h5 class="card-title">Ongoing Projects</h5>
                <p><strong>{{ $totalOngoingProjects }}</strong></p>
                <p><strong>KES {{ number_format ($totalOngoingCost , 2) }}</strong></p>
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
                <p><strong>{{ $totalStalledProjects }}</strong></p>
                <p><strong>KES {{ number_format( $totalStalledCost, 2) }}</strong></p>
            </div>
        </div>
    </div>
    <!-- Projects This Year Card -->
    <div class="col">
        <div class="card border-dark text-secondary">
            <div class="card-body text-center">
                <h5 class="card-title">Projects This Year</h5>
                <p><strong>{{ $totalProjectYear }}</strong></p>
                <p><strong>KES {{ number_format( $totalCostYear, 2) }}</strong></p>
            </div>
        </div>
    </div>
</div>

<!-- Projects by Department and Sub-County Section -->
<div class="row mt-5">
    <div class="col-md-6">
        <h3 class="panel-title">Projects by Department</h3>
        <table class="table department-table">
    <thead class="table-info">
        <tr>
            <th>Department</th>
            <th>Number of Projects</th>
            <th>Cost (KES)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{ $department->name }}</td>
                <td>{{ $department->project_count }} Projects</td>
                <td>KES {{ number_format($department->total_cost, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>

    <div class="col-md-6">
        <h3 class="panel-title">Projects by Sub-County</h3>
        <table class="table subcounty-table">
            <thead class="table-info">
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

    {{ $chart->render() }}</div>
@endsection

