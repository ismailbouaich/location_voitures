@extends('layouts.app')

@section('content')
<div class="container ">
  
  <section class="py-5">

                   


    <div class="float-end">
      <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-dark float-left" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <i class="bi bi-search"></i>
            </button>

            <!-- Modal -->
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                          
            <form action="{{url('search')}}" method="get">
              <div class="input-group">
              
                  <input type="text" class="form-control" id="searchInput" placeholder="search" name="search" autocomplete="off" >
                
              
                <button type="submit" class="btn btn-outline-secondary">
                  <i class="bi bi-search"></i>
          
                </button>
              </div>
                        
          
          </form>
          </div>
       
        </div>
      </div>
    </div>
  




                  


                                <div class="mw-100  ">
                                  <div class="row"> 
                                  <div class="col-1 col-md-3">
                                      <div class="flex-shrink-0 " >
                                        <ul class="list-unstyled ps-0">
                                    
                                          <li class="mb-1">
                                            <button class="btn btn-toggle align-items-center rounded collapsed" data-toggle="collapse" data-target="#categorie-collapse" aria-expanded="false" aria-controls="collapse">
                                              <span class="fs-5 fw-semibold " >Catigories</span>
                                            </button>
                                            <div class="collapse" id="categorie-collapse">
                                              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                                @foreach ($categories as $item)
                                                <li class="list-group-item  ">
                                                  <a href="{{route('categorie.show',$item->id)}}" class="link-dark rounded fs-5" >
                                                
                                                    {{$item->categorie}}
                                                    
                                                    </a>

                                                </li>
                                                @endforeach

                                              </ul>
                                            </div>
                                          </li>
                                         
                                        </ul>
                                              </div>
                                              
                                          </div>
                                <div class="col-sm-6 col-md-8"> 
                                        <div class="row">
                    @foreach($searchvoiture as $voiture)
                    
                    
                    
                    <div class="col-md-3 mt-4"> 
                    <div class="card border-1">
                      <a href="{{route('home.show',$voiture->id)}}"style=" text-decoration:none; color:black;"> 
                    <img src="{{ asset('storage/'.$voiture->image)}}" class="card-img-top img-fluid-rounded"  height="200px">
                    <div class="card-body">
                    <h6 class="card-title"style=" text-decoration:none; color:black;">{{$voiture->mark}}</h6>
                    
                    <p class="card-text">{{$voiture->prix}} <span class="fs-6">DH/J</span> </p> 
                    </div>
                    </a>
                    </div>
                    </div>  
                    
                    
                    
                    @endforeach
                    </div>      
                    
                                  </div> 
                                  <div class="justify-content-center d-flex m-2">


                                
                                  </div>
                    </div>
  </section>
</div>

                
@endsection



















