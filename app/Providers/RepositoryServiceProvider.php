<?php

namespace App\Providers;

use App\Interfaces\Repositories\HomeRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Interfaces\Repositories\PermissionRepositoryInterface;
use App\Interfaces\Repositories\RoleRepositoryInterface;
use App\Interfaces\Repositories\MemberRepositoryInterface;
use App\Interfaces\Repositories\StaffRepositoryInterface;
use App\Interfaces\Repositories\LocationRepositoryInterface;
use App\Interfaces\Repositories\DepartmentRepositoryInterface;
use App\Interfaces\Repositories\SubDepartmentRepositoryInterface;
use App\Interfaces\Repositories\GradeRepositoryInterface;
use App\Interfaces\Repositories\BloodGroupRepositoryInterface;
use App\Interfaces\Repositories\PositionRepositoryInterface;
use App\Interfaces\Repositories\EmployeeRepositoryInterface;
use App\Interfaces\Services\HomeServiceInterface;
use App\Repositories\HomeRepository;
use App\Repositories\UserRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\MemberRepository;
use App\Repositories\StaffRepository;
use App\Repositories\LocationRepository;
use App\Repositories\DepartmentRepository;
use App\Repositories\SubDepartmentRepository;
use App\Repositories\GradeRepository;
use App\Repositories\BloodGroupRepository;
use App\Repositories\PositionRepository;
use App\Repositories\EmployeeRepository;
use App\Services\HomeService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(HomeRepositoryInterface::class, HomeRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class); 
        $this->app->bind(SubDepartmentRepositoryInterface::class, SubDepartmentRepository::class);
        $this->app->bind(GradeRepositoryInterface::class, GradeRepository::class);
        $this->app->bind(BloodGroupRepositoryInterface::class, BloodGroupRepository::class);
        $this->app->bind(PositionRepositoryInterface::class, PositionRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(MemberRepositoryInterface::class, MemberRepository::class);
        $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);        
        $this->app->bind(HomeServiceInterface::class, HomeService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
