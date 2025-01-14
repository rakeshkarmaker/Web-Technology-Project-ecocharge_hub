<?php 
    // Include header
    include('header.php'); 
?>

<!-- Dashboard Content -->
<div class="dashboard-container">
    <div class="dashboard-header">
        <h2>Welcome to Your Environmentalist Dashboard</h2>
        <p>Manage your eco-friendly activities and contribute to a greener future!</p>
    </div>

    <!-- Dashboard Navigation -->
    <div class="dashboard-nav">
        <h3>Dashboard Navigation</h3>
        <ul>
            <li><a href="account_verification.php">Account Verification with Document</a></li>
            <li><a href="news_blog_management.php">Manage News/Blogs</a></li>
            <li><a href="reviews_management.php">Manage EV Station Reviews</a></li>
            <li><a href="profile.php">View/Edit Profile</a></li>
        </ul>
    </div>

    <!-- Dashboard Features -->
    <div class="dashboard-features">
        <h3>Features Overview</h3>
        
        <div class="feature-item">
            <h4>1) Environmentalist Dashboard</h4>
            <p>Your central hub for managing your environmentalist activities, including viewing statistics, managing your contributions, and accessing resources related to eco-friendly solutions for electric vehicles (EVs).</p>
        </div>

        <div class="feature-item">
            <h4>2) Account Verification with Document</h4>
            <p>Upload and verify your environmental certification documents. Ensure your status as a verified Environmentalist expert to gain access to exclusive features and tools.</p>
        </div>

        <div class="feature-item">
            <h4>3) News/Blog Management</h4>
            <p>Stay updated and share your knowledge. Publish, edit, and manage blog posts about the latest environmental news, trends, and solutions in the EV charging ecosystem.</p>
        </div>

        <div class="feature-item">
            <h4>4) Publish Reviews with Rating, Modify, and Delete for EV Stations</h4>
            <p>Rate, review, and provide feedback on electric vehicle charging stations. You can modify and delete your reviews, helping other users make informed decisions.</p>
        </div>

        <div class="feature-item">
            <h4>5) Profile View and Edit</h4>
            <p>Manage and update your profile details, including personal information, your environmentalist credentials, and more.</p>
        </div>
    </div>
</div>

<?php 
    // Include footer
    include('footer.php'); 
?>

<style>
    /* General Styles for Dashboard */
.dashboard-container {
    padding: 20px;
    margin-top: 120px; /* To avoid content being hidden behind the fixed header */
    font-family: Arial, sans-serif;
}

/* Dashboard Header */
.dashboard-header h2 {
    font-size: 2rem;
    font-weight: bold;
    color: #2d572c;
}

.dashboard-header p {
    font-size: 1.1rem;
    color: #555;
}

/* Dashboard Navigation */
.dashboard-nav {
    margin-top: 30px;
}

.dashboard-nav h3 {
    font-size: 1.5rem;
    color: #2d572c;
    margin-bottom: 15px;
}

.dashboard-nav ul {
    list-style-type: none;
    padding-left: 0;
}

.dashboard-nav li {
    margin: 10px 0;
}

.dashboard-nav a {
    color: #2d572c;
    text-decoration: none;
    font-size: 1.1rem;
}

.dashboard-nav a:hover {
    text-decoration: underline;
}

/* Dashboard Features */
.dashboard-features {
    margin-top: 30px;
}

.dashboard-features h3 {
    font-size: 1.6rem;
    color: #2d572c;
    margin-bottom: 20px;
}

.feature-item {
    margin-bottom: 20px;
}

.feature-item h4 {
    font-size: 1.4rem;
    font-weight: bold;
    color: #2d572c;
}

.feature-item p {
    font-size: 1rem;
    color: #555;
}
</style>