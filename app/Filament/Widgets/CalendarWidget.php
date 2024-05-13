<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Visitation;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    public string|null|Model $model = Visitation::class;

    protected static string $view = 'filament.widgets.calendar-widget';

    public function fetchEvents(array $info): array
    {
        return $this->model::query()
            ->whereBetween('date', [$info['start'], $info['end']])
            ->get()
            ->map(function (Visitation $visitation) {
                return [
                    'id' => $visitation->id,
                    'title' => $visitation->patient->full_name,
                    'start' => $visitation->date->toDateTimeString(),
                    'end' => $visitation->date->addMinutes(30)->toDateTimeString(),
                    'url' => route('filament.admin.resources.visitations.edit', $visitation),
                    'color' => 'blue',
                ];
            })
            ->toArray();
    }
}
