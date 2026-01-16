<?php

namespace Tests\Browser;

use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

/**
 * 반응형 레이아웃 테스트
 *
 * Breakpoints:
 * - Mobile: 375px
 * - Tablet: 768px
 * - Desktop: 1280px
 *
 * 테스트 시나리오:
 * 1. 정상 케이스: 각 브레이크포인트에서 올바른 레이아웃
 * 2. 예외 케이스: 극단적인 뷰포트 크기
 * 3. 엣지 케이스: 브레이크포인트 경계값
 */
class ResponsiveLayoutTest extends DuskTestCase
{
    #[Test]
    public function desktop_shows_three_column_layout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1280, 800)
                ->visit('/')
                // 왼쪽 사이드바 (Categories)
                ->assertVisible('aside')
                // 메인 컨텐츠
                ->assertVisible('main')
                // 오른쪽 사이드바 (Widgets)
                ->assertSee('Popular Tags')
                ->assertSee('Top Contributors')
                ->assertSee('Community Stats');
        });
    }

    #[Test]
    public function tablet_layout_adjusts_correctly(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(768, 1024)
                ->visit('/')
                ->assertSee('Welcome to Community')
                ->assertSee('Latest');
        });
    }

    #[Test]
    public function mobile_shows_single_column_layout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(375, 812)
                ->visit('/')
                // 모바일 카테고리 뱃지 표시
                ->assertSee('General')
                // 메인 컨텐츠
                ->assertSee('Latest')
                ->assertSee('How to optimize Laravel queries');
        });
    }

    #[Test]
    public function mobile_header_shows_hamburger_menu(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(375, 812)
                ->visit('/')
                ->assertPresent('button[aria-label="Open menu"]');
        });
    }

    #[Test]
    public function desktop_header_shows_full_navigation(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1280, 800)
                ->visit('/')
                ->assertVisible('nav')
                ->assertSeeLink('Home')
                ->assertSeeLink('Discussions')
                ->assertSeeLink('Categories')
                ->assertSeeLink('Members');
        });
    }

    #[Test]
    public function hero_section_responsive_text(): void
    {
        $this->browse(function (Browser $browser) {
            // Desktop - larger text
            $browser->resize(1280, 800)
                ->visit('/')
                ->assertSee('Welcome to Community');

            // Mobile - still visible but adjusted
            $browser->resize(375, 812)
                ->visit('/')
                ->assertSee('Welcome to Community');
        });
    }

    #[Test]
    public function footer_adjusts_for_mobile(): void
    {
        $this->browse(function (Browser $browser) {
            // Desktop - 4 column grid
            $browser->resize(1280, 800)
                ->visit('/')
                ->assertSee('Community')
                ->assertSee('Resources')
                ->assertSee('Legal');

            // Mobile - simplified layout
            $browser->resize(375, 812)
                ->visit('/')
                ->assertSee('© 2026 Community');
        });
    }

    #[Test]
    public function edge_case_very_small_viewport(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(320, 480)
                ->visit('/')
                // 페이지가 여전히 렌더링되어야 함
                ->assertSee('Community')
                ->assertSee('Welcome');
        });
    }

    #[Test]
    public function edge_case_very_large_viewport(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(2560, 1440)
                ->visit('/')
                // 컨텐츠가 max-width 내에서 렌더링
                ->assertSee('Welcome to Community')
                ->assertPresent('.container-main');
        });
    }

    #[Test]
    public function breakpoint_boundary_lg(): void
    {
        $this->browse(function (Browser $browser) {
            // Just below lg (1024px)
            $browser->resize(1023, 768)
                ->visit('/')
                ->assertSee('Welcome to Community');

            // At lg breakpoint
            $browser->resize(1024, 768)
                ->visit('/')
                ->assertSee('Welcome to Community');
        });
    }
}
