<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Label;
use App\View\Components\AuthCard;
use App\View\Components\Input;
use App\View\Components\Button;
use App\View\Components\AuthValidationErrors;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Post' => 'App\Policies\PostPolicy',
        'App\Models\Comment' => 'App\Policies\CommentPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Blade::component('auth-validation-errors', AuthValidationErrors::class);
        Blade::component('label', Label::class);
        Blade::component('auth-card', AuthCard::class);
        Blade::component('input', Input::class);
        Blade::component('button', Button::class);
        //
    }
}
