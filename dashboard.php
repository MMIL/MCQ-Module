<?php
session_start();

if(isset($_SESSION['myusername']))
{
    include 'config.php';
    include 'head.php';

?>

<div class="container-fluid">
  <div class="row">

     <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="panel">
          <div class="panel panel-body">

             <h3>Question 1</h3>
             <hr>
             <p>In publishing and graphic design, lorem ipsum is a filler text or greeking commonly used to demonstrate the textual elements of a graphic document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.The lorem ipsum text is typically a scrambled section of De finibus bonorum et malorum, a 1st-century BC Latin text by Cicero, with words altered, added, and removed to make it nonsensical, improper Latin.A variation of the ordinary lorem ipsum text has been used in typesetting since the 1960s or earlier, when it was popularized by advertisements for Letraset transfer sheets. It was introduced to the Information Age in the mid-1980s by Aldus Corporation, which employed it in graphics and word-processing templates for its desktop publishing program PageMaker.
             </p><br>
             <ul id="listOptions">
               <li id="option">
                 <input type="radio" id="f-option" name="selector">
                 <label for="f-option">A</label>
    
                 <div class="check"></div>
               </li>
  
               <li id="option">
                 <input type="radio" id="s-option" name="selector">
                 <label for="s-option">B</label>
    
                 <div class="check"><div class="inside"></div></div>
               </li>
  
               <li id="option">
                <input type="radio" id="t-option" name="selector">
                <label for="t-option">C</label>
    
                <div class="check"><div class="inside"></div></div>
               </li>
         
               <li id="option">
                 <input type="radio" id="u-option" name="selector">
                 <label for="u-option">D</label>
    
                 <div class="check"><div class="inside"></div></div>
               </li>
            </ul>

            <a href="#" class="next">Next<i style="margin-left: 5px;" class="glyphicon glyphicon-chevron-right"></i></a>
          </div>
        </div>
     </div>
     <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div class="panel">
          <div class="panel panel-body" id="border">

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="oneD">1</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="oneD">2</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="oneD">3</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="oneD">4</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="oneD">5</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="oneD">6</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="oneD">7</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="oneD">8</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="oneD">9</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">10</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">11</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">12</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">13</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">14</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">15</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">16</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">17</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">18</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">19</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">20</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">21</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">22</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">23</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">24</button>
               </div>

                <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">25</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">26</button>
               </div>

               <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                 <button type="button" id="twoD">27</button>
               </div>
          </div>
        </div>
     </div>
  </div>
</div>
</body>
</html>

<?php
	mysql_close($connection);
}
else
{
     echo"<script type='text/javascript'>
     window.location.href='login.php';
     </script>";
}
?>
