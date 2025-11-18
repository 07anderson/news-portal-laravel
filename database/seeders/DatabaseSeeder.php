<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --- Usuarios existentes ---
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password123'),
        ]);

        User::factory()->create([
            'name' => 'Supervisor User',
            'email' => 'supervisor@example.com',
            'role' => 'supervisor',
            
        ]);

        User::factory()->create([
            'name' => 'Editor User',
            'email' => 'editor@example.com',
            'role' => 'editor',
            
        ]);

        User::factory()->create([
            'name' => 'Regular User',
            'email' => 'regular@example.com',
            'role' => 'regular',
            
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'admin',
            
        ]);

        // --- Categoría de prueba ---
        $category = Category::firstOrCreate(['name' => 'General']);

        // --- Noticias de prueba ---
        $admin = User::where('role', 'admin')->first();

        News::create([
            'title' => 'Primera noticia de prueba',
            'paragraph' => 'Contenido de ejemplo para la primera noticia.',
            'images' => [],
            'author_id' => $admin->id,
            'is_published' => true,
            'category_id' => $category->id,
            'views_count' => 0,
            'comments_enabled' => true
        ]);

        News::create([
            'title' => 'Segunda noticia de prueba',
            'paragraph' => 'Contenido de ejemplo para la segunda noticia.',
            'images' => [],
            'author_id' => $admin->id,
            'is_published' => true,
            'category_id' => $category->id,
            'views_count' => 0,
            'comments_enabled' => true
        ]);
    }
}
