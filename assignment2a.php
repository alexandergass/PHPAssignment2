<?php

    //retrieve the submitted values
    $gradeValue = $_GET["gradeValue"];

    //check for form submission
    if (isset($_GET["form1"])) {
        $formSubmit = true;
    } else {
        $formSubmit = false;
    }

    //error checking
    $errors = 0;
    if ($formSubmit && $gradeValue == "") $errors = 1;

    //if there are errors, show the form
    if ($errors > 0 || !$formSubmit) {
?>
<!DOCTYPE html>
<HTML>
    <HEAD>
        <TITLE>My Test Form</TITLE>
    </HEAD>
    <BODY>
        <P>Please enter a school mark/grade. Fields marked with (*) are
            required.</P>
        <FORM action="" method="GET">

Mark/Grade*: <INPUT TYPE="text" name="gradeValue" value="<?php echo $gradeValue; ?>" />
<?php if ($formSubmit && $gradeValue == "") echo " <font color='red'>
<strong><sup>*</sup>required</strong></font>";  ?>

<br />
<INPUT TYPE="submit" name="form1" value="submit" />
        </FORM>
    </BODY>
</HTML>
<?php
    } else {
    //No errors, display values

    if ($formSubmit && is_Numeric($gradeValue)) {
        if ($gradeValue >= 85) {
    echo "Mark entered: ";
    echo $gradeValue;

    echo "<br />Letter Grade: ";
    echo "A";

        }
        elseif ($gradeValue >= 75 && $gradeValue <= 84.99) {
            echo "Mark entered: ";
            echo $gradeValue;
        
            echo "<br />Letter Grade: ";
            echo "B";
        
                }
                elseif ($gradeValue >= 60 && $gradeValue <= 74.99) {
                    echo "Mark entered: ";
                    echo $gradeValue;
                
                    echo "<br />Letter Grade: ";
                    echo "C";
                
                        }
                        elseif ($gradeValue <= 60) {
                            echo "Mark entered: ";
                            echo $gradeValue;
                        
                            echo "<br />Letter Grade: ";
                            echo "F";

                            }

                            else {
                                echo "Invalid value entered, please make sure value is between 0-100 and has less than 3 decimal places";
                            }

    }
    elseif ($formSubmit && !is_Numeric($gradeValue)) {
        $gradeValue = strtoupper($gradeValue);

        switch ( $gradeValue )  {
            case "A":
                echo "You scored between 85 - 100 points";
                break;
            case "B":
                echo "You scored between 75-84.99 points";
                break;
            case "C":
                echo "You scored between 60-74.99 points";
                break;
            case "F":
                echo "You scored between 0-59.99 points";
                break;
            default: 
                echo "Cannot process your mark";
        }
    }
    else {
        echo "Invalid input";
    }

    }
?>