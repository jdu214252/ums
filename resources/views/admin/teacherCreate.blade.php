@extends('admin.layout.layout')
@section('content')
            <div class="row">
                <div class="text-center row">
                    <h3 class="mb-3 fs-3 ">Talaba ma'lumotlarini kiriting </h3>
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
                    <form method="post" action="{{route('teacher.store')}}">
                        @csrf
                     
                        <div class="mb-3 text-center w-75 fs-5 text-uppercase">
                            <label for="name" class="form-labe">O'qituvchi Ismi Familiyasi</label>
                            <input type="text" name="name" placeholder="Teacher Name">
                        </div>
                        <label for="name" class="form-labe"><h5>O'qituvchi O'tadigan fanlar</h5></label>
                        <select name="subjects[]" class="form-control" multiple>
                            <option value="">Select...</option>
                            @foreach ($subject as $sub)
                                <option value="{{$sub->id}}">{{$sub->name}}</option>                                   
                           @endforeach
                        </select>

                        <div class="d-flex ">
                            <button type="submit" class="btn btn-primary">Jo'natish</button>
                        </div>

                    </form>
                </div>
            </div>
@endsection
