<?php session_start(); 

if (isset($_SESSION['summary'])) {
    $summary = $_SESSION['summary'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .success-page {
            display: flex;
            flex-direction: column; /* Organiza o conteúdo em coluna */
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .hash-link {
            word-break: break-all; 
        }
        .chart-container {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="success-page">
        <h2 class="text-center mb-4">Vote Summary</h2>

        <div class="chart-container">
            <canvas id="voteChart"></canvas>
        </div>

        <div class="col-md-6 col-lg-4 mt-4"> <!-- Adiciona margem superior para espaçamento -->
            <h2 class="text-success">Submission Successful!</h2>
            <p class="mt-4">Thank you for your vote.</p>
            <p><strong>Your Vote:</strong> <span class="text-primary"><?php echo $_GET['vote']; ?></span></p>
            <p class="hash-link"><strong>Registration Hash:</strong> <a href="https://www.oklink.com/amoy/tx/<?php echo $_GET['hash']; ?>" id="txHashLink">Your vote on Blockchain</a></p>
            <p class="mt-5"><a href="votepage.php" class="btn btn-primary">Go to Homepage</a></p>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('voteChart').getContext('2d');
    var voteChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Yes', 'No'],
            datasets: [{
                label: 'Votes',
                data: [<?php echo $summary['yes']; ?>, <?php echo $summary['no']; ?>],
                backgroundColor: ['#4caf50', '#f44336'], 
                borderColor: ['#4caf50', '#f44336'], 
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Desativa a manutenção da proporção
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        }
    });
</script>
