@extends('admin.layouts.MasterDashbord')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
   
   
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="position-relative">
                <h1 class="h3 mb-2 text-gray-800">Demand list</h1>
           

                <button class="btn btn-info float-right" data-bs-toggle="modal" data-bs-target="#modal"><i class="bi bi-plus-circle"></i> new Demand</button>       

            </div>
           
        </div>
        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Demand</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">
                        <div class="text-danger" id="validation-errors"></div>
                        


                       @csrf
                        <div class="col-md-6">
                            <label for="name" class="col-form-label">client_id</label>
                            <input type="text" class="form-control" id="client_id"name="client_id" required autofocus >
                        
                        </div>
                        <div class="col-md-6">
                            <label for="cin" class="col-form-label">Car_id</label>
                            <input type="text" class="form-control" id="voiture_id" name="voiture_id" required autofocus>
                        </div>
                        <div class="col-md-6">
                            <label for="debut_dmd" class="col-form-label">Debut Date</label>
                            <input type="date" class="form-control" id="debut_dmd" name="debut_dmd"  >
                            <span class="text-danger" id="lasterror"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="fin_dmd" class="col-form-label">Fin Date</label>
                            <input type="date" class="form-control" id="fin_dmd" name="fin_dmd" >
                        </div>
                        <div class="col-md-6">
                            <label for="pick_up" class="col-form-label">Pick up</label>

                            <select class="form-select" id="pick_up" name="pick_up">
                                @foreach ($location as $item)
                                <option id="pick_up" name="pick_up" value="{{$item->id}}">{{$item->places}}</option>
                                @endforeach
                            </select>
                          
                        </div>
                        <div class="col-md-6">
                            <label for="drop_off" class="col-form-label">Drop off</label>
                            <select class="form-select" id="drop_off" name="drop_off">
                                @foreach ($location as $item)
                                <option  id="drop_off" name="drop_off"  value="{{$item->id}}">{{$item->places}}</option>

                                @endforeach
                            </select>
                          
                        </div>
                        <div class="col-md-6">
                            <div class="form-number  ">
                                <input class="form-number-input border-1" type="number"  id="siege_auto" min="0" max="2" 
                                width="30px" value="0" >
                                <label class="form-number-label" for="flexSwitchCheckDefault"> siège auto<img src="../babyseat.png" alt=""width="30px"></label>
                              </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-number ">
                                <input class="form-number-input border-1" type="number"  name="gps"  id="gps" min="0" max="1" 
                                width="30px" value="0" >
                              
                                <label class="form-check-label" for="flexSwitchCheckChecked"> <i class="bi bi-geo-alt"></i> gps</label>
                              </div>

                        </div>
                        <div class="col-md-6">
                            <label for="prixT" class="col-form-label">Prix Total</label>
                            <input type="text" class="form-control" id="prixT" name="prixT"  >
                          
                        </div>
                        

                      
                        <div class="col-12 ">
                            <button  type="submit" id="add" class="btn btn-primary float-right">Add</button>
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
                            <th>client_id</th>
                            <th>Car_id</th>
                            <th>debut_dmd</th>
                            <th>fin_dmd</th>
                            <th>progress</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($demand as $demands)
                        <tr>
                            <td>{{$demands->id}}</td>
                            <td>{{$demands->client_id}}</td>
                            <td>{{$demands->voiture_id}}</td>
                            <td>{{$demands->debut_dmd}}</td>
                         
                            <td>{{$demands->fin_dmd}}</td>
                            <td  class="align-items-center">
                                @if($demands->progress=='not_Complet')
                                <i class="bi bi-x-circle fs-4"style="color:red;"></i>
                          
                                @else
                                <i class="bi bi-check-circle fs-4" style="color:rgb(14, 163, 14);"></i>
                                @endif
                            
                            
                            </td>
                           
                            <td>
                              
                                <form action="{{ Route('table_demand.destroy',$demands->id)}}" method="POST">
                                    <a href="{{Route('table_demand.edit',$demands->id)}}" class="btn btn-success"><i class="bi bi-pencil"></i>Edit</a>
                                    @csrf
                                    @method('DELETE')
                                     <button class="btn btn-danger show_confirm"><i class="bi bi-trash3"></i>
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
});
</script>
<script>
      $(document).ready(function(){
                       
                       $('#add').click(function () {
           
                        
                                   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            
                                
                                   var voiture_id=$("#voiture_id").val();
                                   var client_id=$("#client_id").val();
                                   var pick_up=$("#pick_up").val();
                                   var drop_off=$("#drop_off").val();
                                   var prixT=$("#prixT").val();
                                   var debut_dmd=$("#debut_dmd").val();
                                   var fin_dmd=$("#fin_dmd").val();
                                   var siege_auto=$("#siege_auto").val();
                                   var gps=$("#gps").val();
                                  
           
                                       $.ajaxSetup({
                                           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                                       });
                                       jQuery.ajax({
                                           url:"{{route('table_demand.store')}}",
                                           type:'POST',
                                           data: {

                                                voiture_id:voiture_id,
                                                client_id:client_id,
                                                pick_up:pick_up,
                                                drop_off:drop_off,
                                                debut_dmd:debut_dmd,
                                                fin_dmd:fin_dmd,
                                                siege_auto:siege_auto,
                                                gps:gps,
                                                prixT:prixT,
                                               _token:CSRF_TOKEN
                                           },
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