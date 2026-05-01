<?php
require_once('../model/userinfo_db.php');

function get_users()
{
    $user_rows = get_all_users();
    $users = array();

    if ($user_rows)
        {
            $index = 0;

            while($row = mysqli_fetch_array($user_rows))
                {
                    $users[$index]["UserNo"] = $row["UserNo"];

                    $users[$index]["Name"] = $row["FirstName"] . " " . $row["LastName"];
                    $users[$index]["Email"] = $row["Email"];
                    $users[$index]["FavNum"] = $row["FavoriteNum"];
                    $index++;
                }
        }

        return $users;
}
?>
