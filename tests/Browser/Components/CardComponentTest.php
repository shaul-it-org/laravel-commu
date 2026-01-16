<?php

namespace Tests\Browser\Components;

use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

/**
 * Card 컴포넌트 테스트
 *
 * 테스트 항목:
 * - 기본 렌더링
 * - Header/Body/Footer slots
 * - Hover 효과
 * - Clickable card (href)
 */
class CardComponentTest extends DuskTestCase
{
    #[Test]
    public function card_renders_with_correct_structure(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPresent('.card')
                ->assertPresent('.card-body');
        });
    }

    #[Test]
    public function card_header_renders_when_provided(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1280, 800)
                ->visit('/')
                ->assertPresent('.card-header');
        });
    }

    #[Test]
    public function clickable_cards_are_links(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPresent('a.card');
        });
    }

    #[Test]
    public function cards_have_hover_shadow_effect(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPresent('.card.hover\\:shadow-md');
        });
    }
}
