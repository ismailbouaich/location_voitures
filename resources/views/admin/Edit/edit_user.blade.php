@extends('admin.layouts.MasterDashbord')

@section('content')


<div class="container">
  <div class="row">
    <div class="col-lg-12  pull-right">
        <div class="pull-rghit">
            <h2>Edit User</h2>
        </div>
      
    </div>
</div>

  
  <form action="{{ route('table_user.update',$user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-4 position-relative">
      <label for="validationTooltip01" class="form-label"> Name</label>
      <input type="text" class="form-control" placeholder="" value="{{$user->name}}" id="name" name="name" required>
     
    </div>
    <div class="col-md-4 position-relative">
      <label for="validationTooltipUsername" class="form-label">Email</label>
      <div class="input-group">
        <span class="input-group-text" id="EmailPrepend">@</span>
        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
       
      </div>
    </div>
    
    


    <div class="col-md-4 position-relative">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}" required>
    </div>
    <div class="col-md-4 ml-2">
      <label for="Role" class="form-label">Role</label>
      
      <div>
        <input class="form-check-input" type="radio" name="role" value="admin" id="type"@checked(old('role', $user->role=='admin'))>
        <label class="form-label">Admin</label>
       </div>
       <div>
        <input class="form-check-input" type="radio" name="role" value="client" id="type"@checked(old('role', $user->role=='client'))>
        <label class="form-label">Client</label>
       </div>
    
      
    </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Update</button>
      <a class="btn btn-primary" href="{{ route('table_user.index') }}"> Back</a>
    </div>
  </form>
</div>


@endsection