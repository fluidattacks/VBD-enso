<?php

return [
    'onDelete' => 'cascade',
    'defaultCountryId' => (int) env('DEFAULT_COUNTRY_ID', 1),
];
