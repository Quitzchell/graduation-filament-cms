<?php

namespace Database\Seeders;

use App\Cms\Templates\Homepage\Homepage;
use App\Models\Page;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'parent_id' => null,
            'Menu_id' => 1,
            'name' => 'Home',
            'uri' => 'home',
            'template' => Homepage::class,
            'content' => [
                'blocks' => [
                    [
                        'data' => [
                            'text' => '<p>I am Napoleon Bonaparte, exiled here on the remote island of Saint Helena. Once, I commanded vast armies, reshaped nations, and navigated the turbulent waters of European politics. Today, however, I find myself in the serene isolation of this distant land, where the ocean whispers tales of glory and defeat.</p><p>As I pen my thoughts for you, dear readers, I invite you into my world—a realm of ambition, strategy, and, yes, introspection. Here, I shall share my reflections on leadership, the nature of power, and the lessons learned from both triumphs and trials.</p><p>Join me as I explore the intricate tapestry of history, the weight of legacy, and the fleeting nature of fame. Whether you seek inspiration, knowledge, or simply the musings of a man who once stood at the pinnacle of power, I welcome you to my journey.</p><p>À bientôt,<br>Napoleon</p>',
                            'title' => 'Bonjour à tous,',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>I invite you to join me on a new conquest, not of nations but of cinema and literature! Much as I once sought to reshape Europe, I now seek to navigate the vast empire of film, and I need you by my side. Do you dare follow me, loyal subjects, in this new adventure? Then visit my reviews page into the world of film and literature!</p>',
                            'title' => 'A new conquest',
                            'urlable_id' => 'App\\Models\\Page:1',
                            'button_text' => 'Read more',
                        ],
                        'type' => 'common\\callToAction',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Visit me at Les Invalides, where I, Napoleon Bonaparte, rest. Stand before me, and discuss the ambition, triumphs, and sacrifices that shaped our history.</p>',
                            'title' => 'I await your visit',
                            'address' => [
                                'lat' => 48.85433450000001,
                                'lng' => 2.3134029,
                                'formatted' => '75007 Paris, France',
                                'formatted_address' => '75007 Paris, France',
                            ],
                            'location' => [
                                'lat' => 48.85433450000001,
                                'lng' => 2.3134029,
                            ],
                        ],
                        'type' => 'common\\map',
                    ],
                ],
                'header_image' => 'napoleon-on-horseback.jpg',
                'header_title' => "La gloire est éphémère, mais l'oubli est éternel.",
            ],
        ]);
    }
}
