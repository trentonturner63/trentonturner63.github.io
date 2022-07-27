<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <?php include('menu.php'); ?>
    <style>
        <?php include('styles.css'); ?>
    </style>
</head>

<body style="text-align: left;">
    <section class="main">
        <div class="w3-row">
            <div class="w3-container w3-twothird">
                <h2>Purchase a Conference Pass</h2>
                <p>April 11 - April 14, 2022<br>
                    Rosen Centre Hotel, Orlando, FL<br>
                    Exhibit Hall Open April 12-13
                </p>
            </div>
            <div class="w3-container w3-third">
                <form id="survey-form" action="/do-something">

                    <div class="labels">
                        <label for="name" id="name-label">Name</label>
                    </div>
                    <div class="fields">
                        <input type="text" id="name" class="input-fields" placeholder="Full name" required>
                    </div>
                    <br>
                    <div class="labels">
                        <label for="email" id="email-label">Email</label>
                    </div>
                    <div class="fields">
                        <input type="email" id="email" class="input-fields" placeholder="Email address with @" required>
                    </div>
                    <br>
                    <div>
                        <div class="labels">
                            <label>Type of Pass</label>
                        </div>
                        <div>
                              <input type="radio" name="pass" required>
                              <label for="Attendee $475.00">Attendee $475.00</label><br>
                              <input type="radio" name="pass" required>
                              <label for="Daily Attendee $150.00">Daily Attendee $150.00</label><br>
                              <input type="radio" name="pass" required>
                              <label for="Two Day Attendee $300.00">Two Day Attendee $300.00</label><br>
                              <input type="radio" name="pass" required>
                              <label for="Three Day Attendee $450.00">Three Day Attendee $450.00</label><br>
                              <input type="radio" name="pass" required>
                              <label for="Attending Speaker $325.00">Attending Speaker $325.00</label><br>
                              <input type="radio" name="pass" required>
                              <label for="Non-Attending Speaker">Non-Attending Speaker</label><br>
                              <input type="radio" name="pass" required>
                              <label for="Media $350.00">Media $350.00</label>
                        </div>
                    </div>
                    <br>
                    <button class="button" id="submit" type="submit">Purchase</button>

                </form>
            </div>
    </section>
</body>

</html>