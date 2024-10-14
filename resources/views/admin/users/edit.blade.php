@extends('admin.layouts.app')
@section('title', 'Edit User '. $user->name)
@section('content')
  <div class="card">
    
    <h1>Update user</h1>
    <div>
      <form action="{{route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
          <div class="input-group-static col-5 mb-4">
            <label>Image</label>
            <input type="file" accept="image/*" name="image" id="image-input" class="form-control">
            
            
            @error('image')
              <span class="text-danger"> {{$message}}</span>
            @enderror
          </div>
          <div class="col-5">
            <img src="{{ $user->images->count() > 0 ? asset('upload/' . $user->images->first()->url) : asset('upload/default.png') }}" width="100px" height="100px" id="show-image" alt="">
          </div>
        </div>

        <div class="input-group input-group-static mb-4">
          <label>Name</label>
          <input type="text" value="{{ old('name') ?? $user->name}}" name="name" class="form-control">
          @error('name')
            <span class="text-danger"> {{$message}}</span>
          @enderror
        </div>

        <div class="input-group input-group-static mb-4">
          <label>Email</label>
          <input type="text" value="{{old('email') ?? $user->email}}" name="email" class="form-control">
          @error('email')
            <span class="text-danger"> {{$message}}</span>
          @enderror
        </div>

        <div class="input-group input-group-static mb-4">
          <label>Phone</label>
          <input type="text" value="{{old('phone') ?? $user->phone}}" name="phone" class="form-control">
          @error('phone')
            <span class="text-danger"> {{$message}}</span>
          @enderror
        </div>

        <div class="input-group input-group-static mb-4">
          <label for="exampleFormControlSelect1" class="ms-0">Gender</label>
          <select name="gender" class="form-control" value={{ $user->gender }}>
            <option value="male" selected >Male</option>
            <option value="female" >Female</option>
          </select>

          @error('gender')
            <span class="text-danger"> {{$message}}</span>
          @enderror
        </div>

        <div class="input-group input-group-static mb-4">
          <label>Address</label>
          <input type="text" value="{{old('address') ?? $user->address }}" name="address" class="form-control">
          @error('address')
            <span class="text-danger"> {{$message}}</span>
          @enderror
        </div>

        <div class="input-group input-group-static mb-4">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
          @error('password')
            <span class="text-danger"> {{$message}}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="">Roles</label>
          <div class="row">
            @foreach($roles as $groupName => $role) 
            <div class="col-5">
              <h4>{{$groupName}}</h4>
              <div>
                @foreach($role as $item)
                <div class="form-check">
                  <input class="form-check-input" name="role_ids[]" {{$user->roles->contains('id', $item->id) ? 'checked' : ''}} type="checkbox" value="{{$item->id}}" >
                  <label class="custom-control-label" for="customCheck1">{{$item->display_name}}</label>
                </div>
                @endforeach
              </div>
            </div>
          @endforeach
          </div>
        </div>
        
        <button type="submit" class="btn btn-submit btn-primary">Update</button>
      </form>
    </div>
  </div>
@endsection