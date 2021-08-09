<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'web_name' => 'Web Name',
            'phone_number' => +123456789,
            'web_email' => 'web@app.com',
            'address' => 'Egypt',
        ]);
    }
}
