<?php

use App\Role;

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

    /**
     * Returns Role Name on success, string (Unknown) otherwise
     *
     * @param [int] $id
     * @return string
     */
    function roleName($id) 
    {
        if($id == null) {
            return 'Unknown';
        }

        return Role::where('id', $id)->first()->name;
    }
?>