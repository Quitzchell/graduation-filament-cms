<?php

use App\Cms\Templates\HomeTemplate;
use App\Filament\Resources\PageResource\Pages\CreatePage;
use Filament\Forms\Components\Builder;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->artisan('migrate:fresh');
});

it('can fill a page with the homepage template', function () {
    $undoBuilderFake = Builder::fake();

    livewire(CreatePage::class)
        ->fillForm([
            'name' => 'Name of the page',
            'template' => HomeTemplate::class,
        ])
        ->fillForm([
            'blocks' => [
                [
                    'type' => 'paragraph',
                    'data' => [
                        'namespace' => 'Common',
                        'title' => 'This is a title on the paragraph block',
                        'text' => 'This is a text on the paragraph block',
                    ],
                ],
                [
                    'data' => [
                        'namespace' => 'Common',
                        'text' => 'Text on the Call to Action block',
                        'title' => 'Title on the Call to Action block',
                        'urlable_id' => 'App\\Models\\Page:1',
                        'button_text' => 'Button Text on the Call to Action block',
                    ],
                    'type' => 'callToAction',
                ],
            ],
        ])
        ->assertFormFieldExists('header_title')
        ->assertFormSet(['name' => 'Name of the page'])
        ->assertFormFieldExists('header_image')
        ->assertFormFieldExists('blocks')
        ->assertFormSet([
            'blocks' => [
                [
                    'type' => 'paragraph',
                    'data' => [
                        'namespace' => 'Common',
                        'title' => 'This is a title on the paragraph block',
                        'text' => 'This is a text on the paragraph block',
                    ],
                ],
                [
                    'data' => [
                        'namespace' => 'Common',
                        'text' => 'Text on the Call to Action block',
                        'title' => 'Title on the Call to Action block',
                        'urlable_id' => 'App\\Models\\Page:1',
                        'button_text' => 'Button Text on the Call to Action block',
                    ],
                    'type' => 'callToAction',
                ],
            ],
        ]);

    $undoBuilderFake();
});
