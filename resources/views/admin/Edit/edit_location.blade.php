@extends('admin.layouts.MasterDashbord')

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12  pull-right">
          <div class="pull-rghit">
              <h2>Edit location</h2>
          </div>
        
      </div>
    </div>


<form action="{{ route('table_location.update',$locations->id) }}" method="POST" >
  @csrf
  @method('PUT')
  <div class="col-md-4 position-relative">
    <label for="validationTooltip01" class="form-label">Places</label>
    <input type="text" class="form-control" placeholder="" value="{{$locations->places}}" id="places" name="places" required>
   


  

    <div class="col-md-12 mt-2">
      <button class="btn btn-primary" type="submit">Edit</button>
      <a class="btn btn-primary" href="{{ route('table_location.index') }}"> Back</a>
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

</div>

@endsection