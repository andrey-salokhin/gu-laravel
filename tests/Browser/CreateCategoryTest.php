<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('title', 'Какой-то текст заголовка')
                ->type('description', 'Тут описание')
                ->press('Отправить')
                ->assertPathIs('/categories');
        });
    }

    public function testCreationNegative(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('title', 'Какой-то текст заголовка и много букв йцуенгшщзфываполдячсмитьбю')
                ->type('description', 'Тут описание')
                ->press('Отправить')
                ->assertSee('Количество символов в поле заголовок не может превышать');
        });
    }
}
