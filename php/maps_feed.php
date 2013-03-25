<?php

/**
 * maps_feed.php
 *
 * Displaying list of all map layers visible to user.
 *
 *
 *.---.      .                    .
 *  |  o     |                    |
 *  |  .  .-.| .-. .,-.  .-.  .-. | .--.
 *  |  | (   |(.-' |   )(   )(   )| `--.
 *  '-' `-`-'`-`--'|`-'  `-'  `-' `-`--' v0.2

 *  Copyright (C) 2012-2013 Open Technology Institute <tidepools@opentechinstitute.org>
 *      Lead: Jonathan Baldwin
 *      Contributors: Lisa J. Lovchik
 *      This file is part of Tidepools <http://www.tidepools.co>

 *  Tidepools is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.

 *  Tidepools is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with Tidepools.  If not, see <http://www.gnu.org/licenses/>.
 */


$maps = (isset($_POST['data']) ? $_POST['data'] : null);
$maps = stripslashesDeep($maps);

$counter = 1;

echo '<div style=" width:323%; height:54px; background-color:#f2edea; position:absolute; padding-top:12; padding-left:12; ">   ';

if ($maps != null) {

    foreach ($maps as $i) {

        $idVal = "'" . $i['_id']['$id'] . "'";
        $selectVal = "'map" . $counter . "'";

        echo '<div id="map' . $counter . '" style="width:95px; height:35px; position:relative; float:left;" onclick="reBoundFilterMap(' . $idVal . ',' . $selectVal . ');">';
        echo '<img style="float:left; position:relative; display:inline-block; cursor:pointer;" src="assets/images/icon_map.png"/>';
        echo "<p style='font-size:11px;'>" . $counter . " " . $i['name'] . "</p>     ";  //plug into CSS here...
        echo "</div>";

        $counter++;
    }

    echo "</div>";

    unset($i); // remove lingering foreach() values from memory

}


function stripslashesDeep($value)
{
    $value = is_array($value)
        ? array_map('stripslashesDeep', $value)
        : stripslashes($value);

    return $value;
}
