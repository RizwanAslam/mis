<?php
/**
 * Created by PhpStorm.
 * User: fakhar
 * Date: 18/09/15
 * Time: 10:35 AM
 */


if (! function_exists('leave_types')) {

    function leave_types()
    {
        return array('8' => 'Full', '4' => 'Half','2' => 'Short');
    }
}



if (! function_exists('types')) {

    function employment_months($joining_date)
    {
        $date1 = $joining_date;
        if ((int)date('Y', strtotime($joining_date)) < (int)date('Y')) {
            $d = new \DateTime();
            $d->setDate(date('Y'), '1', '1');
            $date1 = $d->format('Y-m-d'); //->format('Y-m-d');
        }

        $date2 = date('Y-m-d');

        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

        return $diff;
    }
}

if(! function_exists('get_gravatar'))
{
    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source http://gravatar.com/site/implement/images/php/
     */
    function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'http://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
}