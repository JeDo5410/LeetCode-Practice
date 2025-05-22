class Solution {
    /**
     * @param Integer[] $nums
     * @return String[]
     */
    function summaryRanges($nums) {
        $result = [];
        $n = count($nums);
        
        // Handle edge cases
        if ($n == 0) return $result;
        if ($n == 1) return [(string)$nums[0]];
        
        $start = $nums[0];
        $end = $nums[0];
        
        // Loop through array starting from index 1
        for ($i = 1; $i < $n; $i++) { 
            
            // Check if current number is consecutive
            if ($nums[$i] == $end + 1) {
                // Extend current range
                $end = $nums[$i];
            } else {
                // Gap found - close current range and start new one
                if ($start == $end) {
                    $result[] = (string)$start;  // Single number
                } else {
                    $result[] = $start . "->" . $end;  // Range
                }
                $start = $nums[$i];
                $end = $nums[$i];
            }
        }
        
        // Don't forget the final range!
        if ($start == $end) {
            $result[] = (string)$start;
        } else {
            $result[] = $start . "->" . $end;
        }
        
        return $result;
    }
}