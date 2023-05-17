<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'vendors',
            function (Blueprint $table) {
                $table->id();
                $table->string('name')->comment('Tên');
                $table->string('email')->comment('email');
                $table->string('password')->comment('Mật khẩu');
                $table->string('identity_card')->comment('Căn cước công dân');
                $table->string('tax_code')->nullable()->comment('Mã số thuế cá nhân');
                $table->string('information_business')->nullable()->comment(
                    'Đường dẫn thông tin đăng ký kinh doanh: Giấy hộ gia đình, công ty'
                );
                $table->tinyInteger('is_system')->default(0)->comment('vendor này có thuộc hệ thống hay không');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
