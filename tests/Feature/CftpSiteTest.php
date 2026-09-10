<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\GalleryPhoto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CftpSiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(\Database\Seeders\DatabaseSeeder::class);
    }

    public function test_home_page_renders_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Centre de formation technique et professionnelle');
        $response->assertSee('Apprendre un métier');
    }

    public function test_home_page_shows_latest_published_articles(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Actualités');
        $response->assertSee('Ouverture des inscriptions');
    }

    public function test_admissions_page_renders_successfully(): void
    {
        $response = $this->get('/admissions');
        $response->assertStatus(200);
        $response->assertSee('Rejoindre le CFTP-MA');
        $response->assertSee('Conditions d\'admission', false);
        $response->assertSee('Cycle long');
        $response->assertSee('Cycle court');
    }

    public function test_about_page_renders_successfully(): void
    {
        $response = $this->get('/a-propos');
        $response->assertStatus(200);
        $response->assertSee('Notre engagement pour la jeunesse de Lomé');
        $response->assertSee('19 septembre 1989');
    }

    public function test_gallery_page_renders_successfully(): void
    {
        $response = $this->get('/galerie');
        $response->assertStatus(200);
        $response->assertSee('La vie du centre en images');
        $response->assertSee('data-category="ateliers"', false);
    }

    public function test_articles_index_page_renders_successfully(): void
    {
        $response = $this->get('/actualites');
        $response->assertStatus(200);
        $response->assertSee('Les actualités du CFTP-MA');
    }

    public function test_article_detail_page_renders_for_existing_slug(): void
    {
        $article = Article::published()->first();
        $this->assertNotNull($article);

        $response = $this->get('/actualites/' . $article->slug);
        $response->assertStatus(200);
        $response->assertSee($article->title);
        $response->assertSee('Retour aux actualités');
    }

    public function test_article_detail_returns_404_for_invalid_slug(): void
    {
        $response = $this->get('/actualites/slug-inexistant-404-test');
        $response->assertStatus(404);
    }

    public function test_draft_articles_are_not_publicly_visible(): void
    {
        $draft = Article::create([
            'title' => 'Article Brouillon Secret',
            'slug' => 'article-brouillon-secret',
            'excerpt' => 'Brouillon',
            'body' => '<p>Secret</p>',
            'status' => 'draft',
            'published_at' => now()->subDay(),
        ]);

        $responseIndex = $this->get('/actualites');
        $responseIndex->assertDontSee('Article Brouillon Secret');

        $responseDetail = $this->get('/actualites/' . $draft->slug);
        $responseDetail->assertStatus(404);

        $draft->delete();
    }

    public function test_contact_page_renders_minimal_construction_page(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Nous contacter');
        $response->assertSee('+228 97 66 86 08');
        $response->assertSee('+228 93 00 77 90');
    }

    public function test_admin_panel_is_protected(): void
    {
        $response = $this->get('/admin');
        // Filament redirects unauthenticated users to the admin login page
        $response->assertRedirect();
        $this->assertTrue(
            str_contains($response->headers->get('Location'), '/admin/login')
        );
    }

    public function test_admin_can_access_panel_when_authenticated(): void
    {
        $admin = User::where('email', env('ADMIN_EMAIL', 'admin@cftp-ma.tg'))->first();
        $this->assertNotNull($admin);

        $response = $this->actingAs($admin)->get('/admin');
        $response->assertStatus(200);
    }
}
