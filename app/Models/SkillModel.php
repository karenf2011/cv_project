<?php

namespace App\Models;

use App\Libraries\MySql;
use PDO;

class SkillModel extends Model
{
    // Name of the table
    protected static $table = "skills";

    // Max number of records when fetching all records from table
    protected static $limit;

    // Non writable fields
    protected static $guarded = [
        'id',
        'updated',
        'deleted',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Get skills from certain user
     * @param $user_id (int) the ID of the user
     * @return array
     */

    public static function userSkills(int $userId)
    {
        if (empty($userId)) {
            return false;
        }

        $sql = "SELECT * FROM " . self::$table . " WHERE user_id=" . $userId . " AND deleted IS NULL";
        
        return MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }
}