@extends('admin.layouts.MasterDashbord')

@section('content')
<meta name="_token" content="{{csrf_token()}}">

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Clients list</h1>
   
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="position-relative">
         

                <button class="btn btn-info float-right" data-bs-toggle="modal" data-bs-target="#modal"><i class="bi bi-plus-circle"></i> new Client</button>       

            </div>
           
        </div>
        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Client</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <span class="text-danger" id="validation-errors"></span>


                       @csrf
                        <div class="col-md-6">
                            <label for="name" class="col-form-label">name</label>
                            <input type="text" class="form-control" id="full_nom" name="full_nom"  >
                            <span class="text-danger" id="lasterror"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="cin" class="col-form-label">cin</label>
                            <input type="text" class="form-control" id="cin" name="cin" >
                        </div>
                        <div class="col-12">
                            <label for="telephone" class="form-label">telephone</label>
                            <input type="text" class="form-control" id="telephone" placeholder="telephone" name="telephone" >
                        </div>
                        <div class="col-12">
                            <label for="adress" class="form-label">adress</label>
                            <input type="text" class="form-control" id="adress" placeholder="adress" name="adress" >
                        </div>
      
                        <div class="col-12 ">
                            <button  type="submit" class="btn btn-primary float-right" id="save">Add</button>
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
                            <th>full_nom</th>
                            <th>cin</th>
                          
                            <th>adress</th>
                            <th>telephone</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->full_nom}}</td>
                            <td>{{$client->cin}}</td>
                            <td>{{$client->adress}}</td>
                            <td>{{$client->telephone}}</td>
                          
                            
                            <td>
                              
                                <form action="{{ Route('table_client.destroy',$client->id)}}" method="POST">
                                    <a href="{{ Route('table_client.edit',$client->id)}}" class="btn btn-success"><i class="bi bi-pencil"></i>Edit</a>
                                    @csrf
                                    @method('DELETE')
                                     <button  class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="bi bi-trash3"></i>
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
              text: "If you delete this, it will be in archieve.",
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
        var full_nom=$("#full_nom").val();
        var cin=$("#cin").val();

        var adress=$("#adress").val();
        var telephone=$("#telephone").val();

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            jQuery.ajax({
                url:"{{route('table_client.store')}}",
                type:'POST',
                data: {cin:cin,full_nom:full_nom,adress:adress,telephone:telephone,_token:CSRF_TOKEN
                },
                success: function( data ){
            
                    $('form').submit();
                 //  window.location.reload();

                

                },
                error: function (xhr) {
                    console.log("Error",xhr);
                    $('#validation-errors').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#validation-errors').append('<div class="text-danger">'+value+'</div');
                    }); 
                    },
            });
        });
});
</script>
@endsection