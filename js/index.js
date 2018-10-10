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
    $('#depositForm').submit(function(event){
        //Getting Form Data
        var depositFormData = {
            'amount-to-deposit' : $('input[name=amount-to-deposit]').val()
        }
        $('#deposit-icon').val("");
        //Process Deposit Form
        $.ajax({
            type: 'POST',
            url: 'processDeposit.php',
            data: depositFormData,
            dataType: 'json',
            encode: true,
            success: function (){
                //$('#modal-deposit').modal('destroy');
                var depositModal = document.querySelector('#modal-deposit');
                var instance = M.Modal.init(depositModal);
                instance.close();
                $('#w-balance').load('updateWallet.php');
                M.toast({html:"Successfully Deposited Ksh "+depositFormData["amount-to-deposit"], classes:'rounded green', displayLength:'1000'});
            }
        });
        event.preventDefault();
    });

    //Withdrawal Forms
    $('#withdrawForm').submit(function(event){
        var withdrawFormData ={
            'amount-to-withdraw' : $('input[name=amount-to-withdraw]').val()

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
            success: function(){
                // var withdrawModal = document.querySelector('#modal-withdraw');
                // var instance = M.Modal.init(withdrawModal);
                // instance.close();
                // $('#w-balance').load('updateWallet.php');
                // M.toast({html:"You have insufficient funds", classes:'rounded red', displayLength:'1000'});
                var withdrawModal = document.querySelector('#modal-withdraw');
                var instance = M.Modal.init(withdrawModal);
                instance.close();
                $('#w-balance').load('updateWallet.php');
                M.toast({html:"Successfully Withdrawn Ksh "+withdrawFormData["amount-to-withdraw"], classes:'rounded green', displayLength:'1000'});
                
            },
            error: function(){
                var withdrawModal = document.querySelector('#modal-withdraw');
                var instance = M.Modal.init(withdrawModal);
                instance.close();
                $('#w-balance').load('updateWallet.php');
                M.toast({html:"You have insufficient funds", classes:'rounded red', displayLength:'1000'});
            }
                
        });
        event.preventDefault();
    });
    



});
