<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Seeder;

class MenuPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = Menu::find(1);
        $pageIds = Page::whereIn('name', ['Blog', 'Review'])->pluck('id')->toArray();
        $menu->pages()->attach($pageIds, [
            'children' => json_encode([]),
        ]);
    }
}
