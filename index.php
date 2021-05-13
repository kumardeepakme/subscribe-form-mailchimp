<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subscribe Form - Mailchimp API</title>

  <link rel="stylesheet" href="normalize.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">

  <script defer="defer" src="script.js"></script>

  <style>
    .subscribe {
      position: relative;
      width: 100%;
      height: 100vh;
      background-color: #ffe01b;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-family: Roboto, Arial, sans-serif;
    }

    .subscribe__text {
      width: 35%;
    }

    .subscribe__text .subscribe__text--heading {
      font-size: 50px;
      font-weight: 100;
      line-height: 1;
      margin: 0 0 15px;
    }

    .subscribe__text .subscribe__text--desc {
      font-size: 20px;
      font-weight: 300;
      line-height: 1.3;
      color: rgba(0, 0, 0, .6);
    }

    .subscribe__form {
      display: flex;
      align-items: center;
      width: 35%;
    }

    .subscribe__form .subscribe__form--input {
      background: none;
      flex: 2 1 80%;
      padding: 15px;
      width: 100%;
      font-size: 16px;
      outline: 0 none;
      color: #191414;
      border: 2px solid #191414;
      border-right: 0;
    }

    .subscribe__form .subscribe__form--input::placeholder {
      color: #191414;
      opacity: .6;
    }

    .subscribe__form .subscribe__form--btn {
      flex: 1 1 20%;
      padding: 15px 25px;
      font-size: 16px;
      background-color: #191414;
      border: 2px solid #191414;
      color: #fff;
      appearance: none;
      -moz-appearance: none;
      -webkit-appearance: none;
      transition: all .3s ease-in-out;
      cursor: pointer;
    }

    .subscribe__form .subscribe__form--btn:hover {
      background-color: #007c89;
      color: #fff;
    }

    .alert {
      position: absolute;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      border: 3px solid transparent;
      pointer-events: none;
      font-family: Roboto, Arial, sans-serif;
      padding: 10px 20px;
      text-align: center;
      max-width: 35%;
      text-transform: uppercase;
      font-size: 14px;
      display: none;
    }

    .alert--error {
      border-color: #D50000;
      color: #D50000;
    }

    .alert--success {
      border-color: #8BC34A;
      color: #8BC34A;
    }
  </style>
</head>

<body>

  <div class="subscribe">
    <div class="subscribe__text">
      <h1 class="subscribe__text--heading">Subscribe 🎁</h1>
      <p class="subscribe__text--desc">Join the family and get latest news, updates and special offers delivered to your inbox.</p>
    </div>

    <form class="subscribe__form">
      <input class="subscribe__form--input" type="text" name="email" placeholder="Enter your email">
      <button class="subscribe__form--btn" type="submit">Subscribe</button>
    </form>
  </div>

  <div class="alert"></div>

</body>

</html>