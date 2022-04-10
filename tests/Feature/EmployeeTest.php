<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * Test if user can index existing companies
     *
     * @return void
     */
    public function test_user_can_index_employees()
    {
        $user = \App\Models\User::factory()->create();
        $company = \App\Models\Company::factory()->createOne();
        $employee = \App\Models\Employee::factory(['company_id' => $company->id])->createOne();

        $response = $this->actingAs($user)
            ->get('/employees');

        $response->assertSee($employee->email);
    }

    /**
     * Test if user can create company
     *
     * @return void
     */
    public function test_user_can_visit_create_employee_page()
    {
        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/employees/create');

        $response->assertStatus(200);
    }

    /**
     * Test if user can store employee
     *
     * @return void
     */
    public function test_user_can_store_employee()
    {
        $user = \App\Models\User::factory()->create();
        $company = \App\Models\Company::factory()->createOne();
        $this->actingAs($user)->post('/employees', [
            'first_name' => 'Test',
            'last_name' => 'Test',
            'company_id' => $company->id,
            'email' => 'test@test.com',
            'phone' => '123'
        ])
            ->assertRedirect();
    }

    /**
     * Test if user can delete company
     *
     * @return void
     */
    public function test_user_can_delete_employee()
    {
        $user = \App\Models\User::factory()->create();
        $company = \App\Models\Company::factory()->createOne();
        $employee = \App\Models\Employee::factory(['company_id' => $company->id])->createOne();

        $response = $this->actingAs($user)
            ->delete('/employees/'.$employee->id);

        $response->assertRedirect();
    }

    /**
     * Test if user can edit employee
     *
     * @return void
     */
    public function test_user_can_visit_edit_company_page()
    {
        $user = \App\Models\User::factory()->create();
        $company = \App\Models\Company::factory()->createOne();
        $employee = \App\Models\Employee::factory(['company_id' => $company->id])->createOne();

        $response = $this->actingAs($user)
            ->get('/employees/'.$employee->id.'/edit');

        $response->assertStatus(200);
    }

    /**
     * Test if user can update company
     *
     * @return void
     */
    public function test_user_can_update_employee()
    {
        $user = \App\Models\User::factory()->create();
        $company = \App\Models\Company::factory()->createOne();
        $employee = \App\Models\Employee::factory(['company_id' => $company->id])->createOne();
        $this->actingAs($user)->put('/employees/'.$employee->id, [
            'first_name' => 'Test',
            'last_name' => 'Test',
            'company_id' => $company->id,
            'email' => 'test@test.com',
            'phone' => '123'
        ])
            ->assertRedirect();
    }
}
