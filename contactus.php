<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #07080af3;
            margin-bottom: 30px;
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .contact-box {
            background: #f9fafc;
            padding: 25px;
            border-radius: 8px;
            border-left: 5px solid #1a4ed8;
        }

        .contact-box h2 {
            margin-top: 0;
            color: #ff9800;
            font-size: 22px;
        }

        .contact-box p {
            margin: 10px 0;
            font-size: 16px;
        }

        .contact-box strong {
            color: #000;
        }

        /* ===== Contact Form ===== */
        form input,
        form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        form textarea {
            resize: none;
            height: 120px;
        }

        form button {
            background-color: #1a4ed8;
            color: #fff;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #123bb5;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .contact-wrapper {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Contact Us</h1>

    <div class="contact-wrapper">

        <!-- Contact Information -->
        <div class="contact-box">
            <h2>Institute Contact Details</h2>

            <p><strong>Address:</strong><br>
               GMCA College,<br>
               Khokhra Road, City – 380009,<br>
               Ahmedabad, India
            </p>

            <p><strong>Phone:</strong><br>
               +91 98765 43210<br>
               +91 91234 56789
            </p>

            <p><strong>Email:</strong><br>
               info@gmca.edu.in<br>
               admissions@gmca.edu.in
            </p>

            <p><strong>Office Hours:</strong><br>
               Monday – Friday: 9:30 AM – 5:30 PM
            </p>
        </div>

        <!-- Contact Form -->
        <div class="contact-box">
            <h2>Send Us a Message</h2>

            <form action="#" method="post">
                <label>Full Name</label>
                <input type="text" name="name" required>

                <label>Email Address</label>
                <input type="email" name="email" required>

                <label>Contact Number</label>
                <input type="text" name="phone">

                <label>Message</label>
                <textarea name="message" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>

    </div>
</div>

</body>
</html>
