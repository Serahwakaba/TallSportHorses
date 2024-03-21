<?=
'<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss version="2.0">
    <channel>

        @foreach ($ads as $ad)
            <item>
                <title>
                    <![CDATA[{{ $ad->title }}]]>
                </title>
                <link>
                <![CDATA[{{ config('app.url') }}/horses/{{ $ad->id }}]]>
                </link>
                <image>
                    <![CDATA[{{ empty($ad['images']) ? config('app.url') . '/images/horse-bw.jpg' : array_values($ad['images'])[0] }}]]>
                </image>
                <description>
                    <![CDATA[{!! $ad->description['english'] !!}]]>
                </description>
                <category>{{ $ad->category }}</category>
                <author>{{ $ad->user->name }}</author>
                <guid>{{ $ad->id }}</guid>
                <pubDate>{{ $ad->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
