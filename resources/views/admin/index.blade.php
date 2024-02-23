@extends('admin.layout.layout')
@section('content')
            <div class="row">
                <div class="row">
                    <div class="col-10">
                        <h3 class="mb-3 fs-3">Talabalar Ro'yxati </h3>
                    </div>
                    <div class="col-2">
                        <a href="{{route('students.create')}}" class="btn btn-success">Talaba qo'shish</a>
                    </div>
                </div>
                <div class="col">
                    <table class="table bg-white rounded shadow-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Talaba ID</th>
                            <th scope="col">Talaba Ismi</th>
                            <th scope="col">Talaba Familiyasi</th>
                            <th scope="col">Talaba Guruhi</th>
                            <th scope="col">Yaratgan User</th>
                            <th>Boshqarish</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                       @foreach($talabalar as $talaba)
                           <tr>
                               <th scope="row">{{++$i}}</th>
                               <td>{{$talaba->student_id}}</td>
                               <td>{{$talaba->name}}</td>
                               <td>{{$talaba->lastname}}</td>
                               <td>{{$talaba->group->name}}</td>
                               <td>{{$talaba->user->email}}</td>
                               <td>
                                @can('update-student', $talaba)
                                    <a href="{{route('students.edit', $talaba->id)}}" class="btn btn-warning">O'zgartirish</a>
                                @endcan
                                @can('delete-student', $talaba)
                                <form method="post" action="{{route('students.destroy', $talaba->id)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">O'chirish</button>
                                </form>
                                @endcan
                                 
                               </td>
                           </tr>
                       @endforeach

                        

                        </tbody>
                    </table>
                </div>
            </div>
@endsection
