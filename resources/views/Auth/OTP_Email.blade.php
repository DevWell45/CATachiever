<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OTP Verification | AchieVR</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      width: 100vw;
      height: 100vh;
      background-color: #128C40;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      background-color: white;
      border-radius: 2rem;
      padding: 2rem;
      max-width: 400px;
      width: 90%;
      text-align: center;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .logo {
      width: 80px;
      height: 80px;
      object-fit: contain;
      margin-bottom: 1rem;
      filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
    }

    h1 {
      font-size: 1.75rem;
      font-weight: bold;
      color: #333333;
      margin-bottom: 0.5rem;
    }

    p {
      font-size: 0.9rem;
      color: #555555;
      line-height: 1.4;
      margin-bottom: 1.5rem;
    }

    .otp-box {
      background-color: #E6F6EB;
      color: #128C40;
      font-size: 2rem;
      font-weight: bold;
      padding: 1rem 2rem;
      border-radius: 1rem;
      letter-spacing: 0.4rem;
      margin-bottom: 1.5rem;
      display: inline-block;
    }

    .btn {
      display: block;
      width: 100%;
      background-color: #128C40;
      color: white;
      font-weight: bold;
      padding: 0.8rem 0;
      border-radius: 2rem;
      text-decoration: none;
      margin-bottom: 1.5rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      transition: all 0.2s ease-in-out;
    }

    .btn:hover {
      background-color: #0e6e32;
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .footer {
      font-size: 0.75rem;
      color: #888888;
      line-height: 1.3;
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.5rem;
      }
      .otp-box {
        font-size: 1.75rem;
        padding: 0.8rem 1.5rem;
        letter-spacing: 0.3rem;
      }
      .btn {
        padding: 0.7rem 0;
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <img src="{{ asset('images/components/Logo.png') }}" alt="Logo" class="logo">
    <h1>Email Verification</h1>
    <p>
      This is your one-time password (OTP).Please do not share it with anyone.<br>
      This code is valid for <strong>10 minutes</strong>.
    </p>

    <div class="otp-box">{{ $otp_code }}</div>

    <a href="#" class="btn">Verify OTP</a>

    <p class="footer">
      Didn't request this? <strong>Ignore this email</strong>.<br>
      &copy; 2026 AchieVR | NVSU
    </p>
  </div>

</body>
</html>