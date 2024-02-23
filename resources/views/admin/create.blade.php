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
                    <form method="post" action="{{route('students.store')}}">
                        @csrf
                        <div class="mb-3 text-center w-75 fs-5 text-uppercase">
                            <label for="student_id" class="form-label">TALABA ID:</label>
                            <input type="text" class="form-control" name="student_id" id="student_id" autocomplete="off" placeholder="Talaba ID sini kiriting ...">
                        </div>
                        <select name="tags[]" class="form-control" multiple>
                            <option value="">Select</option>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>                                   
                           @endforeach
                        </select>
                        <div class="mb-3 text-center w-75 fs-5 text-uppercase">
                            <label for="name" class="form-labe">Talaba Ismi</label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Talaba ismini kiriting ...">
                        </div>
                        <div class="mb-3 text-center w-75 fs-5 text-uppercase">
                            <label for="lastname" class="form-label">Talaba Familiyasi:</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" autocomplete="off" placeholder="Talaba familiyasini kiriting...">
                        </div>
                        <div class="mb-3 text-center w-75 fs-5 text-uppercase">
                            <label for="lastname" class="form-label">Talaba Guruxi:</label>
                            <select name="group" class="form-control" id="group">
                               @foreach ($guruhlar as $guruh)
                                    <option value="{{$guruh->id}}">{{$guruh->name}}</option>                                   
                               @endforeach
                            </select>
                        </div>
                        <div class="d-flex ">
                            <button type="submit" class="btn btn-primary">Jo'natish</button>
                        </div>

                    </form>
                </div>
            </div>
@endsection
