<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'tk_employers';


    // Các thuộc tính của model
    protected $fillable = [
        'name', 'email', 'password', // các trường khác nếu cần
    ];

    // Thêm các phương thức cần thiết cho interface Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id'; // Hoặc trường 'email' nếu bạn sử dụng email làm ID
    }

    public function getAuthIdentifier()
    {
        return $this->getKey(); // Trả về 'id' của nhà tuyển dụng
    }

    public function getAuthPassword()
    {
        return $this->password; // Trả về mật khẩu của nhà tuyển dụng
    }

    public function getRememberToken()
    {
        return $this->remember_token; // Trả về remember_token
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value; // Cập nhật remember_token
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Tên của cột remember_token
    }
}
