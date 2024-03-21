@php
    $headerItems = ['REF', 'Total', 'Paid', 'Created At', 'Pay Before', 'Actions'];
@endphp

<section class="w-full">
    <div class=" p-6 pb-4 flex items-end">
        <div class="flex justify-between w-full">
            <h1 class="text-lg uppercase font-medium">{{ __('My Invoices') }}</h1>

        </div>
    </div>
    <div class="px-6">
        <div class="w-full rounded-xl bg-white p-6">
            {{-- EMPTY --}}
            @if (count($invoices) == 0)
                <x-empty title="You have not have any invoices">
                    <a href="{{ route('place-advertisement') }}"><x-button>{{ __('Place Advertisement') }}</x-button></a>
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
                                        class="text-gray-700 px-6 py-3 flex items-center">{{ $invoice['paid'] || $invoice['total'] == 0 ? __('Yes') : __('No') }}</span>
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
    </div>
</section>
