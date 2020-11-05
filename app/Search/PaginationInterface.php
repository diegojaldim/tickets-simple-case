<?php

namespace App\Search;


interface PaginationInterface
{

    /**
     * @const int
     */
    const SIZE = 10;

    /**
     * @param $page
     * @return mixed
     */
    public static function page($page);

}
