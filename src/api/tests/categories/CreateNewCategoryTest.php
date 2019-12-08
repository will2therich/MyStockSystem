<?php

use Illuminate\Support\Facades\Mail;


class CreateNewCategoryTest extends \Tests\AbstractTestCase
{
    public function testCreateNewCategory() {
        $postData = [
            'name' => 'New Category'
        ];

        $this->makeRequestWithAuth('POST', '/api/categories', $postData)
            ->assertStatus(204);

        $this->makeRequestWithAuth('GET', '/api/categories')
            ->assertSee('New Category');
    }
}
