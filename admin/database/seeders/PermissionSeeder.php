<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            'Roles' => [
                'role-list',
                'role-create',
                'role-edit',
                'role-delete',
            ],

            'Permissions' => [
                'permission-list',
            ],

            'Users' => [
                'user-list',
                'user-create',
                'user-edit',
                'user-delete',
                'user-restore',
                'user-force-delete',
            ],

            'Categories' => [
                'category-list',
                'category-create',
                'category-edit',
                'category-delete',
                'category-restore',
                'category-force-delete',
            ],

            'Subcategories' => [
                'subcategory-list',
                'subcategory-create',
                'subcategory-edit',
                'subcategory-delete',
                'subcategory-restore',
                'subcategory-force-delete',
            ],

            'Tags' => [
                'tag-list',
                'tag-create',
                'tag-edit',
                'tag-delete',
                'tag-restore',
                'tag-force-delete',
            ],

            'Courses' => [
                'course-list',
                'course-create',
                'course-edit',
                'course-delete',
                'course-restore',
                'course-force-delete',
            ],

            'Notifications' => [
                'notification-list',
                'notification-create',
                'notification-edit',
                'notification-delete',
                'notification-restore',
                'notification-force-delete',
            ],

            'Reviews' => [
                'review-list',
                'review-create',
                'review-edit',
                'review-delete',
                'review-restore',
                'review-force-delete',
            ],

            'Queries' => [
                'query-list',
                'query-create',
                'query-edit',
                'query-delete',
                'query-restore',
                'query-force-delete',
            ],

            'Support Tickets' => [
                'support-list',
                'support-create',
                'support-edit',
                'support-delete',
                'support-restore',
                'support-force-delete',
            ],

            'Payment Gateway Settings' => [
                'payment-gateway-view',
                'payment-gateway-update',
            ],

            'General Settings' => [
                'setting-general-view',
                'setting-general-update',
            ],

            'SEO Settings' => [
                'seo-setting-view',
                'seo-setting-update',
            ],
        ];

        // Create permissions with group
        foreach ($groups as $groupName => $permissions) {
            foreach ($permissions as $permission) {
                Permission::firstOrCreate([
                    'name'       => $permission,
                    'group'      => $groupName,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}
