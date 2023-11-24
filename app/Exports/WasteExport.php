<?php

namespace App\Exports;

use App\Models\Waste;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WasteExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $wasteData = Waste::all([
            'id',
            'date',
            'number_car',
            'is_exactly',
            'is_awning',
            'wood',
            'dirt',
            'concrete',
            'brick',
            'statement',
        ]);

        foreach ($wasteData as $data) {
            if ($data->is_exactly) {
                $data->is_exactly = 'Точное';
            } else {
                $data->is_exactly = 'Неточное';
            }

            if ($data->is_awning) {
                $data->is_awning = 'Есть тент';
            } else {
                $data->is_awning = '-';
            }

            if ($data->statement === 'wood') {
                $data->statement = 'Дерево';
            } elseif ($data->statement === 'dirt') {
                $data->statement = 'Грунт';
            } elseif ($data->statement === 'concrete') {
                $data->statement = 'Бетон';
            } elseif ($data->statement === 'brick') {
                $data->statement = 'Кирпич';
            }
        }

        return $wasteData;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Дата',
            'Номер машины',
            'Прогноз содержимого',
            'Наличие тента',
            'Дерево (в %)',
            'Грунт (в %)',
            'Бетон (в %)',
            'Кирпич (в %)',
            'Основной груз',
        ];
    }
}
