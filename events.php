<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
           body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }
        /* ===== Events Page ===== */
.events-container {
  padding: 40px 60px;
  background: linear-gradient(135deg, #f7b733, #8bc34a);
  min-height: 80vh;
}

.events-title {
  text-align: center;
  font-size: 36px;
  font-weight: 700;
  margin-bottom: 40px;
  color: #2c2c2c;
}

/* Grid */
.events-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 25px;
}

/* Event Card */
.event-card {
  background: #ffffff;
  border-radius: 16px;
  display: flex;
  padding: 20px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s ease;
}

.event-card:hover {
  transform: translateY(-6px);
}

/* Date Box */
.event-date {
  background: #ff9800;
  color: white;
  border-radius: 12px;
  padding: 12px;
  text-align: center;
  width: 80px;
  margin-right: 18px;
}

.event-date span {
  display: block;
  font-size: 26px;
  font-weight: bold;
}

.event-date small {
  font-size: 12px;
}

/* Content */
.event-content h3 {
  margin: 0 0 10px;
  font-size: 20px;
  color: #333;
}

.event-content p {
  font-size: 15px;
  color: #555;
  line-height: 1.5;
}

/* Tags */
.event-tag {
  display: inline-block;
  margin-top: 10px;
  padding: 6px 12px;
  font-size: 13px;
  border-radius: 20px;
  background: #ff9800;
  color: white;
}

.event-tag.green {
  background: #4caf50;
}

.event-tag.blue {
  background: #2196f3;
}

/* Responsive */
@media (max-width: 768px) {
  .events-container {
    padding: 25px;
  }
}

    </style>
</head>
<body>
   <div class="events-container">
  <h1 class="events-title">College Events</h1>

  <div class="events-grid">
    <!-- Event 1 -->
    <div class="event-card">
      <div class="event-date">
        <span>12</span>
        <small>FEB 2025</small>
      </div>
      <div class="event-content">
        <h3>National Seminar on AI</h3>
        <p>
          A seminar on Artificial Intelligence and its applications in
          Computer Science, organized by GMCA College.
        </p>
        <span class="event-tag">Academic</span>
      </div>
    </div>

    <!-- Event 2 -->
    <div class="event-card">
      <div class="event-date">
        <span>25</span>
        <small>MAR 2025</small>
      </div>
      <div class="event-content">
        <h3>Annual Cultural Fest</h3>
        <p>
          Students showcase talents through dance, music, drama, and
          competitions.
        </p>
        <span class="event-tag green">Cultural</span>
      </div>
    </div>

    <!-- Event 3 -->
    <div class="event-card">
      <div class="event-date">
        <span>10</span>
        <small>APR 2026</small>
      </div>
      <div class="event-content">
        <h3>Workshop on Web Development</h3>
        <p>
          Hands-on workshop on HTML, CSS, JavaScript & Angular for MCA
          students.
        </p>
        <span class="event-tag blue">Workshop</span>
      </div>
    </div>
  </div>
</div>

</body>
</html>