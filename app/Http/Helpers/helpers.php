<?php

use App\ConsultantReview;
use App\Proficiency;
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
     * @return string Role Name
     */
    function roleName($id) 
    {
        if($id == null) {
            return 'Null';
        }

        return Role::where('id', $id)->first()->name;
    }

    /**
     * Returns Proficiency Name on success, string (Unknown) otherwise
     *
     * @param [int] $id
     * @return string Proficiency Name
     */
    function proficiencyName($id) 
    {
        if($id == null) {
            return 'Null';
        }

        return Proficiency::where('id', $id)->first()->proficiency;
    }

    /**
     * Returns Rating average for given conusltancy
     *
     * @param [int] $id
     * @return string Rating average
     */
    function consultancyRating($id) {
        $ratingSum = ConsultantReview::where('consultant', $id)->sum('rating');
        $ratingCount = ConsultantReview::where('consultant', $id)->count();

        if($ratingCount && $ratingSum) {
            return $ratingSum / $ratingCount;
        }

        return null;
    }
?>