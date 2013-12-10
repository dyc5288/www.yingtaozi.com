<?php

/**
 * 产品
 * 
 * @author duanyunchao
 * @version $Id$
 */
class pub_mod_product
{
    /**
     * 添加产品
     * 
     * @return void
     */
    public static function add_prodcut($param_array)
    {
        if (empty($param_array))
        {
            return false;
        }

        $param_array['post_type'] = pub_mod_posts::TYPE_PRODUCT;
        return pub_mod_posts::add_post($param_array);
    }

}
