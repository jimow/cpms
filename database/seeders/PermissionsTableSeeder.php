<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'project_create',
            ],
            [
                'id'    => 18,
                'title' => 'project_edit',
            ],
            [
                'id'    => 19,
                'title' => 'project_show',
            ],
            [
                'id'    => 20,
                'title' => 'project_delete',
            ],
            [
                'id'    => 21,
                'title' => 'project_access',
            ],
            [
                'id'    => 22,
                'title' => 'county_create',
            ],
            [
                'id'    => 23,
                'title' => 'county_edit',
            ],
            [
                'id'    => 24,
                'title' => 'county_show',
            ],
            [
                'id'    => 25,
                'title' => 'county_delete',
            ],
            [
                'id'    => 26,
                'title' => 'county_access',
            ],
            [
                'id'    => 27,
                'title' => 'sub_county_create',
            ],
            [
                'id'    => 28,
                'title' => 'sub_county_edit',
            ],
            [
                'id'    => 29,
                'title' => 'sub_county_show',
            ],
            [
                'id'    => 30,
                'title' => 'sub_county_delete',
            ],
            [
                'id'    => 31,
                'title' => 'sub_county_access',
            ],
            [
                'id'    => 32,
                'title' => 'ward_create',
            ],
            [
                'id'    => 33,
                'title' => 'ward_edit',
            ],
            [
                'id'    => 34,
                'title' => 'ward_show',
            ],
            [
                'id'    => 35,
                'title' => 'ward_delete',
            ],
            [
                'id'    => 36,
                'title' => 'ward_access',
            ],
            [
                'id'    => 37,
                'title' => 'ministry_create',
            ],
            [
                'id'    => 38,
                'title' => 'ministry_edit',
            ],
            [
                'id'    => 39,
                'title' => 'ministry_show',
            ],
            [
                'id'    => 40,
                'title' => 'ministry_delete',
            ],
            [
                'id'    => 41,
                'title' => 'ministry_access',
            ],
            [
                'id'    => 42,
                'title' => 'department_create',
            ],
            [
                'id'    => 43,
                'title' => 'department_edit',
            ],
            [
                'id'    => 44,
                'title' => 'department_show',
            ],
            [
                'id'    => 45,
                'title' => 'department_delete',
            ],
            [
                'id'    => 46,
                'title' => 'department_access',
            ],
            [
                'id'    => 47,
                'title' => 'financial_year_create',
            ],
            [
                'id'    => 48,
                'title' => 'financial_year_edit',
            ],
            [
                'id'    => 49,
                'title' => 'financial_year_show',
            ],
            [
                'id'    => 50,
                'title' => 'financial_year_delete',
            ],
            [
                'id'    => 51,
                'title' => 'financial_year_access',
            ],
            [
                'id'    => 52,
                'title' => 'feedback_create',
            ],
            [
                'id'    => 53,
                'title' => 'feedback_edit',
            ],
            [
                'id'    => 54,
                'title' => 'feedback_show',
            ],
            [
                'id'    => 55,
                'title' => 'feedback_delete',
            ],
            [
                'id'    => 56,
                'title' => 'feedback_access',
            ],
            [
                'id'    => 57,
                'title' => 'setting_access',
            ],
            [
                'id'    => 58,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
