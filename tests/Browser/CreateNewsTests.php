<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNewsTests extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', 'Какой-то текст заголовка')
                ->type('description', 'Тут описание')
                ->type('author', 'Автор новости')
                ->press('Отправить')
                ->assertSee('Новость успешно добавлена');
        });
    }
}
