@props(['ads' => [], 'category' => 'horses'])

@php
    $headerItems = [
        ['key' => 'id', 'value' => 'Ad ID'],
        ['key' => 'title', 'value' => 'Title'],
        ['key' => 'category', 'value' => 'Category'],
        ['key' => 'price', 'value' => 'Price'],
        ['key' => 'views', 'value' => 'Views'],
        ['key' => 'actions', 'value' => 'Actions'],
    ];

    $adFilters = ['active', 'draft', 'expired'];
@endphp

<div class="pt-4" x-data="{ open: false, showAdTypeSelector: false, showAdFilters: false }">

    <div class="mb-4 flex gap-4 items-center">

        <div>
            <div class="shadow rounded-lg flex">
                <div class="relative">
                    <button @click.prevent="showAdTypeSelector = !showAdTypeSelector"
                        class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">

                        <span class="block">{{ $adType }}</span>
                        <x-icon-chevron-down class="w-5 h-5 ml-1" />
                    </button>

                    <div x-show="showAdTypeSelector" @click.away="showAdTypeSelector = false"
                        class="z-40 absolute top-0 left-0 w-[240px] bg-white rounded-lg shadow-lg mt-12 -mr-1 block py-1 overflow-hidden">
                        @foreach ($adTypes as $type)
                            <button wire:click="setAdType('{{ $type }}')"
                                class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2 w-full">
                                {{ $type }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="shadow rounded-lg flex">
                <div class="relative">
                    <button @click.prevent="showAdFilters = !showAdFilters"
                        class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">

                        <span class="block capitalize">{{ $filter }}</span>
                        <x-icon-chevron-down class="w-5 h-5 ml-1" />
                    </button>

                    <div x-show="showAdFilters" @click.away="showAdFilters = false"
                        class="z-40 absolute top-0 left-0 w-[240px] bg-white rounded-lg shadow-lg mt-12 -mr-1 block py-1 overflow-hidden">
                        @foreach ($adFilters as $f)
                            <button wire:click="$set('filter','{{ $f }}')"
                                class="flex capitalize justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2 w-full">
                                {{ $f }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-1 pr-4">
            <div class="relative md:w-1/3">
                <input type="search"
                    class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                    placeholder="{{ __('Search...') }}">
                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                    <x-icon-search class="w-6 h-6 text-gray-400" />
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative min-h-[400px]">
        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
            <thead>
                <tr class="text-left">
                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                        <label
                            class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                            <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline"
                                @click="selectAllCheckbox($event);">
                        </label>
                    </th>
                    @foreach ($headerItems as $heading)
                        <th
                            class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs  last:text-end">
                            {{ $heading['value'] }}
                        </th>
                    @endforeach

                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $ad)
                    <tr>
                        <td class="border-dashed border-t border-gray-200 px-3">
                            <label
                                class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                <input type="checkbox"
                                    class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline"
                                    :name="{{ $ad['id'] }}" @click="getRowDetail($event, {{ $ad['id'] }})">
                            </label>
                        </td>
                        <td class="border-dashed border-t border-gray-200 ">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $ad['id'] }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 ">
                            <div class="text-gray-700 px-6 py-3 flex items-center max-w-[240px] ">
                                <p class="truncate">{{ $ad['title'] }}</p>
                            </div>
                        </td>

                        <td class="border-dashed border-t border-gray-200 ">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $ad['category'] }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 ">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $ad['price'] }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 ">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $ad['views'] }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200  flex justify-end">
                            <a href="{{ '/all-ads' . '/' . $category . '/' . $ad->id }}"
                                class="text-green-600 px-6 py-3 cursor-pointer flex items-center font-semibold tracking-wider text-sm uppercase">
                                {{ __('View') }}</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $ads->links() }}
    </div>
</div>
