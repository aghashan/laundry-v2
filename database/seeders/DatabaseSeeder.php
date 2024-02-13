<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Diskon;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Package;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'password' => "admin123",
            'outlet_id' => 1,
            'role' => "admin",
        ]);

        User::create([
            'name' => "kasir",
            'password' => "kasir123",
            'outlet_id' => 1,
            'role' => "kasir",
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

    }
}
