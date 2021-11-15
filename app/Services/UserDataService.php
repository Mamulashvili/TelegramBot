<?php

namespace App\Services;

use App\Models\TelegramUser;

class UserDataService
{

    /**
     * Store user data
     * 
     * @param object $user
     * @return void
     */
    public static function createUser($user): void {

        $find = TelegramUser::where('t_id', $user->getId())->first();
        if(empty($find)) {
            $res = TelegramUser::create([
                't_firstname' =>  $user->getFirstName(),
                't_lastname' => $user->getLastName(),
                't_id' => $user->getId(),
            ]);
        }
    }

    /**
     * Update user data
     * 
     * @param object $user
     * @return bool
     */
    public static function updateUser(string $telegramId, string $name, int $age): bool {

        $res = TelegramUser::where('t_id', $telegramId)
            ->update([
                'u_name' => $name,
                'u_age' => $age,
                'status' => 'Идентифицированный',
            ]);
        
            if($res) return true;
        return false;
    }


}
