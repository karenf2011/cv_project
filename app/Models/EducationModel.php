<?php

namespace App\Models;

use App\Libraries\MySql;
use PDO;

class EducationModel extends Model
{
    // Name of the table
    protected static $table = "educations";

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
     * Get educations from certain user
     * @param $user_id (int) the ID of the user
     * @return array
     */

    public static function userEducations(int $userId)
    {
        if (empty($userId)) {
            return false;
        }

        $sql = "SELECT * FROM " . self::$table . " WHERE user_id=" . $userId . " AND deleted IS NULL ORDER BY begin_year DESC";

        return MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Get last degree from certain user
     * @param $user_id (int) the ID of the user
     * @return object
     */

    public static function userLatestDegree(int $userId)
    {
        if (empty($userId)) {
            return false;
        }

        $sql = "SELECT * FROM " . self::$table . " WHERE user_id=" . $userId . " AND deleted IS NULL AND end_year IN (SELECT MAX(end_year) FROM educations WHERE degree IS NOT NULL)";
        $res = MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);
        
        return count($res) > 0 ? $res[0] : null;
    }
}