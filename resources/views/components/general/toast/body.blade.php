@props(['position' => 'bottom-right'])

@php
    $positions = [
        'top-left' => 'top-4 left-4',
        'top-right' => 'top-4 right-4',
        'bottom-left' => 'bottom-4 left-4',
        'bottom-right' => 'bottom-4 right-4',
        'top-center' => 'top-4 left-1/2 -translate-x-1/2',
        'bottom-center' => 'bottom-4 left-1/2 -translate-x-1/2',
    ];
    $positionClass = $positions[$position] ?? $positions['bottom-right'];
@endphp

<div
    x-data="{ show: false, title: '', text: '', icon: '' }"
    x-show="show"
    x-transition
    @toast.window="
    let detail = Array.isArray($event.detail) ? $event.detail[0] : $event.detail;
    title = detail.title;
    text = detail.text;
    icon = detail.icon ?? '';
    show = true;
    setTimeout(() => show = false, 3000);
"
    class="fixed {{ $positionClass }} bg-white px-12 py-6 rounded shadow-xl z-50 border border-gray-200 flex items-center gap-4"
    style="display: none;"
>
    <template x-if="icon === 'success'">
        <span>
            <x-icons.success />
        </span>
    </template>
    <div>
        <span class="font-bold text-black" x-text="title"></span>
        <span class="block text-sm text-gray-400" x-text="text"></span>
    </div>
</div>
