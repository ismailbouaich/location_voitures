@extends('admin.layouts.MasterDashbord')

@section('content')
<meta name="_token" content="{{csrf_token()}}">
<div class="container-fluid">

    <!-- Page Heading -->
   
   
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
           
            <h1 class="h3 mb-2 text-gray-800 d-inline">Users list</h1>

            <button class="btn btn-info float-right d-inline" data-bs-toggle="modal" data-bs-target="#modal"><i class="bi bi-plus-circle"></i> new User</button>
 
        </div>
        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">User</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                         <span class="text-danger" id="validation-errors"></span>


                       @csrf
                       
                       <div class="row g-3">



                        <div class="col-md-6">
                            <label for="name" class="col-form-label">name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"name="name"  >
                            <span class="text-danger" id="lasterror"></span>
                        </div>

                       


                        <div class="col-md-6">
                            <label for="Email" class="col-form-label">Email</label>
                            <input type="Email" class="form-control  @error('email') is-invalid @enderror" id="email"name="email" >
                        </div>
                        <div id="error_email"></div>
                        <div class="col-12">
                            <label for="Password" class="form-label">Password</label>
                            <input type="Password" class="form-control" id="password" placeholder="password" name="password" >
                        </div>
                        <div class="col-md-6 ml-3">
                            <input class="form-check-input" type="radio" name="role" value="admin" id="role">
                                <label class="form-label">Admin</label>
                        </div>
                     
                           <div class="col-md-12 ml-3">
                            <input class="form-check-input" type="radio" name="role" value="client" id="role">
                            <label class="form-label">Client</label>

                           </div>
                                
                            
                             
                       
                               
                     
                     
                        <div class="col-12 ">
                            <button  type="button" id="save" class="btn btn-primary float-right">Add</button>
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
                            <th>Nom</th>
                            <th>Email</th>
                            <th>created_at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                              
                                <form action="{{ Route('table_user.destroy',$user->id)}}" method="POST">
                                    <a href="{{Route('table_user.edit',$user->id)}}" class="btn btn-success"><i class="bi bi-pencil"></i>Edit</a>
                                    @csrf
                                    @method('DELETE')
                                     <button  class="btn btn-danger show_confirm"><i class="bi bi-trash3"></i>Delete</button>

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
        var name=$("#name").val();
        var email=$("#email").val();

        var password=$("#password").val();

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            jQuery.ajax({
                url:"{{route('table_user.store')}}",
                type: 'POST',
                data: { password:password,name:name,email:email,_token:CSRF_TOKEN
                },
                success: function( data ){
               
                    Swal.fire({
                                                icon: 'success',
                                                title: 'You have successfully pass a new user.',
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