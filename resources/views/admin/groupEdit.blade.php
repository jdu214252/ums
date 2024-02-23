@extends('admin.layout.layout')
@section('content')
    <div class="row">
        <div class="row text-center">
            <h3 class="fs-3 mb-3">Guruh ma'lumotlarini tahrirlash</h3>
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
            <form method="post" action="{{ route('groups.update', $guruh->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3 w-75 text-center fs-5 text-uppercase">
                    <label for="name" class="form-label">Guruh Nomi:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $guruh->name }}" autocomplete="off" placeholder="Guruh nomini kiriting ...">
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary">Jo'natish</button>
                </div>
            </form>
        </div>
    </div>
@endsection
