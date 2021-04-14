$('document').ready(function()
{
    $('#Updatebtn').hide();
    $('#submitbtn').show();
    $.ajax({
            url:'server.php',
            type:"POST",
            data:{
                'display':1
            },
            success:function(response)
            {
                clearAll();
                $('#MyTbl').html("");
                $('#MyTbl').addClass('table table-bordered');
                $('#MyTbl').append("<thead><tr><th>Id</th><th>Article Number</th><th>Name</th><th>Color</th><th>Size</th><th>Price</th><th>Quantity</th><th>Specification</th><th>Actions</th></tr></thead>");
                $('#MyTbl').append(response);
            },
            error:function()
            {
                alert("Failed");
            }
        });
        $('#submitbtn').click(function(){
            var article = $('#article').val();
            var name = $('#name').val();
            var color = $('#color').val();
            var specification = $('#specification').val();
            var price = $('#price').val();
            var size = $('#size').val();
            var quantity = $('#quantity').val();
        $.ajax({
            url:'server.php',
            type:"POST",
            data:{
                'save': 1,
                'article': article,
                'name': name,
                'color': color,
                'specification': specification,
                'size': size,
                'price': price,
                'quantity': quantity,
            },
            success:function(response)
            {
                alert("Successful");
                clearAll();
                $('#MyTbl').html("");
                $('#MyTbl').addClass('table table-bordered');
                $('#MyTbl').append("<thead><tr><th>Id</th><th>Article Number</th><th>Name</th><th>Color</th><th>Size</th><th>Price</th><th>Quantity</th><th>Specification</th><th>Actions</th></tr></thead>");
                $('#MyTbl').append(response);
            },
            error:function()
            {
                alert("Failed");
            }
        })
        });
        var id;
        $(document).on('click', '#editBtn', function(){
            //   alert("Enter");
            id = $(this).closest("tr").find('td:eq(0)').text();
            var article = $(this).closest("tr").find('td:eq(1)').text();   
            $('#article').val(article);   
            var name = $(this).closest("tr").find('td:eq(2)').text();   
            $('#name').val(name);
            var color = $(this).closest("tr").find('td:eq(3)').text();   
            $('#color').val(color);
            var size = $(this).closest("tr").find('td:eq(4)').text();   
            $('#size').val(size);
            var price = $(this).closest("tr").find('td:eq(5)').text();   
            $('#price').val(price);
            var quantity = $(this).closest("tr").find('td:eq(6)').text();   
            $('#quantity').val(quantity);
            var specification = $(this).closest("tr").find('td:eq(7)').text();   
            $('#specification').val(specification);
            
            $('#Updatebtn').show();
            $('#submitbtn').hide();
        });
        $('#Updatebtn').click(function(){
                var article = $('#article').val();
                var name = $('#name').val();
                var color = $('#color').val();
                var specification = $('#specification').val();
                var price = $('#price').val();
                var size = $('#size').val();
                var quantity = $('#quantity').val();
            $.ajax({
                url:'server.php',
                type:"POST",
                data:{
                    'edit':1,
                    'id':id,
                    'article': article,
                    'name': name,
                    'color': color,
                    'specification': specification,
                    'size': size,
                    'price': price,
                    'quantity':quantity

                },
                success:function(response)
                {
                    alert("Successful");
                    clearAll();
                    $('#MyTbl').html("");
                    $('#MyTbl').addClass('table table-bordered');
                    $('#MyTbl').append("<thead><tr><th>Id</th><th>Article Number</th><th>Name</th><th>Color</th><th>Size</th><th>Price</th><th>Quantity</th><th>Specification</th><th>Actions</th></tr></thead>");
                    $('#MyTbl').append(response);
                    $('#Updatebtn').hide();
                    $('#submitbtn').show();
                },
                error:function()
                {
                    alert("Failed");
                }
            })
        });
        $(document).on('click', '#deleteBtn', function(){
            var id = $(this).closest("tr").find('td:eq(0)').text();
            $.ajax({
                url:'server.php',
                type:"GET",
                data:{
                    'delete':1,
                    'id':id,
                },
                success:function(response)
                {
                    alert("Successful");
                    $('#MyTbl').html("");
                    $('#MyTbl').addClass('table table-bordered');
                    $('#MyTbl').append("<thead><tr><th>Id</th><th>Article Number</th><th>Name</th><th>Color</th><th>Size</th><th>Price</th><th>Quantity</th><th>Specification</th><th>Actions</th></tr></thead>");
                    $('#MyTbl').append(response);
                },
                error:function()
                {
                    alert("Failed");
                }
            })
        });
    });
function clearAll()
{
    $('#article').val('');
    $('#name').val('');
    $('#color').val('');
    $('#size').val('');
    $('#price').val('');
    $('#quantity').val('');
    $('#specification').val('');
}
