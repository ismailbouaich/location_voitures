@extends('layouts.app')

@section('content')
{{-- <meta name="_token" content="{{csrf_token()}}"> --}}


    <section class="py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="row gx-4 gx-lg-5 align-items-center">
                        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/'.$info->image)}}" height="500" /></div>
                        <div class="col-md-6">
                            <div class="small mb-1"></div>
                            <h1 class="display-5 fw-bolder">{{$info->mark}}</h1>
                            <div class="fs-5 mb-5">    
                                <span id="prix">Price:
                                    <span> 
                                    {{$info->prix}} DH/day
                                </span>
                            </span>
                            <p> type :@if ($info->type=="Essence")
                                <i class="bi bi-fuel-pump"></i>
                                  
                             @else @if($info->type=="Diesel")
                             <i class="bi bi-fuel-pump-diesel"></i>
                             @else
                             <i class="bi bi-lightning-charge-fill"></i>

                                
                              
                            
                              @endif
                              @endif
                                {{$info->type}}</p>
                            <p id="discription" class="lead">{{$info->discription}}</p>
                            
                            </div>
                           
                            <div id="main" style="display: none">
                                <div class="row g-3">
                                    <div class="text-danger" id="validation-errors"></div>
                             
                                   
                    
                                @csrf

                                <input type="hidden" value="{{$info->id}}" name="voiture_id" id="voiture_id">
                                <div class="col-md-6">
                                    <label for="name" class="col-form-label">name</label>
                                    <input type="text" class="form-control" id="full_nom" name="full_nom"  >
                                    <span class="text-danger" id="lasterror"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="cin" class="col-form-label">cin</label>
                                    <input type="text" class="form-control" id="cin" name="cin" >
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
                                <div class="col-12">
                                    <label for="telephone" class="form-label">telephone</label>
                                    <input type="text" class="form-control" id="telephone" placeholder="telephone" name="telephone" >
                                </div>
                                <div class="col-12">
                                    <label for="adress" class="form-label">adress</label>
                                    <input type="text" class="form-control" id="adress" placeholder="adress" name="adress" >
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-4">
                                        <button class="btn btn-toggle align-baseline rounded collapsed col-12" data-toggle="collapse" data-target="#option-collapse" aria-expanded="false" aria-controls="collapse">
                                            <span class="align-baseline" ><i class="bi bi-clipboard-plus"></i> Option 
                                                </span>
                                          </button>
                                      </div>
                                </div>
                                  <div class="collapse" id="option-collapse">
                                    <table class="table align-middle mb-0 bg-white">
                                        <thead >
                                          <tr>
                                            <th>option:80DH/j</th>
                                            
                                          </tr>
                                        </thead>
    
                                        <tbody>
                                          <tr>
                                            <td>
                                                <div class="form-number  ">
                                                    <input class="form-number-input border-1" type="number"  id="siege_auto" min="0" max="2" 
                                                    width="30px" value="0" >
                                                    <label class="form-number-label" for="flexSwitchCheckDefault"> siège auto<img src="../babyseat.png" alt=""width="30px"></label>
                                                  </div>
                                            </td>
                                            <td>
                                                40DH/j
                                            </td>
                                            </tr>
                                         <tr>
                                            <td>
                                                <div class="form-number ">
                                                   
                                                    <input class="form-number-input border-1" type="number"  id="gps" min="0" max="1" 
                                                    width="30px" value="0" name="gps">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"> gps <i class="bi bi-geo-alt"></i></label>
                                                  </div>
                                            </td>
                                            <td>
                                                40DH/j
                                            </td>
                                          
                                          </tr>
                                          
                                         
                                        </tbody>
                                      </table>
                                  </div>
                          
                                  


                                <div class="col-md-6">
                                    <label for="prixT" class="col-form-label">Prix Total</label>
                                    <input type="text" class="form-control" id="prixT" name="prixT" disabled >
                                  
                                </div>

                                

                                <input type="hidden" id="info" value="{{$info->prix}}">

                                <input type="hidden" id="prixT" name="prixT" >

                            
                     
                              
                  
                                   
            
                                     
                                </div>

                            </div>
                        
                         
                                
                           
                            <div class="d-inline">
                              
                                    <button class="btn btn-outline-dark flex-shrink-0 mt-2" id="reserver"  style="display: none">reserver</button>

                                    <button class="btn btn-outline-dark flex-shrink-0 mt-2" type="button" id="show" >continue</button>
                                   
                                    <button class="btn btn-outline-danger flex-shrink-0 mt-2" id="cancel" type="button" style="display: none" >cancel</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
     </section>

     <section class="p-5 m-5">
       
        
        <div class="container">
            <div class="mb-5">
                <h2>
                You can see also: 
                 <span style="float: right; ">
                     <a href="{{url('/home')}}" style="text-decoration: none;color:gray;font-size: 20px">More Cars<i class="bi bi-arrow-right" style="font-size: 20px;color:gray"></i></a>
                 </span>
             </h2>
             
             </div>
            <div class="owl-carousel owl-theme" >
                @foreach ($voitures as $item)
                    
              
                    <div  class="item" data-aos="fade-down" data-aos-duration="3200">
                        <div class="row justify-content-center">
                            <div class="col">
                            <div class="card border-0">
                                <img src="{{asset('storage/'.$item->image)}}"  height="200"  style="">
                            <div class="card-body">
    
                                <h5 class="card-title"> {{$item->mark}}</h5>
                                <p class="m-0">{{$item->prix}} Dh/day</p>
                               
                                <p>@if ($item->type=="Essence")
                                  <i class="bi bi-fuel-pump"></i>
                                    
                               @else @if($item->type=="Diesel")
                               <i class="bi bi-fuel-pump-diesel"></i>
                               @else
                               <i class="bi bi-lightning-charge-fill"></i>

                                  
                                
                              
                                @endif
                                @endif
                                  {{$item->type}}</p>
                                <a href="{{route('home.show',$item->id)}}" class="btn" role="button" style="background-color:#a4043b;color:white;">Rent</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
              
                @endforeach
                </div>
            </div>
        </div>
     </section>

    <script>
         


         $(document).ready(function(){
            
            $(function(){
                        var dtToday = new Date();
                        
                        var month = dtToday.getMonth() + 1;
                        var day = dtToday.getDate();
                        var year = dtToday.getFullYear();
                        if(month < 10)
                            month = '0' + month.toString();
                        if(day < 10)
                            day = '0' + day.toString(); 
                        var maxDate = year + '-' + month + '-' + day;    
                        $('#debut_dmd').attr('min', maxDate);
                        $('#fin_dmd').attr('min', maxDate);

                      
                    });

                    
                    var gps =$('#gps').val()*40;


            $('#fin_dmd').change(function(){

               

                    var start=new Date($('#debut_dmd').val());
                    var end=new Date($('#fin_dmd').val());
                    var prix=$('#info').val();
                
                    var diff = new Date(Date.parse(end)-Date.parse(start));
                    const diffTime = Math.abs(end - start);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    var prixc=diffDays*prix;
                    $('#prixT').val(prixc+" "+"DH");
                 
             

                    
                });


                $('#gps').change(function(){
                    var start=new Date($('#debut_dmd').val());
                    var end=new Date($('#fin_dmd').val());
                    var prix=$('#info').val();
                    var gps =$('#gps').val()*40;
                    var siege_auto=$('#siege_auto').val();
                    var diff = new Date(Date.parse(end)-Date.parse(start));
                    const diffTime = Math.abs(end - start);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    var prixc=diffDays*prix;

                    var test2=diffDays*gps; 
                      var test3=diffDays*siege_auto*40;
                  if(gps ="0"){
                    $('#prixT').val(prixc+test2+test3+" "+"DH");
                     } else {
                        $('#prixT').val(prixc+test3+" "+"DH");
                    

                            }


                  
                  




                });

                $('#siege_auto').change(function(){
                    var start=new Date($('#debut_dmd').val());
                    var end=new Date($('#fin_dmd').val());
                    var prix=$('#info').val();
                    var siege_auto=$('#siege_auto').val();
                    var gps =$('#gps').val()*40;
                
                    var diff = new Date(Date.parse(end)-Date.parse(start));
                    const diffTime = Math.abs(end - start);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    var prixc=diffDays*prix;

                    var test2=diffDays*gps;

                    var test3=diffDays*siege_auto*40;
                    if (siege_auto ="0") {
                        $('#prixT').val(prixc+test3+test2+" "+"DH");
                        
                    }else{

                        $('#prixT').val(prixc+test2+test3+" "+"DH");
                    }

              


                 
                    


                });

             


            $('#cancel').click(function(){
                  
                    $('#main').hide();
                    $('#debut_dmd').val('');
                    $('#fin_dmd').val('');
                    $('#prixT').val('');
                    if ($('#show').css("display", "none")) 
                    {
                        $('#show').show();
                        $('#reserver').hide();
                        $('#cancel').hide();
                        $('#discription').show();
                    }
                });

                $('#show').click(function(){
                    $('#main').show();
                    if ($('#main').css("display", "block")) {
                        $('#discription').hide();
                        $('#reserver').show();
                        $('#show').hide();
                        $('#cancel').show();
                        
                    }
                    
    
                      });

           
});
    </script>

    <script>
        $(document).ready(function(){
                       
            $('#reserver').click(function () {

             
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        var full_nom=$("#full_nom").val();
                        var cin=$("#cin").val();
                        var adress=$("#adress").val();
                        var telephone=$("#telephone").val();
                        var voiture_id=$("#voiture_id").val();
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
                                url:"{{route('home.store')}}",
                                type:'POST',
                                data: {
                                    cin:cin,
                                    full_nom:full_nom,
                                    adress:adress,
                                    telephone:telephone,
                                    prixT:prixT,
                                    pick_up:pick_up,
                                    drop_off:drop_off,
                                    siege_auto:siege_auto,
                                    gps:gps,
                                    debut_dmd:debut_dmd,
                                    fin_dmd:fin_dmd,
                                    voiture_id:voiture_id,
                                
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
                                                window.location='/home'
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