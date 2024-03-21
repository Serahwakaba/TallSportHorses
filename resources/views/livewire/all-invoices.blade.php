@php
    $headerItems = ['REF', 'Total', 'Paid', 'Created At', 'Pay Before', 'Actions'];
@endphp

<section class="w-full">
    <div class=" p-6 pb-4 flex items-end">
        <x-breadcrumbs title="{{ __('All Invoices') }}" :links="[]" />
    </div>
    <section class="px-6 mb-4 flex justify-between items-center">
        <div class="flex-1 pr-4">
            <div class="relative md:w-1/3">
                <input type="search"
                    class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                    placeholder="{{ __('Search invoice ref') }}">
                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <div class="px-6">
        <div class="w-full rounded-xl bg-white p-6 mb-4">
            {{-- EMPTY --}}
            @if (count($invoices) == 0)
                <x-empty title="You have not have any invoices">
                    <a
                        href="{{ route('place-advertisement') }}"><x-button>{{ __('Place Advertisement') }}</x-button></a>
                </x-empty>
            @else
                {{-- INVOICES TABLE --}}
                <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                    <thead>
                        <tr class="text-left">
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                <label
                                    class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                    <input type="checkbox"
                                        class="form-checkbox focus:outline-none focus:shadow-outline">
                                </label>
                            </th>
                            @foreach ($headerItems as $heading)
                                <th
                                    class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs last:text-end">
                                    {{ $heading }}
                                </th>
                            @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td class="border-dashed border-t border-gray-200 px-3">
                                    <label
                                        class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                        <input type="checkbox"
                                            class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline">
                                    </label>
                                </td>
                                <td class="border-dashed border-t border-gray-200 userId">
                                    <span
                                        class="text-gray-700 px-6 py-3 flex items-center uppercase">{{ $invoice['invoice_type'] . ':' . $invoice['id'] }}</span>
                                </td>


                                <td class="border-dashed border-t border-gray-200 emailAddress">
                                    <span
                                        class="text-gray-700 px-6 py-3 flex items-center">{{ $invoice['total'] }}</span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 gender">
                                    <span
                                        class="text-gray-700 px-6 py-3 flex items-center {{ $invoice['paid'] || $invoice['total'] == 0 ? 'text-green-600' : 'text-red-600' }}">{{ $invoice['paid'] || $invoice['total'] == 0 ? __('Yes') : __('No') }}</span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 phoneNumber">
                                    <span
                                        class="text-gray-700 px-6 py-3 flex items-center">{{ $invoice->created_at->format('d-m-Y') }}</span>
                                </td>
                                <td class="border-dashed border-t border-gray-200 phoneNumber">
                                    <span
                                        class="text-gray-700 px-6 py-3 flex items-center">{{ $invoice->created_at->addDays($invoice['pay_until_days'])->format('d-m-Y') }}</span>
                                </td>
                                <td class="border-dashed border-t border-gray-200  flex justify-end">
                                    <a href="/invoice/{{ $invoice->id }}"
                                        class="text-green-600 cursor-pointer px-3 py-3 flex items-center font-semibold tracking-wider text-sm uppercase">
                                        {{ __('View') }}</a>
                                    <a target="_blank" href="{{ '/api/invoice/download' . '/' . $invoice->id }}"
                                        class="text-green-600 cursor-pointer px-3 py-3 flex items-center font-semibold tracking-wider text-sm uppercase">
                                        {{ __('Download') }}</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif

        </div>

        {{ $invoices->links() }}
    </div>
</section>
