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


<form action="{{ route('table_categorie.update',$categorie->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label"> Full Nom</label>
    <input type="text" class="form-control" placeholder="" value="{{$categorie->categorie}}" id="categorie" name="categorie" required>
   


  

    <div class="col-md-12 mt-2 position-relative">
      <button class="btn btn-primary" type="submit">Edit</button>
      <a class="btn btn-primary" href="{{ route('table_categorie.index') }}"> Back</a>
    </div>
  
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</div>

@endsection