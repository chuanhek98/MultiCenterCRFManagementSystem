@extends('MasterLayout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Edit User on {{$user->name}}</b></div>

                    <div class="card-body">
                        <form action="{{route('admin.users.update',$user)}}" method="POST">
                            {{--Update Email--}}
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--Update Name--}}
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Roles</label>
                                <div class="col-md-6">
                                    @foreach($roles as $role)
                                            <div class="form-check">
                                                {{--checking whether the users has any roles if yes, make it checked--}}
                                                <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                                @if($user->hasRole($role->name))checked @endif>
                                                <label>{{$role->name}}</label>
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                            @csrf
                            {{method_field('PUT')}}
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
