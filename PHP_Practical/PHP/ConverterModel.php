<?php

class Converter
{
    // main array for convert the multiple unit
    private $data = [
        "Length" => [
            "Meter" => [
                "Meter" => '$val',
                "Kilometer" => '$val * 0.001',
                "Centimeter" => '$val * 100',
                "Milimeter" => '$val * 1000',
            ],
            "Kilometer" => [
                "Kilometer" => '$val',
                "Meter" => '$val * 1000',
                "Centimeter" => '$val * 100000',
                "Milimeter" => '$val * 10000000'
            ],
            "Centimeter" => [
                "Centimeter" => '$val',
                "Meter" => '$val * 0.01',
                "Kilometer" => '$val * 0.0001',
                "Milimeter" => '$val * 10',
            ],
            "Milimeter" => [
                "Milimeter" => '$val',
                "Meter" => '$val * 0.001',
                "Kilometer" => '$val * 0.000001',
                "Centimeter" => '$val * 0.1'
            ]
        ],
        "Temperature" => [
            "Celsius" => [
                "Celsius" => '$val',
                "Kelvin" => '$val + 273.15',
                "Fahrenheit" => '($val * 9/5) + 32'
            ],
            "Kelvin" => [
                "Kelvin" => '$val',
                "Celsius" => '$val -272.15',
                "Fahrenheit" => '($val * 9/5) + 32'
            ],
            "Fahrenheit" => [
                "Fahrenheit" => '$val',
                "Celsius" => '($val - 32) * 5/9',
                "Kelvin" => '($val - 32) * 5/9 + 273.15'
            ]
        ],
        "Area" => [
            "Square Meter" => [
                "Square Meter" => '$val',
                "Square Kilometer" => '$val * 0.000001',
                "Square Centimeter" => '$val * 10000',
                "Square Millimeter" => '$val * 1000000'
            ],
            "Square Kilometer" => [
                "Square Kilometer" => '$val',
                "Square Meter" => '$val * 1000000',
                "Square Centimeter" => '$val * 10000000000',
                "Square Millimeter" => '$val * 1000000000000'
            ],
            "Square Centimeter" => [
                "Square Centimeter" => '$val',
                "Square Meter" => '$val * 0.0001',
                "Square Kilometer" => '$val * 0.00000000001',
                "Square Millimeter" => '$val * 100'
            ],
            "Square Millimeter" => [
                "Square Millimeter" => '$val',
                "Square Meter" => '$val * 0.000001',
                "Square Kilometer" => '$val * 0.0000000000001',
                "Square Centimeter" => '$val * 0.01'
            ]
        ],
        "Volume" => [
            "Cubic Meter" => [
                "Cubic Meter" => '$val',
                "Cubic Kilometer" => '$val * 0.0000000001',
                "Cubic Centimeter" => '$val * 1000000'
            ],
            "Cubic Kilometer" => [
                "Cubic Kilometer" => '$val',
                "Cubic Meter" => '$val * 1000000000',
                "Cubic Centimeter" => '$val * 1000000000000000'
            ],
            "Cubic Centimeter" => [
                "Cubic Centimeter" => '$val',
                "Cubic Meter" => '$val * 0.000001',
                "Cubic Centimeter" => '$val *  0.0000000000000001'
            ],
            "Cubic Millimeter" => [
                "Cubic Millimeter" => '$val',
                "Cubic Meter" => '$val * 0.0000000001',
                "Cubic Kilometer" => '$val * 0.0000000000000000001'
            ]
        ],
        "Weight" => [
            "Kilogram" => [
                "Kilogram" => '$val',
                "Gram" => '$val * 1000',
                "Milligram" => '$val * 1000000'
            ],
            "Gram" => [
                "Gram" => '$val',
                "Kilogram" => '$val * 0.001',
                "Milligram" => '$val * 1000'
            ],
            "Milligram" => [
                "Milligram" => '$val',
                "Kilogram" => '$val * 0.000001',
                "Gram" => '$val * 0.001'
            ]
        ],
        "Time" => [
            "Second" => [
                "Second" => '$val',
                "Millisecond" => '$val * 1000',
                "Microsecond" => '$val * 1000000'
            ],
            "Millisecond" => [
                "Millisecond" => '$val',
                "Second" => '$val * 0.001',
                "Microsecond" => '$val * 1000'
            ],
            "Microsecond" => [
                "Microsecond" => '$val',
                "Second" => '$val * 0.000001',
                "Millisecond" => '$val * 0.001'
            ]
        ]
    ];

    // get main index
    public function getMainIndex()
    {
        try {
            return array_keys($this->data);
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    // get all indexes according to main index
    public function getAllIndexes(string $mainIndex)
    {
        try {
            return array_keys($this->data[$mainIndex]);
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    // get the result 
    public function getResult($val, string $mainIndex, string $fromIndex, string $toIndex)
    {
        try {
            $str = $this->data[$mainIndex][$fromIndex][$toIndex];
            return eval("return $str;");
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
}
