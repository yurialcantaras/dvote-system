<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .success-page {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .hash-link {
            word-break: break-all; /* Para quebrar o hash em várias linhas, se necessário */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="success-page">
        <div class="col-md-6 col-lg-4">
            <h2 class="text-success">Submission Successful!</h2>
            <p class="mt-4">Thank you for your vote.</p>
            <p><strong>Your Vote:</strong> <span class="text-primary"><?php echo $_GET['vote']; ?></span></p>
            <p class="hash-link"><strong>Registration Hash:</strong> <a href="https://www.oklink.com/amoy/tx/<?php echo $_GET['hash']; ?>" id="txHashLink">Your vote on Blockchain</a></p>
            <p class="mt-5"><a href="votepage.php" class="btn btn-primary">Go to Homepage</a></p>
        </div>
    </div>
</div>

</body>
</html>