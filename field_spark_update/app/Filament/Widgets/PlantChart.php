<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Plant;

class PlantChart extends ChartWidget
{
    protected static ?string $heading = 'Plants Overview';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(Plant::class)
        ->between(
            start: now()->startOfMonth(),
            end: now()->endOfMonth(),
        )
        ->perDay()
        ->count();
 
        return [
        'datasets' => [
            [
                'label' => 'Service Chart',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
