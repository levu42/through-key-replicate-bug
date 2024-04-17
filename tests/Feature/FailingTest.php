<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Organization;
use Tests\TestCase;

class FailingTest extends TestCase
{
    public function test_example(): void
    {
        $organization = Organization::create();
        $department = Department::create(['organization_id' => $organization->id]);
        Employee::create(['department_id' => $department->id, 'name' => 'John']);

        $employee = $organization->employees()->first();

        $otherEmployee = $employee->replicate();
        $otherEmployee->name = 'Jane';
        $otherEmployee->save();
    }
}
