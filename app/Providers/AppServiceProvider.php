<?php

namespace App\Providers;

use App\Repositories\v1\AccountRepository;
use App\Repositories\v1\BudgetRepository;
use App\Repositories\v1\CategoryRepository;
use App\Repositories\v1\FamilyMemberRepository;
use App\Repositories\v1\interfaces\AccountRepositoryInterface;
use App\Repositories\v1\interfaces\BudgetRepositoryInterface;
use App\Repositories\v1\interfaces\CategoryRepositoryInterface;
use App\Repositories\v1\interfaces\FamilyMemberRepositoryInterface;
use App\Repositories\v1\interfaces\OrganizationRepositoryInterface;
use App\Repositories\v1\interfaces\SubscriptionPlanRepositoryInterface;
use App\Repositories\v1\interfaces\TransactionRepositoryInterface;
use App\Repositories\v1\OrganizationRepository;
use App\Repositories\v1\SubscriptionPlanRepository;
use App\Repositories\v1\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(BudgetRepositoryInterface::class, BudgetRepository::class);
        $this->app->bind(FamilyMemberRepositoryInterface::class, FamilyMemberRepository::class);
        $this->app->bind(OrganizationRepositoryInterface::class, OrganizationRepository::class);
        $this->app->bind(SubscriptionPlanRepositoryInterface::class, SubscriptionPlanRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
