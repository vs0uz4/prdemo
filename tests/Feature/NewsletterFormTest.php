<?php

declare(strict_types=1);

use App\Http\Livewire\NewsletterForm;
use App\Models\Newsletter;
use function Pest\Livewire\livewire;

it('renders the component')
    ->get('/')
    ->assertSeeLivewire('newsletter-form');

it('registers a new subscriber', function () {
    livewire(NewsletterForm::class)
        ->set('name', 'Virgão')
        ->set('email', 'virgu@front-end-masters.com')
        ->call('submit')
        ->assertSee('Valeu DEV! Você não vai se arrepender!');

    expect(Newsletter::first())
        ->name->toBe('Virgão')
        ->email->toBe('virgu@front-end-masters.com');
});
