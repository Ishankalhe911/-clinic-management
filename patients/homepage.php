<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>👊🔥 Anime Fight Themed Patient Dashboard</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Oxanium:wght@300;700&display=swap');

    body {
      margin: 0;
      font-family: 'Oxanium', cursive;
      background: linear-gradient(135deg, #0a0a0a, #1c1c1c);
      color: #f5f5f5;
      background-image: url('https://i.ibb.co/xmhRxMN/anime-fight-bg.jpg');
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      animation: flicker 3s infinite alternate;
    }

    @keyframes flicker {
      0% { filter: brightness(1); }
      100% { filter: brightness(1.1); }
    }

    header {
      background: rgba(0, 0, 0, 0.85);
      padding: 25px;
      text-align: center;
      font-size: 32px;
      font-weight: bold;
      color: #f9004d;
      text-shadow: 0 0 12px #f9004d, 0 0 22px #f9004d;
      border-bottom: 3px solid #f9004d;
    }

    .dashboard {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      background: rgba(30, 30, 30, 0.9);
      padding: 20px 10px;
    }

    .dashboard div {
      background: rgba(255, 0, 100, 0.12);
      border: 2px dashed #f9004d;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 0 18px #f9004d;
      text-align: center;
      margin: 10px;
      min-width: 160px;
      transition: transform 0.3s ease;
    }

    .dashboard div:hover {
      transform: scale(1.08);
    }

    .dashboard h2 {
      color: #f9004d;
      font-size: 36px;
    }

    .container {
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding: 40px 20px;
      align-items: center;
    }

    .card {
      background: rgba(0, 0, 0, 0.75);
      border: 2px solid #00acee;
      border-radius: 18px;
      padding: 30px;
      text-align: center;
      transition: 0.4s ease;
      cursor: pointer;
      box-shadow: 0 0 25px #00acee;
      width: 300px;
    }

    .card:hover {
      background-color: #00acee;
      color: black;
      transform: scale(1.07);
      box-shadow: 0 0 30px #00acee;
    }

    .card a {
      color: #fff;
      text-decoration: none;
      font-size: 22px;
      font-weight: 700;
      display: block;
      text-shadow: 0 0 8px #00acee;
    }

    .footer {
      text-align: center;
      padding: 20px;
      font-size: 14px;
      background: rgba(0, 0, 0, 0.8);
      color: #ccc;
      border-top: 2px dashed #444;
    }
  </style>
</head>
<body>

<header>⚔️ Anime Fight: Patient Management Arena</header>

<div class="dashboard">
  <div>
    <h2 id="totalPatients">0</h2>
    <p>Total Fighters</p>
  </div>
  <div>
    <h2 id="malePatients">0</h2>
    <p>Male Warriors</p>
  </div>
  <div>
    <h2 id="femalePatients">0</h2>
    <p>Female Warriors</p>
  </div>
</div>

<div class="container">
  <div class="card">
    <a href="add_patient.php">➕ Add Patient</a>
  </div>
  <div class="card">
    <a href="view_patients.php">📋 View Patients</a>
  </div>
</div>

<div class="footer">
  &copy; 2025 BattleUI | Forged in Code & Anime Power ⚡
</div>

<script>
  const patients = JSON.parse(localStorage.getItem('patients') || '[]');
  document.getElementById('totalPatients').innerText = patients.length;
  document.getElementById('malePatients').innerText = patients.filter(p => p.gender === 'Male').length;
  document.getElementById('femalePatients').innerText = patients.filter(p => p.gender === 'Female').length;
</script>

</body>
</html>
