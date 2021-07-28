<?php

namespace App\Models;

use App\Libraries\MySql;
use PDO;

class Model
{
    // Name of the model (table)
    protected static $table;

    // Max. records when fetching all records
    protected static $limit;

    // Fields that can not be written to datbase
    protected static $protectedFields;

    /**
     * Fetching all records from table
     * @return array of objects
     */
    public static function all(array $selectedFields = null)
    {
        $fields = "*";
        
        if (!empty($selectedFields) && count($selectedFields) > 0) {
            $fields = self::composeQuery($selectedFields);
        }

        $sql = "SELECT " . $fields . " FROM " . get_class_vars(get_called_class())['table'] . " WHERE deleted IS NULL" . (!empty(get_class_vars(get_called_class())['limit']) ? " LIMIT " . get_class_vars(get_called_class())['limit'] : "");

        return MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Fetching one record based on the id
     * @return object
     */
    public static function get(int $id, array $selectedFields = null)
    {
        if ($id === 0) return null;

        $fields = "*";

        if (isset($selectedFields) && count($selectedFields) > 0) {
            $fields = self::composeQuery($selectedFields);
        }

        $sql = "SELECT " . $fields .  " FROM " . get_class_vars(get_called_class())['table'] . " WHERE id=" . $id . " AND deleted IS NULL";
        $res = MySql::query($sql)->fetchAll(PDO::FETCH_CLASS);

        return count($res) > 0 ? $res[0] : null;
    }

    /**
     * Saves a record to the model
     * @param $data array
     * @return the ID of the new record
     */
    public static function store(array $data)
    {
        return MySql::insert(self::removeIllegalFields($data), get_class_vars(get_called_class())['table']);
    }

    /**
     * Updates a record to the model
     * @param $data array
     */
    public static function update(array $data, int $id)
    {
        if ($id === 0) return;

        MySql::update(self::removeIllegalFields($data), get_class_vars(get_called_class())['table'], $id);
    }

    /**
     * Archives a record to the model
     * @param $data array
     */
    public static function destroy(int $id)
    {
        Mysql::delete($id, get_class_vars(get_called_class())['table']);
    }

    private static function removeIllegalFields(array $data)
    {
        foreach (@$data as $key => $val) {
            if (in_array($key, get_class_vars(get_called_class())['protectedFields'])) {
                unset($data[$key]);
            }
        }

        return $data;
    }

    private static function composeQuery(array $fields)
    {
        $getFields = '';

        foreach ($fields as $field)
        {
            $getFields .= $field . ',';
        }

        return rtrim($getFields, ',');
    }

}