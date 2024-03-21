<section class="grid md:grid-cols-[1fr_240px] gap-6 p-6 max-w-6xl mx-auto">

    <div class="w-full">
        <div class="w-full rounded-xl bg-white p-6 border-b">
            <div class="mb-4">
                <h1 class="text-xl uppercase">Invoice: #{{ $invoice->id }}</h1>
            </div>

            <div class="rounded-xl border w-full grid grid-cols-3 divide-x mb-4">
                <div class="p-4">
                    <h3 class="text-sm text-gray-600 uppercase mb-2">{{ __('Created At') }}</h3>
                    <span class="text-black">{{ $invoice->created_at->format('M d, Y') }}</span>
                </div>
                <div class="p-4">
                    <h3 class="text-sm text-gray-600 uppercase mb-2">{{ __('Pay Before') }}</h3>
                    <span
                        class="text-black">{{ Carbon\Carbon::parse($invoice->created_at)->addDays(30)->format('d M, Y') }}</span>
                </div>
                <div class="p-4">
                    <h3 class="text-sm text-gray-600 uppercase mb-2">Paid At</h3>
                </div>
            </div>

            <h2 class="text-sm uppercase text-gray-600  mb-2 font-semibold">Items</h2>

            <div class="border rounded-xl grid grid-cols-[1fr_100px]">
                <div class="border-r p-3 border-b">
                    {{ __('Description') }}
                </div>
                <div class="p-3 border-b">
                    {{ __('Price(€)') }}
                </div>

                @if (count($invoice->items) == 0)
                    <div class="col-span-2">
                        <x-empty title="No Items Found" />
                    </div>
                @endif

                <div class="col-span-2">
                    @foreach ($invoice->items as $item)
                        <div class="flex items-center justify-between p-4 border-b last:border-b-0">
                            <h4 class="text-sm">{{ $item['title'] }}</h4>
                            <span class="text-sm">{{ $item['price'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-around w-full mt-6">
                <a download href="{{ '/api/invoice/download' . '/' . $invoice->id }}" class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full bg-gray-200 group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-document class="h-8 w-auto" />
                    </div>
                    <span class="block text-base">Download</span>
                </a>
                <a href="" class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full bg-gray-200 group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-megaphone class="h-8 w-auto" />
                    </div>
                    <span class="block text-base">View Ad</span>
                </a>
                <a href="" class="text-center group">
                    <div
                        class="h-14 w-14 mb-1 rounded-full bg-gray-200 group-hover:bg-primary inline-flex items-center justify-center">
                        <x-icon-email class="h-8 w-auto" />
                    </div>
                    <span class="block text-base">Send</span>
                </a>
            </div>
        </div>

    </div>

    <section>
        <div class="p-4 bg-white rounded-xl border">
            <button type="button" onclick="history.back()"
                class="flex items-center gap-2 text-center rounded-full text-sm font-medium uppercase px-4 py-2.5 tracking-wider bg-gray-200 text-black mb-5">
                <x-icon-chevron-left class="h-5 w-auto" />
                {{ __('Back') }}
            </button>
            <h2 class="text-2xl font-bold mb-2">{{ __('Invoice') . ': #' . $invoice->id }}</h2>
            <price class="uppercase font-semibold block text-lg mb-4">€ {{ $invoice->total }}</price>
            @can('isUser')
                @if ($invoice->total > 0)
                    <button
                        class="w-full text-center rounded-full bg-secondary text-white text-sm font-medium uppercase py-2.5 tracking-wider disabled:cursor-not-allowed"
                        wire:loading.attr="disabled" type='button'>
                        {{ __('Pay') }}
                    </button>
                @endif
            @else
                <a download href="{{ '/api/invoice/download' . '/' . $invoice->id }}"
                    class="w-full text-center rounded-full bg-secondary text-white text-sm font-medium uppercase py-2.5 tracking-wider disabled:cursor-not-allowed"
                    wire:loading.attr="disabled" type='button'>
                    {{ __('Download') }}
                </a>
            @endcan
        </div>
    </section>
</section>
