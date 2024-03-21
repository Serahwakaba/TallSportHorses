@props(['adType' => '', 'adID' => ''])

<form method="POST" action="{{ route('ads.delete') }}">
    @csrf

    <input name="ad-type" type="text" value="{{ $adType }}" hidden>
    <input name="ad-id" type="text" value="{{ $adID }}" hidden>

    <button type="submit"
        class="h-10 w-10 rounded-full border flex items-center justify-center text-red-600 hover:bg-red-100">
        <x-icon-trash class="h-4 w-auto" />
    </button>
</form>
