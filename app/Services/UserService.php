<?php
namespace App\Services;

use App\Models\Detail;

class UserService
{
    public function saveUserDetails($user)
    {
        $fullName = trim("{$user->first_name} {$user->middle_name} {$user->last_name}");
        $middleInitial = $user->middle_name ? strtoupper($user->middle_name[0]) : null;
        $avatar = $user->photo ?? 'avatar.png';
        $gender = $this->getGenderFromPrefix($user->prefix_name);

        Detail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'full_name' => $fullName,
                'middle_initial' => $middleInitial,
                'avatar' => $avatar,
                'gender' => $gender,
            ]
        );
    }

    private function getGenderFromPrefix($prefix)
    {
        $prefixToGender = [
            'Mr.' => 'Male',
            'Ms.' => 'Female',
            'Mrs.' => 'Female',
        ];

        return $prefixToGender[$prefix] ?? 'Other';
    }
}