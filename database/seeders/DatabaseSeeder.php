<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Package;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Role seeder
        $admin = Role::updateOrCreate(['name' => 'admin']);
        $kasir = Role::updateOrCreate(['name' => 'kasir']);

        // Category seeder
        for ($i = 1; $i < 11; $i++) {
            Category::create(['name' => "category-" . $i]);
        }

        // Status seeder
        for ($i = 1; $i < 11; $i++) {
            Status::create(['name' => "status-" . $i]);
        }

        // Outlet seeder
        for ($i = 1; $i < 11; $i++) {
            Outlet::create([
                'name' => "outlet-" . $i,
                'alamat' => 'alamat-' . $i,
                'no_tlp' => '08950000000' . $i,
            ]);
        }

        // Member seeder
        for ($i = 1; $i < 11; $i++) {
            Member::create([
                'name' => "member-" . $i,
                'alamat' => 'alamat-member-' . $i,
                'no_tlp' => '08960000000' . $i,
            ]);
        }

        // User admin seeder
        User::create([
            'name' => "admin",
            'password' => Hash::make('admin123'),
            'outlet_id' => 1,
            'role_id' => 1,
        ]);

        // User kasir seeder
        User::create([
            'name' => "kasir",
            'password' => Hash::make('kasir123'),
            'outlet_id' => 1,
            'role_id' => 2,
        ]);

        // Package seeder
        for ($i = 1; $i < 11; $i++) {
            Package::create([
                'name' => "package-" . $i,
                'category_id' => $i,
                'harga' => $i . "000",
                'durasi' => $i,
                'min_order' => $i,
            ]);
        }

        //Permiison seeder
        $superpermission = Permission::updateOrCreate(['name' => 'view_dashboard']);
        $Transaction = Permission::updateOrCreate(['name' => 'transaction']);

        //GivePermision seeder
        $admin->givePermissionTo($superpermission);
        $kasir->givePermissionTo($Transaction);

        // $role_admin = User::where('role_id', 1)->first();
        // $role_kasir = User::where('role_id', 2)->first();

        // $role_admin->assignRole('admin');
        // $role_kasir->assignRole('kasir');
    }
}
