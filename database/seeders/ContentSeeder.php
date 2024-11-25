<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Content;
use App\Models\Page;
use App\Models\Review;
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
                            'urlable_id' => 'App\\Models\\Page:3',
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
                            'text' => '<p>One of the most critical aspects of any military campaign is a comprehensive understanding of the terrain. The battlefield is more than just a physical space; it is a living entity that can be manipulated to your advantage. When preparing for battle, I always conduct a meticulous reconnaissance of the land, noting the elevation, natural obstacles, and potential choke points. A well-informed commander can use the terrain to funnel enemy forces into a disadvantageous position or create advantageous flanking maneuvers.</p>',
                            'title' => 'Understanding the Terrain',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Sun Tzu wisely stated, "All warfare is based on deception." This principle is at the heart of effective military strategy. The element of surprise can turn the tide of battle in an instant. Whether it is by feigning weakness in one area while launching a surprise attack in another or by utilizing unexpected formations, maintaining the element of surprise forces the enemy to react rather than act. In my campaigns, I have frequently employed deceptive tactics to mislead my opponents, creating openings for decisive strikes.</p>',
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
                            'text' => '<p>An army marches on its stomach, or so the saying goes. Logistics is the backbone of any successful military operation. Supply lines must be secured, provisions must be adequate, and reinforcements must be timely. A well-fed and well-equipped army is a formidable force. In my campaigns, I have always prioritized logistics, ensuring that my troops are well-provisioned and that our supply lines remain uninterrupted. This focus on logistics allows for sustained campaigns and rapid movements without the hindrance of scarcity.</p>',
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

            [
                'contentable_type' => Review::class,
                'contentable_id' => 1,
                'name' => 'blocks',
                'value' => [
                    [
                        'data' => [
                            'text' => '<p>It has come to my attention that the esteemed director Ridley Scott, a man known for his ability to bring great epics to the screen, has dared to produce a film that bears my name. Naturally, I approached this project with a mixture of curiosity and skepticism. After all, how many times must I endure the endless parade of filmmakers and authors who claim to "understand" me, yet fail to capture the essence of who I am? I am no simple general, no mere man of the battlefield, and yet they always reduce me to one or the other.</p>',
                            'title' => 'My dear readers,',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>And so, I reclined in the shadows of the cinema, waiting to see how Scott would interpret the story of Napoleon Bonaparte&mdash;or as history would have it, me.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Let me begin with the actor chosen to portray me, Joaquin Phoenix. Ah, Joaquin! There is something in his eyes, a brooding intensity, which I admit stirred a flicker of recognition within me. He grasps the ambition, the sheer force of will that drove me to conquer Europe, though at times he seems to dwell a bit too much on my darker moods. Yes, I could be brooding, especially when surrounded by incompetence, but I was also a man of vision, wit, and charm! Did the film capture my charm? Not nearly enough, I fear.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>The cinematography is magnificent. The battles—Austerlitz, for instance—are brought to life with the full force of modern technology. The chaos, the smoke, the clash of steel, all beautifully rendered. But I must ask, where is the elegance of my strategy? My battlefield genius is not in the spectacle of cannons and cavalry alone. It is in the meticulous planning, the way I could outthink my enemies before a single shot was fired. Scott shows me fighting like a lion, but does he show me thinking like a chess master? Only in fleeting moments.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Ah, and then there is Josephine. I must say, Vanessa Kirby captures her allure, though I wonder if the film focuses a bit too much on our tumultuous relationship. Josephine was indeed the love of my life, but she was also a source of constant frustration. Scott’s film paints our marriage as a passionate, almost Shakespearean affair, but I ask you—where are the subtleties? Josephine was cunning, ambitious in her own right, and our relationship was not just about love but power. I had empires to manage, yet the film suggests my heart was always with her. Flattering, perhaps, but simplistic.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>The political complexities of my reign are somewhat glossed over in favor of action and spectacle, but this, I understand, is the nature of cinema. The subtleties of the Napoleonic Code or my reforms to education are perhaps less thrilling to the average viewer than a cavalry charge, but it is in these reforms that my true legacy lies. Will the audience remember me as a man of vision or merely as a conqueror? I suppose that is the eternal question.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>One particularly irksome detail: my height. Yes, we must address it. Ridley Scott, to his credit, does not make a farce of the long-standing myth that I was short, but he also does little to dispel it. I was of average height for my time! Let us set the record straight once and for all.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>In conclusion, Scott’s <strong>Napoleon</strong> is, I suppose, what one might expect from a Hollywood epic—grand, dramatic, and larger than life, yet still missing the finer details. He gives the audience a glimpse of my glory, but only a glimpse. The complexity of my mind, the intricacies of my plans, the true depth of my ambition—these are but shadows in his film. I suppose I must live with the fact that no movie can truly capture the immensity of my life and achievements in a mere two hours.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>And yet, I cannot help but feel a sense of satisfaction. My name once again rings in the halls of modern culture, my deeds immortalized (albeit imperfectly) for a new generation. For that, Ridley Scott, I tip my hat. You may have failed to capture the full measure of me, but at least you tried. That is more than can be said for most.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                ],
            ],

            [
                'contentable_type' => Review::class,
                'contentable_id' => 2,
                'name' => 'blocks',
                'value' => [
                    [
                        'data' => [
                            'text' => "<p>It is a peculiar experience indeed to sit through a film that proposes to unravel the mystery of one's own demise. <em>Monsieur N.</em>, directed by Antoine de Caunes, ventures into the murky waters of my final days on St. Helena, steeped in conspiracy and intrigue. The film suggests that perhaps my story did not end as history dictates. I must confess, there is a certain appeal to this narrative; who wouldn't relish the idea of escaping one’s exile and rewriting their fate?</p>",
                            'title' => 'My dear readers,',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>But let us examine this film in earnest, and allow me to share my thoughts on its portrayal of this phase of my life—both what it captures and what it lacks.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>The film’s premise revolves around the idea that I, Napoleon Bonaparte, may have outwitted my British captors and slipped away from the island of St. Helena, leaving the world with a mystery to ponder. It is an intriguing proposition, one that would flatter my reputation for cunning and strategic brilliance. Yet, the execution of this theory, though dramatic, feels more like a theatrical fantasy than a plausible reality. I was, after all, a man of flesh and blood, bound by the same limitations as any other mortal.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Let us begin with Philippe Torreton’s portrayal of me. He does an admirable job, I must admit. His interpretation captures my physical and emotional decline, the weight of isolation, the crushing loneliness of exile. Torreton allows the viewer to glimpse the brooding side of Napoleon, the man left to reflect on his fall from the heights of empire. It is a performance grounded in melancholy, and while it is accurate in that sense, I would argue it misses something crucial. Where is the fire? Even in my darkest moments, I never lost my spark, my belief in the inevitable turn of fortune. This film presents a man defeated, but I was never fully broken. Perhaps it is difficult to convey this complexity, but I expected a bit more defiance, a bit more of the Emperor who never stopped scheming, never stopped dreaming.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Now, onto the matter of the conspiracy. The film plays with the idea that my death was not what it seemed, that perhaps a daring escape was orchestrated, and that the man buried in my tomb was not me. Oh, how the romanticism of such a plot must thrill the hearts of modern audiences! But let me be clear—while I appreciate the notion that I might have escaped under the noses of the British, the reality of St. Helena was far less dramatic. The island was a prison of water and distance, surrounded by vigilant guards and ships. To think I might have staged a grand escape, as much as my ego might enjoy it, is little more than fanciful speculation. I was a prisoner, yes, but not of my own illusions.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Ah, but it is no wonder that the grand design of my reign, with its intricate web of politics and reform, is swept aside for the sake of action and the theater of war. Such is the nature of spectacle; it demands the roar of cannon over the quiet strokes of the quill. My Code, my reformation of education—these are the pillars upon which my empire was built, yet they do not stir the blood as the thundering of hooves and the clash of steel do. And so, I must wonder: when the final curtain falls, will they remember me as the architect of order and enlightenment, or simply as a conqueror clad in glory? It is, I think, the question that haunts all men of vision who are, in their time, reduced to mere legend.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>One thing the film does well is capture the suffocating atmosphere of St. Helena. The isolation, the endless gaze of the British guards, the weight of my exile—these are all palpable. The film’s use of the landscape as a metaphor for my own mental prison is effective. The desolation, the barren cliffs, the crashing waves—they mirror the slow, crushing passage of time that I endured.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>The character of Montholon, my loyal companion turned potential conspirator in the film, is portrayed intriguingly. His ambiguous loyalty adds an interesting layer to the narrative, though I find the notion that he would have played a part in any betrayal far-fetched. The men who stayed with me were loyal, and the bonds forged in the fires of war are not easily broken by such petty schemes. Nevertheless, I understand the need for dramatic tension.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>In terms of historical accuracy, <em>Monsieur N.</em> walks a fine line. The film portrays much of the final years of my exile with relative fidelity to the truth—the isolation, the gradual decline in health, the small moments of defiance against the British. But it stretches credulity when it begins to indulge in the "what ifs" of history. While I understand the appeal of revisionism, I was not a man content to live in the shadows. Had I escaped, the world would have known it. I would not have faded quietly into the night.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>In conclusion, <em>Monsieur N.</em> is a film that attempts to marry history with fantasy, and while it succeeds in presenting an intriguing "what if" scenario, it does not quite capture the full measure of who I was. It portrays a Napoleon who is beaten down by exile and regret, but it forgets that even in the twilight of my life, I remained a man of vision, ambition, and boundless pride. Still, I commend the filmmakers for daring to tell my story from a different angle, even if the conspiracy theories they propose are little more than a romantic dream.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>As for whether I escaped St. Helena, I will leave that for you to decide, dear readers. I will say this: legends, it seems, never die.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                ],

            ],

            [
                'contentable_type' => Review::class,
                'contentable_id' => 3,
                'name' => 'blocks',
                'value' => [
                    [
                        'data' => [
                            'text' => '<p>It is with a curious heart that I approached <em>Waterloo</em>—a film that attempts to dramatize the final chapter of my military career. Sergei Bondarchuk, the director, has taken upon himself the daunting task of recreating the climactic battle that sealed my fate, a moment that has been dissected and debated by historians for generations. Could a mere film possibly capture the scale, the strategy, and the sheer weight of what transpired on that fateful day in June 1815? As ever, I was skeptical, yet intrigued.</p>',
                            'title' => 'My dear readers,',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Let me begin with the portrayal of myself, for that is naturally the crux of the matter. Rod Steiger, the actor chosen to embody me, gives a performance that swings between brilliance and melodrama. There are moments when he captures the force of my personality—my iron will, my command over men, the burning fire of ambition that drove me across Europe. But then, there are times when he descends into theatrical excess. Steiger’s Napoleon is too often a man burdened by self-pity, his melancholy stretched too far. I was never a man to wallow in defeat before the battle was lost! Even in my darkest hour, I believed in victory. Steiger shows flashes of that drive, but not consistently enough for my taste.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>As for the battle scenes, Bondarchuk must be commended for his ambition. The scale is impressive—the cavalry charges, the infantry formations, the sheer spectacle of tens of thousands of men clashing on the fields of Waterloo. I could almost smell the gunpowder, feel the thunder of the horses beneath me once again. Yet, I must ask, where is the elegance of my strategy? The battle of Waterloo was not simply a brawl between two massive armies. It was a finely orchestrated chess game. My marshals, my placement of troops, my choice of the battlefield—all of this is glossed over in favor of spectacle. The film captures the chaos of war, but it misses the precision of command.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>Ah, and Wellington! Christopher Plummer’s Duke of Wellington is an admirable foe. Plummer portrays him as cool, detached, ever-calculating. It is true that Wellington was a worthy adversary, though the film portrays him with a level of heroic calm that I find rather amusing. He was a brilliant tactician, yes, but on that day, he was also a man clinging to the edge of defeat before the Prussians arrived. Still, Plummer does him justice.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => "<p>One moment that irked me was the film's portrayal of my fateful hesitation on the battlefield, where it suggests I delayed sending in the Imperial Guard. Yes, timing is everything in war, but the reasons for my decisions are far more complex than mere hesitation. The film reduces a moment of calculated risk into something akin to doubt. Let me assure you, I did not hesitate out of fear. The battlefield was a maelstrom, and the timing of every move was critical. To suggest that I faltered is to misunderstand the dynamics of command.</p>",
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>However, <em>Waterloo</em> is not without its merits. The film, despite its theatrical tendencies, evokes a sense of grandeur befitting the end of an era. The costumes, the sets, the landscapes—all are meticulously crafted. There is an air of finality to the film that echoes the gravity of the battle itself. But what it lacks, I believe, is the nuance of my mind. Bondarchuk captures the end of Napoleon the Emperor, but not Napoleon the strategist.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                    [
                        'data' => [
                            'text' => '<p>In conclusion, <em>Waterloo</em> is a film that seeks to immortalize my greatest defeat, and while it succeeds in its spectacle, it falters in portraying the true depth of my command and the complexity of my choices. Still, I appreciate the effort to preserve this decisive moment in history. It is, after all, the battle that the world remembers, even if the reasons for its outcome remain misunderstood by many.</p>',
                            'title' => '',
                        ],
                        'type' => 'common\\paragraph',
                    ],
                ],
            ],
        ];

        foreach ($contents as $content) {
            Content::create($content);
        }
    }
}
