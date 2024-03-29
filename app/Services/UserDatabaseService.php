<?php
//Charles and Katie
///CLC 256
/// Professor Hughes
/// This is our own work
namespace App\Services;

use Illuminate\Support\Facades\DB;

class UserDatabaseService
{

    public function __construct()
    {}
    
    /**
     * Checks the users table for the user with the id number from the parameter.
     * @param int $userID : The user id to check for
     * @return boolean : TRUE-User exists , FALSE-User doesn't exist
     */
    public function DoesUserExistByID(int $userID)
    {
        return DB::table('users')->where('id',$userID)->exists();
    }
    
    /**
     * Gets the user's username by ID number
     * @param int $userID : The user's ID number
     * @return string : The user's username
     */
    public function GetUsernameByID(int $userID)
    {
        return (string)DB::table('users')->where('id',$userID)->value('name');
    }
    
    
}
