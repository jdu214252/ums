@extends('admin.layout.layout')
@section('content')

<div class="row">
    <div class="row">
        <div class="col-10">
            <h3 class="mb-3 fs-3">O'qituvchilar Ro'yxati </h3>
        </div>
        <div class="col-2">
            <a href="{{route('teacher.create')}}" class="btn btn-success">O'qituvchi qo'shish</a>
        </div>
    </div>
    <div class="col">
        <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
            <tr>
                <th scope="col">O'qituvchi ID</th>
                <th scope="col">O'qituvchi Ismi Familiyasi</th>
                <th scope="col">Fani</th>
                <th>Boshqarish</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 0;
            @endphp
           @foreach($teacher as $teach)
               <tr>
                   <th scope="row">{{++$i}}</th>
                   <td>{{$teach->name}}</td>
                   <td>
                    @foreach ($teach->subjects as $subject)
                       <p>{{$subject->name}}</p> 
                    @endforeach
                </td>

                   <td>
                    {{-- @can('update-student', $teach) --}}
                        <a href="{{route('teacher.edit', $teach->id)}}" class="btn btn-warning">O'zgartirish</a>
                    {{-- @endcan --}}
                    {{-- @can('delete-student', $teach) --}}
                    <form method="post" action="{{route('teacher.destroy', $teach->id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">O'chirish</button>
                    </form>
                    {{-- @endcan --}}
                     
                   </td>
               </tr>
           @endforeach

            

            </tbody>
        </table>
    </div>
</div>


@endsection