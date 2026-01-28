<?php
session_start();
require_once 'includes/auth.php';
requireCustomerLogin();

$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
$customer_email = $_SESSION['customer_email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Signly - <?php echo htmlspecialchars($customer_name); ?></title>

  <!-- Favicon -->
  <link rel="icon" href="png/signly.png" type="image/png">

  <!-- CSS -->
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/chat.css">

  <!-- RESPONSIVE CSS -->
  <link rel="stylesheet" href="css/responsive.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body onload="window.scrollTo(0, 0);">

  <!-- ================= HEADER ================= -->
  <header class="header">
    <div class="container nav">
      <div class="left-controls">
        <button class="icon-btn chat-icon-btn" id="chatToggle" title="Chat Support">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
          </svg>
          <span class="notification-badge" id="chatBadge" style="display: none;">0</span>
        </button>
      </div>

      <a href="#home" class="logo">
        <img src="png/signly.png" alt="Signly Logo">
      </a>

      <nav class="nav-links" id="nav-menu">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#ourteam">Our Team</a>
        <a href="#contact">Contact</a>
      </nav>

      <div class="right-controls">
        <button class="icon-btn" id="profileBtn" title="Profile">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </button>
        <button class="hamburger" id="hamburger" aria-label="Toggle menu">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </div>
    </div>
  </header>

  <!-- Hamburger Menu Overlay -->
  <div class="menu-overlay" id="menu-overlay">
    <nav class="menu-nav" id="menu-nav">
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#services">Services</a>
      <a href="#ourteam">Our Team</a>
      <a href="#contact">Contact</a>
    </nav>
  </div>

  <!-- ================= HERO ================= -->
  <section class="hero" id="home">

    <!-- Background Video -->
    <video class="hero-video" autoplay muted loop playsinline>
      <source src="pics/hero.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>

    <!-- Overlay -->
    <div class="hero-overlay"></div>

    <!-- Content -->
    <div class="container hero-content">
      <h1>Signly</h1>
      <p>Bridging communication through sign language recognition and translation.</p>
      <div class="hero-buttons">
        <a href="#contact" class="btn primary">Get Started</a>
        <a href="#services" class="btn secondary">Learn More</a>
      </div>
    </div>
  </section>

  <!-- ================= ABOUT ================= -->
  <section id="about" class="section">
    <div class="container">
      <h2 class="section-title">About Us</h2>
      <p class="section-text">
        Signly is an accessibility solution designed for Deaf and mute people to facilitate communication through sign language recognition and translation.
        Our mission is to bridge the communication gap and promote inclusivity by leveraging cutting-edge technology.
      </p>
    </div>
  </section>

  <!-- ================= SERVICES ================= -->
  <section id="services" class="section">
    <div class="container">
      <h2 class="section-title">Our Services</h2>
      <div class="grid">
        <div class="card clickable-card" data-gallery="android">
          <span class="click-hint">Click to view</span>
          <h3>Android Application</h3>
          <p>A mobile app version.</p>
        </div>
        <div class="card clickable-card" data-gallery="signly">
          <span class="click-hint">Click to view</span>
          <h3>Signly</h3>
          <p>The interactive prototype.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= OUR TEAM (3D CAROUSEL) ================= -->
  <section id="ourteam" class="section">
    <div class="container">
      <h2 class="section-title">Our Team</h2>
      
      <div class="depth-carousel">
        <div class="carousel-viewport">
          <div class="carousel-container">
            <!-- Carousel items -->      
            <div class="carousel-slide" data-index="1">
              <img src="pics/our1.jpg" alt="Team Member 2" class="clickable-image" data-image="pics/our1.jpg">
              <div class="slide-info">
              </div>
            </div>
            
            <div class="carousel-slide" data-index="2">
              <img src="pics/our2.jpg" alt="Team Member 3" class="clickable-image" data-image="pics/our2.jpg">
              <div class="slide-info">
              </div>
            </div>
            
            <div class="carousel-slide" data-index="3">
              <img src="pics/our3.jpg" alt="Team Member 4" class="clickable-image" data-image="pics/our3.jpg">
              <div class="slide-info">
              </div>
            </div>
            
            <div class="carousel-slide" data-index="4">
              <img src="pics/our4.jpg" alt="Team Member 5" class="clickable-image" data-image="pics/our4.jpg">
              <div class="slide-info">
              </div>
            </div>

            <div class="carousel-slide" data-index="2">
              <img src="pics/our5.jpg" alt="Team Member 3" class="clickable-image" data-image="pics/our5.jpg">
              <div class="slide-info">
              </div>
            </div>

          </div>
        </div>
        
        <!-- Minimal Navigation Buttons -->
        <button class="depth-nav prev" aria-label="Previous">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <polyline points="15 18 9 12 15 6"></polyline>
          </svg>
        </button>
        <button class="depth-nav next" aria-label="Next">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </button>
        
        <!-- Close/X button - shown only in expanded state -->
        <button class="depth-nav back" id="carousel-back" aria-label="Close">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
    </div>
  </section>

  <!-- ================= CONTACT ================= -->
  <section id="contact" class="section">
    <div class="container">
      <h2 class="section-title">Get In Touch</h2>
      <p class="section-text" style="margin-bottom: 3rem;">
        Connect with us through our social media channels or send us an email.
      </p>
      
      <div class="social-media-container">
        <a href="https://www.facebook.com/profile.php?id=61586754433753" target="_blank" rel="noopener noreferrer" class="social-link facebook" aria-label="Visit our Facebook page">
          <div class="social-icon">
            <img src="png/facebook.png" alt="Facebook" class="social-logo">
          </div>
        </a>
        
        <a href="https://www.instagram.com/signlynufv?igsh=MW95YWM5ZXNjcTBjcw==" target="_blank" rel="noopener noreferrer" class="social-link instagram" aria-label="Visit our Instagram profile">
          <div class="social-icon">
            <img src="png/instagram.png" alt="Instagram" class="social-logo">
          </div>
        </a>
        
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=signlynufv@gmail.com" class="social-link gmail" aria-label="Send us an email">
          <div class="social-icon">
            <img src="png/gmail.png" alt="Gmail" class="social-logo">
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- ================= FOOTER ================= -->
  <footer class="footer">
    © 2026 Signly — All rights reserved.
  </footer>

  <!-- ================= IMAGE LIGHTBOX MODAL ================= -->
  <div class="lightbox" id="lightbox">
    <button class="lightbox-back" id="lightbox-back" aria-label="Close">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
    <button class="lightbox-nav lightbox-prev" id="lightbox-prev" aria-label="Previous">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="15 18 9 12 15 6"></polyline>
      </svg>
    </button>
    <button class="lightbox-nav lightbox-next" id="lightbox-next" aria-label="Next">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <polyline points="9 18 15 12 9 6"></polyline>
      </svg>
    </button>
    <div class="lightbox-content">
      <img id="lightbox-image" src="" alt="Lightbox image">
    </div>
    <div class="lightbox-info">
      <span id="lightbox-counter">1 / 1</span>
    </div>
  </div>

  <!-- ================= CHAT SIDEBAR ================= -->
  <div class="chat-sidebar" id="chatSidebar">
    <div class="chat-sidebar-header">
      <div class="chat-header-info">
        <h3>Chat Support</h3>
        <span class="online-status">Online</span>
      </div>
      <button class="chat-close-btn" id="chatClose">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    
    <div class="chat-messages" id="chatMessages">
      <!-- Messages will be loaded here via JavaScript -->
    </div>
    
    <div class="chat-input-container">
      <form id="messageForm" class="chat-form">
        <input type="text" id="messageInput" placeholder="Type your message..." required autocomplete="off">
        <button type="submit" class="send-btn">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="22" y1="2" x2="11" y2="13"></line>
            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
          </svg>
        </button>
      </form>
    </div>
  </div>

  <!-- ================= PROFILE SIDEBAR ================= -->
  <div class="profile-sidebar" id="profileSidebar">
    <div class="profile-sidebar-header">
      <h3>Profile</h3>
      <button class="profile-close-btn" id="profileClose">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    
    <div class="profile-content">
      <div class="profile-avatar">
        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
      </div>
      
      <div class="profile-info">
        <div class="profile-field">
          <label>Name</label>
          <p><?php echo htmlspecialchars($customer_name); ?></p>
        </div>
        <div class="profile-field">
          <label>Email</label>
          <p><?php echo htmlspecialchars($customer_email); ?></p>
        </div>
        <div class="profile-field">
          <label>Member Since</label>
          <p><?php echo date('F Y'); ?></p>
        </div>
      </div>
      
      <div class="profile-actions">
        <a href="logout.php" class="logout-btn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            <polyline points="16 17 21 12 16 7"></polyline>
            <line x1="21" y1="12" x2="9" y2="12"></line>
          </svg>
          Logout
        </a>
      </div>
    </div>
  </div>

  <!-- Overlay for sidebars -->
  <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <!-- JS -->
  <script src="js/script.js"></script>
  <script src="js/chat.js"></script>
  <script src="js/home-ui.js"></script>
</body>
</html>