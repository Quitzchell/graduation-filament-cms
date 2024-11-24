<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Content;
use App\Models\Page;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {

        $contents = [
            [
                'contentable_type' => Page::class,
                'contentable_id' => 1,
                'name' => 'header_image',
                'value' => 'napoleon-on-horseback.jpg',
            ],
            [
                'contentable_type' => Page::class,
                'contentable_id' => 1,
                'name' => 'header_title',
                'value' => 'La gloire est éphémère, mais l\'oubli est éternel.',
            ],
            [
                'contentable_type' => Page::class,
                'contentable_id' => 1,
                'name' => 'blocks',
                'value' => [
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
            ],

            [
                'contentable_type' => Page::class,
                'contentable_id' => 2,
                'name' => 'header_image',
                'value' => 'napoleon-reading.jpg',
            ],
            [
                'contentable_type' => Page::class,
                'contentable_id' => 2,
                'name' => 'header_title',
                'value' => 'Entries',
            ],

            [
                'contentable_type' => BlogPost::class,
                'contentable_id' => 1,
                'name' => 'blocks',
                'value' => [
                    [
                        'data' => [
                            'text' => '<p>One of the most critical aspects of any military campaign is a comprehensive understanding of the terrain. The battlefield is more than just a physical space; it is a living entity that can be manipulated to your advantage. When preparing for battle, I always conduct a meticulous reconnaissance of the land, noting the elevation, natural obstacles, and potential choke points. A well-informed commander can use the terrain to funnel enemy forces into a disadvantageous position or create advantageous flanking maneuvers.</p><p><br></p>',
                            'title' => 'Understanding the Terrain',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Sun Tzu wisely stated, "All warfare is based on deception." This principle is at the heart of effective military strategy. The element of surprise can turn the tide of battle in an instant. Whether it is by feigning weakness in one area while launching a surprise attack in another or by utilizing unexpected formations, maintaining the element of surprise forces the enemy to react rather than act. In my campaigns, I have frequently employed deceptive tactics to mislead my opponents, creating openings for decisive strikes</p>',
                            'title' => 'The Element of Surprise',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'image' => 'napoleon-war.jpg',
                            'content' => [
                                '{index}' => [
                                    'image' => 'napoleon-war.jpg',
                                ],
                            ],
                        ],
                        'type' => 'common\\image',
                    ],
                    [
                        'data' => [
                            'text' => '<p>An army marches on its stomach, or so the saying goes. Logistics is the backbone of any successful military operation. Supply lines must be secured, provisions must be adequate, and reinforcements must be timely. A well-fed and well-equipped army is a formidable force. In my campaigns, I have always prioritized logistics, ensuring that my troops are well-provisioned and that our supply lines remain uninterrupted. This focus on logistics allows for sustained campaigns and rapid movements without the hindrance of scarcity.</p><p><br></p>',
                            'title' => 'The Importance of Logistics',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Effective communication and unity of command are essential for successful military operations. In the chaos of battle, it is vital that every unit understands its role within the larger strategy. A divided command can lead to confusion and missed opportunities. I have always emphasized the importance of a clear chain of command and open lines of communication among my generals. When every soldier knows their purpose and trusts in their leaders, the army moves as one cohesive unit, capable of executing complex maneuvers with precision.</p>',
                            'title' => 'Unity of Command',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>No plan survives contact with the enemy, and adaptability is a hallmark of effective military strategy. The ability to reassess and modify one’s tactics in response to changing circumstances is crucial. In my campaigns, I have encountered unforeseen challenges and adversaries who did not behave as expected. It is in these moments that a commander must remain calm and collected, ready to pivot and adjust the strategy on the fly. The best-laid plans must be flexible, allowing for adjustments that capitalize on emerging opportunities.</p>',
                            'title' => 'Adaptability on the Battlefield',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Finally, let us not forget the most vital aspect of any military campaign: the soldiers themselves. An army is composed of individuals, each with their own strengths, weaknesses, and motivations. Understanding the morale of your troops and fostering a sense of unity and purpose can significantly impact their performance on the battlefield. I have always believed in leading by example, inspiring my soldiers with courage and conviction. A motivated army is an unstoppable force, willing to endure hardships for the promise of victory.</p>',
                            'title' => 'The Human Element',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>In conclusion, military strategy and tactics are not merely theoretical concepts; they are dynamic practices that require constant learning and adaptation. As you navigate the complexities of warfare, remember the importance of terrain, surprise, logistics, communication, adaptability, and the human element. These principles have served me well throughout my campaigns, and I hope they provide you with valuable insights as you delve into the art of military strategy.</p><p>Until next time, may your strategies be bold, and your victories resounding!</p><p>Napoleon Bonaparte<br><em>Commander, Strategist, and Enthusiast of the Art of War</em></p>',
                            'title' => 'Conclusion',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                ],
            ],

            [
                'contentable_type' => Page::class,
                'contentable_id' => 3,
                'name' => 'header_image',
                'value' => 'napoleon-reviews.jpg',
            ],
            [
                'contentable_type' => Page::class,
                'contentable_id' => 3,
                'name' => 'header_title',
                'value' => 'Reviews',
            ],
        ];

        foreach ($contents as $content) {
            Content::create($content);
        }
    }
}
