<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateStatus()
    {
        $response = $this->get('/parser/create');

        $response->assertStatus(200);
    }

    public function testIndexStatus()
    {
        $response = $this->get('/parser/create');

        $response->assertStatus(200);
    }

    public function testCreateToken()
    {
        $response = $this->get('/parser/create');
        $response->assertCookieNotExpired('XSRF-TOKEN');
    }

    public function testRedirection()
    {
        $response = $this->post(route('parser.store'));
        $response->assertRedirect(route('parser.index'));
        $response->assertSessionHas('success', 'Ваши данные успешно добавлены!');
    }

    public function testCreateForm() {
        $response = $this->get('/parser/create');
        $response->assertSee('form');
    }
}
