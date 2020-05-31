@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                        <form action="{{ url('/home/'.app()->getLocale().'/'.$user->id.'/account/update')}}" method="post">
                            @method('Patch')
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control"
                                       value="{{$user->name ?? old('name')}}"
                                       placeholder="Enter the first name">
                                {{$errors->first('name')}}
                            </div>
                            <input type="submit" class="btn btn-info" value="Save">
                            <input type="reset" class="btn btn-warning" value="Reset">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
