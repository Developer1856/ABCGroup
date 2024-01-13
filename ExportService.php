<?php

class ExportService
{
    const COMING_DATA = [
        [
            'country_name' => 'USA',
            'country_code' => 'US',
            'city_name' => 'New York',
            'lat' => '40.7127753',
            'lng' => '-74.0059728',
        ],
        [
            'country_name' => 'USA',
            'country_code' => 'US',
            'city_name' => 'Los Angeles',
            'lat' => '34.0522342',
            'lng' => '-118.2436849',
        ],
        [
            'country_name' => 'Philippines',
            'country_code' => 'PH',
            'city_name' => 'Manila',
            'lat' => '14.5995124',
            'lng' => '120.9842195',
        ],
        [
            'country_name' => 'Philippines',
            'country_code' => 'PH',
            'city_name' => 'Cebu',
            'lat' => '10.3156993',
            'lng' => '123.8854377',
        ]
    ];

    const COLUMN_NAME = ['Country name', 'Country code', 'Lat', 'Long'];

    const FILE_NAME = 'export.csv';
    const DELIMETER = ';';

    public function export()
    {
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . self::FILE_NAME . '";');

        $f = fopen('php://output', 'w');

        fputcsv($f, self::COLUMN_NAME, self::DELIMETER);

        foreach (self::COMING_DATA as $i => $line) {
            $line['country_name'] .= ', ' . $line['country_code'];
            unset($line['country_code']);
            fputcsv($f, $line, self::DELIMETER);
        }
    }
}