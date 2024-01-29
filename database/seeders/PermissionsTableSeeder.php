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
                'name'      => 'address_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'city',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'address_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'city',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'address_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'city',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'address_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'city',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'address_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'city',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'address_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'city',
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
                'name'      => 'phone_book_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'phone-book',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'phone_book_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'phone-book',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'phone_book_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'phone-book',
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
                'name'      => 'brand_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'brands',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'brand_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'brands',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'brand_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'brands',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'brand_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'brands',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'brand_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'brands',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'brand_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'brands',
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
                'route_name'=>'items',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'items',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'items',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'product_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'items',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_merge',
                'title'      => 'Merge',
                'guard_name'=>'web',
                'route_name'=>'items',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_print',
                'title'      => 'Print',
                'guard_name'=>'web',
                'route_name'=>'items',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'product_export',
                'title'      => 'Export',
                'guard_name'=>'web',
                'route_name'=>'items',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'device_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'devices',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'device_create',
                'title'      => 'Add',
                'guard_name'=>'web',
                'route_name'=>'devices',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'device_edit',
                'title'      => 'Edit',
                'guard_name'=>'web',
                'route_name'=>'devices',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'device_delete',
                'title'      => 'Delete',
                'guard_name'=>'web',
                'route_name'=>'devices',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],

            [
                'name'      => 'invoice_access',
                'title'      => 'Menu Access',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_filter',
                'title'      => 'Invoice Filter',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_date_filter',
                'title'      => 'Invoice Date Range Filter Access',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_recycle_access',
                'title'      => 'Recycle Button Access',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_create',
                'title'      => 'Invoice Add',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_edit',
                'title'      => 'Invoice Edit',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_show',
                'title'      => 'Invoice View',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_print',
                'title'      => 'Invoice Print',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_export',
                'title'      => 'Invoice Export',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_share',
                'title'      => 'Invoice Share',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_download',
                'title'      => 'Invoice Download',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_delete',
                'title'      => 'Invoice Delete',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'invoice_restore',
                'title'      => 'Deleted Invoice Restore',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'order_product_access',
                'title'      => 'Invoice Product Access',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'order_product_create',
                'title'      => 'Invoice Product Add',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'order_product_copy',
                'title'      => 'Invoice Product Copy',
                'guard_name'=>'web',
                'route_name'=>'invoice',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'order_product_delete',
                'title'      => 'Invoice Product Delete',
                'guard_name'=>'web',
                'route_name'=>'invoice',
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
                'name'      => 'report_category_access',
                'title'      => 'Category Report Menu Access',
                'guard_name'=>'web',
                'route_name'=>'reports',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'modified_menu_access',
                'title'      => 'Modified Menu Access',
                'guard_name'=>'web',
                'route_name'=>'modified-menu',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'modified_customer_access',
                'title'      => 'Modified Party Menu Access',
                'guard_name'=>'web',
                'route_name'=>'modified-menu',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'modified_customer_approve',
                'title'      => 'Modified Party Approve',
                'guard_name'=>'web',
                'route_name'=>'modified-menu',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'modified_customer_edit',
                'title'      => 'Modified Party Edit',
                'guard_name'=>'web',
                'route_name'=>'modified-menu',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'modified_product_access',
                'title'      => 'Modified Item Menu Access',
                'guard_name'=>'web',
                'route_name'=>'modified-menu',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'modified_product_approve',
                'title'      => 'Modified Item Approve',
                'guard_name'=>'web',
                'route_name'=>'modified-menu',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'modified_product_edit',
                'title'      => 'Modified Item Edit',
                'guard_name'=>'web',
                'route_name'=>'modified-menu',
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
                'name'      => 'setting_invoice_allow_days',
                'title'      => 'Settings Invoice Allow Days access',
                'guard_name'=>'web',
                'route_name'=>'settings',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'backup_access',
                'title'      => 'Backup Menu Access',
                'guard_name'=>'web',
                'route_name'=>'database-backup',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'backup_create',
                'title'      => 'Backup Create',
                'guard_name'=>'web',
                'route_name'=>'database-backup',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'backup_download',
                'title'      => 'Backup Download',
                'guard_name'=>'web',
                'route_name'=>'database-backup',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'backup_upload',
                'title'      => 'Backup Upload',
                'guard_name'=>'web',
                'route_name'=>'database-backup',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'backup_restore',
                'title'      => 'Backup Restore',
                'guard_name'=>'web',
                'route_name'=>'database-backup',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
            [
                'name'      => 'backup_delete',
                'title'      => 'Backup Delete',
                'guard_name'=>'web',
                'route_name'=>'database-backup',
                'created_at' => $createDate,
                'updated_at' => $updateDate,
            ],
        ];

        Permission::insert($permissions);
    }
}
