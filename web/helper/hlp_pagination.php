<?php

!defined('IN_INIT') && exit('Access Denied');

/**
 * 分页处理 
 *
 * @author duanyunchao
 * @version $Id$
 */
class hlp_pagination
{

    /**
     * 目前系统使用的分页
     *
     * @param array $config
     * @return string 
     */
    public static function system($config)
    {
        /* 下一页 */
        $next_page = $config['start'] + $config['per_count'];
        /* 上一页 */
        $prev_page = $config['start'] - $config['per_count'];
        /* 末页 */
        $last_page = ($config['count_page'] - 1) * $config['per_count'];

        //分页内容
        $pages = '<div class="jPages"><div class="wp-pagenavi">';

        if ($config['current_page'] > 1)
        {
            //上一页
            $pages .= "<a href='{$config['url']}&{$config['page_name']}={$prev_page}' class='{$config['prepage_class']}'>上一页</a>\n";
        }
        else
        {
            $pages .= "<span class='{$config['prepage_class']}'>上一页</span>\n";
        }

        $prev_start = $config['current_page'] - 3;

        if ($prev_start > 1)
        {
            $pages .= "<a href='{$config['url']}' class='page larger'>1</a>\n";

            if ($prev_start > 2)
            {
                $pages .= "<span>...</span>\n";
            }
        }

        //前偏移
        for ($i = $prev_start; $i <= $config['current_page'] - 1; $i++)
        {
            if ($i < 1)
            {
                continue;
            }

            $_start = ($i - 1) * $config['per_count'];
            $pages .= "<a href='{$config['url']}&{$config['page_name']}=$_start' class='page larger'>$i</a>\n";
        }

        $flag = 0;
        //当前页
        $pages .= "<span class='current'>\n" . $config['current_page'] . "</span>\n";
        //后偏移
        if ($config['current_page'] < $config['count_page'])
        {
            for ($i = $config['current_page'] + 1; $i <= $config['count_page']; $i++)
            {
                $_start = ($i - 1) * $config['per_count'];
                $pages .= "<a href='{$config['url']}&{$config['page_name']}=$_start' class='page larger'>$i</a>\n";
                $flag++;

                if ($flag == 3)
                {
                    if ($i < $config['count_page'])
                    {
                        if ($i + 1 < $config['count_page'])
                        {
                            $pages .= "<span>...</span>\n";
                        }

                        $pages .= "<a href='{$config['url']}&{$config['page_name']}=$last_page' class='page larger'>{$config['count_page']}</a>\n";
                    }

                    break;
                }
            }
        }

        if ($config['current_page'] != $config['count_page'])
        {
            //下一页
            $pages .= "<a href='{$config['url']}&{$config['page_name']}={$next_page}' class='{$config['nextpage_class']}'>下一页</a>\n";
        }
        else
        {
            $pages .= "<span class='{$config['nextpage_class']}'>下一页</span>\n";
        }

        if (!empty($config['input']))
        {
            $pages .= '<input type="text" onkeydown="javascript:if(event.keyCode==13){ var offset = ' . $config['per_count'] . '*(this.value-1);location=\'' . $config["url"] . '&' . $config["page_name"] . '=\'+offset;}" onkeyup="value=value.replace(/[^\d]/g,\'\')" />';
        }

        $pages .= '</div></div>';

        return $pages;
    }

}
