@php
    $profileTabs = ['Profile', 'Security', 'Notifications', 'Billing', 'Danger Zone'];

    function kebabCase($str)
    {
        $str = preg_replace('/[^a-zA-Z0-9]+/', ' ', $str);
        $str = trim($str);
        $str = strtolower($str);
        $str = str_replace(' ', '-', $str);

        return $str;
    }
@endphp

<section class="">
    <div class="sticky top-4 border bg-white rounded-xl  divide-y">
        @foreach ($profileTabs as $tab)
            <a class="block p-3 hover:bg-gray-200" href="#up-{{ kebabCase($tab) }}">
                {{ $tab }}
            </a>
        @endforeach
    </div>
</section>
