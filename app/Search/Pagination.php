<?php

namespace App\Search;


trait Pagination
{

    /**
     * @param $page
     * @return float|int
     */
    public static function page($page)
    {
        return ($page - 1) * static::SIZE;
    }

}
