<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoEmployer extends Model
{
    use HasFactory;
    
    // Tên bảng tương ứng (nếu không sử dụng chuẩn đặt tên của Laravel)
    protected $table = 'info_employers';

    // Các cột được phép thay đổi
    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'company_website',
        'masothue_website',
        'loaihinhhoatdong_website',
        'trangthai_website',
        // Các cột khác...
    ];
}
