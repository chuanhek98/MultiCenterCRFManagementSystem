	@extends('MasterLayout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <p>The following forms have not been filled. Please add them first in order to proceed to edit:</p>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        @if (session('Messages'))
            <div class="alert alert-success">
                {{ session('Messages') }}
            </div>
        @endif
        @if (session('ErrorMessages'))
            <div class="alert alert-danger">
                {{ session('ErrorMessages') }}
            </div>
        @endif
    </div>
    {{--content starts here--}}
    <div class="row">
        <div class="col-md-5">
            <h1>Pre-Screening Database</h1>
            <a href="{{ route('preScreening.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Add a new Subject</a>
            {{--search bar--}}
        </div>
        <div class="col-md-7">
            <div class="row">
                <form class="form-inline" method="get" action="{{url('/preScreening/admin/search')}}">
                    <div class="col-md-7">
                        <input name="search_patient" class="form-control" type="search" placeholder="Patient">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success" type="submit"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg> Search </button>

                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-warning" type="submit" value="show">Show all</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">All the Patients</th>
            <th>Actions</th>
        </tr>
        </thead>
        @if(count($patients)>0)
        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>
                    <p>{{$patient->name}}</p><br>
                </td>
                <td>
                    <a href="{{ route('preScreening.edit',$patient->id) }}" class="btn btn-dark">Edit Profile</a>
                </td>
                <td>
                    <a href="{{route('preScreeningForms.create',$patient->id)}}" class="btn btn-primary">Add Pre-Screening Details</a>
                </td>
                <td>
                    <a href="{{route('preScreeningForms.edit',$patient->id)}}" class="btn btn-primary"> Edit Pre-Screening Details</a>
                </td>
                <td>
                    <form action="{{route('preScreening.destroy',$patient->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure to delete this subject?')" class="btn btn-danger"> Delete Subject</button>
                        {{-- <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('preScreening.destroy',$patient->id)}}"><i class="fa fa-trash"></i></a> --}}
                    </form>
                </td>
            </tr>
        </tbody>
            @endforeach
        @else
            <td>No Subject found!</td>
        @endif
    </table>

@endsection
