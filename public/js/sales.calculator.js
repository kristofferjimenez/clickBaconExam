$(document).ready(function() 
{   
    var amount = 0;
    $('.amount').keyup(function() 
    {
        amount = $("input[name='amount[]']")
                .map(function(){return $(this).val();}).get();

        var total = 0;

        for (let i = 0; i < amount.length; i++) 
        {
            total = parseFloat(amount[i]) + parseFloat(total);
        }
        
        if (!isNaN(total)) 
        {
            $('#total').text('Total: $'+total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
        }else{
            $('#total').text('An amount is not a number!');
        }
        
    });
});