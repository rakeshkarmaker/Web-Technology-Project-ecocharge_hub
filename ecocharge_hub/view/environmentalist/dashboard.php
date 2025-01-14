<?php 
    include_once('../../controller/authGuard.php');
    // Include header
    include('../header.php');
?>

<!-- Dashboard Content -->
<div class="dashboard-container">
    <div class="dashboard-header">
        <h2>Welcome to Environmentalist Dashboard</h2>
        <p>Manage your eco-friendly activities and contribute to a greener future!</p>
    </div>
    
    <!-- Dashboard Navigation -->
    <div class="dashboard-nav">
        <h3>Dashboard Navigation</h3>
        <div class="nav-grid">
            <div class="nav-item">
                <img src="../../images/account_verification_icon.jpg" alt="Account Verification" class="nav-icon">
                <button class="nav-btn">
                    <a href="account_verification.php">Account Verification with Document</a>
                </button>
            </div>
            <div class="nav-item">
                <img src="../../images/blog_icon.jpg" alt="Manage News/Blogs" class="nav-icon">
                <button class="nav-btn">
                    <a href="news_blog_management.php">Manage News/Blogs</a>
                </button>
            </div>
            <div class="nav-item">
                <img src="../../images/review_icon.jpg" alt="Manage EV Station Reviews" class="nav-icon">
                <button class="nav-btn">
                    <a href="reviews_management.php">Manage EV Station Reviews</a>
                </button>
            </div>
            <div class="nav-item">
                <img src="../../images/profile_icon.jpg" alt="View/Edit Profile" class="nav-icon">
                <button class="nav-btn">
                    <a href="profile.php">View/Edit Profile</a>
                </button>
            </div>
        </div>
    </div>
</div>

<?php 
    // Include footer
    include('../footer.php'); 
?>

<style>

/* Dashboard Container */
.dashboard-container {
    flex-grow: 1; /* Ensure this takes all available space between header and footer */
    padding: 20px;
    background-color:rgb(248, 248, 248);
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Dashboard Header */
.dashboard-header h2 {
    font-size: 2rem;
    font-weight: bold;
    color: #2d572c;
    text-align: center;
    margin-bottom: 10px;
}

.dashboard-header p {
    font-size: 1.1rem;
    color: #555;
    text-align: center;
}

/* Navigation Grid */
.dashboard-nav {
    margin-top: 30px;
    text-align: center;
}

.dashboard-nav h3 {
    font-size: 1.5rem;
    color: #2d572c;
    margin-bottom: 20px;
}

.nav-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Two columns for desktop */
    gap: 5px;
    justify-items: center;
    align-items: start;
}

@media (max-width: 768px) {
    .nav-grid {
        grid-template-columns: 1fr; /* Single column for mobile */
    }
}

/* Navigation Item */
.nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 30px;
    margin: 30px;
    border-radius: 10px;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    background-color:rgb(203, 247, 250);
}

.nav-item:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

/* Navigation Icon */
.nav-icon {
    width: 300px; /* Set fixed width for images */
    height: 200px; /* Set fixed height for images */
    object-fit: cover; /* Ensure the image fits within the box */
    margin-bottom: 10px;
    display: block;
    background-color: #f0f0f0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Navigation Button */
.nav-btn {
    width: 200px; /* Fixed width for buttons */
    height: 50px; /* Fixed height for buttons */
    background-color: #3498db;
    color: white;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    margin-top: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: flex;
    justify-content: center;
    align-items: center;
}

.nav-btn:hover {
    background-color:rgb(41, 185, 161);
}

.nav-btn a {
    color: white;
    text-decoration: none;
    display: inline-block;
    width: 100%; /* Ensures the link covers the entire button */
    text-align: center;
}

.nav-btn a:hover {
    text-decoration: none;
}
</style>
