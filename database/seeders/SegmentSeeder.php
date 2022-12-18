<?php

namespace Database\Seeders;

use App\Models\Segment;
use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rules = [
            [
                [
                    'column' => 'first_name',
                    'condition' => 'contain',
                    'value' => 'Abhi'
                ],
                [
                    'column' => 'birth_day',
                    'condition' => 'on',
                    'value' => '1993-02-05'
                ],
            ],
            [
                [
                    'column' => 'email',
                    'condition' => 'is',
                    'value' => 'abhi@example.com'
                ]
            ],
        ];

        $segment = new Segment();
        $segment->name = "Demo Segment";
        $segment->rule = json_encode($rules);
        $segment->created_by = 1;
        $segment->save();
    }
}
