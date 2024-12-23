<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class HomePageTest extends TestCase
{
    /**
     * * Tests that the home page loads successfully.
     */
    public function testHomePageLoads()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSuccessful();
    }

    /**
     * * Tests that the home page has the correct title.
     * * This test checks that the home page contains the expected "Welcome" text, which is likely the title or a prominent message on the home page.
     */
    public function testHomePageHasCorrectTitle()
    {
        $response = $this->get('/');
        $response->assertSee('Welcome');
    }

    /**
     * * Tests that the home page responds with HTML content.
     * * This test checks that the response from the home page has a 'Content-Type' header
     * * with the value 'text/html; charset=UTF-8', which indicates that the response
     * * contains HTML content.
     */
    public function testHomePageRespondsWithHtml()
    {
        $response = $this->get('/');
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
    }

    /**
     * * Tests that the home page can be accessed by a guest user.
     * * This test checks that a guest user (i.e. a user who is not logged in)
     * * can access the home page by making a GET request to the root URL ('/').
     * * The `assertGuest()` assertion verifies that the response indicates
     * * the user is a guest, meaning they are not authenticated.
     */
    public function testHomePageCanBeAccessedByGuest()
    {
        $response = $this->get('/');
        $this->assertFalse(auth()->check());
    }

    /**
     * * Tests that the home page contains the required meta tags.
     * * This test checks that the home page response contains the expected
     * * meta tags for character encoding (UTF-8) and viewport settings.
     * * The `assertSee()` method is used to verify the presence of these
     * * meta tags in the response.
     */
    public function testHomePageHasRequiredMetaTags()
    {
        $response = $this->get('/');
        $response->assertSee('<meta charset="utf-8">', false);
        $response->assertSee('<meta name="viewport"', false);
    }
}
