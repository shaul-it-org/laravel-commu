<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureSentryUserContext();
    }

    /**
     * Sentry에 사용자 컨텍스트 설정
     */
    private function configureSentryUserContext(): void
    {
        if (! app()->bound('sentry')) {
            return;
        }

        Auth::resolved(function ($auth) {
            $auth->extend('sentry', function () use ($auth) {
                return $auth;
            });
        });

        // 인증된 사용자 정보를 Sentry에 전달
        $this->app->booted(function () {
            \Sentry\configureScope(function (\Sentry\State\Scope $scope): void {
                if (Auth::check()) {
                    $user = Auth::user();
                    $scope->setUser([
                        'id' => $user->id,
                        'email' => $user->email,
                        'username' => $user->name ?? null,
                    ]);
                }
            });
        });
    }
}
