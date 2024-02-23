@extends('admin.layout.layout')
@section('content')
            <div class="row">
                <div class="text-center row">
                    <h3 class="mb-3 fs-3 ">O'qituvchi ma'lumotlarini o'zgartirish </h3>
                </div>
                <div class="row">
                </div>


                <div class="col">
                    <form method="post" action="{{route('teacher.update', $teacher->id)}}">
                        @csrf
                        @method('PUT')
                     
                        <div class="mb-3 text-center w-75 fs-5 text-uppercase">
                            <label for="name" class="form-labe">O'qituvchi Ismi</label>
                            <input type="text" name="name" placeholder="Teacher Name" value="{{$teacher->name}}">
                        </div>
                        
                    
                        <div class="d-flex ">
                            <button type="submit" class="btn btn-primary">Jo'natish</button>
                        </div>

                    </form>
                </div>
            </div>
@endsection







