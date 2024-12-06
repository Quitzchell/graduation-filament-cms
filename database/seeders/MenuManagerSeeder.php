<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuManager;
use App\Models\Page;
use Illuminate\Database\Seeder;

class MenuManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $i = 1;
        $menu = Menu::find(1);
        Page::whereIn('name', ['Blog', 'Review'])
            ->each(function ($page) use ($menu, &$i) {
                MenuManager::create([
                    'menu_id' => $menu->getKey(),
                    'page_id' => $page->getKey(),
                    'sort' => $i++,
                ]);
            });
    }
}
