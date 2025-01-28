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
        $repositories = [
            CategoryRepositoryInterface::class => CategoryRepository::class,
            AccountRepositoryInterface::class => AccountRepository::class,
            BudgetRepositoryInterface::class => BudgetRepository::class,
            FamilyMemberRepositoryInterface::class => FamilyMemberRepository::class,
            OrganizationRepositoryInterface::class => OrganizationRepository::class,
            SubscriptionPlanRepositoryInterface::class => SubscriptionPlanRepository::class,
            TransactionRepositoryInterface::class => TransactionRepository::class,
        ];
        foreach ($repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
