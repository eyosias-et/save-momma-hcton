<?php
    function locate_center($locations){
        
        $X =0;
        $Y= 0;
        $Z = 0;
        $totw = 0;
        for ($i = 0 ;$i<sizeof($locations);$i++)
        {
            $W = $locations[$i]['severity'];
            $lat = (($locations[$i]['lat']) * pi() /180);
            $lon = (($locations[$i]['lng']) * pi() /180);
            $X1 =( cos($lat) * cos($lon)) * $W;
            $Y1 =(cos($lat) * sin($lon)) * $W;
            $Z1= (sin($lat)) * $W;
            $X = $X + $X1;
            $Y = $Y + $Y1;
            $Z = $Z + $Z1;
            $totw = $totw + $W;


        }
        $X = $X / $totw;
        $Y = $Y / $totw;
        $Z = $Z / $totw;

        $lon = atan2($Y,$X);
        $hyp = sqrt(($X * $X) + ($Y * $Y) );
        $lat = atan2($Z , $hyp);

        $lon = $lon * 180 / pi();
        $lat =$lat * 180 / pi();

        return ['lat' => $lat, 'lng'=> $lon];
    }
?>