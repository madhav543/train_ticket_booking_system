 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>find trains</title>  
         <link rel="stylesheet" type="text/css" href="style.css"> 
      </head>  
      <body>   
           <form method="post" action="search_trains.php">

            <!--for source city-->

             <div class="container" >  

                <label>From Station</label>  
                <input type="text" name="Source" id="Source" class="form-control" placeholder="Enter Source Name" />  
                <div id="SourceList"></div>  
           </div> 
           <!--for destination city-->
           <div class="container" >  
                <label>To Station</label>  
                <input type="text" name="Destination" id="Destination" class="form-control" placeholder="Enter Destination Name" />  
                <div id="DestinationList"></div>  
           </div> 
           <div class="container" >  
                <label>Date of journey</label>  
                <input type="date" name="Date" id="Date" class="form-control" placeholder="Enter date" />  
           </div> 
           <div class="container" >
            <button type="submit" class="btn" name="reg_user">Find Trains</button>
           </div>
           </form>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#Source').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search_source.php",  
                     method:"POST",  
                     data:{query1:query},  
                     success:function(data)  
                     {  
                          $('#SourceList').fadeIn();  
                          $('#SourceList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#Source').val($(this).text());  
           $('#SourceList').fadeOut();  
      });  
 });  
 </script>



 <script>  
 $(document).ready(function(){  
      $('#Destination').keyup(function(){  
           var query = $(this).val/home/blueshark/Downloads/ticket-booking_system-master();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#DestinationList').fadeIn();  
                          $('#DestinationList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#Destination').val($(this).text());  
           $('#DestinationList').fadeOut();  
      });  
 });  
 </script>
