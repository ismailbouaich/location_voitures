@extends('admin.layouts.MasterDashbord')

@section('content')

<div class="container-fluid">
      <div class="row">
        <div class="col-lg-12  pull-right">
            <div class="pull-rghit">
                <h2>Edit Client</h2>
            </div>
          
        </div>
      </div>

  
  <form action="{{ route('table_client.update',$client->id) }}" method="POST" class="d-block ml-5">
    @csrf
    @method('PUT')
    <div class="col-md-4 ">
      <label for="validationTooltip01" class="form-label"> Full Nom</label>
      <input type="text" class="form-control" placeholder="" value="{{$client->full_nom}}" id="full_nom" name="full_nom" required>
     
    </div>
    <div class="col-md-4 ">
      <label for="validationTooltipUsername" class="form-label">cin</label>
      
        <input type="text" class="form-control" id="cin" name="cin" value="{{$client->cin}}" required>
       
     
    </div>
    <div class="col-md-4 ">
      <label for="validationTooltipUsername" class="form-label">adress</label>
     
        <input type="text" class="form-control" id="adress" name="adress" value="{{$client->adress}}" required>
       
    
    </div>
    
    
    <div class="col-md-4">
      <label for="Role" class="form-label">telephone</label>
      <input type="text" class="form-control" id="telephone" value="{{$client->telephone}}" name="telephone">
      
    </div>

    
  
      <div class="col-md-12 mt-2">
        <button class="btn btn-primary" type="submit">Edit</button>
        <a class="btn btn-primary" href="{{ route('table_client.index') }}"> Back</a>
      </div>
    
  </form>
</div>
@endsection