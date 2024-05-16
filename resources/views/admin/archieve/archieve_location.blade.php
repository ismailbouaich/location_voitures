@extends('admin.layouts.MasterDashbord')

@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">location archieve</h1>
   
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="position-relative">
                <h6 class="m-0 font-weight-bold text-primary">locations</h6>

             

                

            </div>
           
        </div>
      
   
        <div class="card-body">
            <div class="table-responsive">
             
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>places</th>
                            <th>deleted_at</th>
                            <th>Actions</th>
                            
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($locations as $location)
                        <tr>  
                            <td>{{$location->id}}</td>
                            <td>{{$location->places}}</td>
                            <td>{{$location->deleted_at}}</td>

                          
                           
                            
                            <td>
                              
                                <form action="" method="POST">
                                    <a href="{{route('location.restore',$location->id)}}" class="btn btn-success"><i class="bi bi-arrow-clockwise"></i>Restore</a>
                                    @csrf
                                    @method('DELETE')
                          

                                </form>

                            </td>
                        </tr>
                            
                        @endforeach
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function () {
    $('#dataTable').DataTable({

        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});
</script>
@endsection