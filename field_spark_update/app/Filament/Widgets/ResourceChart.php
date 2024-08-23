<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Resource;

class ResourceChart extends ChartWidget
{
    protected static ?string $heading = 'Resource Overview';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Trend::model(Resource::class)
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
        return 'bar';
    }
}
