<?php

use App\Models\Page;

beforeEach(function () {
    $this->artisan('migrate');
});

it('can generate URI and URL correctly', function () {
    // Arrange
    $page = Page::create([
        'name' => 'Test',
        'uri' => 'test',
        'template' => null, // not important for this test
    ]);

    // Act
    $uri = $page->uri();
    $url = $page->url();

    // Assert
    expect($uri)->toBe('test')
        ->and($url)->toBe(url('test'))
        ->and($url)->toBe(config('app.url') . '/test');
});
