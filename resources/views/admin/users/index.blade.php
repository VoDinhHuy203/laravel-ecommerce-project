@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')
<div class="card">

  @if (session('message'))
    <h2 class="text-primary">{{ session('message') }}</h2>
  @endif
  
  <h1>User List</h1>

  <div>
    <a href="{{route('users.create')}}" class="btn btn-primary">Create</a>
  </div>
  <div> 
    <table class="table table-hover">
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Action</th>
      </tr>

      @foreach ($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td><img src="{{ $user->images->count() > 0 ? asset('upload/' . $user->images->first()->url) : 'upload/default.png' }}" width="50px" height="50px"  alt=""></td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>{{$user->address}}</td>
          <td>
            <a href="{{route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{route('users.destroy', $user->id) }}" id="form-delete{{ $user->id }}" method="post">
              @csrf
              @method('DELETE')
            </form>
            <button class="btn btn-delete btn-danger" type="submit" data-id="{{$user->id}}">Delete</button>
          </td>
        </tr>
      @endforeach

    </table>
    {{ $users->links() }}
  </div>
</div>
@endsection