@extends('admin.layouts.MasterDashbord')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">voiture archieve</h1>
   
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="position-relative">
                <h6 class="m-0 font-weight-bold text-primary">voiture</h6>

             

                

            </div>
           
        </div>
      
   
        <div class="card-body">
            <div class="table-responsive">
             
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>mark</th>
                            <th>image</th>
                            <th>prix</th>
                            <th>deleted_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($voitures as $voiture)
                        <tr>
                            <td>{{$voiture->id}}</td>
                            <td>{{$voiture->mark}}</td>
                            <td><img src="{{asset('storage/'.$voiture->image)}}" width="80px" alt="" srcset=""></td>
                            <td>{{$voiture->prix}}</td>
                            <td>{{$voiture->deleted_at}}</td>
                            
                            <td>
                              
                                <form action="{{ Route('table_voiture.destroy',$voiture->id)}}" method="POST">
                                    <a href="{{Route('voitures.restore',$voiture->id)}}" class="btn btn-success"><i class="bi bi-arrow-clockwise"></i>Restore</a>
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