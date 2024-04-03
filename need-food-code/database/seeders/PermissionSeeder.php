<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = Permission::upsert([
            ['name' => 'dashboard.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Dashboard'],

            ['name' => 'categories.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Categories'],
            ['name' => 'categories.create', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Categories'],
            ['name' => 'categories.store', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Categories'],
            ['name' => 'categories.show', 'guard_name' => 'web', 'slug' => 'Show', 'table_name' => 'Categories'],
            ['name' => 'categories.edit', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Categories'],
            ['name' => 'categories.update', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Categories'],
            ['name' => 'categories.destroy', 'guard_name' => 'web', 'slug' => 'Delete', 'table_name' => 'Categories'],

            ['name' => 'requests.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Donation Requests'],
            ['name' => 'requests.create', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Donation Requests'],
            ['name' => 'requests.store', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Donation Requests'],
            ['name' => 'requests.show', 'guard_name' => 'web', 'slug' => 'Show', 'table_name' => 'Donation Requests'],
            ['name' => 'requests.edit', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Donation Requests'],
            ['name' => 'requests.update', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Donation Requests'],
            ['name' => 'requests.destroy', 'guard_name' => 'web', 'slug' => 'Delete', 'table_name' => 'Donation Requests'],
            ['name' => 'requests-archive.archive', 'guard_name' => 'web', 'slug' => 'Archive', 'table_name' => 'Donation Requests'],
            ['name' => 'requests-donors.index', 'guard_name' => 'web', 'slug' => 'View Donors', 'table_name' => 'Donation Requests'],
            ['name' => 'requests-archive.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Archived Requests'],
            ['name' => 'requests-archive.unarchive', 'guard_name' => 'web', 'slug' => 'UnArchive', 'table_name' => 'Archived Requests'],


            ['name' => 'unverified-donations.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Approve Donations of Request'],
            ['name' => 'edit-status.update', 'guard_name' => 'web', 'slug' => 'Approve', 'table_name' => 'Approve Donations of Request'],

            ['name' => 'donations.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Donation'],
            ['name' => 'donations.create', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Donation'],
            ['name' => 'donations.store', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Donation'],
            ['name' => 'donations.show', 'guard_name' => 'web', 'slug' => 'Show', 'table_name' => 'Donation'],
            ['name' => 'donations.edit', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Donation'],
            ['name' => 'donations.update', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Donation'],
            ['name' => 'donations.destroy', 'guard_name' => 'web', 'slug' => 'Delete', 'table_name' => 'Donation'],
            ['name' => 'donations-archive.archive', 'guard_name' => 'web', 'slug' => 'Archive', 'table_name' => 'Donation'],
            ['name' => 'donations-receiver.index', 'guard_name' => 'web', 'slug' => 'View Receiver', 'table_name' => 'Donation'],
            ['name' => 'approve-donations.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Approve Donations'],
            ['name' => 'edit-donation-status.update', 'guard_name' => 'web', 'slug' => 'Approve', 'table_name' => 'Approve Donations'],
            ['name' => 'donations-archive.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Archived Donations'],
            ['name' => 'donations-archive.unarchive', 'guard_name' => 'web', 'slug' => 'UnArchive', 'table_name' => 'Archived Donations'],



//            for role-permissions
            ['name' => 'role-permissions.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Role Permissions'],
            ['name' => 'role-permissions.create', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Role Permissions'],
            ['name' => 'role-permissions.store', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Role Permissions'],
            ['name' => 'role-permissions.edit', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Role Permissions'],
            ['name' => 'role-permissions.update', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Role Permissions'],
            ['name' => 'role-permissions.destroy', 'guard_name' => 'web', 'slug' => 'Delete', 'table_name' => 'Role Permissions'],

//            Users Management
            ['name' => 'users.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Users'],
            ['name' => 'users.create', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Users'],
            ['name' => 'users.store', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Users'],
            ['name' => 'users.show', 'guard_name' => 'web', 'slug' => 'Show', 'table_name' => 'Users'],
            ['name' => 'users.edit', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Users'],
            ['name' => 'users.update', 'guard_name' => 'web', 'slug' => 'Edit', 'table_name' => 'Users'],
            ['name' => 'users.destroy', 'guard_name' => 'web', 'slug' => 'Delete', 'table_name' => 'Users'],
            ['name' => 'users-total-donations.index', 'guard_name' => 'web', 'slug' => 'View Donations', 'table_name' => 'Users'],
            ['name' => 'users-total-requests.index', 'guard_name' => 'web', 'slug' => 'View Requests', 'table_name' => 'Users'],

//Collaboration Permissions
            ['name' => 'organizations.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Organizations'],
            ['name' => 'make-collaboration.create', 'guard_name' => 'web', 'slug' => 'Collaborate', 'table_name' => 'Organizations'],
            ['name' => 'store-collaboration.store', 'guard_name' => 'web', 'slug' => 'Collaborate', 'table_name' => 'Organizations'],
            ['name' => 'collaborations.index', 'guard_name' => 'web', 'slug' => 'View Collaboration', 'table_name' => 'Organizations'],
            ['name' => 'accept-collaboration.update', 'guard_name' => 'web', 'slug' => 'Accept Collaboration', 'table_name' => 'Organizations'],

//            For frontend of system
            ['name' => 'frontend.requests.create', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Website Donation Request'],
            ['name' => 'frontend.requests.store', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Website Donation Request'],
            ['name' => 'frontend.make-donation.store', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Website Make Donation'],
            ['name' => 'frontend.your-requests.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Website Your Request'],
            ['name' => 'frontend.your-requests.show', 'guard_name' => 'web', 'slug' => 'Show', 'table_name' => 'Website Your Request'],

//            Donation
            ['name' => 'frontend.donations.create', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Website Donation Page'],
            ['name' => 'frontend.donations.store', 'guard_name' => 'web', 'slug' => 'Create', 'table_name' => 'Website Donation Page'],
            ['name' => 'frontend.donations.show', 'guard_name' => 'web', 'slug' => 'Show', 'table_name' => 'Website Donation Page'],
            ['name' => 'frontend.make-donations.store', 'guard_name' => 'web', 'slug' => 'Make Donation', 'table_name' => 'Website Donation Page'],
            ['name' => 'frontend.accept-donation.store', 'guard_name' => 'web', 'slug' => 'Accept', 'table_name' => 'Website Donation Page'],
            ['name' => 'frontend.your-donations.index', 'guard_name' => 'web', 'slug' => 'View', 'table_name' => 'Website Your Donation Page'],





        ], ['name']);
        $permission = Permission::all();


        $role  = Role::firstOrCreate(['name' => 'admin']);

        $role->syncPermissions($permission);

//        for website permissions
        $permission = Permission::where('name', 'LIKE', 'frontend.%')->get();

        $role = Role::firstOrCreate(['name' => 'user']);
        $role->syncPermissions($permission);

    }
}
