<?php

namespace App\Models;

use App\Libraries\MySql;
use PDO;

class JobModel extends Model
{
    // Name of the table
    protected static $table = "jobs";

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
     * Get jobs from certain user
     * @param $user_id (int) the ID of the user
     * @return array
     */

    public static function userJobs($user_id)
    {
        if ((int)$user_id === 0) {
            return false;
        }

        $sql = "SELECT * FROM " . self::$table . " WHERE user_id=" . $user_id . " AND deleted IS NULL ORDER BY begin_year DESC";

        return MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Get current job from certain user
     * @param $user_id (int) the ID of the user
     * @return object
     */

    public static function userCurrentJob(int $userId)
    {
        if (empty($userId)) {
            return false;
        }

        $sql = "SELECT * FROM " . self::$table . " WHERE user_id=" . $userId . " AND deleted IS NULL AND end_year IS NULL";
        $res = MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);
        
        return count($res) > 0 ? $res[0] : null;
    }

    /**
     * Get last job from certain user
     * @param $user_id (int) the ID of the user
     * @return object
     */

    public static function userLatestJob(int $userId)
    {
        if (empty($userId)) {
            return false;
        }

        $sql = "SELECT * FROM " . self::$table . " WHERE user_id=" . $userId . " AND deleted IS NULL AND end_year IN (SELECT MAX(end_year) FROM jobs)";
        $res = MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);
        
        return count($res) > 0 ? $res[0] : null;
    }
}