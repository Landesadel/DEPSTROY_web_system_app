@extends('main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Загрузить данные</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{url(\App\Classes\Helpers::getHost() . '/')}}" class="btn btn-sm btn-outline-secondary">Назад</a>
                <button class="btn btn-sm btn-outline-secondary">#</button>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <form class="w-50 border shadow p-4" method="post" action="{{url(\App\Classes\Helpers::getHost() . '/upload/waste')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-2">
                <label for="date">Дата</label>
                <input type="text" id="date" name="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror">
            </div>
            <div class="form-group mt-2">
                <label for="car_number">Номер машины</label>
                <input type="text" id="car_number" name="car_number" value="{{ old('car_number') }}" class="form-control @error('car_number') is-invalid @enderror">
            </div>
            <div class="form-group mt-2">  {{-- todo доделать--}}
                <label for="file">Видео файл*</label>
                <input type="file" id="file" name="file" value="{{ old('file') }}" class="form-control @error('file') is-invalid @enderror">
            </div>
            <button type="submit" class="btn btn-sm mt-3 btn-outline-secondary">Загрузить+</button>
        </form>
    </div>
@endsection

