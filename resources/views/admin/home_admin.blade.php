@extends('admin.layouts.MasterDashbord')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
  

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$s1}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-check fa-2x text-gray-300"></i>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Voiture</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$s2}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-car-front-fill fa-2x text-gray-300"></i>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Client</div>
                           
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$s4}}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-plus-fill fa-2x text-gray-300"></i>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                               Demmand</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{$s3}}


                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-clipboard2-fill fa-2x text-gray-300"></i>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
     
      
        
            
       
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Comamnds Overview</h6>
                    <div class="dropdown no-arrow">
                        
                        
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body"height="500px">
                    <div class="chart-area" height="500px">
                        <canvas id="myChart" height="130px">
                            
                        </canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">>Comamnds Overview</h6>
                    
                        
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    
    <script >
  
        var labels = {{ Js::from($labels) }};
        var users = {{ Js::from($data) }};
    
        const data = {
          labels: labels,
          datasets: [{
            label: 'demands dataset',
         
            borderColor:'rgba(169,0,53,255)',
            data: users,
          }]
        };
        const data1 = {
          labels: labels,
          datasets: [{
            label: 'demands dataset',
            backgroundColor: 'rgba(169,0,53,255)',
            borderColor: 'rgba(169,0,53,255)',
            data: users,
          }]
        };
    
        const config = {
          type: 'line',
          data: data,
          options: {}
        };
        const config1 = {
          type: 'bar',
          data: data1,
          options: {}
        };
    
        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
        

        const myCmyPieCharthart = new Chart(
          document.getElementById('myPieChart'),
          config1
        );
    
    </script>

    

</div>

@endsection