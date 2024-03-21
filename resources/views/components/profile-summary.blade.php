@php
    $user = Auth::user();
@endphp

<div class="w-full rounded-xl bg-white mb-6">
    <div class="w-full rounded-t-xl bg-primary bg-gradient-to-l from-green-200 via-green-300 to-blue-500 h-[200px]">
    </div>
    <div class="w-full rounded-b-xl p-6 pt-4">
        <div class="flex gap-6">
            <div>
                <div class="w-[140px] h-[140px] rounded-full border-4 border-white -mt-[80px] bg-gray-200">
                    <div class="flex w-full h-full items-center justify-center">
                        <x-icon-user-feather class="h-16 w-auto stroke-[0.5]" />
                    </div>
                </div>
            </div>
            <div>
                <h2 class="font-medium text-lg">{{ $user->name }}</h2>
                <p class="text-gray-600 text-sm">{{ $user->email }}</p>
            </div>
        </div>
    </div>
</div>
