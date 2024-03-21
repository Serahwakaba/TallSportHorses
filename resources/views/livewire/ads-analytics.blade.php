@push('head')
    <script src="https://cdn.jsdelivr.net/npm/frappe-charts@1.2.4/dist/frappe-charts.min.iife.js"></script>
@endpush

@php
    $ad_count_arr = [$horse_ads, $ponies_ads, $friesian_ads, $transport_ads, $realestate_ads, $banner_ads, $stable_ads];
@endphp

<section class="grid grid-cols-[2fr_1fr] gap-4 mb-6">
    <div class="bg-white p-4 rounded-md border min-h-[200px]">
        <div id="pie-chart"></div>
    </div>
    <div class="bg-white p-4 rounded-md border">
        <h2 class="uppercase font-medium mb-4">{{ __('Ads') }}</h2>
        <div class="flex justify-between py-2 border-b border-dashed last:border-b-0">
            <span>Horse Ads</span>
            <span>{{ $horse_ads }}</span>
        </div>
        <div class="flex justify-between py-2 border-b border-dashed last:border-b-0">
            <span>Ponies Ads</span>
            <span>{{ $ponies_ads }}</span>
        </div>
        <div class="flex justify-between py-2 border-b border-dashed last:border-b-0">
            <span>Friesian Ads</span>
            <span>{{ $friesian_ads }}</span>
        </div>
        <div class="flex justify-between py-2 border-b border-dashed last:border-b-0">
            <span>Transport Ads</span>
            <span>{{ $transport_ads }}</span>
        </div>
        <div class="flex justify-between py-2 border-b border-dashed last:border-b-0">
            <span>Real Estate Ads</span>
            <span>{{ $realestate_ads }}</span>
        </div>
        <div class="flex justify-between py-2 border-b border-dashed last:border-b-0">
            <span>Stable Ads</span>
            <span>{{ $stable_ads }}</span>
        </div>
        <div class="flex justify-between py-2 border-b border-dashed last:border-b-0">
            <span>Banner Ads</span>
            <span>{{ $banner_ads }}</span>
        </div>
    </div>
</section>
<script>
    const results = <?php echo json_encode($ad_count_arr); ?>;
    const data = {
        labels: ['Horse Ads', 'Ponies Ads', 'Friesian Ads', 'Transport Ads', 'Real estate Ads', 'Banner Ads',
            'Stable & Grazing Ads'
        ],
        datasets: [{
                name: "Ads Count",
                type: "bar",
                values: results
            },

        ]
    }

    const chart = new frappe.Chart("#pie-chart", { // or a DOM element,
        // new Chart() in case of ES6 module with above usage
        title: "Ads Count",
        data: data,
        type: 'bar', // or 'bar', 'line', 'scatter', 'pie', 'percentage'
        height: 350,
        colors: ['#7cd6fd', '#743ee2']
    })
</script>
