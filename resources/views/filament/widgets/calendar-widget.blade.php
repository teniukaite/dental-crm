@php
    $plugin = \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::get();
@endphp

<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-end flex-1 mb-4">
            <x-filament-actions::actions :actions="$this->getCachedHeaderActions()" class="shrink-0" />
        </div>

        <div class="filament-fullcalendar" wire:ignore ax-load
             ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('filament-fullcalendar-alpine', 'saade/filament-fullcalendar') }}"
             ax-load-css="{{ \Filament\Support\Facades\FilamentAsset::getStyleHref('filament-fullcalendar-styles', 'saade/filament-fullcalendar') }}"
             x-ignore x-data="fullcalendar({
                locale: @js($plugin->getLocale()),
                plugins: @js($plugin->getPlugins()),
                schedulerLicenseKey: @js($plugin->getSchedulerLicenseKey()),
                timeZone: @js($plugin->getTimezone()),
                config: @js($plugin->getConfig()),
                editable: @json($plugin->isEditable()),
                selectable: @json($plugin->isSelectable()),
            })">
        </div>

        <div class="legend">
            <div class="legend-item">
                <div class="color-box event-color1"></div>
                <span>Event Type 1</span>
            </div>
            <div class="legend-item">
                <div class="color-box event-color2"></div>
                <span>Event Type 2</span>
            </div>
            <div class="legend-item">
                <div class="color-box event-color3"></div>
                <span>Event Type 3</span>
            </div>
            <!-- Add more legend items as needed -->
        </div>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }

            .legend {
                display: flex;
                flex-direction: column;
            }

            .legend-item {
                display: flex;
                align-items: center;
                margin-bottom: 8px;
            }

            .color-box {
                width: 20px;
                height: 20px;
                margin-right: 8px;
                border-radius: 4px;
            }

            /* Define your event colors here */
            .event-color1 { background-color: #3498db; }
            .event-color2 { background-color: #e74c3c; }
            .event-color3 { background-color: #2ecc71; }
        </style>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget>
