@extends('admin.layouts.MasterDashbord')

@section('content')
{{-- <meta name="_token" content="{{csrf_token()}}"> --}}

            <div class="container-fluid">



             
   
    
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="position-relative">
                            <h1 class="h3 mb-2 text-gray-800">categorie list</h1>
            
                            <button class="btn btn-info float-right" data-bs-toggle="modal" data-bs-target="#modal"><i class="bi bi-plus-circle"></i> new categorie</button>       
            
                        </div>
                       
                    </div>
                    <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">categorie</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
            
                                <div class="row g-3">
                                    
            
            
                                   @csrf
                                    <div class="col-md-6">
                                        <label for="name" class="col-form-label">categorie</label>
                                        <input type="text" class="form-control" id="categorie"name="categorie" required autofocus >
                                        <span class="text-danger" id="lasterror"></span>
                                    </div>    
                                    <div class="col-12 ">
                                        <button id="save"  type="submit" class="btn btn-primary float-right">Add</button>
                                    </div>
            
                                     
                                </div>
                               
                           
                              
                            
                          </div>
                        </div>
                       
                      </div>
                </div>
               
                    <div class="card-body">
                        <div class="table-responsive">
                         
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>categorie</th>
                                       
                                        <th>created_at</th>
                                       
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                    @foreach ($categorie as $categories)
                                    <tr>
                                        <td>{{$categories->id}}</td>
                                        <td>{{$categories->categorie}}</td>
                                        <td>{{$categories->created_at}}</td>
                                       
                                       
                                        <td>
                                          
                                            <form action="{{ Route('table_categorie.destroy',$categories->id)}}" method="POST">
                                                <a href="{{Route('table_categorie.edit',$categories->id)}}" class="btn btn-success"><i class="bi bi-pencil"></i>Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                 <button  class="btn btn-danger show_confirm"><i class="bi bi-trash3"></i>
                                                    Delete</button>
            
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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be in archieve",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
$('#dataTable').DataTable({

    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
});


$("#save").on("click",function(e){

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var categorie=$("#categorie").val();


    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    jQuery.ajax({
        url:"{{route('table_categorie.store')}}",
        type: 'POST',
        data: {categorie:categorie,_token:CSRF_TOKEN
        },
        success: function( data ){
       
            Swal.fire({
                                        icon: 'success',
                                        title: 'You have successfully pass a new categorie.',
                                        showDenyButton: false,
                                        showCancelButton: false,
                                        confirmButtonText: 'Greate'
                                    }).then((result) => {
                                        window.location.reload();
                                    });

          

        },
        error: function (xhr) {
            console.log("Error",xhr);
            $('#validation-errors').html('');
            $.each(xhr.responseJSON.errors, function(key,value) {
                $('#validation-errors').append('<div class="text-danger">'+value[0]+'</div');
            }); 
            },
    });
});





});
</script>
@endsection