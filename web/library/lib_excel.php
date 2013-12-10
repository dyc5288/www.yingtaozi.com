<?php

/**
 * 
 * @author duanyunchao
 * @version $Id$
 */
require_once(PATH_LIBRARY . "/xls/excel_reader2.php");

/**
 * execl文件处理
 *
 * @package util
 */
class lib_excel
{
    /**
     * 获取数据
     *
     * @param string $file
     * @return array
     */
    public static function get_data($file)
    {
        if (!file_exists($file))
        {
            return false;
        }

        $reader = new Spreadsheet_Excel_Reader($file);
        
        if (empty($reader))
        {
            return false;
        }
        
        return $reader->sheets[0]['cells'];
    }

}

