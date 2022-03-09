$(document).ready(function() {
    $('#myTable').DataTable();

});
$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true
    });
});

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}



function showForms() {
    let Forms = document.getElementById("CreateAccounts");
    let AllAccounts = document.getElementById("AllAccountsTable");
    if (Forms.style.display === "none") {
        Forms.style.display = "block";
        AllAccounts.style.display = 'none';

    } else {
        Forms.style.display = "none";
        AllAccounts.style.display = 'none';
    }
}

function showTables() {
    let AllAccounts = document.getElementById("AllAccountsTable");
    let Forms = document.getElementById("CreateAccounts");
    if (AllAccounts.style.display === "none") {
        AllAccounts.style.display = "block";
        Forms.style.display = 'none';
    } else {
        AllAccounts.style.display = "none";
        Forms.style.display = "none";
    }
}

function listofQuotes() {
    const Quotes = new Array['Hello', 'world', 'Nice', 'beautiful'];

    let QuotesText = Quotes[2];
    console.log(QuotesText.toString());
}