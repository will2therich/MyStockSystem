<?php

use Illuminate\Support\Facades\Mail;


class GetAllCategoriesTest extends \Tests\AbstractTestCase
{
    public function testCreateNewUserEmailVerification() {
        $category = factory(\App\Models\Categories::class)->create();

        $this->makeRequestWithAuth('GET', '/api/categories')
            ->assertSee($category->name);
    }
}
