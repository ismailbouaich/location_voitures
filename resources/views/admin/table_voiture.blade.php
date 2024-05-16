@extends('admin.layouts.MasterDashbord')

@section('content') 
<div class="container-fluid">
    

    <!-- Page Heading -->
   
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="position-relative">
                <h1 class="h3 mb-2 text-gray-800">voiture list</h1>
   
             

                <button class="btn btn-info float-right" data-bs-toggle="modal" data-bs-target="#modal"><i class="bi bi-plus-circle"></i> new Voiture</button>

                

            </div>
           
        </div>
        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">voiture</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">

                    {{-- <form action="{{route('table_voiture.store')}}" method="POST" class="row g-3" enctype="multipart/form-data"> --}}
                        <span class="text-danger" id="validation-errors"></span>


                       @csrf

                        <div class="col-md-6">
                            <label for="name" class="col-form-label">Mark</label>
                            <input type="text" class="form-control" id="mark"name="mark"  >
                          
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="col-form-label">image</label>
                            <input type="file" class="form-control" id="image"name="image" >
                        </div>
                        <div class="col-md-6">
                            <label for="prix" class="form-label">prix</label>
                            <input type="text" class="form-control" id="prix" placeholder="prix" name="prix" >
                        </div>
                    
                        <div class="col-md-6">
                            <label for="disponibel" class="form-label">categorie</label>
                            <input type="text" class="form-control" id="categorie_id" placeholder="categorie_id" name="categorie_id">
                        </div>

                      
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Leave a comment here" name="discription" id="discription"
                            style="height: 100px">
                            <label for="floatingTextarea2">Discription</label>
                          </div>

                          <div class="col-md-6 ml-3">
                            <div>
                                <input class="form-check-input" type="radio" name="type" value="Essence" id="type">
                                <label class="form-label">Essence</label>
                               </div>
                              
                               <div>
                                <input class="form-check-input" type="radio" name="type" value="Diesel" id="type" >
                                <label class="form-label">Diesel</label>
                      
                               </div>
                      
                               <div>
                                <input class="form-check-input" type="radio" name="type" value="électrique" id="type" >
                                <label class="form-label">électrique</label>
                      
                               </div>
                           </div>
                          
                        
                        
                        <div class="col-12 ">
                            <button  type="submit" id="save" class="btn btn-primary float-right">Add</button>
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
                            <th>mark</th>
                            <th>image</th>
                            <th>prix</th>
                          
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
                       
                            
                            <td>
                             
                              
                                <form action="{{ Route('table_voiture.destroy',$voiture->id)}}" method="POST">
                                    {{-- <a href="{{Route('table_voiture.show',$voiture->id)}}" class="link-info"> <i class="bi bi-eye"></i> show</a> --}}
                              
                                    <a href="{{Route('table_voiture.edit',$voiture->id)}}" class="btn btn-success"><i class="bi bi-pencil"></i>Edit</a>
                                    @csrf
                                    @method('DELETE')
                                     <button class="btn btn-danger show_confirm"><i class="bi bi-trash3"></i>Delete</button>
                                    

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

                    var CSRF_TOKEN = $('input[name="_token"]').val();
                    var mark=$("#mark").val();
                     var image= $("#image")[0].files[0];
                    var discription=$("#discription").val();

                    var prix=$("#prix").val();
                    var categorie_id=$("#categorie_id").val();
                    var type=$("#type:checked").val();
                    var formdata = false;  

                    if (window.FormData) {  
                        formdata = new FormData();
                        console.log('formdata initialized ...');  
                    }
                    else{
                        console.log('formdata not supported');
                    }

                    formdata.append('mark',mark);
                    console.log(formdata);
                    formdata.append('image',image);
                    formdata.append('prix',prix);
                    formdata.append('categorie_id',categorie_id);
                    formdata.append('discription',discription);
                    formdata.append('type',type);
                    formdata.append('_token',CSRF_TOKEN);
                    console.log("formdata",formdata,CSRF_TOKEN);
                        $.ajaxSetup({
                            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                        });
                        jQuery.ajax({
                            url:"{{route('table_voiture.store')}}",
                            type:'POST',
                            processData: false,
                            contentType: false,
                            data: formdata,
                            success: function( data ){
                        
                             
                           
                             Swal.fire({
                                                icon: 'success',
                                                title: 'You have successfully pass a new command.',
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
                                    $('#validation-errors').append('<div class="text-danger">'+value+'</div');
                                }); 
                                },
                        });
                    });



});
        
</script>
@endsection