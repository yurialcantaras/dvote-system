<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Campaigns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Voting Campaigns</h2>

        <div class="accordion" id="campaignsAccordion">
            <!-- Yes or No Campaign -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Yes or No Campaign
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#campaignsAccordion">
                    <div class="accordion-body">
                        <form id="yesNoForm" method="post" action="./controllers/doyousupport.php">
                            <div class="mb-3">
                                <label for="yesNoQuestion" class="form-label">Do you support this proposal?</label>
                                <select class="form-select" id="yesNoQuestion" name="vote">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <input type="hidden" name="txHash" id="blockchainTxHash">
                            <button type="button" class="btn btn-primary" onclick="submitVote()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Multiple Candidates Campaign -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Multiple Candidates Campaign
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#campaignsAccordion">
                    <div class="accordion-body">
                        <form>
                            <div class="mb-3">
                                <label for="candidates" class="form-label">Select a candidate:</label>
                                <select class="form-select" id="candidates">
                                    <option value="candidate1">Candidate 1</option>
                                    <option value="candidate2">Candidate 2</option>
                                    <option value="candidate3">Candidate 3</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Multiple Choices Campaign -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Multiple Choices Campaign
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#campaignsAccordion">
                    <div class="accordion-body">
                        <form>
                            <div class="mb-3">
                                <label for="choices" class="form-label">Choose your options:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="option1" id="option1">
                                    <label class="form-check-label" for="option1">Option 1</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="option2" id="option2">
                                    <label class="form-check-label" for="option2">Option 2</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="option3" id="option3">
                                    <label class="form-check-label" for="option3">Option 3</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ethers.io/lib/ethers-5.2.umd.min.js" type="application/javascript"></script>
</body>
</html>
