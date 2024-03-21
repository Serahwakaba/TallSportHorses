@php
    $adTypes = [
        ['title' => __('Horses'), 'link' => 'horses'],
        ['title' => __('Ponies'), 'link' => 'ponies'],
        ['title' => __('Friesian'), 'link' => 'friesian'],
        ['title' => __('Transport'), 'link' => 'transport'],
        ['title' => __('Equestrian real estate'), 'link' => 'equestrian-real-estate'],
        ['title' => __('Stabling and Grazing'), 'link' => 'stabling-and-grazing'],
        ['title' => __('Banner'), 'link' => 'banner'],
    ];

    function kebabCase($str)
    {
        $str = preg_replace('/[^a-zA-Z0-9]+/', ' ', $str);
        $str = trim($str);
        $str = strtolower($str);
        $str = str_replace(' ', '-', $str);

        return $str;
    }
@endphp

<section>

    <div class="p-8 max-w-3xl mx-auto">
        <div class="p-6 bg-white rounded-xl">
            <div class="max-w-4xl mx-auto">
                <h1 class="font-medium text-3xl mb-6">Choose Ad Category</h1>
                <div class="grid gap-4">
                    @foreach ($adTypes as $type)
                        <a href="{{ '/place-advertisement' . '/' . $type['link'] }}"
                            class="p-6 rounded-xl border flex items-center justify-between hover:ring-2 ring-primary">
                            <span>{{ $type['title'] }}</span>
                            <x-icon-chevron-right />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>
