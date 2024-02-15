<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Diskon;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Status;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin = Role::updateOrCreate(['name' => 'admin']);
        $kasir = Role::updateOrCreate(['name' => 'kasir']);

        for ($i = 1; $i < 11; $i++) {
            Category::create(['name' => "category-" . $i]);
        }

        for ($i = 1; $i < 11; $i++) {
            Status::create(['name' => "status-" . $i]);
        }

        for ($i = 1; $i < 11; $i++) {
            Outlet::create([
                'name' => "outlet-" . $i,
                'alamat' => 'alamat-' . $i,
                'no_tlp' => '08950000000' . $i,
            ]);
        }

        for ($i = 1; $i < 11; $i++) {
            Member::create([
                'name' => "member-" . $i,
                'alamat' => 'alamat-member-' . $i,
                'no_tlp' => '08960000000' . $i,
            ]);
        }

        User::create([
            'name' => "admin",
            'password' => Hash::make('admin123'),
            'outlet_id' => 1,
            'role_id' => 1,
        ]);

        User::create([
            'name' => "kasir",
            'password' => Hash::make('kasir123'),
            'outlet_id' => 1,
            'role_id' => 2,
        ]);

        for ($i = 1; $i < 11; $i++) {
            Package::create([
                'name' => "package-" . $i,
                'category_id' => $i,
                'harga' => $i . "000",
                'durasi' => $i,
                'min_order' => $i,
            ]);
        }

        Diskon::create(['name' => 'basedeals', 'amount' => '10000']);

        $permission = Permission::updateOrCreate(['name' => 'view_dashboard']);
        $kasirPermission = Permission::updateOrCreate(['name'=>'transaction']);

        $admin->givePermissionTo($permission);
        $kasir->givePermissionTo($kasirPermission);


        $role_admin = User::where('role_id', 1)->first();
        $role_kasir = User::where('role_id', 2)->first();

        $role_admin->assignRole('admin');
        $role_kasir->assignRole('kasir');
    }
}
