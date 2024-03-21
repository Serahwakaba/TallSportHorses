<main class="w-full min-h-screen bg-gray-200">
    <x-ads-top-bar />

    <section class="w-full">

        <div class="max-w-5xl mx-auto px-4 py-6">
            <h1 class="text-lg uppercase font-medium mb-4">{{ __('My Subscription') }}</h1>
            <div class="w-full rounded-xl">
                <div class="grid md:grid-cols-3 gap-4">
                    @foreach ($subscription_packages as $package)
                        <div class="rounded-md border flex flex-col bg-white">
                            <div class="p-4 pb-0">
                                <img class=" h-10 w-auto" src="/images/{{ strtolower($package->title) }}.png"
                                    alt="{{ $package->title }}">
                            </div>
                            <h2 class="text-3xl font-medium block p-4">{{ $package->title }}</h2>
                            <span class="block p-4 pt-0 text-lg">€ {{ $package->price }}</span>
                            <ul class="p-4 border-t block">
                                @foreach ($package['features'] as $feature)
                                    <li class="text-sm block mb-2">
                                        {{ $feature }}</li>
                                @endforeach
                            </ul>

                            <div class="flex-grow"></div>
                            <div class="p-4 pt-0">
                                <button
                                    class="w-full text-center block px-4 py-3 rounded-md bg-primary uppercase text-sm tracking-wider font-medium">
                                    {{ __('Choose Package') }}
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
