<?php

namespace Database\Seeders;

use App\Models\LinkType;
use Illuminate\Database\Seeder;

class LinkTypeSeeder extends Seeder
{
    protected static $linktypes = ['website', 'social', 'email'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (static::$linktypes as $type) {
			if (LinkType::where('type', $type)->doesntExist()) {
				LinkType::create(['type' => $type]);
			}
		}
    
    }
}
