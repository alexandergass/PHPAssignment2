<?php

    //retrieve the submitted values
    $pizzaSize = $_GET["pizzaSize"];
    $pizzaTopping = $_GET["pizzaTopping"];
    $pizzaCost = $_GET["pizzaCost"];

    //check for form submission
    if (isset($_GET["form1"])) {
        $formSubmit = true;
    } else {
        $formSubmit = false;
    }

    //error checking
    $errors = 0;
    if ($formSubmit && $pizzaSize == "") $errors = 1;

    //if there are errors, show the form
    if ($errors > 0 || !$formSubmit) {
?>
<!DOCTYPE html>
<HTML>
    <HEAD>
        <TITLE>My Test Form</TITLE>
    </HEAD>
    <BODY>
        <P>Please choose pizza size and desired toppings. Fields marked with (*) are
            required.</P>
        <FORM action="" method="GET">

Pizza Size*: <SELECT name="pizzaSize" required><OPTION VALUE=""></OPTION>
<OPTION VALUE="Small" <?php if ($pizzaSize=="Small") echo "selected"; ?> >Small</OPTION>
<OPTION VALUE="Medium" <?php if ($pizzaSize=="Medium") echo "selected"; ?> >Medium</OPTION>
<OPTION VALUE="Large" <?php if ($pizzaSize=="Large") echo "selected"; ?> >Large</OPTION>
<OPTION VALUE="Extra Large" <?php if ($pizzaSize=="Extra Large") echo "selected"; ?> >Extra Large</OPTION>             
</SELECT><br /> 

<br />

Each topping is $1 extra except cheese which is free. <br />
<input type="checkbox" name="pizzaTopping[]" value="Pepperoni"  > Pepperoni    <br />
<input type="checkbox" name="pizzaTopping[]" value="Cheese" > Cheese  <br />
<input type="checkbox" name="pizzaTopping[]" value="Olive" > Olive    <br />
<input type="checkbox" name="pizzaTopping[]" value="Pineapple" > Pineapple    <br />
<input type="checkbox" name="pizzaTopping[]" value="Ham" > Ham   <br />

<br />
<br />

<INPUT TYPE="submit" name="form1" value="submit" />
        </FORM>
    </BODY>
</HTML>
<?php
    } else {
    //No errors, display values

            switch ( $pizzaSize )  {
            case "Small":
                $pizzaCost = 9.00;
                break;
            case "Medium":
                $pizzaCost = 12.50;
                break;
            case "Large":
                $pizzaCost = 15.00;
                break;
            case "Extra Large":
                $pizzaCost = 17.50;
                break;
            default: 
                echo "Please select a size";
            }

/*                     switch ( $pizzaTopping )  {
                    case "Pepperoni":
                        $pizzaCost += 1.00;
                        break;
                    case "Cheese":
                        $pizzaCost += 0;
                        break;
                    case "Olive":
                        $pizzaCost += 1.00;
                        break;
                    case "Pineapple":
                        $pizzaCost += 1.00;
                        break;
                    case "Ham":
                        $pizzaCost += 1.00;
                        break;                                                                                            
                    } */

    echo "<b>Size:</b> ";
    echo $pizzaSize;
    echo "<br /> <b>Toppings:</b> <br />";

    foreach ($_GET['pizzaTopping'] as $selected) {
            if ($selected=="Cheese") {
            $pizzaCost += 0;
            }
            else {
                $pizzaCost ++;
            }
            echo $selected;
            echo "<br />";
        }
                    
    echo "<br /><br />Your total is $";
    echo number_format((float)$pizzaCost, 2, '.', '');
    }
?>