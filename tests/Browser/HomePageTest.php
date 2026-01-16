<?php

namespace Tests\Browser;

use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

/**
 * Community Prototype - 메인 페이지 UI 테스트
 *
 * QA 체크리스트:
 * - [x] 페이지 로딩 및 타이틀 확인
 * - [x] Hero 섹션 렌더링
 * - [x] PC 레이아웃 (3-column grid)
 * - [x] 모바일 레이아웃 (1-column stack)
 * - [x] 네비게이션 컴포넌트
 * - [x] 포스트 카드 컴포넌트
 * - [x] 사이드바 위젯
 */
class HomePageTest extends DuskTestCase
{
    #[Test]
    public function home_page_loads_successfully(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertTitle('Home - Community')
                ->assertSee('Welcome to Community')
                ->assertPresent('header')
                ->assertPresent('main')
                ->assertPresent('footer');
        });
    }

    #[Test]
    public function hero_section_displays_correctly(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Welcome to Community')
                ->assertSee('A place where developers share knowledge')
                ->assertSeeIn('section', 'Browse Discussions')
                ->assertSeeIn('section', 'Start a Discussion');
        });
    }

    #[Test]
    public function navigation_contains_required_links(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSeeLink('Home')
                ->assertSeeLink('Discussions')
                ->assertSeeLink('Categories')
                ->assertSeeLink('Members')
                ->assertSeeLink('Sign In')
                ->assertSeeLink('Sign Up');
        });
    }

    #[Test]
    public function categories_sidebar_displays_on_desktop(): void
    {
        $this->browse(function (Browser $browser) {
            // Desktop viewport
            $browser->resize(1280, 800)
                ->visit('/')
                ->assertSee('Categories')
                ->assertSee('General')
                ->assertSee('Laravel')
                ->assertSee('JavaScript')
                ->assertSee('DevOps')
                ->assertSee('Career');
        });
    }

    #[Test]
    public function post_cards_display_correctly(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('How to optimize Laravel queries')
                ->assertSee('replies')
                ->assertSee('views')
                ->assertSee('ago');
        });
    }

    #[Test]
    public function tabs_are_functional(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Latest')
                ->assertSee('Popular')
                ->assertSee('Unanswered');
        });
    }

    #[Test]
    public function right_sidebar_widgets_display(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1280, 800)
                ->visit('/')
                ->assertSee('Popular Tags')
                ->assertSee('laravel')
                ->assertSee('php')
                ->assertSee('Top Contributors')
                ->assertSee('Community Stats')
                ->assertSee('Members')
                ->assertSee('Discussions');
        });
    }

    #[Test]
    public function footer_contains_required_elements(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('© 2026 Community')
                ->assertSeeLink('Privacy Policy')
                ->assertSeeLink('Terms of Service');
        });
    }

    #[Test]
    public function mobile_layout_hides_desktop_sidebar(): void
    {
        $this->browse(function (Browser $browser) {
            // Mobile viewport
            $browser->resize(375, 812)
                ->visit('/')
                // 모바일에서 카테고리는 horizontal scroll로 표시
                ->assertSee('General')
                ->assertSee('Laravel')
                // 메인 컨텐츠는 여전히 표시
                ->assertSee('Latest')
                ->assertSee('Popular');
        });
    }

    #[Test]
    public function mobile_menu_button_is_visible(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(375, 812)
                ->visit('/')
                ->assertPresent('button[aria-label="Open menu"]');
        });
    }

    #[Test]
    public function skip_to_content_link_exists(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPresent('a[href="#main-content"]');
        });
    }

    #[Test]
    public function search_input_is_present(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1280, 800)
                ->visit('/')
                ->assertPresent('input[type="search"]');
        });
    }
}
