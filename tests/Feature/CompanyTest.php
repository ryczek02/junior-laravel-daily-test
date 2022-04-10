<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class CompanyTest extends TestCase
{
    /**
     * Test if user can index existing companies
     *
     * @return void
     */
    public function test_user_can_index_companies()
    {
        $user = \App\Models\User::factory()->create();
        $company = \App\Models\Company::factory()->createOne();

        $response = $this->actingAs($user)
            ->get('/companies');

        $response->assertSee($company->name);
    }

    /**
     * Test if user can create company
     *
     * @return void
     */
    public function test_user_can_visit_create_company_page()
    {
        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/companies/create');

        $response->assertStatus(200);
    }

    /**
     * Test if user can store company
     *
     * @return void
     */
    public function test_user_can_store_company()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user)->post('/companies', [
            'name' => 'Test',
            'logo' => UploadedFile::fake()->image('logo.png'),
            'email' => 'test@test.com',
            'website' => 'test.com'
        ])
            ->assertRedirect();
    }

    /**
     * Test if user can delete company
     *
     * @return void
     */
    public function test_user_can_delete_company()
    {
        $user = \App\Models\User::factory()->create();
        $company = \App\Models\Company::factory()->createOne();

        $response = $this->actingAs($user)
            ->delete('/companies/'.$company->id);

        $response->assertRedirect();
    }

    /**
     * Test if user can edit company
     *
     * @return void
     */
    public function test_user_can_visit_edit_company_page()
    {
        $user = \App\Models\User::factory()->create();
        $company = \App\Models\Company::factory()->createOne();

        $response = $this->actingAs($user)
            ->get('/companies/'.$company->id.'/edit');

        $response->assertStatus(200);
    }

    /**
     * Test if user can update company
     *
     * @return void
     */
    public function test_user_can_update_company()
    {
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user)->put('/companies/1', [
            'name' => 'Testx',
            'logo' => UploadedFile::fake()->image('logo.png'),
            'email' => 'test@test.com',
            'website' => 'test.com'
        ])
            ->assertRedirect();
    }
}
