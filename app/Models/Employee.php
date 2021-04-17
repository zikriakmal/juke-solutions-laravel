<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $guarded = [];

    public function addNewEmployee($data)
    {
        return $this->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone_number'],
            'bank_id' => $data['bank'],
            'staff_position_id' => $data['position'],
            'dob' => $data['dob'],
            'province_id' => $data['provience'],
            'city_id' => $data['city'],
            'street' => $data['street'],
            'zip_code' => $data['zip_code'],
            'ktp_number' => $data['ktp_number'],
            'uri_ktp' => $data['image_uri'],
        ]);
    }

    public function updateNewEmployee($data,$id)
    {
        $update = $this->find($id);
        $update->first_name = $data['first_name'];
        $update->last_name = $data['last_name'];
        $update->email = $data['email'];
        $update->phone = $data['phone_number'];
        $update->bank_id = $data['bank'];
        $update->staff_position_id = $data['position'];
        $update->dob = $data['dob'];
        $update->province_id = $data['provience'];
        $update->city_id = $data['city'];
        $update->street = $data['street'];
        $update->zip_code = $data['zip_code'];
        $update->ktp_number = $data['ktp_number'];
        $update->uri_ktp = $data['image_uri'] ?? $update->uri_ktp;
        return $update->save();
    }
}
