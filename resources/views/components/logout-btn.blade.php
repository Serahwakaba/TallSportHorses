<!-- Authentication -->
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <a {{ $attributes }} href="{{ route('logout') }}"
        onclick="event.preventDefault();
                    this.closest('form').submit();"
        class="flex items-center text-red-500 gap-2 p2 w-full rounded hover bg-red-600/5 p-2">
        <x-icon-power class="h-5 w-auto" />
        {{ __('Log Out') }}
    </a>
</form>
