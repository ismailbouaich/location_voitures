@extends('admin.layouts.MasterDashbord')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">user archieve</h1>
   
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="position-relative">
                <h6 class="m-0 font-weight-bold text-primary">users</h6>

             

                

            </div>
           
        </div>
      
   
        <div class="card-body">
            <div class="table-responsive">
             
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>role</th>
                            <th>deleted_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($user as $users)
                        <tr>
                            <td>{{$users->id}}</td>
                            <td>{{$users->name}}</td>
                            <td>{{$users->email}}</td>
                            <td>{{$users->role}}</td>
                            <td>{{$users->deleted_at}}</td>
                            
                            <td>
                              
                                <form action="{{ Route('table_voiture.destroy',$users->id)}}" method="POST">
                            
                                    @csrf 
                                      @method('DELETE')
                                    <a href="{{route('users.restore',$users->id)}}" class="btn btn-success"><i class="bi bi-arrow-clockwise"></i>Restore</a>
                                 
                                   

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