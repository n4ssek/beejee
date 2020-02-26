$(document).ready(function(){
    $(document).on('click', '.column-sort', function(){
        var column_name = $(this).attr("id");
        var order = $(this).data("order");
        var arrow = '';
        //glyphicon glyphicon-arrow-up
        //glyphicon glyphicon-arrow-down
        if(order == 'desc')
        {
            arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';
        }
        else
        {
            arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';
        }
        $.ajax({
            url:"sort.php",
            method:"POST",
            data:{column_name:column_name, order:order},
            success:function(data)
            {
                $('#tasks-table').html(data);
                $('#'+column_name+'').append(arrow);
            }
        })
    });
});