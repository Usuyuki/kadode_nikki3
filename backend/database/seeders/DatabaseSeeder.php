<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AppearanceTableSeeder::class);
        $this->call(User_rankTableSeeder::class);
        $this->call(User_roleTableSeeder::class);

        $this->call(Releasenote_genreTableSeeder::class);
        $this->call(ReleasenoteTableSeeder::class);
        $this->call(Osirase_genreTableSeeder::class);
        $this->call(OsiraseTableSeeder::class);
        if (app()->isLocal() || app()->runningUnitTests()) {
            $this->call(UserTableSeeder::class);
            $this->call(DiaryTableSeeder::class);
        }
        $this->call(NERLabelSeeder::class);
        if (app()->isLocal() || app()->runningUnitTests()) {
            $this->call(NlpPackageGenreTableSeeder::class);
            $this->call(NlpPackageNameTableSeeder::class);
            $this->call(PackageNERTableSeeder::class);
            $this->call(NlpPackageUserTableSeeder::class);
            $this->call(CustomNERTableSeeder::class);
        }
    }
}