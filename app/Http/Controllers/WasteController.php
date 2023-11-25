<?php

namespace App\Http\Controllers;

use App\Http\Requests\Waste\CreateRequest;
use App\Models\Camera;
use App\Models\File;
use App\Models\Waste;
use App\QueryBuilders\CameraQueryBuilder;
use App\QueryBuilders\WasteQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WasteController extends Controller
{
    /**
     * @return View
     */
    public function create(): View
    {
        return \view('waste.create');
    }

    /**
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function upload(CreateRequest $request): RedirectResponse
    {
        $validate = $request->validated();

        if ($validate) {
            // Отправка видео на другое апи
            $response = Http::attach(
                'video', file_get_contents($validate['file']), $validate['number_car']
            )->post(url(\App\Classes\Helpers::getHost() . ':8000/process-video'));

            // Проверка успешности запроса
            if ($response->successful()) {
                // Запись в БД
                $record = Waste::create([
                    'date' => $validate['date'],
                    'number_car' => $validate['number_car'],
                ]);

                session()->flash('status', 'Видео успешно отправлено на обработку');
                session()->forget('status');
                return redirect()->route('/waste');
            }
        }

        session()->flash('status', 'Не удалось отправить видео на обработку');
        session()->forget('status');
        return redirect()->route('/waste');
    }

    /**
     * @param Request $request
     * @return JsonResponse|null
     */
    public function update(Request $request): JsonResponse|null
    {
        // Получение данных из JSON
        $data = json_decode($request->getContent(), true);

        // Нахождение записи по дате и номеру машины
        $record = Waste::query()
            ->where('number_car', $data['number_car'])
            ->first();

        // Обновление записи
        $record?->update($data); //todo проверить массив дата

        if (!empty($data['is_visibility'])) {
            $lastRecord = Camera::query()
                ->first();
            if ($lastRecord) {
                $lastRecord?->update(['status' => (bool)$data['is_visibility']]);
            } else {
                Camera::create([
                    'status' => (bool)$data['is_visibility'],
                ]);
            }
        }

        if (!$data['is_exactly']) {
                $filename = $request->file('file')->store('files');

                $result = File::create([
                    'waste_id' => $record['id'],
                    'file_url' => $filename,
                ]);

            if (!$result) {
                return response()->json(['message' => 'ошибка загрузки файла']);
            }
        }

        return response()->json(['message' => 'ok']);
    }

    /**
     * @param WasteQueryBuilder  $wasteBuilder
     * @param CameraQueryBuilder $cameraBuilder
     * @return View
     */
    public function getCollection(WasteQueryBuilder $wasteBuilder, CameraQueryBuilder $cameraBuilder): View
    {
        return \view('waste.table', [
            'wasteList' => $wasteBuilder->getCollection(),
            'camera' => $cameraBuilder->getStatus(),
        ]);
    }
}
