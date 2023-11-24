@extends('main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mt-3 mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{url(\App\Classes\Helpers::getHost() . '/')}}" class="btn btn-sm btn-outline-secondary">Назад</a>
            </div>
        </div>
    </div>
    <div class="d-flex mt-5 flex-column">
        <div class="d-flex flex-column">
            <div class="nav  flex-column align-items-start justify-content-lg-start">
                <div class="border p-3 justify-content-lg-center shadow font-weight-light mx-3" style="font-size: large">
                    <img src="data:image/jpeg;base64,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" alt="Camera" width="150" height="130">
                    @if($camera !== null && (bool)$camera->status === true)
                        <p class="mt-1 text-center" style="color: #157347">Хорошая видимость</p>
                    @elseif($camera !== null && (bool)$camera->status === false)
                        <p class="mt-1 text-center" style="color: #710232">Плохая видимость</p>
                    @elseif($camera === null)
                        <p class="mt-1 text-center">Данных нет</p>
                    @endif
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-end flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <div class="btn-toolbar mt-3 mb-2 mb-md-0">
                <div class="btn-group mr-2 d-flex justify-content-end align-items-end">
                    <h4>Записи по всем грузовым машинам</h4>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Номер машины</th>
                    <th scope="col">Прогноз содержимого</th>
                    <th scope="col">Наличие тента</th>
                    <th scope="col">Дерево (в %)</th>
                    <th scope="col">Грунт (в %)</th>
                    <th scope="col">Бетон (в %)</th>
                    <th scope="col">Кирпич (в %)</th>
                    <th scope="col">Основной груз</th>
                    <th scope="col">Скриншот груза</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($wasteList as $waste)
                    <tr>
                        <td>{{ $waste->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($waste->date)->format('d.m.Y H:m:s') }}</td>
                        <td><p class="mt-1 text-center">{{ $waste->number_car }}</p></td>
                        <td> @if($waste->is_exactly)
                                <p class="mt-1 text-center" style="color: #157347">Точное</p>
                            @else
                                <p class="mt-1 text-center" style="color: #710232">Неточное</p>
                            @endif
                        </td>
                        <td>
                            @if($waste->is_awning)
                                <p class="mt-1 text-center" style="color: #710232">Есть тент</p>
                            @else
                                <p class="mt-1 text-center">-</p>
                            @endif
                        </td>
                        <td><p class="mt-1 text-center">{{ $waste->wood }}</p></td>
                        <td><p class="mt-1 text-center">{{ $waste->dirt }}</p></td>
                        <td><p class="mt-1 text-center">{{ $waste->concrete }}</p></td>
                        <td><p class="mt-1 text-center">{{ $waste->brick }}</p></td>
                        <td>
                            @switch($waste->statement)
                                @case('wood')
                                    <p class="mt-1 text-center">Дерево</p>
                                    @break
                                @case('dirt')
                                    <p class="mt-1 text-center">Грунт</p>
                                    @break
                                @case('concrete')
                                    <p class="mt-1 text-center">Бетон</p>
                                    @break
                                @case('brick')
                                    <p class="mt-1 text-center">Кирпич</p>
                                    @break
                            @endswitch
                        </td>
                        <td>{{ ($waste->getFile($waste->id))->url ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="align-content-center" colspan="11">Записей - нет</td>
                    </tr>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

<script>
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 7000) //скроем сообщение через 7 сек
</script>
