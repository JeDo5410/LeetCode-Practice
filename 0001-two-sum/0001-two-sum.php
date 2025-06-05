class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        // Create an associative array (PHP's hash map) to store numbers and indices
        $numMap = array();
        
        // Iterate through the array
        for ($i = 0; $i < count($nums); $i++) {
            // Calculate the complement (what number we need to reach target)
            $complement = $target - $nums[$i];
            
            // Check if the complement exists in our map
            // array_key_exists is used to check if key exists in associative array
            if (array_key_exists($complement, $numMap)) {
                // Found the pair! Return indices
                return array($numMap[$complement], $i);
            }
            
            // Add current number and its index to the map
            // In PHP: $array[key] = value
            $numMap[$nums[$i]] = $i;
        }
        
        // This line should never be reached based on problem constraints
        return array();
    }
}