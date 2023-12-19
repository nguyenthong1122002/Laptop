<?php
                    $laptop_id = sanitize_input($_GET['id']);
                    function getTotalRatings($laptop_id, $conn) {
                        $sql = "SELECT COUNT(*) AS total_ratings FROM binh_luan_laptop WHERE laptop_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $laptop_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        return $row['total_ratings'];
                    }

                    // Function to get the number of ratings for each star value
                    function getRatingsCount($laptop_id, $rating, $conn) {
                        $sql = "SELECT COUNT(*) AS rating_count FROM binh_luan_laptop WHERE laptop_id = ? AND rating = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ii", $laptop_id, $rating);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        return $row['rating_count'];
                    }


                        // Assuming $row['id'] contains the laptop_id, replace it with the correct variable name if needed
                        $laptop_id = $row['id'];

                        // Get the total number of ratings for the laptop
                        $total_ratings = getTotalRatings($laptop_id, $conn);

                        // Get the number of ratings for each star value
                        $ratings_5 = getRatingsCount($laptop_id, 5, $conn);
                        $ratings_4 = getRatingsCount($laptop_id, 4, $conn);
                        $ratings_3 = getRatingsCount($laptop_id, 3, $conn);
                        $ratings_2 = getRatingsCount($laptop_id, 2, $conn);
                        $ratings_1 = getRatingsCount($laptop_id, 1, $conn);

                ?>