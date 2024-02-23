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
            <form method="post" action="{{route('students.update' , $talaba->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3 w-75 text-center fs-5 text-uppercase">
                    <label for="student_id" class="form-label">TALABA ID:</label>
                    <input type="text" class="form-control" name="student_id" id="student_id" value="{{$talaba->student_id}}" autocomplete="off" placeholder="Talaba ID sini kiriting ...">
                </div>
                <div class="mb-3 w-75 text-center fs-5 text-uppercase">
                    <label for="name" class="form-labe">Talaba Ismi</label>
                    <input type="text" class="form-control" value="{{$talaba->name}}" name="name" id="name" autocomplete="off" placeholder="Talaba ismini kiriting ...">
                </div>
                <div class="mb-3 w-75 text-center fs-5 text-uppercase">
                    <label for="lastname" class="form-label">Talaba Familiyasi:</label>
                    <input type="text" class="form-control" value="{{$talaba->lastname}}" name="lastname" id="lastname" autocomplete="off" placeholder="Talaba familiyasini kiriting...">
                </div>
                <select name="group" class="form-control" id="group">
                    @foreach($guruhlar as $g)
                        <option value="{{ $g->id }}" {{ $g->id == $talaba->group->id ? 'selected' : '' }}>{{ $g->name }}</option>
                    @endforeach
                </select>
                <div class="d-flex ">
                    <button type="submit" class="btn btn-primary">Jo'natish</button>
                </div>

            </form>
        </div>
    </div>
@endsection
