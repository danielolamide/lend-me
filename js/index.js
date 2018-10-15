$(document).ready(function () {
    $(".dropdown-trigger").dropdown({
        coverTrigger: false,
        hover: true,
        constrainWidth: false
    });
    $('.sidenav').sidenav();
    $('.pushpin').pushpin();
    $(document).ready(function () {
        $('.tabs').tabs({
            // swipeable:true
        });
    });
    $('.collapsible').collapsible();
    $('.modal').modal();

    //Deposit Form
    $('#depositForm').submit(function (event) {
        //Getting Form Data
        var depositFormData = {
            'amount-to-deposit': $('input[name=amount-to-deposit]').val()
        }
        $('#deposit-icon').val("");
        //Process Deposit Form
        $.ajax({
            type: 'POST',
            url: 'processDeposit.php',
            data: depositFormData,
            dataType: 'json',
            encode: true,
            success: function () {
                //$('#modal-deposit').modal('destroy');
                var depositModal = document.querySelector('#modal-deposit');
                var instance = M.Modal.init(depositModal);
                instance.close();
                $('#w-balance').load('updateWallet.php');
                $('#recent-transactions').load('updateTransaction.php');
                M.toast({
                    html: "Successfully Deposited Ksh " + depositFormData["amount-to-deposit"],
                    classes: 'rounded green',
                    displayLength: '1000'
                });
                location.reload();
            }
        });
        event.preventDefault();
    });

    //Withdrawal Forms
    $('#withdrawForm').submit(function (event) {
        var withdrawFormData = {
            'amount-to-withdraw': $('input[name=amount-to-withdraw]').val()

        }
        $('#withdraw-icon').val("");
        //var accountBalanceCheck;
        //Process Withdrawal Form
        $.ajax({
            type: 'POST',
            url: 'processWithdraw.php',
            data: withdrawFormData,
            dataType: 'json',
            encode: true,
            success: function () {
                // var withdrawModal = document.querySelector('#modal-withdraw');
                // var instance = M.Modal.init(withdrawModal);
                // instance.close();
                // $('#w-balance').load('updateWallet.php');
                // M.toast({html:"You have insufficient funds", classes:'rounded red', displayLength:'1000'});
                var withdrawModal = document.querySelector('#modal-withdraw');
                var instance = M.Modal.init(withdrawModal);
                instance.close();
                $('#w-balance').load('updateWallet.php');
                $('#recent-transactions').load('updateTransaction.php');
                M.toast({
                    html: "Successfully Withdrawn Ksh " + withdrawFormData["amount-to-withdraw"],
                    classes: 'rounded green',
                    displayLength: '5000'
                });
                location.reload();

            },
            error: function () {
                var withdrawModal = document.querySelector('#modal-withdraw');
                var instance = M.Modal.init(withdrawModal);
                instance.close();
                $('#w-balance').load('updateWallet.php');
                $('#recent-transactions').load('updateTransaction.php');
                M.toast({
                    html: "You have insufficient funds",
                    classes: 'rounded red',
                    displayLength: '5000'
                });
                location.reload();
            }

        });
        event.preventDefault();
    });
    //Loan Application
    $('#loan-form').submit(function (event) {
        var loanApplicationForm = $('#loan-form').serializeArray();
        loanApplicationForm.push({
            name: "valid",
            value: "true"
        });
        $('#money-icon').val("");
        $("#time-icon").val("");
        $("#percent-icon").val("");
        $("#description-text").val("");
        $.ajax({
            type: 'POST',
            url: 'processLoanApplication.php',
            data: loanApplicationForm,
            dataType: "json",
            success: function (data) {
                console.log(data);
                var borrowModal = document.querySelector('#loan-form-modal');
                var instance = M.Modal.init(borrowModal);
                instance.close();
                M.toast({
                    html: "You have successfuly posted your loan",
                    classes: 'rounded green',
                    displayLength: '5000'
                });
                location.reload();
            },
            error: function () {
                var borrowModal = document.querySelector('#loan-form-modal');
                var instance = M.Modal.init(borrowModal);
                instance.close();
                M.toast({
                    html: "Loan Declined",
                    classes : 'rounded red',
                    displayLength: '5000'
                });
                location.reload();
            }
        });
        event.preventDefault();
    });
});