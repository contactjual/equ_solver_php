<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equation Solver</title>

    <link rel="shortcut icon" href="img/formula.png" type="image/x-icon">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="contaienr">


        <!-- php file -->
        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST["submit"])) {

                // get equ type 
                $equ_type = $_POST["equ"];

                // get input value 
                $a_value = $_POST["a"];
                $b_value = $_POST["b"];
                $c_value = $_POST["c"];
                $d_value = $_POST["d"];
                $e_value = $_POST["e"];
                $m_value = $_POST["m"];
                $r_value = $_POST["r"];
                $x_value = $_POST["x"];
                $y_value = $_POST["y"];

            }

        }


        // calculaiton area 
        
        if (!empty($equ_type)) {

            switch ($equ_type) {
                case "eleven": // ax + b = 0 ; x = ?
                    if ($a_value === 0) {
                        $result = "The value of 'a' cannot be zero.";
                    } else if (empty($a_value) || empty($b_value)) {
                        $result = "Please Input value";
                    } else {
                        $result = "x = " . -$b_value / $a_value;
                    }
                    break;

                case "first-y": // ax + by + 1 = 0 ; y = ?
                    if ($b_value === 0) {
                        $result = "The value of 'b' cannot be zero.";
                    } else if (empty($a_value) || empty($b_value) || empty($x_value)) {
                        $result = "Please Input value";
                    } else {
                        $result = "y = " . -$a_value * $x_value - 1 / $b_value;
                    }
                    break;

                case "first-x": // ax + by + 1 = 0 ; x = ?
                    if ($a_value === 0) {
                        $result = "The value of 'a' cannot be zero.";
                    } else if (empty($a_value) || empty($b_value) || empty($y_value)) {
                        $result = "Please Input value";
                    } else {
                        $result = "x = (-$b_value y - 1) / $a_value = " . (-$b_value * $y_value - 1) / $a_value;
                    }
                    break;

                case "second-y": // ax + by + c = 0 ; y = ?
                    if ($b_value === 0) {
                        $result = "The value of 'b' cannot be zero.";
                    } else if (empty($a_value) || empty($b_value) || empty($c_value) || empty($x_value)) {
                        $result = "Please Input value";
                    } else {
                        $result = "y = " . (-$a_value * $x_value - $c_value) / $b_value;
                    }
                    break;

                case "second-x": // ax + by + c = 0 ; x = ?
                    if ($a_value === 0) {
                        $result = "The value of 'a' cannot be zero.";
                    } else if (empty($a_value) || empty($b_value) || empty($c_value) || empty($y_value)) {
                        $result = "Please Input value";
                    } else {
                        $result = "x = " . (-$b_value * $y_value - $c_value) / $a_value;
                    }
                    break;

                // case "third-x": // ax² + bx + c = 0 ; x = ?
                //     $discriminant = $b_value * $b_value - 4 * $a_value * $c_value;
                //     if ($a_value === 0) {
                //         $result = "The value of 'a' cannot be zero.";
                //     } else if (empty($a_value) || empty($b_value) || empty($c_value)) {
                //         $result = "Please Input value";
                //     } else if ($discriminant < 0) {
                //         $result = "No real solutions exist.";
                //     } else {
                //         $root1 = (-$b_value + Math . sqrt($discriminant)) / (2 * $a_value);
                //         $root2 = (-$b_value - Math . sqrt($discriminant)) / (2 * $a_value);
                //         $result = "x₁ = $root1, x₂ = $root2";
                //     }
                //     break;
        
                default:
                    $result = "Sorry! we are working for this equation";
            }

        } else {
            $result = "Select equation and Input proper value";
        }


        ?>

        <h1>Equation Solver</h1>
        <label for="equation-type">Select Equation Type:</label>

        <form action="#" method="post" id="equationForm">
            <select name="equ" id="equation-type">
                <option value="">-- Select an equation type --</option>
                <option value="eleven">ax + b = 0; x = ?</option>
                <option value="first-y">ax + by + 1 = 0; y = ?</option>
                <option value="first-x">ax + by + 1 = 0; x = ?</option>
                <option value="second-y">ax + by + c = 0; y = ?</option>
                <option value="second-x">ax + by + c = 0; x = ?</option>
                <option value="third-x">ax² + bx + c = 0; x = ?</option>
                <option value="third-c">ax² + bx + c = 0; c = ?</option>
                <option value="fourth">x² + y² = r²; r = ?</option>
                <option value="fifth-a">a² + b² = c²; a = ?</option>
                <option value="fifth-b">a² + b² = c²; b = ?</option>
                <option value="fifth-c">a² + b² = c²; c = ?</option>
                <option value="eighth-m">y = mx + c; m = ?</option>
                <option value="eighth-y">y = mx + c; y = ?</option>
                <option value="eighth-x">y = mx + c; x = ?</option>
                <option value="eighth-c">y = mx + c; c = ?</option>
                <option value="ninth-e">E = mc²; E = ?</option>
                <option value="ninth-m">E = mc²; m = ?</option>
                <option value="tenth">x = (-b ± √(b² - 4ac)) / 2a; x = ?</option>
            </select>

            <section class="input">
                <div>
                    <label for="a">Enter a:</label>
                    <input type="number" name="a">
                </div>

                <div>
                    <label for="b">Enter b:</label>
                    <input type="number" name="b">
                </div>

                <div>
                    <label for="c">Enter c:</label>
                    <input type="number" name="c">
                </div>

                <div>
                    <label for="d">Enter d:</label>
                    <input type="number" name="d">
                </div>

                <div>
                    <label for="e">Enter e:</label>
                    <input type="number" name="e">
                </div>

                <div>
                    <label for="m">Enter m:</label>
                    <input type="number" name="m">
                </div>

                <div>
                    <label for="r">Enter r:</label>
                    <input type="number" name="r">
                </div>

                <div>
                    <label for="x">Enter x:</label>
                    <input type="number" name="x">
                </div>

                <div>
                    <label for="y">Enter y:</label>
                    <input type="number" name="y">
                </div>
            </section>

            <button id="butt" type="submit">Solve</button>
        </form>

        <div class="result" id="result"> <?php echo $result; ?> </div>
    </div>
</body>

</html>