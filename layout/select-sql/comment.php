<?php             
function get_comments_with_fullname($laptop_id) {
                global $conn;
                $laptop_id = sanitize_input($laptop_id);
                $sql = "SELECT bl.`id_nguoi_dung`, bl.`rating`, bl.`noi_dung`, u.`full_name` 
                        FROM `binh_luan_laptop` bl
                        INNER JOIN `users` u ON bl.`id_nguoi_dung` = u.`user_id`
                        WHERE bl.`laptop_id` = $laptop_id
                        ORDER BY bl.`id` DESC";
                $result = $conn->query($sql);
                return $result->fetch_all(MYSQLI_ASSOC);
            }

            // Get comments for the current laptop with full names
            $comments = get_comments_with_fullname($laptop_id);
            
            ?>