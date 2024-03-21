@php
    $adTypes = [['title' => __('Horses')], ['title' => __('Ponies')], ['title' => __('Friesian')], ['title' => __('Transport')], ['title' => __('Equestrian real estate')], ['title' => __('Stabling and Grazing')]];
@endphp


<div class="p-6 bg-white rounded-xl">
    <div class="max-w-3xl mx-auto">
        <h1 class="font-medium text-3xl mb-6">{{ __('Choose Ad Category') }}</h1>
        <div class="grid gap-4">
            @foreach ($adTypes as $type)
                <button class="p-6 rounded-xl border flex items-center justify-between hover:ring-2 ring-primary">
                    <span>{{ $type['title'] }}</span>
                    <x-icon-chevron-right />
                </button>
            @endforeach
        </div>
    </div>
</div>
