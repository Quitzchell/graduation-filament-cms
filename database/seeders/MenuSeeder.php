<?php

namespace Database\Seeders;

use App\Enums\Menus;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Menus::cases() as $menu) {
            Menu::create([
                'name' => $menu->value,
            ]);
        }

    }
}
