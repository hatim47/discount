@php
$schema = [
    "@context" => "https://schema.org",
    "@graph" => [
        [
            "@type" => "Organization",
            "name" => "TopVouchersCode",
            "url" => url()->current(),
            "description" => $meta_description,
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "31990 Nikita Drives Apt. 943",
                "addressLocality" => "Beulah Wall",
                "addressRegion" => "Nevada",
                "postalCode" => "36632",
                "addressCountry" => "UK"
            ],
            "logo" => [
                "@type" => "ImageObject",
                "name" => "TopVouchersCode",
                "width" => "230",
                "height" => "67",
                "url" => env('APP_ASSETS') . "img/logo_yellow.webp"
            ],
            "sameAs" => [
                "https://www.facebook.com/#",
                "https://x.com/TopVouchersCode",
                "https://www.linkedin.com/in/TopVouchersCode/",
                "https://www.pinterest.com/TopVouchersCode/_profile/"
            ],
        ],
        [
            "@type" => "WebSite",
            "alternateName" => "TopVouchersCode",
            "url" => $localeUrl,
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => $localeUrl . "storesearch?q={search_term_string}",
                "query-input" => "required name=search_term_string"
            ],
            "inLanguage" => "en-GB"
        ]
    ]
];

$jsonLd = json_encode(
    $schema,
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
);
@endphp

<script type="application/ld+json">
{!! $jsonLd !!}
</script>