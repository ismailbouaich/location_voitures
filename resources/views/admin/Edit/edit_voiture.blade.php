@extends('admin.layouts.MasterDashbord')

@section('content')

<div class="container">
  <h1 class="h3 mb-2 text-gray-800">Edit Voiture</h1>


  <form class="row g-3 "action="{{ route('table_voiture.update',$voiture->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-4">
      <label for="validationTooltip01" class="form-label">Mark</label>
      <input type="text" class="form-control" id="mark" name="mark" value="{{$voiture->mark}}" required>
    
    </div>
  
    
    <div class="col-md-4 ">
      <label for="validationTooltip03" class="form-label">Image</label>
      <input type="file" class="form-control" id="image" name="image" value="{{asset('storage/'.$voiture->image)}}" required>    
    </div>

    <div class="col-md-4 ">
      <img src="{{asset('storage/'.$voiture->image)}}" class="img-circle" alt="" srcset="" width="80px" style="  height:80px;border-radius: 50%;">

    </div>
    <div class="col-md-4 ">
      <label for="" class="form-label">categorie</label>
      <input type="text" class="form-control" id="categorie_id" name="categorie_id" value="{{$voiture->categorie_id}}" required>

    </div>
    
    <div class="col-md-4 ">
      <label for="validationTooltip05" class="form-label">Prix</label>
      <input type="text" class="form-control" id="prix" name="prix" value="{{$voiture->prix}}" required>

    </div>

    
    <div class="col-md-6">
      <label for="discription" class="form-label">Discription</label>
      <div class="form-floating">
        
        <textarea class="form-control" placeholder="Leave a comment here" id="discription" name="discription" >{{$voiture->discription}}</textarea>
        <label for="floatingTextarea">{{$voiture->discription}}</label>
      </div>
    </div>
    <div class="col-md-12 ml-3">
     
         <div>
          <input class="form-check-input" type="radio" name="type" value="Essence" id="type"@checked(old('type', $voiture->type=='Essence'))>
          <label class="form-label">Essence</label>
         </div>
        
         <div>
          <input class="form-check-input" type="radio" name="type" value="Diesel" id="type" @checked(old('type', $voiture->type=='Diesel'))>
          <label class="form-label">Diesel</label>

         </div>

         <div>
          <input class="form-check-input" type="radio" name="type" value="électrique" id="type"@checked(old('type', $voiture->type =='électrique')) >
          <label class="form-label">électrique</label>

         </div>
       


          
         
       </div>
       
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Update</button>
      <a class="btn btn-primary" href="{{ route('table_voiture.index') }}"> Back</a>
    </div>
  </form>
</div>


@endsection