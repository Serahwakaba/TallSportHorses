@props(['disabled' => false, 'address', 'id' => 'ac-input'])

<div x-data="{
    address: @entangle($address),

}" x-init="createAddressAutoComplete" @map-ready.window="createAddressAutoComplete" class="w-full">
    <input x-model="address" id="{{ $id }}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' =>
            'border-gray-300 disabled:bg-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
    ]) !!}>
</div>

<script>
    function createAddressAutoComplete() {
        if (typeof google != "undefined") {
            const input = document.getElementById("{{ $id }}");
            const options = {
                fields: ["address_components", "geometry", "name"],
                types: ["address"]
            };
            const autocomplete = new google.maps.places.Autocomplete(input, options);

            autocomplete.addListener("place_changed", () => {
                const place = autocomplete.getPlace();

                input.value = place.name
                input.dispatchEvent(new Event('input', {
                    'bubbles': true
                }));
            });
        }
    }
</script>
