<?php
use \mirocow\yandexmaps\Canvas;
use mirocow\yandexmaps\Map;
?>
<?php
$map = new Map('yandex_map', [
    'center' => [43.238949, 76.889709],
    'zoom' => 11,
    // Enable zoom with mouse scroll
    'behaviors' => ['default', 'scrollZoom'],
    'type' => "yandex#map",
],
    [
        // Permit zoom only fro 9 to 11
        'minZoom' => 5,
        'maxZoom' => 21,
        'controls' => [
            "new ymaps.control.SmallZoomControl()",
            "new ymaps.control.TypeSelector(['yandex#map', 'yandex#satellite'])",
        ],
    ]
);
?>
<?= Canvas::widget([
    'htmlOptions' => [
        'style' => 'height: 400px;',
    ],
    'map' => $map,
]); ?>