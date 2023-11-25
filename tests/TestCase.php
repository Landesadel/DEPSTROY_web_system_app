<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function testUpload()
    {
        // Подготовка данных для отправки
        $data = [
            'date' => '2021-12-01 12:00:23',
            'number_car' => '123ABC',
            'video' => UploadedFile::fake()->create('video.mp4'),
        ];

        // Мокаем внешний запрос
        Http::fake([
            url(\App\Classes\Helpers::getHost() . ':8000/process-video') => Http::response(['foo' => 'bar'], 200),
        ]);

        // Отправка запроса
        $response = $this->postJson('/api/upload', $data);

        // Проверка ответа
        $response->assertStatus(302);
        $response->assertSessionHas('status', 'Видео успешно отправлено на обработку');
    }

    public function testUpdate()
    {
        // Подготовка данных для отправки
        $data = [
            'number_car' => '123ABC',
            'is_visibility' => true,
            'is_exactly' => false,
        ];

        // Создание фейкового файла
        $file = UploadedFile::fake()->create('document.pdf', 200);

        // Отправка запроса
        $response = $this->json('POST', '/api/web', array_merge($data, ['file' => $file]));

        // Проверка ответа
        $response->assertStatus(200);
        $response->assertJson(['message' => 'ok']);

        // Проверка, что файл был загружен
        Storage::disk('public')->assertExists('files/document.pdf');

        // Проверка, что запись была создана в базе данных
        $this->assertDatabaseHas('waste', [
            'number_car' => '123ABC',
            'is_visibility' => true,
            'is_exactly' => false,
        ]);
    }
}
