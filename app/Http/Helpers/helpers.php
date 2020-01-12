<?php
    /**
     * Generate image path for user profile
     *
     * @param [mixed] $source
     * @return string image path
     */
    function avatar($source) 
    {
        if($source) {
            if(filter_var($source, FILTER_VALIDATE_URL) !== false) {
                return $source;
            }

            return asset('/storage/' . $source);
        }

        return asset('images/no-image.jpg');
    }
?>