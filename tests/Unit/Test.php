<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        // Danh sach vendor kèm với 5 sản phẩm mới nhất
        $vendors = Vendor::query()->orderByDesc('id')->limit(5)->with('product')->get();

        // Danh sachs vendor có số lượng đặt hàng nhiều nhất trong vòng 1 tuần
        $reportsVendor = Order::query()->whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->groupBy('vendor_id')
            ->selectRaw('count() as count, vendor_id')
            ->get();
        $result = $reportsVendor->sortByDesc('count');
        $vendorIds = [];
        foreach ($result as $item) {
            $vendorIds[] = $item->vendor_id;
            if (count($vendors) === 5) {
                break;
            }
        }

        $vendorRanks = Vendor::query()->find($vendorIds);

        $this->assertTrue($vendors->count() > 0 && $vendorRanks->count() > 0);
    }
}
