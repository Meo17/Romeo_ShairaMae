<!DOCTYPE html>
<html>
<title>Exam</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.js"></script>
<body>
   <!-- Add School -->
  <form method="post">
      <label for="fname">Name of  School :</label><br>
       <input type="text" id="schoolname" name="schoolname" required>  
      <button type="button" name="save"  id="save_school">Add School</button><br>


 <br>
 <!-- Add Student -->
 <button type="button" id="addstud" >Add Student </button><br>

  <div id="hidecol" hidden>
   
        <label for="cars">Choose a School:</label>
          <select name="cars" id="select_school" required> 
            <?php if (!empty($schools) )  {?>
               <option  disabled>-----</option> 
                <?php  foreach ($schools as $v)   {?>
                     <option value="<?php echo $v['id']?>"><?php echo $v['schoolname']?></option> 
                 <?php  } ?>
            <?php  } ?>
          </select><br>
        <label for="fname">Full Name of  Student :</label><br>
          <p style="color: red;"id="check" hidden> Student name already exist</p>
           <input type="text" id="studname" name="studname" required> <br>

           <label for="fname">Scores:</label><br>
           <input type="number" id="scores" name="scores" required>
        <button type="button" name="save"  id="save_student" disabled>Add Student</button> <br>
     
  </div>

  </form> 
   
  <!-- Table -->
  <style type="text/css">
    
    table, th, td {
    border: 1px solid;
    width: auto;
    }
    .noborder {
     border-style: none;
    }
    .tdbreak {
      word-break: break-all
    }

  </style>
<br>
    <table border="2" style="border-collapse:collapse;">
      <thead>
        <tr>
             <th>List of schools</th>
             <th>Students Name </th>
             <th>Total Points</th>
        </tr>
       </thead>
       <tbody>
     
            <?php if (!empty($schools) )  {?>
              <?php  foreach ($schools as $v)   {?>
               <tr>
                  <td><?php echo $v['schoolname']?> 
                  </td>
                   <td class="tdbreak">
                    <?php  
                        $name = "";
                        $count = 0; 
                        $count1 = 0; 
                        $number = array();
                     ?>
                     <?php  foreach ($ret_students as $r)   {?>  
                            <?php 
                              if ($r['score'] == 1 && $r['school_id'] == $v['id'] ) {
                                 $count ++;
                              }
                              $total = $count * 5;
                             
                        
                            ?>  
                             <?php if ($r['school_id'] == $v['id'] ) { ?>
                                 <?php 
                                     $count1 ++;
                                     $name = $r['schoolname'] ;
                                      echo $r['full_name'] . " " .  $r['score'] ."," ;?> 
                             <?php  } ?>
                      <?php  } ?>
                   </td>
                    <tr id="total_numbers">

                        <td></td>
                        <td ></td>
                        <td class="num" id ="winner" column-name="<?php echo  $name ?>" schoolname ="<?php echo  $name ?>" total="<?php echo $total ?>"> 
                                <?php 
                                echo $total;
                            ?> 
                        </td>
                   </tr>
                    <p class="text" hidden> <?php echo $total .",";?></p>
              <?php  } ?>
          <?php  } ?>
     
       
      </tbody>
    </table>
      <br>
      <label for="fname">WINNER:  <span id="text_winner"> </span> </label><br>
</body>
</html>