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
                'title' => 'transeformer_create',
            ],
            [
                'id'    => 18,
                'title' => 'transeformer_edit',
            ],
            [
                'id'    => 19,
                'title' => 'transeformer_show',
            ],
            [
                'id'    => 20,
                'title' => 'transeformer_delete',
            ],
            [
                'id'    => 21,
                'title' => 'transeformer_access',
            ],
            [
                'id'    => 22,
                'title' => 'cb_create',
            ],
            [
                'id'    => 23,
                'title' => 'cb_edit',
            ],
            [
                'id'    => 24,
                'title' => 'cb_show',
            ],
            [
                'id'    => 25,
                'title' => 'cb_delete',
            ],
            [
                'id'    => 26,
                'title' => 'cb_access',
            ],
            [
                'id'    => 27,
                'title' => 'minibller_create',
            ],
            [
                'id'    => 28,
                'title' => 'minibller_edit',
            ],
            [
                'id'    => 29,
                'title' => 'minibller_show',
            ],
            [
                'id'    => 30,
                'title' => 'minibller_delete',
            ],
            [
                'id'    => 31,
                'title' => 'minibller_access',
            ],
            [
                'id'    => 32,
                'title' => 'box_create',
            ],
            [
                'id'    => 33,
                'title' => 'box_edit',
            ],
            [
                'id'    => 34,
                'title' => 'box_show',
            ],
            [
                'id'    => 35,
                'title' => 'box_delete',
            ],
            [
                'id'    => 36,
                'title' => 'box_access',
            ],
            [
                'id'    => 37,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 38,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 39,
                'title' => 'bill_create',
            ],
            [
                'id'    => 40,
                'title' => 'bill_edit',
            ],
            [
                'id'    => 41,
                'title' => 'bill_show',
            ],
            [
                'id'    => 42,
                'title' => 'bill_delete',
            ],
            [
                'id'    => 43,
                'title' => 'bill_access',
            ],
            [
                'id'    => 44,
                'title' => 'allnote_create',
            ],
            [
                'id'    => 45,
                'title' => 'allnote_edit',
            ],
            [
                'id'    => 46,
                'title' => 'allnote_delete',
            ],
            [
                'id'    => 47,
                'title' => 'allnote_access',
            ],
            [
                'id'    => 48,
                'title' => 'minibllarnote_create',
            ],
            [
                'id'    => 49,
                'title' => 'minibllarnote_edit',
            ],
            [
                'id'    => 50,
                'title' => 'minibllarnote_delete',
            ],
            [
                'id'    => 51,
                'title' => 'minibllarnote_access',
            ],
            [
                'id'    => 52,
                'title' => 'license_access',
            ],
            [
                'id'    => 53,
                'title' => 'lic_create',
            ],
            [
                'id'    => 54,
                'title' => 'lic_edit',
            ],
            [
                'id'    => 55,
                'title' => 'lic_show',
            ],
            [
                'id'    => 56,
                'title' => 'lic_delete',
            ],
            [
                'id'    => 57,
                'title' => 'lic_access',
            ],
            [
                'id'    => 58,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 59,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 60,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 61,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 62,
                'title' => 'electrical_access',
            ],
            [
                'id'    => 63,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 64,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 65,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 66,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 67,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 68,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 69,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 70,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 71,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 72,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 73,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 74,
                'title' => 'task_create',
            ],
            [
                'id'    => 75,
                'title' => 'task_edit',
            ],
            [
                'id'    => 76,
                'title' => 'task_show',
            ],
            [
                'id'    => 77,
                'title' => 'task_delete',
            ],
            [
                'id'    => 78,
                'title' => 'task_access',
            ],
            [
                'id'    => 79,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 80,
                'title' => 'esfelt_create',
            ],
            [
                'id'    => 81,
                'title' => 'esfelt_edit',
            ],
            [
                'id'    => 82,
                'title' => 'esfelt_show',
            ],
            [
                'id'    => 83,
                'title' => 'esfelt_delete',
            ],
            [
                'id'    => 84,
                'title' => 'esfelt_access',
            ],
            [
                'id'    => 85,
                'title' => 'close_create',
            ],
            [
                'id'    => 86,
                'title' => 'close_edit',
            ],
            [
                'id'    => 87,
                'title' => 'close_show',
            ],
            [
                'id'    => 88,
                'title' => 'close_delete',
            ],
            [
                'id'    => 89,
                'title' => 'close_access',
            ],
            [
                'id'    => 90,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 91,
                'title' => 'lic_add',
            ],

        ];

        Permission::insert($permissions);
    }
}
