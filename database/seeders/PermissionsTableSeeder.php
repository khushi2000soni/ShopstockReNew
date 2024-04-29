<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $updateDate = $createDate = date('Y-m-d H:i:s');
        $permissions = [

            // [
            //     'name'      => 'permission_create',
            //     'guard_name'=>'web',
            //     'route_name'=>'permissions',
            //     'created_at' => $createDate,
            //     'updated_at' => $updateDate,
            // ],
            // [
            //     'name'      => 'permission_edit',
            //     'guard_name'=>'web',
            //     'route_name'=>'permissions',
            //     'created_at' => $createDate,
            //     'updated_at' => $updateDate,
            // ],
            // [
            //     'name'      => 'permission_show',
            //     'guard_name'=>'web',
            //     'route_name'=>'permissions',
            //     'created_at' => $createDate,
            //     'updated_at' => $updateDate,
            // ],
            // [
            //     'name'      => 'permission_delete',
            //     'guard_name'=>'web',
            //     'route_name'=>'permissions',
            //     'created_at' => $createDate,
            //     'updated_at' => $updateDate,
            // ],
            // [
            //     'name'      => 'permission_access',
            //     'guard_name'=>'web',
            //     'route_name'=>'permissions',
            //     'created_at' => $createDate,
            //     'updated_at' => $updateDate,
            // ],
            [
                'name'      => 'role_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'roles',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            // [
            //     'name'      => 'role_create',
            //     'title'      => 'Add',
            //     'guard_name'=>'web',
            //     'route_name'=>'roles',
            //     'created_at' => $createDate,
            //     'updated_at' => $updateDate,
            // ],
            [
                'name'      => 'role_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'roles',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'role_show',
                'title'      => 'View',
                'guard_name'=>'web',
                'route_name'=>'roles',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'profile_access',
                'title'      => 'View',
                'guard_name'=>'web',
                'route_name'=>'profiles',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'profile_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'profiles',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'user_change_password',
                'title'      => 'Change Password',
                'guard_name'=>'web',
                'route_name'=>'profiles',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'dashboard_widget_access',
                'title'      => 'Dashboard Widget Access',
                'guard_name'=>'web',
                'route_name'=>'dashboard',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'staff_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'staff',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'staff_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'staff',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'staff_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'staff',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'staff_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'staff',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'staff_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'staff',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'staff_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'staff',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'staff_rejoin',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'staff',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'customer_management_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'parties',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'customer_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'parties',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'customer_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'parties',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'customer_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'parties',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'customer_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'parties',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'customer_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'parties',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'customer_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'parties',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'master_access',
                'title'      => 'Master Menu Access',
                'guard_name'=>'web',
                'route_name'=>'master-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'category_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'categories',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'category_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'categories',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'category_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'categories',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'category_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'categories',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'category_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'categories',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'category_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'categories',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'group_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'groups',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'group_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'groups',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'group_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'groups',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'group_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'groups',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'group_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'groups',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'group_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'groups',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'group_undo',
                'title'      => 'Undo',
                'guard_name'=>'web',
                'route_name'=>'groups',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'area_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'areas',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'area_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'areas',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'area_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'areas',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'area_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'areas',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'area_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'areas',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'area_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'areas',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'products',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'products',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'products',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'products',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_undo',
                'title'      => 'Undo',
                'guard_name'=>'web',
                'route_name'=>'products',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'product_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'products',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'products',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'ip_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'ip-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'ip_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'ip-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'ip_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'ip-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'ip_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'ip-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'unit_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'unit-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'unit_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'unit-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'unit_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'unit-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'unit_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'unit-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'split_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'split-estimate',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'split_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'split-estimate',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'log_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'log-activities',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'log_view',
                'title'      => 'View',
                'guard_name'=>'web',
                'route_name'=>'log-activities',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'report_access',
                'title'      => 'Report Menu Access',
                'guard_name'=>'web',
                'route_name'=>'reports',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'report_customer_access',
                'title'      => 'Customer Report Menu Access',
                'guard_name'=>'web',
                'route_name'=>'reports',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'setting_access',
                'title'      => 'Setting Menu Access',
                'guard_name'=>'web',
                'route_name'=>'settings',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'setting_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'settings',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'transaction_management_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'transaction-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'transaction_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'transaction-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'transaction_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'transaction-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'transaction_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'transaction-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'transaction_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'transaction-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_management_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_show',
                'title'      => 'View Detail',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_cancelled_show',
                'title'      => 'View Cancelled Estimate Detail',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_history',
                'title'      => 'View History',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_ledger_print',
                'title'      => 'Print Ledger',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'estimate_statement_print',
                'title'      => 'Print Statement',
                'guard_name'=>'web',
                'route_name'=>'estimate-management',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
        ];

        Permission::insert($permissions);
    }
}
