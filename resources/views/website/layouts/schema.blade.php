@php
$socials = json_decode($setting->socails, true); // Your JSON data

$sameAs = array_values(array_filter($socials));



$schema = [
    "@context" => "https://schema.org",
    "@graph" => [
        [
            "@type" => "Organization",
            "name" => $setting->web_name,
            "url" => url()->current(),
            "description" => $meta_description,
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => $setting->streetAddress,
                "addressLocality" => $setting->addressLocality,
                "addressRegion" => $setting->addressRegion,
                "postalCode" => $setting->postalCode,
                "addressCountry" => $setting->addressCountry
            ],
            "logo" => [
                "@type" => "ImageObject",
                "name" => $setting->web_name,
                "width" => "230",
                "height" => "67",
                "url" => $setting->web_logo
            ],
            "sameAs" => [$sameAs],
        ],
        [
            "@type" => "WebSite",
            "alternateName" => $setting->web_name,
            "url" => $localeUrl,
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => $localeUrl . "storesearch?q={search_term_string}",
                "query-input" => "required name=search_term_string"
            ],
            "inLanguage" => $setting->lange
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