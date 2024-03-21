@props(['users' => []])

@php
    $headerItems = [
        ['key' => 'id', 'value' => 'User ID'],
        ['key' => 'name', 'value' => 'User Name'],
        ['key' => 'email', 'value' => 'Email'],
        ['key' => 'country', 'value' => 'Country'],
        ['key' => 'phone', 'value' => 'Phone'],
        ['key' => 'actions', 'value' => 'Actions'],
    ];
@endphp

<div class="pt-4" x-data="{ open: false }">

    <div class="mb-4 flex justify-between items-center">
        <div class="flex-1 pr-4">
            <div class="relative md:w-1/3">
                <input type="search"
                    class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                    placeholder="{{ __('Search...') }}">
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
        <div>
            <div class="shadow rounded-lg flex">
                <div class="relative">
                    <button @click.prevent="open = !open"
                        class="rounded-lg inline-flex items-center bg-white hover:text-blue-500 focus:outline-none focus:shadow-outline text-gray-500 font-semibold py-2 px-2 md:px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                            <path d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" />
                        </svg>
                        <span class="hidden md:block">{{ __('Display') }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                            <polyline points="6 9 12 15 18 9" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false"
                        class="z-40 absolute top-0 right-0 w-40 bg-white rounded-lg shadow-lg mt-12 -mr-1 block py-1 overflow-hidden">
                        @foreach ($headerItems as $heading)
                            <label class="flex justify-start items-center text-truncate hover:bg-gray-100 px-4 py-2">
                                <div class="text-teal-600 mr-3">
                                    <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline"
                                        checked>
                                </div>
                                <div class="select-none text-gray-700">{{ $heading['value'] }}</div>
                            </label>
                        @endforeach
                    </div>
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
                            class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-2 text-gray-600 font-bold tracking-wider uppercase text-xs last:text-end">
                            {{ $heading['value'] }}
                        </th>
                    @endforeach

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border-dashed border-t border-gray-200 px-3">
                            <label
                                class="text-teal-500 inline-flex justify-between items-center hover:bg-gray-200 px-2 py-2 rounded-lg cursor-pointer">
                                <input type="checkbox"
                                    class="form-checkbox rowCheckbox focus:outline-none focus:shadow-outline"
                                    :name="{{ $user['id'] }}" @click="getRowDetail($event, {{ $user['id'] }})">
                            </label>
                        </td>
                        <td class="border-dashed border-t border-gray-200 userId">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $user['id'] }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 firstName">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $user['name'] }}</span>
                        </td>

                        <td class="border-dashed border-t border-gray-200 emailAddress">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $user['email'] }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 gender">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $user['country'] }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200 phoneNumber">
                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $user['phone'] }}</span>
                        </td>
                        <td class="border-dashed border-t border-gray-200  flex justify-end">
                            <a href="{{ '/all-users' . '/' . $user->id }}"
                                class="text-green-600 cursor-pointer px-6 py-3 flex items-center font-semibold tracking-wider text-sm uppercase">
                                {{ __('View') }}</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
