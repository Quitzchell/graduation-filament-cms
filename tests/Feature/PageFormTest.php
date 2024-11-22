<?php

use App\Cms\Templates\Enums\Templates;
use App\Filament\Resources\PageResource\Pages\CreatePage;
use Filament\Forms\Components\Builder;
use function Pest\Livewire\livewire;


it('can fill a page with the homepage template', function () {
    $undoBuilderFake = Builder::fake();

    livewire(CreatePage::class)
        ->fillForm([
            'title' => 'Title of the page',
            'template' => Templates::HOMEPAGE->value,
        ])
        ->fillForm([
            'blocks' => [
                [
                    'type' => 'common\\paragraph',
                    'data' => [
                        'title' => 'This is a title on the paragraph block',
                        'text' => 'This is a text on the paragraph block',
                    ]
                ],
                [
                    'type' => 'common\\map',
                    'data' => [
                        'text' => 'This is a text on the map block',
                        'title' => 'This is a title on the map block',
                        'address' => [
                            'lat' => 52.337801,
                            'lng' => 4.8339572,
                            'formatted' => 'Claude Debussylaan 34, 15th Floor, 1082 MD Amsterdam',
                            'formatted_address' => 'Claude Debussylaan 34, 15th Floor, 1082 MD Amsterdam'
                        ],
                        'location' => [
                            'lat' => 52.337801,
                            'lng' => 4.8339572,
                        ],
                    ],
                ],
                [
                    'data' => [
                        'text' => 'Text on the Call to Action block',
                        'title' => 'Title on the Call to Action block',
                        'urlable_id' => 'App\\Models\\Page:1',
                        'button_text' => 'Button Text on the Call to Action block',
                    ],
                    'type' => 'common\\callToAction',
                ],
            ],
        ])
        ->assertFormFieldExists('header_title')
        ->assertFormSet(['title' => 'Title of the page',])
        ->assertFormFieldExists('header_image')
        ->assertFormFieldExists('blocks')
        ->assertFormSet([
            'blocks' => [
                [
                    'type' => 'common\\paragraph',
                    'data' => [
                        'title' => 'This is a title on the paragraph block',
                        'text' => 'This is a text on the paragraph block',
                    ],
                ],
                [
                    'type' => 'common\\map',
                    'data' => [
                        'text' => 'This is a text on the map block',
                        'title' => 'This is a title on the map block',
                        'address' => [
                            'lat' => 52.337801,
                            'lng' => 4.8339572,
                            'formatted' => 'Claude Debussylaan 34, 15th Floor, 1082 MD Amsterdam',
                            'formatted_address' => 'Claude Debussylaan 34, 15th Floor, 1082 MD Amsterdam'
                        ],
                        'location' => [
                            'lat' => 52.337801,
                            'lng' => 4.8339572,
                        ],
                    ],
                ],
                [
                    'data' => [
                        'text' => 'Text on the Call to Action block',
                        'title' => 'Title on the Call to Action block',
                        'urlable_id' => 'App\\Models\\Page:1',
                        'button_text' => 'Button Text on the Call to Action block',
                    ],
                    'type' => 'common\\callToAction',
                ],
            ],
        ]);

    $undoBuilderFake();
});
