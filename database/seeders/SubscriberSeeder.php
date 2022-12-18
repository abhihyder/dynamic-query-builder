<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscriber = new Subscriber();
        $subscriber->first_name = "Abhi";
        $subscriber->last_name = "Hyder";
        $subscriber->email = "abhi@example.com";
        $subscriber->birth_day = "1993-02-05";
        $subscriber->save();
    }
}
