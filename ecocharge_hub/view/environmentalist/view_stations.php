<?php
include_once('../../controller/authGuard.php');
include_once('../../model/evStationDB.php');

// Handle search request
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search) {
    if (is_numeric($search)) {
        $stations = getStationById($search); // If search is a number, search by ID
    } else {
        $stations = getStationByName($search); // Otherwise, search by name
    }
} else {
    $stations = getAllStations();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EV Stations</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .search-box { margin-bottom: 20px; text-align: center; }
        .search-box input { padding: 10px; width: 300px; }
        .search-box button { padding: 10px; cursor: pointer; }

        .container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .card {
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            background: #fff;
        }
        .card h3 { margin: 10px 0; color: #333; }
        .card p { color: #666; }
        .card .info { font-size: 0.9em; }
    </style>
</head>
<body>

    <h2 style="text-align:center;">EV Charging Stations</h2>

    <!-- Search Bar -->
    <div class="search-box">
        <form method="GET">
            <input type="text" name="search" placeholder="Search by Name or ID" value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Stations Cards -->
    <div class="container">
        <?php if (!empty($stations)): ?>
            <?php foreach ($stations as $station): ?>
                <div class="card">
                    <h3><?= htmlspecialchars($station['name']) ?></h3>
                    <p class="info"><strong>ID:</strong> <?= htmlspecialchars($station['station_id']) ?></p>
                    <p><strong>Address:</strong> <?= htmlspecialchars($station['address']) ?></p>
                    <p><strong>Facilities:</strong> <?= htmlspecialchars($station['facilities']) ?></p>
                    <p><strong>Contact:</strong> <?= htmlspecialchars($station['contact_info']) ?></p>
                    <p class="info"><strong>Created By:</strong> <?= htmlspecialchars($station['created_by']) ?></p>
                    <p class="info"><strong>Created At:</strong> <?= htmlspecialchars($station['created_at']) ?></p>
                    <div class="button-container">
                        <a href="review.php?id=<?php echo $station['station_id']; ?>" class="btn btn-primary">Add Review</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center;">No stations found</p>
        <?php endif; ?>
    </div>

</body>
</html>
