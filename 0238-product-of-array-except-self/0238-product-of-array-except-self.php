class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) {
        $leftProduct = [];
        $leftProduct[0] = 1;
        for ($i = 1; $i < count($nums); $i++) {
            $leftProduct[$i] = $leftProduct[$i-1] * $nums[$i-1];
        }

        $rightProduct = [];
        $rightProduct[count($nums) - 1] = 1;
        for ($i = count($nums) - 2; $i >= 0; $i--) {
            $rightProduct[$i] = $rightProduct[$i+1] * $nums[$i+1];
        }
        ksort($rightProduct); // Sort by key
        
        $result = [];

        for ($i=0; $i < count($nums); $i++) {
            $result[$i] = $leftProduct[$i] * $rightProduct[$i]; 
        }

        return $result;
    }
}