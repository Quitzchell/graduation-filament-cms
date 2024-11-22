<?php

use App\Cms\Templates\Enums\Templates;
use App\Filament\Resources\PageResource\Pages\CreatePage;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use function Pest\Livewire\livewire;


it('can load homepage template', function () {
    $undoBuilderFake = Builder::fake();

    livewire(CreatePage::class)
        ->fillForm([
            'template' => Templates::HOMEPAGE->value,
        ])
        ->fillForm([
            'blocks' => [
                [
                    'type' => 'common\\paragraph',
                    'data' => [
                        'title' => 'This is a title',
                        'text' => 'This is a text',
                    ]
                ]
            ]
        ])->assertFormFieldExists('header_title')
        ->assertFormFieldExists('header_image')
        ->assertFormFieldExists('blocks')
        ->assertFormSet([
            'blocks' => [
                [
                    'type' => 'common\\paragraph',
                    'data' => [
                        'title' => 'This is a title',
                        'text' => 'This is a text',
                    ]
                ]
            ]
        ]);

    $undoBuilderFake();
});
