@extends('admin.layout.layout')
@section('content')
            <div class="row">
                <div class="row">
                    <div class="col-10">
                        <h3 class="fs-3 mb-3">Guruhlar Ro'yxati </h3>
                    </div>
                    <div class="col-2">
                        <a href="{{route('groups.create')}}" class="btn btn-success">Guruh qo'shish</a>
                    </div>
                </div>
                <div class="col">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Guruh Nomi</th>
                            <th>Boshqarish</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                       @foreach($guruhlar as $guruh)
                           <tr>
                               <th scope="row">{{++$i}}</th>
                               <td>{{$guruh->name}}</td>
                               <td>
                                   <a href="{{route('groups.edit', $guruh->id)}}" class="btn btn-warning">O'zgartirish</a>
                                   <form method="post" action="{{route('groups.destroy' , $guruh->id)}}">
                                       @method('delete')
                                       @csrf
                                       <button type="submit" class="btn btn-danger">O'chirish</button>
                                   </form>
                               </td>
                           </tr>
                       @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
@endsection