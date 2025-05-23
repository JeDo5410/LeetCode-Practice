class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {

        usort($intervals, function($a,$b) {
            return $a[0] - $b[0];
        });

        $result = [];
        $start = $intervals[0][0];
        $end = $intervals[0][1];
        $range = [];

        if (count($intervals) == 1) {
            $range = [$start, $end];
            $result[] = $range; 
            return $result;
        }

        for ($i=1; $i<count($intervals); $i++) {
            //Checks if the intervals overlaps

            if ($intervals[$i][1] <= $end) {
                $end = $end;
            } elseif ($intervals[$i][0] <= $end) {
                $end = $intervals[$i][1];
            } else {
                $range[0] = $start;
                $range[1] = $end;
                $result[] = $range;

                $start = $intervals[$i][0];
                $end = $intervals[$i][1];
            } 
        }

        $range[0] = $start;
        $range[1] = $end;
        $result[] = $range;
        
        return $result;
    }
}