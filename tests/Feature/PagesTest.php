<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    public function home_page_can_be_rendered()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function home_page_contains_required_elements()
    {
        $response = $this->get('/');

        $response->assertSee('Welcome'); // Ganti dengan teks yang ada di homepage
        $response->assertViewIs('home'); // Memastikan menggunakan view 'home.blade.php'
    }

    /** @test */
    public function home_page_loads_correct_view()
    {
        $view = $this->view('home');

        $view->assertSee('Welcome'); // Ganti dengan teks yang ada di homepage
    }
}
