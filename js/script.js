if (typeof window.ethereum !== 'undefined') {
    console.log('MetaMask is installed!');
} else {
    alert('MetaMask is required to use this DApp. Please install it.');
}

// Contract address on the Polygon blockchain
const contractAddress = '0xeeb6b6F73665B43383D9cE8a94D69A918B9aF792'; 

// Contract ABI (Application Binary Interface)
const contractABI = [
    "event VoteCast(address indexed voter, string vote)",
    "function vote(string _vote) external"
];

// Function to send the vote
async function sendVote(userVote) {
    if (typeof window.ethereum !== 'undefined') {
        try {
            // Request the user to connect MetaMask
            await ethereum.request({ method: 'eth_requestAccounts' });
            
            const provider = new ethers.providers.Web3Provider(window.ethereum);
            const signer = provider.getSigner();

            const contract = new ethers.Contract(contractAddress, contractABI, signer);

            // Send the vote string to the contract
            const tx = await contract.vote(userVote);

            // Wait for the transaction to be confirmed
            const receipt = await tx.wait();

            // Extract the transaction hash
            const txHash = receipt.transactionHash;

            // Add the transaction hash to the hidden form field
            document.getElementById('blockchainTxHash').value = txHash;

            // Submit the form after the registration on the blockchain
            document.getElementById('yesNoForm').submit();

        } catch (error) {
            console.error('Error sending the vote:', error);
            alert('There was an error submitting your vote. Please try again.');
        }
    } else {
        alert('MetaMask is required to use this DApp. Please install it.');
    }
}

// Function to validate and submit the vote
function submitVote() {
    const voteValue = document.getElementById('yesNoQuestion').value;

    // Send the selected value as a string to the contract
    sendVote(voteValue);
}
