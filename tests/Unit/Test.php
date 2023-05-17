<?php

namespace Tests\Unit;

use App\Models\Vendor;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $result = Vendor::query()->orderByDesc('id')->limit(5)->with('product')->get();
        
        $this->assertTrue(true);
    }
}
