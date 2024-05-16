@extends('admin.layouts.MasterDashbord')

@section('content')

<div class="container">
  <div class="row">
   
    
    <div class="col-lg-6  pull-right">
        <div class="pull-rghit">
            <h2>Edit Demand</h2>
        </div>
      
  

    
 



    <form action="{{ route('table_demand.update',$demand->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
      @csrf
      @method('PUT')
      <div class="col-md-6">
        <label for="validationTooltip01" class="form-label"> Client Id</label>
        <input type="text" class="form-control" value="{{$demand->client_id}}" id="client_id" name="client_id" required>
       
      </div>
      <div class="col-md-6">
        <label for="validationTooltipUsername" class="form-label">Voiture Id</label>
        <div class="input-group">
          
          <input type="text" class="form-control" id="email" name="voiture_id" value="{{$demand->voiture_id}}" required>
         
        </div>
      </div>
      <div class="col-md-6">
        <label for="adress" class="form-label">debut_dmd</label>
        <input type="date" class="form-control" id="debut_dmd"  value="{{$demand->debut_dmd}}" name="debut_dmd" required >
    </div>
      
    <div class="col-md-6">
        <label for="Role" class="form-label">Fin Demand</label>
        <input type="date" class="form-control" id="fin_dmd" value="{{$demand->fin_dmd}}" name="fin_dmd">
        
      </div>
      <div class="col-md-6">
        <label for="Role" class="form-label">Pick Up</label>
        <select class="form-select" id="drop_off" name="drop_off">
          <option value="{{$demand->drop_off}}">{{$demand->drop_off}}</option>
          @foreach ($location as $item)
          <option  id="drop_off" name="drop_off"  value="{{$item->id}}">{{$item->id}}</option>
  
          @endforeach
      </select>
  
      </div>
      <div class="col-md-6">
        <label for="Role" class="form-label">Drop Off</label>
        <select class="form-select" id="pick_up" name="pick_up">
          <option value="{{$demand->pick_up}}">{{$demand->pick_up}}</option>
          @foreach ($location as $item)
          <option  id="pick_up" name="pick_up"  value="{{$item->id}}">{{$item->id}}</option>
  
          @endforeach
      </select>
  
      </div>
        <div class="col-md-2 ml-3">
     
          <input class="form-check-input" type="radio" name="progress" value="Complete" id="progress" @checked(old('progress', $demand->progress=='Complete'))>
              <label class="form-label">Complete</label>
              <input class="form-check-input" type="radio" name="progress" value="not_Complet" id="progress"  @checked(old('progress', $demand->progress=='not_Complet'))>
              <label class="form-label">notComplet</label>
        </div>
        <div >
          <div class="form-number  ">
              <input class="form-number-input border-1" type="number"  id="siege_auto" min="0" max="2" 
              width="30px" value="{{$demand->siege_auto}}" >
              <label class="form-number-label" for="flexSwitchCheckDefault"> siège auto<img src="../babyseat.png" alt=""width="30px"></label>
            </div>
     
   
          <div class="form-number ">
              <input class="form-number-input border-1" type="number"  name="gps"  id="gps" min="0" max="1" 
              width="30px" value="{{$demand->gps}}" >
            
              <label class="form-check-label" for="flexSwitchCheckChecked"> <i class="bi bi-geo-alt"></i> gps</label>
            </div>

     </div>

              <div>
              
                  <label for="prixT" class="col-form-label">Prix Total</label>
                  <input type="text" class="form-control" id="prixT" name="prixT" value="{{$demand->prixT}}" >
              </div>
                
             
              
       
        
      
     
  
     
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Update</button>
        <a class="btn btn-primary" href="{{ route('table_demand.index') }}"> Back</a>
      </div>
    </form>
  </div>
  <div class="col-lg-6">
    <button class="btn btn-toggle align-baseline rounded collapsed col-12" data-toggle="collapse" data-target="#option-collapse" aria-expanded="false" aria-controls="collapse">
      <span class="align-baseline" ><i class="bi bi-geo-alt"></i> Location 
          </span>
    </button>
    <div class="collapse" id="option-collapse">
      <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>places</th>
          </tr>
        </thead>
        <tbody>
          @foreach($location as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->places}}</td>
          </tr>
          @endforeach
        </tbody>

      </table>
    </div>
  </div>
  </div>
</div>
@endsection