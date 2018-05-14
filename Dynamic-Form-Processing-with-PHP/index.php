<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Dynamic Form Processing with PHP | Tech Stream</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
		<script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <form action="process.php" class="register" method="POST">
            <h1>iQuery Quiz Creator</h1>
			<fieldset class="row1">
                <legend>Quiz Information</legend>
				<p>
                    <label>Quiz Name *
                    </label>
                    <input name="bus" type="text" required="required"/>
                    <label>Date of Quiz  (2018)*
                    </label>
                    <select class="date" name="day">
                        <option value="1">01
                        </option>
                        <option value="2">02
                        </option>
                        <option value="3">03
                        </option>
                        <option value="4">04
                        </option>
                        <option value="5">05
                        </option>
                        <option value="6">06
                        </option>
                        <option value="7">07
                        </option>
                        <option value="8">08
                        </option>
                        <option value="9">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <select name="month">
                        <option value="1">January
                        </option>
                        <option value="2">February
                        </option>
                        <option value="3">March
                        </option>
                        <option value="4">April
                        </option>
                        <option value="5">May
                        </option>
                        <option value="6">June
                        </option>
                        <option value="7">July
                        </option>
                        <option value="8">August
                        </option>
                        <option value="9">September
                        </option>
                        <option value="10">October
                        </option>
                        <option value="11">November
                        </option>
                        <option value="12">December
                        </option>
                    </select>
					<label>Quiz Type *
                    </label>
                    <select name="type">
                        <option value="Graded">Graded
                        </option>
                        <option value="Ungradedr">Ungraded
                        </option>
					</select>

                </p>
                <p>
					<label>Class Name
                    </label>
                    <input name="from" required="required" type="text"/>
					<label>Chapter/Section
                    </label>
					<input name="to" required="required" type="text"/>
					<label>Quiz Type
                    </label>
					<select id="root" onchange="show()">
			<option value="Select">Select			
                        <option value="Multiple Choice">Multiple Choice
                        </option>
                        <option value="Short Response">Short Response
                        </option>
                        <option value="True/False">True/False
                        </option>
                    </select>
                </p>

				<div class="clear"></div>
            </fieldset>
            <fieldset class="row2">
				<legend>Question Details</legend>
				<p>
					<input type="button" value="Add Question" onClick="addRow('dataTable')" />
					<input type="button" value="Remove Question" onClick="deleteRow('dataTable')"  />
					<p>(All acions apply only to entries with check marked check boxes only.)</p>
				</p>
               <table id="dataTable" class="form" border="1">
                  <tbody>
                      <tr style="display:block;" id="mc">
                        <p>
						<td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
						<td>
							<label>Question 1</label>
							<input type="text" required="required" name="BX_NAME[]">
						 </td>
						 <td>
							<label for="BX_a1">Answer A</label>
							<input type="text" required="required" class="large"  name="BX_a1[]">
					     </td>
						 <td>
							<label for="BX_a2">Answer B</label>
							<input type="text" required="required" class="large"  name="BX_a2[]">
					     </td>
                           <td>
							<label for="BX_a3">Answer C</label>
							<input type="text" required="required" class="large"  name="BX_a3[]">
					     </td>
                           <td>
							<label for="BX_a4">Answer D</label>
							<input type="text" required="required" class="large"  name="BX_a4[]">
					     </td>
						 <td>
							<label for="BX_birth">Correct Answer</label>
							<select id="BX_birth" name="BX_birth" required="required">
								<option>....</option>
								<option>A</option>
								<option>B</option>
                                <option>C</option>
                                <option>D</option>
							</select>
						 </td>
							</p>
                    </tr>
                    <tr style="display:block;" id="shortR">
                                <td><label>Question</label></td>
                              <td><input type="text" id="quiz" style="display:block;" size=20 maxlength=12 value=""></td>
                              <td>
                              <input type="button" id="quiz2" onclick="addkid()" value="+" />
                              <input type="button" id="quiz2" onclick="addkid()" value="-" />

                              <td><input type="text" id="quiz7" style="display:block;" size=60 maxlength=60 value=""></td>

                            </td>
                            </tr>
                            <tr  style="display:inline-block;" id="tf">
                                   <td><label>Question. </label></td>
                                   <td><input type="text" id="quiz4" style="display:inline-block;" size=20 maxlength=12 value=""></td>
                                   <td><label>T/F </label></td>

                                   <td><select>
                                     <option value = "true">True
                                       <option value="false">False
                                       </select>
                                         <input id="checkBox" type="checkbox">Correct Answer

                                   </td>
                             </tr>
                           </tbody>
                </table>
				<div class="clear"></div>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information</legend>
				<input type="text"  class="large"  name="BX_age[]">
				<div class="clear"></div>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Mailing</legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>*  I'm all done</label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I want to receive personalized offers by your Service</label>
                </p>

				<div class="clear"></div>
            </fieldset>
			<input class="submit" type="submit" value="Confirm &raquo;" />
			<a class="submit" href="file:///C:/Users/Seth/Downloads/Dynamic-Form-Processing-with-PHP/process.PHP"/>Back to Techstream Article</a>

			<div class="clear"></div>
        </form>

    </body>
	<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9046834;
var sc_invisible=1;
var sc_security="ec55ba17";
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");

function show(){

    var option = document.getElementById("category").value;
	  if(option === "Select"){
      document.getElementById("tf").style.display="none";
      document.getElementById("mc").style.display="none";
      document.getElementById("shortR").style.display="none";
    }
 else   if(option == "Multiple Choice"){
      document.getElementById("tf").style.display="none";
      document.getElementById("mc").style.display="block";
      document.getElementById("shortR").style.display="none";
    }
  else  if(option === "Short Response")
          {
                document.getElementById("tf").style.display="none";
                document.getElementById("mc").style.display="none";
                document.getElementById("shortR").style.display="block";
          }

  else  if(option === "True/False")
          {
                document.getElementById("tf").style.display="block";
                document.getElementById("mc").style.display="none";
                document.getElementById("shortR").style.display="none";

          }

}


</script>
<noscript><div class="statcounter"><a title="free hit
counter" href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/9046834/0/ec55ba17/1/"
alt="free hit counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->
</html>
