@extends('admin.layout.layout')
@section('content')
            <div class="row">
                <div class="row text-center">
                    <h3 class="fs-3 mb-3 ">Talaba ma'lumotlarini kiriting </h3>
                </div>
                <div class="row">
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                    <li class="text text-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>


                <div class="col">
                    <form method="post" action="{{route('groups.store')}}">
                        @csrf
                        <div class="mb-3 w-75 text-center fs-5 text-uppercase">
                            <label for="lastname" class="form-label">Talaba Guruxi:</label>
                            <input type="text" name="name" placeholder="Enter Group"> 
                        </div>
                        <div class="d-flex ">
                            <button type="submit" class="btn btn-primary">Jo'natish</button>
                        </div>

                    </form>
                </div>
            </div>
@endsection
